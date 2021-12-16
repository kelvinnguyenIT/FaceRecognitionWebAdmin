<?php

namespace App\Services;

use DOMDocument;
use DOMXPath;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class CmsService
{
    /**
     * Generate data-cms attribute for all img and child tag contains text.
     *
     * @param string $fileName $fileName.blade.php
     */
    public function generate(string $fileName)
    {
        $path = base_path('resources/views/home/' . $fileName . '.blade.php');
        $content = file_get_contents($path);
        $domDocument = new DOMDocument();
        @$domDocument->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
        $domXPath = new DOMXPath($domDocument);

        $dataCmsList = $domXPath->query("//*[@data-cms]");
        foreach ($dataCmsList as $dataCms) {
            $dataCms->removeAttribute('data-cms');
        }

        $tagList = $domXPath->query("//body//*");
        $fileNameSlug = Str::slug(str_replace('/', '-', $fileName));
        foreach ($tagList as $index => $tag) {
            if ($tag->hasChildNodes()) {
                if ($tag->firstChild->nodeType === 3 && $tag->childNodes->length === 1) {
                    if ('a' === $tag->nodeName) {
                        if (!Str::startsWith($tag->getAttribute('href'), "#")
                            && !Str::startsWith($tag->getAttribute('href'), "/")
                            && !Str::startsWith($tag->getAttribute('href'), "http")) {
                            $tag->setAttribute('data-cms', $fileNameSlug . '-' . $index);
                        }
                    } else {
                        $tag->setAttribute('data-cms', $fileNameSlug . '-' . $index);
                    }
                }
            } else if ('img' === $tag->nodeName) {
                $tag->setAttribute('data-cms', $fileNameSlug . '-' . $index);
            }
        }

        $domDocument->saveHTMLFile($path);
    }

    /**
     * Validate all file in resources/views/home/*.blade.php
     *
     * @return Collection duplicate data-cms
     */
    public function validate()
    {
        $fileList = new RecursiveDirectoryIterator('resources/views/home');
        $dataCmsValueList = collect();
        $textNoTagList = collect();

        foreach (new RecursiveIteratorIterator($fileList) as $file) {
            if ($file->getExtension() == 'php') {
                $content = file_get_contents($file);
                $domDocument = new DOMDocument();
                @$domDocument->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));

                $domXPath = new DOMXPath($domDocument);
                $dataCmsList = $domXPath->query("//*[@data-cms]");
                foreach ($dataCmsList as $dataCms) {
                    $dataCmsValueList->push($dataCms->getAttribute('data-cms'));
                }

                $tagList = $domXPath->query("//body//*");
                foreach ($tagList as $index => $tag) {
                    if ($tag->hasChildNodes() && $tag->firstChild->nodeType === 3 && $tag->childNodes->length > 1) {
                        foreach ($tag->childNodes as $childNode) {
                            if (!$childNode->hasChildNodes() && !empty(trim($childNode->nodeValue))
                                && !Str::startsWith(trim($childNode->nodeValue), '@')) {
                                $textNoTagList->push(Str::limit(trim($childNode->nodeValue), 30, ''));
                            }
                        }
                    }
                }
            }
        }

        return collect([
            'duplicate' => $dataCmsValueList->duplicates()->unique()->flatten(),
            'noTag' => $textNoTagList->unique()->flatten()
        ]);
    }
}
