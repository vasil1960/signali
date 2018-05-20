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


class SignaliController extends Controller
{   
    use WriteLogos;


    public function index(Request $request, IagSession $iagsession){

        // dump($request->session()->all());

        $data = [
            'title' => 'Тел. 112 - Начало',
            'jumbotron_title' => 'Начална страница',
            'jumbotrontext'=> '',
            'sid' => $request->session()->get('sid')
        ];

        $this->write_log($request, 'Отваряне на начална страница');

        return view( 'signali.index', $data );
    } 


    public function show(Request $request){
        
        $data = [
            'title' => 'Тел. 112 - Всички сигнали',
            'jumbotron_title' => 'Сигнали',
            'jumbotrontext'=> 'Всички сигнали получени чрез тел. 112',
            'sid' => $request->session()->get('sid'),
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
            'sid' => $request->session()->get('sid'),
        ];
        
        $this->write_log($request, 'Разглеждане на сигнал №:'.$id);

        return view('signali.signal', $data);
    }

    public function create(Request $request){
        $data = [
            'title' => 'Тел. 112 - Нов сигнал',
            'jumbotron_title' => 'Нов сигнал',
            'jumbotrontext'=> 'Въвеждане на нов сигнал',
            'sid' => $request->session()->get('sid'),
        ];

        $this->write_log($request, 'Отваряне на форма за добавяне на нов сигнал');
        
        return view( 'signali.create', $data );
    }


    public function store(AddSignaliRequest $request){

        if($request->isMethod('post')){
            
            /////////////
            
            dump($request->all());

            $this->write_log($request, 'Записване на нов сигнал в базата с данни');
        }

        $data = [
            'title' => 'Тел. 112 - Нов сигнал',
            'jumbotron_title' => 'Нов сигнал',
            'jumbotrontext'=> 'Въвеждане на нов сигнал',
            'sid' => $request->session()->get('sid'),
        ];
        
        return view( 'signali.create', $data );
    }

    public function restrict(Request $request){

        $data = [
            'title' => 'Тел. 112 - Без права',
            'jumbotron_title' => 'Без права',
            'jumbotrontext'=> 'Нямате права за работа с модула',
            'sid' => $request->session()->get('sid'),
        ];
        
        return view( 'signali.restrict', $data );
    }


}
