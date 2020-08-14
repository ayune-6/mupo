@extends('layouts.basic')

@section('title', 'HOME')
@section('content')
<div class="container">
    <div class="row"> 
    @csrf
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
                        <a class="username" href="{{ route('/profile', ['username'=>$post->user->username]) }}">＠{{ $post->user->username }}</a>
                              
                            
                        <p class="description">{{ str_limit($post->description, 200) }}</p>
                        
                        <button class="btn btn-outline-dark like-btn" data-toggle="button" data-likeid="{{ $post->id }}" aria-pressed="false" autocomplete="off" id="like-btn-{{ $loop->count }}"><i class="far fa-heart"></i></button>
                        
                        <p class="likedUsers" id="post_count_{{ $post->id }}" data-count="{{ $post->likes_count }}">{{ $post->likes_count }}likes</p>
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

        <script>
            $(".like-btn").on("click", function(){
                post_id = $(this).data("likeid");
                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
                        },
                        method: 'GET',
                        url: 'https://127.0.0.1:8000/like',
                        data: {'user_id': {{ Auth::user()->id }}, 'post_id': post_id }
                    })
                    .done(function() {
                        $("#post_count_" + post_id).html($("#post_count_" + post_id).data("count") + 1 + "likes");
                        // console.log('success');
                    })   
            });
            // let els = document.getElementsByClassName('like-btn');
            // [].forEach.call(els, (elm) => {
            //     console.log($(elm));
            //     $(elm).on("click", function(){
            //         console.log({{ $post->id }} );
                    
            //         $.ajax({
            //             headers: {
            //                 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            //             },
            //             method: 'GET',
            //             url: 'http://127.0.0.1:8000/like',
            //             data: {'user_id': {{ Auth::user()->id }}, 'post_id':{{ $post->id }} }
            //         })
            //         .done(function() {

            //             // console.log('success');
            //         })   
            //     });
            // });
        </script>
      
    </div>
</div>
@endsection


