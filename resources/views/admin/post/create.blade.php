@extends('layouts.basicwithoutshare')

@section('title', 'Share your sound!')

@section('content')
	<div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto text-center">
                        <h2>Share your sound!</h2>
                            <form action="{{ action('Admin\PostController@create') }}" method="post" enctype="multipart/form-data">

                                @if (count($errors) > 0)
                                    <ul>
                                        @foreach($errors->all() as $e)
                                            <li>{{ $e }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="form-group row">
                                    <label class="col-md-2">title</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">description</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="description" rows="10">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">file</label>
                                    <div class="col-md-10">
                                        <input type="file" class="form-control-file" name="video">
                                    </div>
                                </div>
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-dark post" value="post">
                            </form>
                    </div>
                </div>
            </div>
@endsection
