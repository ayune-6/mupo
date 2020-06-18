

<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                {{-- csrf Token --}}
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <title>Welcome to mupo</title>
                {{-- Javascript読み込み --}}
                <script src="{{ asset('js/app.js') }}" defer></script>

                {{-- Fonts --}}
                <link rel="dns-prefetch" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
                {{-- Laravelで用意されているstylesheetの読み込み --}}
                <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                {{-- このあと作成するwelcome CSSの読み込み --}}
                <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        </head>
        <body>
		<div id="app">
    			<div class="container">
        			<nav class="navbar navbar-light navbar-expand-lg" style="background-color: #fff">
            				<a class="navbar-brand" href="{{ url('/') }}">mupo</a>
                				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    					<span class="navbar-toggler-icon"></span>
                				</button>

                				<div class="collapse navbar-collapse" id="navbarSupportedContent">
                    					<ul class="navbar-nav mr-auto">
                        					<li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                        					<li class="nav-item"><a class="nav-link" href="{{ url('/notifications') }}">Notifications</a></li>
                        					<li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
                    					</ul>
                    					<form class="form-inline my-2 my-lg-0">
                        					<input class="form-control mr-sm-2" type="search" placeholder="Search with #" aria-label="Search">
                        					<button class="btn btn-dark" type="submit">Search</button>
                    					</form>
                				</div>
        			</nav>
    			</div>
    			<main>
        			<div class="jumbotron">
            				<div class="container description mx-auto my-auto">
                        			<h1 class="brand text-center">mupo</h1>
                        			<h2 class="title text-center">share your music with the world</h2>
                        			<h5 class="sub-title text-center">sing, play and share</h5>
                        			<button type="button" class="btn btn-dark btn-lg btn-block create-an-account mx-auto"><a class="get-started" href="{{ url('/register') }}">Get started</a></button>
                        			<p class="login text-center"><a href="{{ url('/login') }}" class="login">or already have an account? Click here to log in!</a></p>
            				</div>
        			</div>
    			</main>
		</div>
        </body>
</html>

