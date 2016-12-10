<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dexstem') }}</title>

    <!-- Styles -->
    <link href="{{ URL::asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/fontello.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    @yield('customCss')
</head>
<body>

    <section id="header">
        <div class="header_top">
            <div class="container">
                <div class="col-sm-8 header_menu">
                    <ul class="nav nav-pills">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="">category</a>
                            <?php $categories = DB::table('category')->orderBy('id','asc')->get() ?>
                            @if($categories->count() > 0)
                            <ul class="child_menu nav">
                                @foreach($categories as $category)
                                    <li><a href="{{ url('/media/category/'.$category->id) }}">{{ $category->catTitle }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        <li><a href="">Policy</a></li>
                        <li><a href="">Tearms</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>    
                <div class="col-sm-4 login_menu">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->firstName }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        @if(Auth::user()->role == 1)
                                            <a href="{{ url('/admin/deshboard') }}">DeshBoard</a>
                                        @else
                                            <a href="{{ url('/user/deshboard') }}">DeshBoard</a>
                                        @endif
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>

                </div>
            </div>
        </div><!-- /header_top -->

        <div class="header">
            <div class="container">
                <div class="col-sm-4 logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('/images/logo.png') }}" alt="dexstem" class="img-responsive">
                    </a>
                </div>

                <div class="col-sm-8 search">
                    <form action="{{ '/search_results' }}" method="GET">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="video_search" value="{{ isset($search)? $search: '' }}">

                            <button class="btn btn-default" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /header -->

        
    </section>

  
    @yield('content')

    <section class="footer">
        <div class="container">
        <div class="row">
            <div class="col-sm-3 footer_div">
                <h4>Categories</h4>
                <?php $categories = DB::table('category')->orderBy('id','asc')->limit(3)->get() ?>
                @if($categories->count() > 0)
                    <ul class="nav">
                        @foreach($categories as $category)
                            <li><a href="{{ url('/media/category/'.$category->id) }}">{{ $category->catTitle }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-sm-3 footer_div">
                <h4>About</h4>
                <ul class="nav">
                    <li><a href="">Terms & Condition</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Policy</a></li>
                </ul>
            </div>
            <div class="col-sm-3 footer_div">
                <h4>Query</h4>
                <ul class="nav">
                    <h5>For Any Query </h5>
                    <h5>Email Us </h5>
                    <h5>dexstem@dexstem.com</h5>
                </ul>
            </div>
            <div class="col-sm-3 footer_div">
                <h4>Connect</h4>
                <ul class="nav">
                    <li><a href=""><i class="icon-facebook"></i>FaceBook</a></li>
                    <li><a href=""><i class="icon-twitter"></i>Twitter</a></li>
                    <li><a href=""><i class="icon-gplus"></i>GooglePlus</a></li>
                </ul>
            </div>
        </div>
            <div class="footer_credit text-center">&#9400; All Right Reserved BY dexstem.com</div>
        </div>
    </section>
    <!-- Scripts -->
    <script src="{{ URL::asset('/js/app.js') }}"></script>

    @yield('customJs')
</body>
</html>
