<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;
use App\Models\Recognition;

class HomeController extends Controller
{
    public function viewFaceList()
    {
        $faceList = Recognition::get();
        return view('Admin.image.index',compact('faceList'));
    }

}
