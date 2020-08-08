@extends('layouts.basic')

@section('content')

<div class="container">
    <div class="row">
        @if(!empty($posts))
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card">
                        <div class="view overlay">

                        
                        <video
                            id='sound-player'
                            controls
                            class="cld-video-player cld-video-player-skin-light">
                            data-cld-source='{ "publicId": "{{ $post->video_id }}" }'
                        </video>
                        
                        
                                <div class="mask rgba-white-slight"></div>
                        </div>
                        <div class="card-body">
                            <h4 class="title">{{ str_limit($post->title, 100) }}</h4>
                            <a class="username" href="{{ route('/profile', ['username'=>$post->user->username]) }}">{{ $post->user->username }}</a>
                            
                            <p class="description">{{ str_limit($post->description) }}</p>
                            </div>
                    </div>
                </div>
            @endforeach
            <script type="text/javascript"> 
                var cld = cloudinary.Cloudinary.new({ cloud_name: "dlzhqknj5" });
                var players = cld.videoPlayers('.cld-video-player', {
                    
                    loop: true,
                    controls: true,
                    autoplayMode: 'on-scroll',
                    floatingWhenNotVisible: 'left',
                });
                
            </script>
        @else
        <h2>result not found.</h2>
        @endif

    </div>
</div>
@endsection
