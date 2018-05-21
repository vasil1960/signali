<?php

namespace App\Http\Controllers;

use App\Traits\WriteLogos;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\AddSignaliRequest;

use App\Signal;

use App\IagSession;

use Session;

use App\Logos;

use App\Podelenia;


class SignaliController extends Controller
{   
    use WriteLogos;


    public function  __construct(){
        $this->sid = Session::get('sid');
        $this->userId = Session::get('userId');
    }

    public function index(Request $request){

        // dump($request->session()->all());

        $data = [
            'title' => 'Тел. 112 - Начало',
            'jumbotron_title' => 'Начална страница',
            'jumbotrontext'=> '',
            'sid' => $this->sid
        ];

        $this->write_log($request, 'Отваряне на начална страница');

        return view( 'signali.index', $data );
    } 


    public function show(Request $request){
        
        $data = [
            'title' => 'Тел. 112 - Всички сигнали',
            'jumbotron_title' => 'Сигнали',
            'jumbotrontext'=> 'Всички сигнали получени чрез тел. 112',
            'sid' => $this->sid
        ];
        
        $this->write_log($request, 'Отваряне на всички сигнали');

        return view( 'signali.show', $data );
    }


    public function show_one(Request $request, $id){

        $signal = Signal::whereId($id)->first();

        $data = [
            'title' => 'Сигнал №: '. $id,
            'jumbotron_title' => 'Сигнал №: '.$id,
            'signal' => $signal,
            'jumbotrontext'=> 'Подробно описание на конкретен сигнал №: '.$id,
            'sid' => $this->sid
        ];
        
        $this->write_log($request, 'Разглеждане на сигнал №:'.$id);

        return view('signali.signal', $data);
    }

    public function create(Request $request){
        $data = [
            'title' => 'Тел. 112 - Нов сигнал',
            'jumbotron_title' => 'Нов сигнал',
            'jumbotrontext'=> 'Въвеждане на нов сигнал',
            'sid' => $this->sid
        ];

        $this->write_log($request, 'Отваряне на форма за добавяне на нов сигнал');
        
        return view( 'signali.create', $data );
    }


    public function store(AddSignaliRequest $request){

        $podelenia  = Podelenia::where('Pod_Id', $request->pod_id)->first();

        if($request->isMethod('post')){
            
            $signal = new Signal;
          
            $signal->signalfrom    = $request->signalfrom;
            $signal->signaldate    = $request->signaldate;
            $signal->identnumber   = $request->identnumber;
            $signal->pod_id        = $request->pod_id;
            $signal->glav_pod      = $podelenia->Glav_Pod;
            $signal->name          = $request->name;   
            $signal->phone         = $request->phone;
            $signal->narushenia    = $request->narushenia;
            $signal->adress        = $request->adress;
            $signal->opisanie      = $request->opisanie;
            $signal->send_to       = $request->send_to;
            $signal->send_to_extra = $request->send_to_extra;
            $signal->deistvie      = $request->deistvie;
            $signal->deistvie_date = $request->deistvie_date;
            $signal->notes         = $request->notes;
            $signal->policia       = $request->policia;
            $signal->InsertUserID  = $this->userId;
            $signal->InsertDate    = date('Y m d H:i:s');
            
            $signal->save();

            $insertedId = $signal->id;
            
            $this->write_log($request, 'Записване на нов сигнал №: ' . $insertedId. ' в базата с данни');

        }

        $data = [
            'title' => 'Тел. 112 - Нов сигнал',
            'jumbotron_title' => 'Нов сигнал',
            'jumbotrontext'=> 'Въвеждане на нов сигнал',
            'sid' => $this->sid
        ];
        
       

        return view( 'signali.create', $data );

        // return view( 'signali.create');
    }

    public function restrict(Request $request){

        $data = [
            'title' => 'Тел. 112 - Без права',
            'jumbotron_title' => 'Без права',
            'jumbotrontext'=> 'Нямате права за работа с модула',
            'sid' => $this->sid
        ];
        
        return view( 'signali.restrict', $data );
    }


}
