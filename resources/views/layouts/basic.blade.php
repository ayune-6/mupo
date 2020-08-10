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
			<link href="https://unpkg.com/cloudinary-video-player@1.4.1/dist/cld-video-player.min.css" rel="stylesheet">
			<script src="https://unpkg.com/cloudinary-core@2.10.3/cloudinary-core-shrinkwrap.min.js" type="text/javascript"></script>
			<script src="https://unpkg.com/cloudinary-video-player@1.4.1/dist/cld-video-player.min.js" type="text/javascript"></script>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        	{{-- Fonts --}}
        	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
			<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        	{{-- Laravelで用意されているstylesheetの読み込み --}}
        	<link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        	{{-- このあと作成するbasic CSSの読み込み --}}
			<link href="{{ secure_asset('css/basic.css') }}" rel="stylesheet">
			
			<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
	<body>
            		{{-- ナビゲーションバー --}}
				<div class="container">
					<nav class="navbar navbar-light navbar-expand-lg">
           	 			<a class="navbar-brand" href="{{ url('/') }}">mupo</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>			
								<li class="nav-item"><a class="nav-link" href="{{ route('/profile', ['username'=>auth()->user()->username]) }}">Profile</a></li>
								<li class="nav-item right"><a class="nav-link" href="/logout">Logout</a></li>
								<button class="btn btn-outline-dark share" type="button"><a class="share-link" href="{{ url('/admin/post/upload') }}">SHARE</a></button>
		 					</ul>
							<form class="form-inline my-2 my-lg-0" action="{{ url('/search-result') }}" method="POST">
								<div class="form-group">
									<input class="form-control mr-sm-2" type="text" placeholder="Search" name="keyword">
									<button class="btn btn-dark" type="submit" >Search</button>
								</div>
							{{ csrf_field() }}
							</form>
						</div>
					</nav>
				</div>
				{{-- ナビゲーションバー終わり --}} 
				<main class="py-4">
					@yield('content')
				</main>
	</body>
</html>
