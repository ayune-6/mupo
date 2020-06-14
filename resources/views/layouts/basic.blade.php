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
        	<script src="{{ secure_asset('js/app.js') }}" defer></script>

        	{{-- Fonts --}}
        	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
        	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        	{{-- Laravelで用意されているstylesheetの読み込み --}}
        	<link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        	{{-- このあと作成するbasic CSSの読み込み --}}
        	<link href="{{ secure_asset('css/basic.css') }}" rel="stylesheet">
	</head>
	<body>
        	<div id="app">
            		{{-- ナビゲーションバー --}}
            		<nav class="navbar navbar-expand-lg navbar-dark">
				<div class="container">
           	 			<a class="navbar-brand" href="{{ url('/') }}">mupo</a>
                 			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 				<span class="navbar-toggler-icon"></span>
                 			</button>

                 			<div class="collapse navbar-collapse" id="navbarSupportedContent">
                 				<ul class="navbar-nav mr-auto">
		 					<li class="nav-item"><a class="nav-link" href="#">Home</a></li>
							<li class="nav-item"><a class="nav-link" href="#">Notification</a></li>
							<li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
		 				</ul>
		 				<form class="form-inline my-2 my-lg-0">
     							<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
     							<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
   		 				</form>
                 			</div>
				</div>
            		</nav>
            		{{-- ナビゲーションバー終わり --}} 
            		<main class="py-4">
                		@yield('content')
            		</main>
		</div>
	</body>
</html>
