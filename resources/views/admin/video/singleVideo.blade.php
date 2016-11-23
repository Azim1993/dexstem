@extends('layouts.app')

@section('customCss')

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
                        <h4 class="well well-sm">
                            <span class="pull-left">{{ $media->title }}</span>
                            <a href="{{ url('/admin/add-media') }}" class="pull-right btn btn-primary btn-xs">Add Media</a>
                        </h4>

                        <!-- video add -->

                        <div class="videos table-responsive">
                            <h4><strong>Description</strong></h4>
                            <div class="panel panel-default">
                                <div class="panel-body">{{ $media->description }}</div>
                            </div>
                        </div>
                        <div><strong>Category:</strong> {{ $media->categories['catTitle'] }}</div>
                        @if($media->video == null)
                            <a href="{{ url('/admin/video/'.$media->id.'/add-video') }}" class="btn btn-primary btn-sm">Add Video</a>
                        @else
                            hello
                        @endif
                    </div><!-- /admin content -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script type="text/javascript">
        $(function() {
            var postId = '<?php $postId =1 ?>';
            var view = $('');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                method: 'POST',
                data: postId,
                url: 'media_view_count/'+data,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    </script>
@endsection
