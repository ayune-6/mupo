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
			

        	{{-- Fonts --}}
        	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
			<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        	{{-- Laravelで用意されているstylesheetの読み込み --}}
        	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
        	{{-- このあと作成するbasic CSSの読み込み --}}
        	<link href="{{ asset('css/basic.css') }}" rel="stylesheet">
	</head>
	<body>
        
			<div class="container">
                <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #ffffff">
                    <a class="navbar-brand" href="{{ url('/') }}">mupo</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                            <button class="btn btn-outline-dark share" type="button"><a class="share-link" href="{{ url('/admin/post/upload') }}">SHARE</a></button>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-dark" type="submit">Search</button>
                        </form>
                    </div>
				</nav>
            </div>
            <main class="py-4">
                <div class="container">
                <form action="{{ action('Admin\ProfileController@create') }}" method="POST" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="col">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="e-profile">
                                            
                                            <div class="form-group row">
                                                <div class="col-12 col-sm-auto mb-3"> 
                                                    <div class="mx-auto" style="width: 140px;">
                                                        <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                            <input type="file" class="form-control-file" name="image">
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                
                                                    
                                                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ Auth::user()->name }}</h4>
                                                        <p class="mb-0">＠{{ Auth::user()->username }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="row">
                                                <div class="col mb-3">
                                                    <div class="form-group">
                                                        <label>bio</label>
                                                        <textarea class="form-control" rows="5" placeholder="My Bio" name="bio"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            {{ csrf_field() }}
                                            <input type="submit" class="btn btn-dark btn-lg save" value="Save">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </main>
        
    </body>
                