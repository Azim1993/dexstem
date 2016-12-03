@extends('layouts.app')

@section('customCss')
    <style>
        .title_top{
            border-left: 2px solid #303030;
            padding: 0px 15px;
            margin-bottom: 15px;
        }
        .description_text{
            padding: 5px 15px 15px;
        }
    </style>
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
                        @include('errors.flash')
                        <h4 class="well well-sm">
                            <span class="pull-left">{{ $media->title }}</span>
                            <a href="{{ url('/admin/add-media') }}" class="pull-right btn btn-primary btn-xs">Add Media</a>
                        </h4>
                        <div class="row">
                            <div class="col-sm-9">
                                <!-- video description -->
                                <div class="description">
                                    <div class="title_top"><strong>Description</strong></div>
                                    <p class="description_text">{{ $media->description }}</p>
                                </div>
                                <div class="title_top"><strong>Category:</strong> {{ $media->categories['catTitle'] }}</div>
                            </div>
                            <div class="col-sm-3">
                                <img src="{{ url('/thumbnail/'.$media->mediaThumbnail) }}" alt="poster" class="img-responsive img-thumbnail">
                            </div>
                        </div>
                        <div class="">
                            <a href="{{ url('/admin/media/'.$media->id.'/edit') }}" class="btn btn-primary btn-sm">Edit Media-infp</a>
                        </div>
                        <hr>
                        @if(!empty($media->video))
                            <div class="videos row">
                                <div class="col-sm-6">
                                    <div class="title_top"><strong>Demo Video</strong></div>
                                    @if($media->video['demoName'] == null)
                                        No Demo Video Upload Yet  <a href="{{ url('/admin/video/'.$media->id.'/add-video') }}" class="btn btn-xs btn-info"> -+- Demo</a>
                                    @else
                                        <video class="video-js" controls preload="auto" width="auto" height="180" poster="{{ url('/thumbnail/'.$media->mediaThumbnail) }}" data-setup="{}">
                                            <source src="{{ url('videos/'.$media->id.'/'.$media->video['demoName']) }}" type='video/mp4'>
                                            {{-- <source src="MY_VIDEO.webm" type='video/webm'> --}}
                                            <p class="vjs-no-js">
                                                To view this video please enable JavaScript, and consider upgrading to a web browser that
                                                <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                            </p>
                                        </video>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <div class="title_top"><strong>Premium Video</strong></div>
                                    @if($media->video['videoName'] == null)
                                        No Premium Video Upload Yet <a href="{{ url('/admin/video/'.$media->id.'/add-video') }}" class="btn btn-xs  btn-info"> -+- Premium</a>
                                    @else
                                        <video class="video-js" controls preload="auto" width="auto" height="180" poster="{{ url('/thumbnail/'.$media->mediaThumbnail) }}" data-setup="{}">
                                            <source src="{{ url('videos/'.$media->id.'/'.$media->video['videoName']) }}" type='video/mp4'>
                                            {{-- <source src="MY_VIDEO.webm" type='video/webm'> --}}
                                            <p class="vjs-no-js">
                                                To view this video please enable JavaScript, and consider upgrading to a web browser that
                                                <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                            </p>
                                        </video>
                                    @endif
                                </div>
                                <div class="col-xs-12"><hr>
                                    <a href="{{ url('/admin/video/'.$media->id.'/add-video') }}" class="btn btn-sm btn-primary">Edit Video</a>
                                </div>
                            </div>
                        @else
                        <div class="">
                            <a href="{{ url('/admin/video/'.$media->id.'/add-video') }}" class="btn btn-primary btn-sm">Add Video</a>
                        </div>
                        @endif
                        <hr>
                        <div class="">
                            <form action="{{ url('/admin/media/'.$media->id.'/delete') }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-sm btn-danger">Delete Media</button>
                            </form>
                        </div>
                    </div><!-- /admin content -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script src="{{ asset('/js/videojs.js')}}"></script>
@endsection
