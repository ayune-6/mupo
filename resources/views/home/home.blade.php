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
                        
                            {{ csrf_field() }}
                        <p class="description">{{ str_limit($post->description, 200) }}</p>
                        {{-- @if(empty($liked)) --}}
                        <button class="btn btn-outline-dark like-btn" data-toggle="button" aria-pressed="false" autocomplete="off" id="like-btn-{{ $loop->count }}"><i class="far fa-heart"></i></button>
                        {{-- @else --}}
                        {{-- <button class="btn btn-outline-danger like-btn" data-toggle="button" aria-pressed="false" autocomplete="off" id="like-btn-{{ $loop->count }}"><i class="fas fa-heart"></i></button> --}}
                        {{-- @endif --}}
                        <a class="likedUsers" href="{{ route('/likes', ['postId' => $post->id]) }}">{{ $post->likes_count }}likes</a>
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

        <script>
            //$("#like-btn-1").on("click", () => {
            //    console.log("like");
            //})
            var els = document.getElementsByClassName("like-btn");
            Array.prototype.forEach.call(els, function(el) {
                console.log($(el));
                $(el).on("click", function(){
                    console.log('liked');
                    
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
                        },
                        method: 'GET',
                        url: 'http://127.0.0.1:8000/like',
                        data: {'user_id': {{ Auth::user()->id }}, 'post_id':{{ $post->id }} }
                    })
                    .done(function() {
                        console.log('success');
                    })   
                });
            });

        </script>   
    </div>
</div>
@endsection


