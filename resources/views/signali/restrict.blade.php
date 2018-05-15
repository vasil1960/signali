<!doctype html>
<html lang="en">



  <head>
    @section('head')
    
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      
      {{-- <link rel="icon" href="../../../../favicon.ico"> --}}
      <title>{{ $title }}</title>

      <!-- Bootstrap core CSS -->
      <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="{{ asset('assets/dist/css/jumbotron.css') }}" rel="stylesheet">

    @show
  </head>



  <body>

    @section("nav")
        @include("signali.layouts.inc.nav");
    @show

    <main role="main"   style="background-color: beige;" >

      @section('jumbotron')
        @include('signali.layouts.inc.jumbotron')
      @show 

        <div class="container" style="padding: 10px">

          @yield('content')

        </div> <!-- /container -->

     

    </main>

    @section('footer')
      <hr>
      <footer class="container" style="text-align: center">
        <p>&copy; Company 2010-{{ date('Y') }}</p>
      </footer>

    @show  

    @section('script')  

      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
      <script>window.jQuery || document.write('<script src="{{ asset('assets/dist/js/vendor/jquery-slim.min.js') }}"><\/script>')</script> 
      <script src="{{ asset('assets/dist/js/vendor/popper.min.js') }}"></script>
      <script src="{{ asset('assets/dist/js/bootstrap.min.js') }}"></script>

    @show      

  </body>
</html>
