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
                        id='sound-player-{{ $loop->count }}'
                        controls
                        class="cld-video-player cld-video-player-skin-light">
                        data-cld-source='{ "publicId": "{{ $post->video_id }}" }'
                    </video>
                    
                       
                            <div class="mask rgba-white-slight"></div>
                    </div>
                    <div class="card-body">
                        <h4 class="title">{{ str_limit($post->title, 50) }}</h4>
                        <a class="username" href="{{ route('/profile', ['username'=>$post->user->username]) }}">＠{{ $post->user->username }}</a>
                        
                        {{-- <form action="{{ action('ProfileController@getuser') }}" method="post"> --}}
                            {{-- <input type="hidden" name="profile_data" value="{{ $post_by = $post->user->id }}"> --}}
                            {{-- <input type="submit" class="username" value="＠{{ $post->user->username }}" onclick="location.href='{{ route('/profile', ['username'=>$post->user->username]) }}'"> --}}

                            {{ csrf_field() }}
                        {{-- </form> --}}
                        <p class="description">{{ str_limit($post->description, 200) }}</p>

                        <button type="button" class="btn" id="like">LIKE</button>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                        
                        <script>
                            
                            document.getElementsByClass('btn').onclick = function(){
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
        <script type="text/javascript"> 
            var cld = cloudinary.Cloudinary.new({ cloud_name: "dlzhqknj5" });
            var players = cld.videoPlayers('.cld-video-player', {
                
                loop: true,
                controls: true,
                autoplayMode: 'on-scroll',
                floatingWhenNotVisible: 'left',
            });
            
        </script>

    </div>
</div>
@endsection


