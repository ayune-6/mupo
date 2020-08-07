<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                {{-- csrf Token --}}
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <title>@yield('title')</title>
                {{-- Javascript読み込み --}}
                <script src="{{ asset('js/app.js') }}" defer></script>
                
                {{-- Fonts --}}
                <link rel="dns-prefetch" href="https://fonts.gstatic.com">
                <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
                {{-- Laravelで用意されているstylesheetの読み込み --}}
                <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                {{-- このあと作成するbasic CSSの読み込み --}}
                <link href="{{ asset('css/basic.css') }}" rel="stylesheet">
        </head>
        <body>
                
                        {{-- ナビゲーションバー --}}
                        <div class="container">
                                <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #ffffff">
                                        <a class="navbar-brand" href="{{ url('/') }}">mupo</a>
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon"></span>
                                        </button>

                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                <ul class="navbar-nav mr-auto">
                                                        <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                                                        <li class="nav-item right"><a class="nav-link" href="{{ route('/profile', ['username'=>auth()->user()->username]) }}">Profile</a></li>
                                                </ul>
                                                
                                        </div>
                                </nav>
                        </div>
                        {{-- ナビゲーションバー終わり --}} 
                        <main class="py-4">
                                @yield('content')
                        </main>
                
        </body>
</html>

