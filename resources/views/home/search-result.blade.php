@extends('layouts.basic')

@section('content')

<div class="container">
{{ csrf_field() }}
    <div class="row">
        
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card">
                        <div class="view overlay">

                        
                        <video
                            id='sound-player-{{ $loop->count }}'
                            class="cld-video-player cld-video-player-skin-light"
                            data-cld-source='{ "publicId": "{{ $post->video_id }}" }'
                            data-cld-transformation='{ "crop": "limit", "height": 200, "width":300}'>
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
                    controls: true,
                });
                
            </script>

    </div>
</div>
@endsection
