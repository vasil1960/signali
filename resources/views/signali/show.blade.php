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
          <th scope="col"></th>  
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
          <th scope="col"></th>
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
        "ajax": "{{ asset('assets/scripts/server_processing.php') }}",  
        "order": [[ 0, "desc" ]],
        //"scrollX" : "100%",
        //"scrollY" : 600,	
        "pageLength": 25,
        "columnDefs": [
            {
              targets: 7,
              visible:true,
              sortable:false,
              render:function(data, type, row, meta)
              {
                return "<a class='btn btn-outline-info' href='signal/" + row[0] + "/?sid={{ Session::get('sid') }}'>Още...</a>";
              }
            }
        ]
      } );


      var table = $('#signali').DataTable();
      $('#signali tbody').on('click','tr', function(){
          var d = table.row(this).data();
          //d.counter++;
          console.log(d);
      });
    } );
  </script>
@endsection