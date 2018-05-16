<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\AddSignaliRequest;

use App\Signal;

use App\IagSession;

use Session;

class SignaliController extends Controller
{
 
    public function index(Request $request, IagSession $iagsession){
        
        // dump(Session::all());

        $data = [
            'title' => 'Тел. 112 - Начало',
            'jumbotron_title' => 'Начална страница',
            'jumbotrontext'=> '',
            'sid' => $request->session()->get('sid')
        ];

        // dd($request->sid);
        
        return view( 'signali.index', $data );
    } 


    public function show(Request $request){

        
        // $signali = Signal::orderBy('id', 'DESC')->paginate(25);
        
        $data = [
            'title' => 'Тел. 112 - Всички сигнали',
            'jumbotron_title' => 'Сигнали',
            'jumbotrontext'=> 'Всички сигнали получени чрез тел. 112',
            // 'signali' => $signali,
            'sid' => $request->session()->get('sid')
        ];
        
        return view( 'signali.show', $data );
    }

    public function show_one(Request $request, $id){

        $signal = Signal::whereId($id)->first();

        $data = [
            'title' => 'Сигнал №: '. $id,
            'jumbotron_title' => 'Сигнал №: '.$id,
            'signal' => $signal,
            'jumbotrontext'=> 'Подробно описание на конкретен сигнал №: '.$id,
            'sid' => $request->session()->get('sid')
        ];
        
        return view('signali.signal', $data);
    }

    public function create(Request $request){
        $data = [
            'title' => 'Тел. 112 - Нов сигнал',
            'jumbotron_title' => 'Нов сигнал',
            'jumbotrontext'=> 'Въвеждане на нов сигнал',
            'sid' => $request->session()->get('sid')
        ];
        
        return view( 'signali.create', $data );
    }


    public function store(AddSignaliRequest $request){

        if($request->isMethod('post')){
            
            /////////////
            
            dump($request->all());
        }

        $data = [
            'title' => 'Тел. 112 - Нов сигнал',
            'jumbotron_title' => 'Нов сигнал',
            'jumbotrontext'=> 'Въвеждане на нов сигнал',
            'sid' => $request->session()->get('sid')
        ];
        
        return view( 'signali.create', $data );
    }

     public function restrict(Request $request){

        $data = [
            'title' => 'Тел. 112 - Без права',
            'jumbotron_title' => 'Без права',
            'jumbotrontext'=> 'Нямате права за работа с модула',
            'sid' => $request->session()->get('sid')
        ];
        
        return view( 'signali.restrict', $data );
    }

}
