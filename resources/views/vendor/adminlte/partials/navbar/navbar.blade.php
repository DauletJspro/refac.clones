@php

    $url1 = URL('/');
    $ulr2 = '/';
    $user = Auth::user()->user_id;
    $helpers = \App\Http\Helpers::getTranslatedSlugRu(Auth::user()->login);
    $url = sprintf("$url1 $ulr2 $user $helpers ");
@endphp
<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet"
          type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css"/>
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet"
          type="text/css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<nav class="main-header navbar
    {{ config('adminlte.classes_topnav_nav', 'navbar-expand') }}
{{ config('adminlte.classes_topnav', 'navbar-white navbar-light') }}">

    {{-- Navbar left links --}}
    <ul class="navbar-nav">
        {{-- Left sidebar toggler link --}}
        @include('adminlte::partials.navbar.menu-item-left-sidebar-toggler')

        {{-- Configured left links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-left'), 'item')

        {{-- Custom left links --}}
        @yield('content_top_nav_left')
    </ul>

    {{-- Navbar right links --}}
    <ul class="navbar-nav ml-auto">
        {{-- Custom right links --}}
        @yield('content_top_nav_right')

        {{-- Configured right links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-right'), 'item')

        {{-- User menu link --}}
        @if(Auth::user())
            @if(config('adminlte.usermenu_enabled'))
                <header class="main-header">

                    <!-- Header Navbar -->
                    <nav class="navbar navbar-static-top" role="navigation">
                        <!-- Sidebar toggle button-->
                        <!-- Navbar Right Menu -->
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <li class="dropdown menu">
                                    <a href="#" class="dropdown " data-toggle="dropdown">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                                    </a>
                                        <ul class="dropdown-menu">
                                        <li>
                                                <div class="card" style="width: 180px;">
                                                    <div class="card-header pb-0 pt-0 text-center">
                                                        <p style="font-family: Arial; font-size: 90%; font-weight: bold">Пригласить друга</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row text-center" style="justify-content: space-between">
                                                        <a target="_blank"
                                                           href="https://api.whatsapp.com/send?text={{$url}}">
                                                            <i class="fa fa-whatsapp"
                                                               style="font-size: 25px;font-weight: bold; color: rgb(37, 211, 102)"></i>
                                                        </a>
                                                        <a target="_blank"
                                                           href="https://www.facebook.com/sharer.php?u={{$url}}}">
                                                            <i class="fa fa-facebook"
                                                               style="font-size: 25px;font-weight: bold; color: rgb(66, 103, 178)"></i>
                                                        </a>
                                                        <a target="_blank" href="http://vk.com/share.php?url={{$url}}">
                                                            <i class="fa fa-vk"
                                                               style="font-size: 25px;font-weight: bold; color: rgb(39, 135, 245)"></i>
                                                        </a>
                                                        <a target="_blank"
                                                           href="https://twitter.com/share?url={{$url}}">
                                                            <i class="fa fa-twitter"
                                                               style="font-size: 25px;font-weight: bold; color: rgb(29, 161, 242)"></i>
                                                        </a>
                                                        </div>
                                                    </div>
                                                </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>

                @include('adminlte::partials.navbar.menu-item-dropdown-user-menu')
            @else
                @include('adminlte::partials.navbar.menu-item-logout-link')
            @endif
        @endif

        {{-- Right sidebar toggler link --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.navbar.menu-item-right-sidebar-toggler')
        @endif
    </ul>

</nav>


<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.3.min.js") }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
