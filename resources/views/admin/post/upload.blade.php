@extends('layouts.basicwithoutshare')

@section('title', 'Upload your video!')

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <div class="jumbotron">
                    <div class="container description mx-auto my-auto">
                        <h1 class="share-your-sound">Share your sound!</h1>
                        <h2 class="description">First, select your video to upload.</h2>
            
                            <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>   
                            <button id="upload_widget" class="cloudinary-button" onclick="myWidget.open()">Upload files</button>
                            <script type="text/javascript">
                            var myWidget = cloudinary.createUploadWidget({
                                cloudName: "dlzhqknj5", 
                                uploadPreset: "mupo_upload",
                                sources: [ 'local', 'camera', 'instagram', 'facebook'],
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
                                    console.log(result);
                                    if (!error && result && result.event === "success") { 
                                        console.log(`Your video is successfully uploaded.`); 
                                        var video_id = result.info.public_id ;
                                        console.log(video_id);
                                        var target = document.getElementById("next-step");
                                        target.href = "{{ url('/admin/post/create') }}" +"?video_id="+video_id;
                                    }
                                }
                            )
                            </script> 
                      
                    </div>
                </div>
                <button class="btn btn-dark btn-lg next" type="button"><a id="next-step" class="next-step" href="{{ url('/admin/post/create') }}">Next Step</a></button>
                
            </div>
        </div>
    </div>
@endsection
