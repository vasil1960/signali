<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddSignaliRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'signalfrom'     => 'required',
            'signaldate'     => 'required|date',
            // 'name'           => 'required',
            'identnumber'    => 'required',
            'pod_id'         => 'required',
            'phone'          => 'required',
            'opisanie'       => 'required|string',  
            'narushenia'     => 'required',  
            'send_to'        => 'required',  
            'deistvie'       => 'required|string',
            'deistvie_date'  => 'required|date',  
            'deistvie'       => 'required',  
            'deistvie'       => 'required',    
        ];
    }

    public function messages()
    {
        return [
            'signalfrom.required'     => "Попълването на полето 'Постъпил от:' е задължително",
            'signaldate.required'     => "Попълването на полето 'Дата на сигнала:' е задължително",
            // 'name.required'           => "Попълването на полето 'Подател:' е задължително",
            'identnumber.required'    => "Попълването на полето 'Идент. №:' е задължително",
            'pod_id.required'         => "Попълването на полето 'Местоположение:' е задължително",
            'phone.required'          => "Попълването на полето 'Телефон:' е задължително",
            'opisanie.required'       => "Попълването на полето 'Описание:' е задължително",  
            'narushenia.required'     => "Попълването на полето 'Вид нарушение:' е задължително",  
            'send_to.required'        => "Попълването на полето 'Предадено на:' е задължително",  
            'deistvie.required'       => "Попълването на полето 'Предприети действия:' е задължително",
            'deistvie_date.required'  => "Попълването на полето 'Дата на действието:' е задължително",       
        ];
    }
}
