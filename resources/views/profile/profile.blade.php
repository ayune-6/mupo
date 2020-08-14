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
							<li class="nav-item"><a class="nav-link" href="{{ route('/profile', ['username'=>auth()->user()->username]) }}">Profile</a></li>
							<li class="nav-item right"><a class="nav-link" href="/logout">Logout</a></li>
							
							<button class="btn btn-outline-dark share" type="button"><a class="share-link" href="{{ url('/admin/post/upload') }}">SHARE</a></button>
		 				</ul>
		 				<form class="form-inline my-2 my-lg-0" action="{{ url('/search-result') }}" method="POST">
							<div class="form-group">
								<input class="form-control mr-sm-2" type="text" placeholder="Search" name="keyword">
								<button class="btn btn-dark" type="submit" >Search</button>
							</div>
							@csrf
						</form>
                 			</div>
				</nav>
            		</div>
                    {{-- ナビゲーションバー終わり --}} 
                    <main class="py-4">
                        <div class="container">
                            <div class="col">
                                <div class="row">
                                    <div class="col mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="e-profile">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-auto mb-3">
                                                            <div class="mx-auto" style="width: 140px; height: 140px;">
                                                            @if ($profile->profile_pic_id == null)
                                                                <img src="https://mupo1.s3-us-east-2.amazonaws.com/no-user-image.jpg" style="height: 140px; width: 140px;">
                                                            @else
                                                                <img src="{{ $profile->profile_pic_id }}" style="height: 140px; width: 140px;">
                                                            @endif
                                                                </div>    
                                                            </div>
                                                        </div>
                                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $profile->user->name }}</h4>
                                                                <p class="mb-0">＠{{ $profile->user->username }}</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label>bio</label>
                                                                <p>{{ ($profile->bio) }}</p>   
                                                        </div>
                                                        
                                                    </div>
                                                    @if($profile->user_id == Auth::id())
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <button class="btn btn-dark btn-lg edit" type="button"><a class="edit-link" href="{{ route('/profile/edit') }}">Edit</a></button>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                @foreach($posts as $post)
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="view overlay">

                                            
                                            <video
                                                id='sound-player-{{ $loop->count }}'
                                                class="cld-video-player cld-video-player-skin-light"
                                                data-cld-source='{ "publicId": "{{ $post->video_id }}" }'
                                                data-cld-transformation='{ "crop": "limit", "height": 200}'>
                                            </video>
                                            
                                            
                                                <div class="mask rgba-white-slight"></div>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="title">{{ str_limit($post->title, 100) }}</h4>
                                                <a class="username" href="{{ route('/profile', ['username'=>$post->user->username]) }}">＠{{ $post->user->username }}</a>
                                                <p class="description">{{ str_limit($post->description, 200) }}</p>

                                               
                                                

                   
                                                @if($profile->user_id == Auth::user()->id)
                                                    <button class="btn btn-dark btn-sm Delete ml-auto" type="button"><a class="delete-link" href="{{ route('admin/post/delete', ['id' => $post->id]) }}" method="GET">Delete</a></button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <script type="text/javascript"> 
                                    var cld = cloudinary.Cloudinary.new({ cloud_name: "dlzhqknj5" });
                                    var players = cld.videoPlayers('.cld-video-player', {
                                        controls: true,
                                    });
                                    
                                </script>
                            </div>
                        </div>
                    </main>
        
	</body>
</html>
