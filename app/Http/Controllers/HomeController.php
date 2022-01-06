<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;
use App\Models\Recognition;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function viewFaceList()
    {
        $faceList = Recognition::get();
        return view('Admin.image.index',compact('faceList'));
    }

    public function viewFaceListAttendance($slug)
    {
        if($slug == "today"){
            $beginDay = Carbon::today();
            $finishDay = Carbon::tomorrow();
        }
        if($slug == "thisWeek"){
            $beginDay = Carbon::parse('last monday');
            $finishDay = Carbon::parse('this sunday');
        }
        if($slug == "thisMonth"){
            $beginDay = Carbon::parse('first day of this month');
            $finishDay = Carbon::parse('first day of next month');
        }

        $faceList = Recognition::whereBetween('date', [$beginDay, $finishDay])->get()->unique('iduser');
        
        foreach($faceList as $item){
            $getRecognition = Recognition::whereBetween('date', [$beginDay, $finishDay])->where('iduser',$item['iduser'])->get();
            $item['quantity'] = count($getRecognition);
            $item['detailRecognition'] = $getRecognition;
        }
        return view('Admin.image.index',compact('faceList')); 
    }

    public function viewFaceListAttendancePickDate(Request $request)
    {
        $datetimeBegin = $request->from."00:00:00";
        $datetimeFinish = $request->to."23:00:00";
        $from = date('Y-m-d H:i:s',strtotime($datetimeBegin));
        $to = date('Y-m-d H:i:s',strtotime($datetimeFinish));
        
        $faceList = Recognition::whereBetween('date', [$from, $to])->get()->unique('iduser');
        
        foreach($faceList as $item){
            $getRecognition = Recognition::whereBetween('date', [$from, $to])->where('iduser',$item['iduser'])->get();
            $item['quantity'] = count($getRecognition);
            $item['detailRecognition'] = $getRecognition;
        }
        return view('Admin.image.index',compact('faceList'));
    }
}
