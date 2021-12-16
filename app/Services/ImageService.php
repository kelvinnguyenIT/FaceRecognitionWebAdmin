<?php

namespace App\Services;

use DOMDocument;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageService
{
    /**
     * Transform all html content has external image or base64 to internal.
     *
     * @param $content
     * @param $folder
     * @param int $width
     * @return string
     */
    public function transformAll($content, $folder, $width = 1920)
    {
        $domDocument = new DOMDocument();
        @$domDocument->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
        $imgTagList = $domDocument->getElementsByTagName('img');

        foreach ($imgTagList as $imgTag) {
            $src = $imgTag->getAttribute('src');
            $imgTag->setAttribute('src', 'data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=');
            $imgTag->setAttribute('data-load', $src);
            $imgTag->setAttribute('loading', 'lazy');
            if (Str::startsWith($src, 'http')) {
                try {
                    $originalFileName = last(explode('/', $src));
                    $originalFileName = head(explode('?', $originalFileName));
                    $fileName = $this->generateFileName($originalFileName);
                    $imgTag->setAttribute('data-load', $this->store(file_get_contents($src), $folder, $fileName, $width));
                } catch (Exception $e) {
                    Log::error('ImageService.transformAll() Cannot transform url ' . $src);
                }
            } else if (Str::startsWith($src, 'data:image')) {
                $imgTag->setAttribute('data-load', $this->transform($src, $folder, $imgTag->getAttribute('data-filename'), $width));
            }
        }

        $body = $domDocument->documentElement->lastChild;
        return $domDocument->saveHTML($body);
    }

    /**
     * Transform base64 to image.
     *
     * @param $base64
     * @param $folder
     * @param $fileName
     * @param int $width
     * @return string $imageUrl
     */
    public function transform($base64, $folder, $fileName, $width = 1920)
    {
        // data:image/jpeg;base64,abc
        list($extension, $content) = explode(";base64,", $base64);
        list(, $extension) = explode('image/', Str::replaceFirst('jpeg', 'jpg', $extension));
        return $this->store(base64_decode($content), $folder, $this->generateFileName($fileName, $extension), $width);
    }

    /**
     * Store image to internal.
     *
     * @param $image $fileName is null: $request->file, $fileName is not null: base64_decode()
     * @param $folder
     * @param null $fileName
     * @param int $width
     * @return string $imageUrl
     */
    public function store($image, $folder, $fileName = null, $width = 1920)
    {
        $this->makeDirectory($folder);
        if (!$fileName) {
            $fileName = $this->getFileName($image);
            Log::info('ImageService.store() ' . $folder . $fileName . ', ' . $image->getClientMimeType());
            if (Str::lower($image->extension()) == 'svg') {
                $image->move($this->relativePath($folder), $fileName);
                return $folder . $fileName;
            }
            $image = $image->getRealPath();
        } else {
            Log::info('ImageService.store() ' . $folder . $fileName);
            if (Str::endsWith(Str::lower($fileName), 'svg')) {
                File::put($this->relativePath($folder . $fileName), $image);
                return $folder . $fileName;
            }
        }

        $image = Image::make($image);
        $image->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image->save($this->relativePath($folder) . $fileName);
        return $folder . $fileName;
    }

    public function delete($path)
    {
        if (Str::startsWith($path, config('constants.folder.upload'))) {
            File::delete($this->relativePath($path));
            Log::info('ImageService.delete() ' . $path);
        }
    }

    public function deleteDirectory($path)
    {
        if (Str::startsWith($path, config('constants.folder.upload'))) {
            File::deleteDirectory($this->relativePath($path));
            Log::info('ImageService.deleteDirectory() ' . $path);
        }
    }

    private function makeDirectory($folder)
    {
        if (!File::exists($this->relativePath($folder))) {
            File::makeDirectory($this->relativePath($folder), 0755, true);
        }
    }

    private function relativePath($path)
    {
        return ltrim($path, '/');
    }

    private function getFileName($image)
    {
        $pathInfo = pathinfo($image->getClientOriginalName());
        return Str::slug($pathInfo['filename'] . '-' . Str::random(3)) . '.' . Str::lower($pathInfo['extension']);
    }

    private function generateFileName($fileName, $extension = null)
    {
        if ($fileName) {
            list($fileName, $extension) = explode('.', $fileName);
            return Str::slug($fileName . '-' . Str::random(3)) . '.' . Str::lower($extension);
        }

        return Str::lower(Str::random(5)) . '.' . $extension;
    }
}
