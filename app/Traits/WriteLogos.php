<?php

namespace App\Traits;

use App\Traits\WriteLogos;

use Illuminate\Http\Request;

use App\Logos;


trait WriteLogos
{
    
    public function __construct(){
        //
    }
   
    public function write_log(Request $request, $action){

        $logs = new Logos();
        $logs->ip = $request->ip();
        $logs->action = $action;
        $logs->username = $request->session()->get('username');
        $logs->userId = $request->session()->get('userId');
        $logs->name = $request->session()->get('FullName');
        $logs->podelenie = $request->session()->get('Podelenie');
        $logs->sid = $request->session()->get('sid');
        $logs->selyear = $request->session()->get('SelYear');
        $logs->save();

    }
}