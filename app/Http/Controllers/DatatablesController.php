<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\IagSession;

use Yajra\Datatables\Datatables;

use Session;

use App\Signal;

use DB;

class DatatablesController extends Controller
{
    //
    public function getIndex(Request $request){

        // dump(Session::all());

        $data = [
            'title' => 'Тел. 112 - Всички сигнали',
            'jumbotron_title' => 'Сигнали',
            'jumbotrontext'=> 'Всички сигнали получени чрез тел. 112',
            'sid' => $request->session()->get('sid')
            // 'ap' => $request->session()->get('AccessPodelenia')
        ];

        return view('signali.allsignals', $data);
    }
	// SELECT 
	// s.id,
	// s.name,
	// s.phone,
	// s.opisanie,
	// s.signaldate,
	// pod.Pod_NameBg DGS, 
	// rdg.Pod_NameBg RDG
	// FROM signali as s
	// INNER JOIN nug.podelenia as pod	ON pod.Pod_Id = s.pod_id
    // INNER JOIN nug.podelenia as rdg	ON rdg.Pod_Id = s.glav_pod
    

    public function anyData($ap = 110){

        // $iagsession = new IagSession();
        
        // $result = IagSession::where('ID', Session::get('sid'))->first();

        // dd($result->AccessPodelenia);
        // dd($result);
        // dd($result->AccessPodelenia);
        // $ap = $result->AccessPodelenia;

        $signali = Signal::where('pod_id', $ap)->select(['id','name','phone','opisanie','signaldate','pod_id','glav_pod']);

        // $signali = DB::table('signali as s')
        //     ->join('nug.podelenia as pod','pod.Pod_Id','=','s.pod_id')
        //     ->join('nug.podelenia as rdg','rdg.Pod_Id','=','s.glav_pod')
        //     ->select(['s.id as id','s.name as name','s.phone as phone','s.opisanie as opisanie','s.signaldate as signaldate','s.signalfrom as signalfrom','pod.Pod_NameBg as DGS','rdg.Pod_NameBg as RDG']);

        return Datatables::of($signali)
            // ->filterColumn('pod_id', function($query, $keyword = 104) {
            //     $query->where("pod_id =  ?", ["{$keyword}"]);
            // })
            ->make(true);

    }
}
