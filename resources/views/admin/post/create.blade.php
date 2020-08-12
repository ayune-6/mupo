@extends('layouts.basicwithoutshare')

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h2 class="create-title">Put information for your video.</h2>
                <form action="{{ action('Admin\PostController@create') }}" method="POST" enctype="multipart/form-data">

                        @if (count($errors) > 0)
                            <ul>
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="form-group row">
                            <label class="col-md-2" for="title">title</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="description">description</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="description" rows="10">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <input type="hidden" name="video_id" value="{{ $video_id }}">
                        @csrf
                        <input type="submit" class="btn btn-dark btn-lg post" value="Post">    
                        
                    </form>
            </div>
        </div>
    </div>
@endsection
