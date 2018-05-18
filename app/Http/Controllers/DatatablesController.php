<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\IagSession;

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

    public function anyData(Request $request){

        // $ap = Session::get('AccessPodelenia');

        // Iag potrebitel
        // if($ap == 1){
        //     $signali = Signal::select(['id','pod_id','glav_pod','name','phone','signaldate','opisanie']);  
        // }

        // // Drugi potrebiteli
        // $signali = Signal::where('glav_pod', $ap)->select(['id','pod_id','glav_pod','name','phone','signaldate','opisanie']);
         
        $columns = array(
			0 => 'id',
			1 => 'pod_id',
			2 => 'glav_pod',
            3 => 'name',
            4 => 'phone',
            5 => 'signaldate',
            6 => 'opisanie',
		);
        
		$totalData = Signal::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$posts = Signal::offset($start)
					->limit($limit)
					->orderBy($order,$dir)
					->get();
			$totalFiltered = Signal::count();
		}else{
            $search = $request->input('search.value');
            
			$posts = Signal::where('id', 'like', "%{$search}%")
                                    ->orWhere('pod_id','like',"%{$search}%")
                                    ->orWhere('glav_pod','like',"%{$search}%")
                                    ->orWhere('name','like',"%{$search}%")
                                    ->orWhere('phone','like',"%{$search}%")
                                    ->orWhere('signaldate','like',"%{$search}%")
                                    ->orWhere('opisanie','like',"%{$search}%")
                                    ->offset($start)
                                    ->limit($limit)
                                    ->orderBy($order, $dir)
                                    ->get();
                            
			$totalFiltered = Signal::where('id', 'like', "%{$search}%")
                                    ->orWhere('pod_id','like',"%{$search}%")
                                    ->orWhere('glav_pod','like',"%{$search}%")
                                    ->orWhere('name','like',"%{$search}%")
                                    ->orWhere('phone','like',"%{$search}%")
                                    ->orWhere('signaldate','like',"%{$search}%")
                                    ->orWhere('opisanie','like',"%{$search}%")
                                    ->count();
		}		
						
		$data = array();
		
		if($posts){
			foreach($posts as $r){
				$nestedData['id'] = '
                    <a href="signal/'.$r->id.'/?sid='.Session::get('sid').'" class="btn btn-outline-info btn-xs">'.$r->id .'</a>
				';
                $nestedData['pod_id'] = $r->podelenie->Pod_NameBg;
                $nestedData['glav_pod'] = $r->rdg->Pod_NameBg;
                $nestedData['name'] = $r->name;
                $nestedData['phone'] = $r->phone;
                $nestedData['signaldate'] = date('d.m.Y H:i:s',strtotime($r->signaldate));
                $nestedData['opisanie'] = $r->opisanie;
                $nestedData['action'] = '
                    <a href="signal/'.$r->id.'/?sid='.Session::get('sid').'" class="btn btn-outline-info btn-xs">Още..</a>
				';
				$data[] = $nestedData;
			}
		}
		
		$json_data = array(
			"draw"			  => intval($request->input('draw')),
			"recordsTotal"    => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"			  => $data
		);
		
		echo json_encode($json_data);
	}
}
