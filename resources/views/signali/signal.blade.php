@extends('signali.layouts.app')

@section('head')
  @parent
@endsection
 

@section('content')

  <div class="container">
    
    <div class="card" style="width: 100%; margin-bottom: 0.5em;">
      <div class="card-body">
        <h5 class="card-title">Територия на нарушението:</h5>
        <p class="card-text">Сигналът е подаден за {{ $signal->podelenie->Pod_NameBg }} ({{ $signal->rdg->Pod_NameBg }})</p>
      </div>
    </div>

    <div class="card" style="width: 100%; margin-bottom: 0.5em;">
      <div class="card-body">
        <h5 class="card-title">Описание на сигнала:</h5>
        <p class="card-text">{{ $signal->opisanie }}</p>
      </div>
    </div>
    
    <div class="card" style="width: 100%; margin-bottom: 0.5em;">
      <div class="card-body">
        <h5 class="card-title">Дата и час на регистрация:</h5>
        <p class="card-text">{{ date('d.m.Y год. в H:i:s часа',strtotime($signal->signaldate)) }}</p>
      </div>
    </div>
    
    <div class="card" style="width: 100%; margin-bottom: 0.5em;">
      <div class="card-body">
        <h5 class="card-title">Сигналът е изпратен от:</h5>
        <p class="card-text">{{ isset($signal->name) ? $signal->name : 'Анонимен' }} (тел. {{ $signal->phone }}) </p>
      </div>
    </div>

    <div class="card" style="width:100%; margin-bottom: 0.5em;">    
      <div class="card-body">
        <h5 class="card-title">Предприети действия от регистратора:</h5>
        <p class="card-text">Предадено на: {{ $signal->deistvie }}</p>
      </div>
    </div>

  </div>

@endsection