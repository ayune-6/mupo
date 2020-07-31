@extends('layouts.profile')

@section('title', 'Create your profile')

@section('content')

<div class="container">
<form action="{{ action('Admin\ProfileController@create') }}" method="POST">
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
                            </form>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection