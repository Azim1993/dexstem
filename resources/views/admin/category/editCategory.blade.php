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
                        <h4 class="well well-sm">Categories</h4>

                        <!-- video add -->
                        <div class="video_add row">

                                <!-- categorys -->
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Add Category</div>
                                        <div class="panel-body">
                                            <form action="{{ url('/admin/category/'.$category->id.'/update') }}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="form-group {{ $errors->has('mediaCategory') ? ' has-error' : '' }}">
                                                    <input type="text" class="form-control" placeholder="Media Category" name="mediaCategory" value="{{ $category->catTitle }}" required>
                                                    @include('errors.formError',['inputName' => 'mediaCategory'])
                                                </div><!-- /title -->
                                                <button type="submit" class="btn btn-primary btn-xs btn-block">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- / Add categorys -->
                                <!-- Add categorys -->
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Add Category</div>
                                        <div class="panel-body">
                                            <form action="{{ url('/admin/create-category') }}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="form-group {{ $errors->has('mediaCategory') ? ' has-error' : '' }}">
                                                    <input type="text" class="form-control" placeholder="Media Category" name="mediaCategory" value="{{ old('mediaCategory') }}" required>
                                                    @include('errors.formError',['inputName' => 'mediaCategory'])
                                                </div><!-- /title -->
                                                <button type="submit" class="btn btn-primary btn-xs btn-block">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- / Add categorys -->
                        </div><!-- /video add -->

                    </div><!-- /admin content -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')

@endsection
