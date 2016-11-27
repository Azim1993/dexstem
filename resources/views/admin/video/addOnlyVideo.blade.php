@extends('layouts.app')

@section('customCss')
    <link href="{{ URL::asset('/css/videojs.css')}}" rel="stylesheet">

    <!-- If you'd like to support IE8 -->
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

@endsection

@section('content')
    <section id="content_area">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>DeshBoard</strong>/Video/Add
                </div>
                <div class="panel-body">

                    <!-- admin menu -->
                    @include('admin.sideMenu')
                            <!-- /admin menu -->

                    <!-- admin content -->
                    <div class="col-sm-10 admin_content">
                        <h4 class="well well-sm">Add Video For {{ $media }}</h4>

                        <!-- video add -->
                        <div class="video_add">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('warning'))
                                <div class="alert alert-warning">
                                    {{ session('warning') }}
                                </div>
                            @endif

                            <!-- demo -->
                            <div class="panel panel-default">
                                <div class="panel-heading">Add Demo Video</div>
                                <div class="panel-body">
                                    <!--video upload area-->
                                    <div class="col-sm-6 video_upload_area">
                                    <form action="{{ url('/admin/video/'.$id.'/store-demo-video') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group {{ $errors->has('demoVideo') ? ' has-error' : '' }}">
                                            <input type="file" class="form-control video_upload" name="demoVideo"  value="{{ old('demoVideo') }}"  accept=".mp4,.avi,.wmv,.3gp,.mov,.ogg,.qt,.mkv">
                                            @include('errors.formError',['inputName' => 'demoVideo'])
                                        </div><!-- /discription -->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-xs btn-block">Submit</button>
                                        </div>
                                    </form>
                                    </div><!--/ video upload area-->
                                    <!--uploaded video play area-->
                                    <div class="col-sm-6 uploaded_play_area">
                                        @if($video == null)
                                            No Video Upload Yet
                                        @else
                                        @if($video->demoName == null)
                                            No Video Upload Yet
                                        @else
                                            <video class="video-js" controls preload="auto" width="auto" height="180" poster="{{ url('/thumbnail/'.$video->media['mediaThumbnail']) }}" data-setup="{}">
                                                <source src="{{ url('videos/'.$id.'/'.$video->demoName) }}" type='video/mp4'>
                                                {{-- <source src="MY_VIDEO.webm" type='video/webm'> --}}
                                                <p class="vjs-no-js">
                                                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                                                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                                </p>
                                            </video>
                                        @endif
                                        @endif
                                    </div><!--/uploaded video play area-->
                                </div>
                            </div> <!-- /demo -->

                            <!-- /premium -->
                            <div class="panel panel-default">
                                <div class="panel-heading">Add Premium Video</div>
                                <div class="panel-body">
                                    <!--video upload area-->
                                    <div class="col-sm-6 video_upload_area">
                                    <form action="{{ url('/admin/video/'.$id.'/store-premium-video') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group {{ $errors->has('premiumVideo') ? ' has-error' : '' }}">
                                            <input type="file" class="form-control video_upload" name="premiumVideo"  value="{{ old('demoVideo') }}"  accept=".mp4,.avi,.wmv,.3gp,.mov,.ogg,.qt,.mkv">
                                            @include('errors.formError',['inputName' => 'premiumVideo'])
                                        </div><!-- /discription -->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-xs btn-block">Submit</button>
                                        </div>
                                    </form>
                                    </div><!--/ video upload area-->
                                    <!--uploaded video play area-->
                                    <div class="col-sm-6 uploaded_play_area">
                                        @if($video == null)
                                            No Video Upload Yet
                                        @else
                                        @if($video->videoName == null)
                                            No Video Upload Yet
                                        @else
                                            <video class="video-js" controls preload="auto" width="auto" height="180" poster="{{ url('/thumbnail/'.$video->media['mediaThumbnail']) }}" data-setup="{}">
                                                <source src="{{ url('videos/'.$id.'/'.$video->videoName) }}" type='video/mp4'>
                                                {{-- <source src="MY_VIDEO.webm" type='video/webm'> --}}
                                                <p class="vjs-no-js">
                                                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                                                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                                </p>
                                            </video>
                                        @endif
                                        @endif
                                    </div><!--/uploaded video play area-->
                                </div>
                            </div> <!-- /premium -->

                        </div><!-- /video add -->

                    </div><!-- /admin content -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')

    <script src="{{ asset('/js/videojs.js')}}"></script>
    <script src="http://cdn.sc.gl/videojs-hotkeys/latest/videojs.hotkeys.min.js"></script>
    <script>
//        videojs('demo-video').ready(function() {
//            this.hotkeys({
//                volumeStep: 0.1,
//                seekStep: 5
//            });
//        });
//        videojs('premium-video').ready(function() {
//            this.hotkeys({
//                volumeStep: 0.1,
//                seekStep: 5
//            });
//        });
    </script>

@endsection
