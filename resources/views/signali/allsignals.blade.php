@extends('signali.layouts.app')


@section('head')
  @parent
  <!-- Bootstrap core DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection

@section('content')
  <div class="container">
    <table class="table" id="signali">
      <thead class="thead">
        <tr>
          <th scope="col">№</th>
          <th scope="col">Поделение</th>
          <th scope="col">РДГ</th> 
          <th scope="col">Име</th>
          <th scope="col">Телефон</th>
          <th scope="col">Дата</th>
          <th scope="col">Описание</th>                 
          {{--  <th scope="col"></th>    --}}
        </tr>
      </thead>
      <tfoot class="thead">
        <tr>
          <th scope="col">№</th>
          <th scope="col">Поделение</th>
          <th scope="col">РДГ</th>
          <th scope="col">Име</th>
          <th scope="col">Телефон</th>
          <th scope="col">Дата</th>
          <th scope="col">Описание</th>                    
          {{--  <th scope="col"></th>  --}}
        </tr>
      </tfoot>
    </table>
  </div>
  
@endsection

@section('script')
  @parent
  <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    
  <script type="text/javascript" language="javascript" charset="utf8" class="init">

    $(document).ready(function() {
      $('#signali').DataTable( {
        "processing": true,
        "serverSide": true,
        "language":{
          "url":"https://cdn.datatables.net/plug-ins/1.10.16/i18n/Bulgarian.json",
        },
        "ajax": '{!! route('datatables.data') !!}',  
        "order": [[ 0, "desc" ]],
        //"scrollX" : "100%",
        //"scrollY" : 600,	
        "pageLength": 25,
        columns: [
                  { data: 'id', name: 'id' },
                  { data: 'signalfrom', name: 'signalfrom' },
                  { data: 'pod_id', name: 'pod_id' },
                  { data: 'glav_pod', name: 'glav_pod' },
                  { data: 'signaldate', name: 'signaldate' },
                  { data: 'name', name: 'name' },
                  { data: 'phone', name: 'phone' }
              ]
      } );

    } );
  </script>
@endsection