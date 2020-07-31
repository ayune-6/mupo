@extends('layouts.profile')
@section('title', 'Your Profile')

@section('content')
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
                                    @if ($profile->profile_pic_id)
                                        <img src="{{ asset('storage/image/' . $profile->profile_pic_id) }}">
                                    @else
                                        <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                            <input type="file" class="form-control-file" name="image">    
                                        </div>
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
                                    <button class="btn btn-dark btn-lg edit" type="button"><a class="edit-link" href="{{ route('/profile/edit', ['username' => auth()->user()->username]) }}">Edit</a></button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection