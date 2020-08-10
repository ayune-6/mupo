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
			<link href="https://unpkg.com/cloudinary-video-player@1.4.1/dist/cld-video-player.min.css" rel="stylesheet">
			<script src="https://unpkg.com/cloudinary-core@2.10.3/cloudinary-core-shrinkwrap.min.js" type="text/javascript"></script>
			<script src="https://unpkg.com/cloudinary-video-player@1.4.1/dist/cld-video-player.min.js" type="text/javascript"></script>
			

        	{{-- Fonts --}}
        	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
			<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        	{{-- Laravelで用意されているstylesheetの読み込み --}}
        	<link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        	{{-- このあと作成するbasic CSSの読み込み --}}
        	<link href="{{ secure_asset('css/basic.css') }}" rel="stylesheet">
	</head>
	<body>
        	
            		{{-- ナビゲーションバー --}}
			    <div class="container">
                    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #ffffff">
                    <a class="navbar-brand" href="{{ url('/') }}">mupo</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
				    </nav>
                </div>
                {{-- ナビゲーションバー終わり --}} 
                <main class="py-4">
                    @yield('content')
                </main>
		
	</body>
</html>
