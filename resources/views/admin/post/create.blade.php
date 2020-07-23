@extends('layouts.basicwithoutshare')

@section('title', 'Share your sound!')

@section('content')
	<div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto text-center">
                        <h2>Share your sound!</h2>
                            <form action="{{ action('Admin\PostController@create') }}" method="POST/:resource_type/upload" enctype="multipart/form-data">

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
                                <div class="form-group row ">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-dark post" value="post" name="post">
                                    
                                    <button id="upload_widget" class="cloudinary-button">Upload files</button>
                                    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>  
                                    <script type="text/javascript">  
                                    var myWidget = cloudinary.openUploadWidget({
                                        cloudName: "dlzhqknj5", 
                                        uploadPreset: "mupo_upload",
                                        sources: [ 'local', 'camera', 'instagram', 'facebook'],
                                        preBatch: (cb, data) => {
                                            document.getElementsByName("post").onclick = function() {
                                                console.log(data);
                                                cb();
                                            };
                                        },
                                        styles:{
                                            palette: {
                                                window: "#FFF",
                                                windowBorder: "#000",
                                                tabIcon: "#000",
                                                menuIcons: "#000",
                                                textDark: "#000000",
                                                textLight: "#FFFFFF",
                                                link:  "#FFFFFF",
                                                action:  "#000000",
                                                inactiveTabIcon: "#000000",
                                                error: "#FF0000",
                                                inProgress: "#000000",
                                                complete: "#00a5dd",
                                                sourceBg: "#000000"
                                            },
                                        },
                                        }, (error, result) => { 
                                            if (!error && result && result.event === "success") { 
                                                console.log('Your video is successfully uploaded.'); 
                                            }
                                        }
                                    )
                                    </script>  
                            
                                </div>
                                
                                
                            </form>
                    </div>
                </div>
            </div>
@endsection
