<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\IagSession;

class LogoutController extends Controller
{
    public function logout(Request $request){

        // $as = $request->session()->get('ActiveSession');
        $sid =$request->session()->get('sid');
      
        if($sid){

            $iagsession = IagSession::where('ID', $sid)->first();
            $iagsession->update(['ActiveSession' => 0]);
            $iagsession ->save();

            $request->session()->flush();
        }
        // return redirect()->route('signali.restrict');
        return redirect('https://system.iag.bg');
        // abort('404');
    }
}
