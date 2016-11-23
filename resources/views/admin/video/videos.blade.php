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
                            <span class="pull-left">Videos</span>
                            <a href="{{ url('/admin/add-media') }}" class="pull-right btn btn-primary btn-xs">Add Media</a>
                        </h4>

                        <!-- video add -->
                        <div class="video_add row">
                            @include('errors.flash')
                        </div><!-- /video add -->

                        <div class="videos table-responsive">
                            @if($media->count() > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                                <?php $sl = 1 ?>
                                @foreach($media as $singleMedia)
                                <tr>
                                    <td>{{ $sl }}</td>
                                    <td>{{ $singleMedia->title }}</td>
                                    <td>{{ $singleMedia->categories['catTitle'] }}</td>
                                    <td><a href="{{ url('/admin/media/'.$singleMedia->id) }}" class="btn btn-xs btn-primary">View</a>
                                        <a href="{{ url('/admin/video/'.$singleMedia->id.'/add-video') }}" class="btn btn-xs btn-danger">Add Video</a></td>
                                </tr>
                                    <?php $sl++ ?>
                                @endforeach
                            </table>
                            <nav aria-label="Page navigation">
                                {{ $media->links() }}
                            </nav>
                            @else
                                 No Videos are found
                            @endif
                        </div>
                    </div><!-- /admin content -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')

@endsection
