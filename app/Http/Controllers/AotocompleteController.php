<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Podelenia;

class AotocompleteController extends Controller
{
    public function podelenie_autocomplete(Request $request)
    {
        $data = Podelenia::join('nug.podelenia AS rdg','nug.podelenia.Glav_Pod','=','rdg.Pod_Id')
                ->select('nug.podelenia.Pod_Id','nug.podelenia.Pod_NameBg AS podelenie','nug.podelenia.ID','rdg.Pod_NameBg AS RDG','rdg.Pod_Grad AS grad')
                ->where('nug.podelenia.Pod_NameBg','LIKE','%'. $request->term .'%')
                ->take(20)
                ->get();
        $results = [];
        foreach ($data as $key => $value) {
            $results[] = ['id'=>$value->ID,'Pod_Id'=>$value->Pod_Id, 'podelenie'=>$value->podelenie, 'rdg'=>$value->RDG, 'grad'=>$value->grad];
        }
        return response()->json($results);
    }
}
