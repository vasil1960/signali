

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    
    <a class="navbar-brand" href="{{ route('home') }}">
        <svg id="i-telephone" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <path d="M3 12 C3 5 10 5 16 5 22 5 29 5 29 12 29 20 22 11 22 11 L10 11 C10 11 3 20 3 12 Z M11 14 C11 14 6 19 6 28 L26 28 C26 19 21 14 21 14 L11 14 Z" />
            <circle cx="16" cy="21" r="4" />
        </svg>
    </a>
    
    {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button> --}}

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">

        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('home', ['sid'=>$sid]) }}">Начална страница<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('signali', ['sid'=>$sid]) }}">Сигнали</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('create', ['sid'=>$sid]) }}">Нов сигнал</a>
            </li>

            
        </ul>
        
        <ul class="navbar-nav ml-auto">

            <li class="nav-item" >
                <a class="nav-link" >Потребител: {{ Session::get('username') }} ( {{ Session::get('FullName') }} - {{ Session::get('Podelenie') }} )</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout', ['sid'=>$sid]) }}">Изход</a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
            </li> --}}

        </ul>

        {{-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> --}}

    </div>
</nav>
