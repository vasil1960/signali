<?php

namespace App\Http\Controllers;

use App\Traits\WriteLogos;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\IagSession;

use App\Logos;

class LogoutController extends Controller
{

    use WriteLogos;

    public function logout(Request $request){

        // $as = $request->session()->get('ActiveSession');
        $sid =$request->session()->get('sid');
      
        if($sid){

            $iagsession = IagSession::where('ID', $sid)->first();
            $iagsession->update(['ActiveSession' => 0]);
            $iagsession ->save();

            $this->write_log($request, 'Изход от модула');

            $request->session()->flush();
        }
        // return redirect()->route('signali.restrict');

        return redirect('https://system.iag.bg');
        // abort('404');
    }
}
