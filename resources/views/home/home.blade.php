@extends('layouts.basic')

@section('title', 'HOME')
@section('content')
<div class="container">
    <div class="row">
    
        @foreach($posts as $post)
            <div class="col-4">
                <div class="card">
                    <div class="view overlay">

                    
                    <video
                        id='sound-player'
                        controls
                        class="cld-video-player cld-video-player-skin-light">
                    </video>
                    <script type="text/javascript"> 
                        var cld = cloudinary.Cloudinary.new({ cloud_name: "dlzhqknj5" });
                        var player = cld.videoPlayer('sound-player', {
                            
                            publicId: '{{ $post->video_id }}',
                            loop: true,
                            controls: true,
                            autoplayMode: 'on-scroll',
                            floatingWhenNotVisible: 'left',
                        });
                        
                    </script>
                       
                            <div class="mask rgba-white-slight"></div>
                    </div>
                    <div class="card-body">
                        <h4 class="title">{{ str_limit($post->title, 50) }}</h4>
                        <p class="username">＠{{ Auth::user()->username }}</p>
                        <p class="description">{{ str_limit($post->description, 200) }}</p>

                        <button type="button" class="btn" id="like">LIKE</button>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                        
                        <script>
                            
                            document.getElementById('like').onclick = function(){
                                console.log('liked');
                                $.ajax({
                                    method: 'POST',
                                    url: 'http://127.0.0.1:8000/like',
                                    data: {'user_id': $user->id},
                                    .done(function() {
                                        console.log('liked');
                                    })
                                });
                                
                            };

                        </script>   

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection


