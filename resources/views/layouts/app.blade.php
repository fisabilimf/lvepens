<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LVEPENS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/all.min.js') }}" ></script>
    <script src="{{url('https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js')}}"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/vue@2.6.14')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

    {{-- Custom CSS --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light navbar-expand-md na shadow-sm sticky-top" style="background-color: #ffffff;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('Logo.png') }}" alt="<strong>LVE PENS</strong>" srcset="" style="height: 40px">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('/') }}">{{ __('Home') }}</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @if (Route::has('exhibitor.registration'))
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('exhibitor.registration') }}">{{ __('Exhibitor Register!') }}</a>
                                </li>
                                
                            @endif
                        @else
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link  dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if (Auth::user()->privilege == 'exhibitor')
                                        {{Auth::user()->exhibitor->ename}}
                                    @endif
                                    @if (Auth::user()->privilege == 'visitor')
                                        {{ Auth::user()->name }}
                                    @endif
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->privilege=='exhibitor')
                                        <a class="dropdown-item" href="{{ route('exhibitor.create') }}">
                                            {{ __('Exhibitor') }} 
                                        </a>
                                        <a class="dropdown-item" href="{{ route('exhibitions.myexhibitions') }}">
                                            {{ __('My Exhibitions') }} 
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('user.profile') }}">
                                            {{ __('Profile') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            {{ __('Favorites Exhibitions') }}
                                        </a>
                                    @endif
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                        
                    </ul>
                </div>
            </div>
        </nav>

        <main style="background-color: #f1f1f1;">
            @yield('content')
            <link rel="stylesheet" type="text/css" href="{{asset('css/trix.css')}}">
            <script type="text/javascript" src="{{asset('js/trix.js')}}"></script>
            @yield('cscript')
            <div class="py-5"></div>
            <div class="py-5"></div>
        </main>
        <div class="py-5"></div>
        <div class="pt-5 position-static ">
            <footer class=" text-center text-lg-start footer" style="background-color: #404040; color : #FFFFFF; bottom: 0; position: relative;">
                <!-- Grid container -->
                <div class="container p-4">
                    <!--Grid row-->
                    <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-4 col-md-10 mb-4 mb-md-0">
                        <a href="{{ url('/') }}"><img src="{{ asset('Footer.png') }}" alt="<strong>LVEPENS</strong>" srcset="" style="width: 80%"></a>
                    </div>
                    <!--Grid column-->
            
                    <!--Grid column-->
                    <div class="mr-auto col-lg-3 col-md-4 mb-2 mb-md-0">
                        
                    </div>
                    <!--Grid column-->
            
                    <!--Grid column-->
                    
                    <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </div>
                <!-- Grid container -->
            
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2022 Copyright
                    <a class="" href="/">&nbsp;<strong>LVEPENS</strong></a>
                </div>
                <!-- Copyright -->
            </footer>            
            

        </div>

    </div>

    <!-- Akhir Artikel -->
    <div>
        <!-- Footer -->

    </div>
    
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
</html>
