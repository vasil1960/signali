<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Datatables;

// use Datatables;

use App\Signal;

class DatatablesController extends Controller
{
    //
    public function getIndex(Request $request){

        $data = [
            'title' => 'Тел. 112 - Всички сигнали',
            'jumbotron_title' => 'Сигнали',
            'jumbotrontext'=> 'Всички сигнали получени чрез тел. 112',
            'sid' => $request->session()->get('sid')
        ];

        return view('signali.allsignals', $data);
    }

    public function anyData(Request $request){

        // $ap - AccessPodelenia
        // $ap = $request->session()->get('AccessPodelenia');

        // $signali = Signal::where('pod_id', $ap)->get();

        return Datatables::of(Signal::query())->make(true);

    }
}
