<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class DetectController extends Controller
{
    public function index(){
        $agent = new Agent();

        if($agent->isAndroidOS()){
            return redirect()->away('https://bit.ly/MsanAndroid');
        }

        if($agent->is('iPhone')){
            return redirect()->away('https://bit.ly/MsanApp');
        }

        return redirect()->away('https://msan.app/admin');


    }
}
