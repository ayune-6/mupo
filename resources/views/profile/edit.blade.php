@extends('layouts.profile')

@section('content')

<div class="container">
<form action="{{ action('Admin\ProfileController@update') }}" method="POST" enctype="multipart/form-data">
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
                                    <div class="mx-auto" style="width: 140px; height: 140px;">
                                        @if ($profile_form->profile_pic_id)
                                            <img src="{{ $profile_form->profile_pic_id }}" style="height: 140px; width: 140px;">
                                        @else
                                            <img src="/storage/profile/noimage.png" style="height: 140px; width: 140px;">
                                        @endif     
                                    </div>
                                        <input type="file" class="form-control-file" name="image">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="remove" value="true">Delete the profile picture
                                        </label>
                                    </div>
                                </div>
                            
                                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ Auth::user()->name }}</h4>
                                        <textarea class="form-control" rows="1" placeholder="Name" name="name" value="{{ $profile_form->name }}">{{ Auth::user()->name }}</textarea>
                                        <p class="mb-0">＠{{ Auth::user()->username }}</p>
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col mb-3">
                                        <div class="form-group">
                                            <label>bio</label>
                                            <textarea class="form-control" rows="5" placeholder="My Bio" name="bio" value="{{ $profile_form->bio }}">{{ $profile_form->bio }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-dark btn-lg save" value="Save">
                                
                                <button type="button" class="btn btn-dl" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Delete an account</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Are you sure you want to delete your account permanently?</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-dark"><a class="account-delete-link" href="{{ route('/delete', ['id' =>auth()->user()->id])  }}">Yes</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                             {{-- <a class="delete-link" href="{{ route('/delete', ['id' =>auth()->user()->id])  }}">Delete an account</a> --}}
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection