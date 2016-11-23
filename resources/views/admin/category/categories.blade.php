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
                            <div class="message">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @elseif (session('warning'))
                                    <div class="alert alert-warning">
                                        {{ session('warning') }}
                                    </div>
                                @endif
                            </div>
                            <!-- categorys -->
                            <div class="col-sm-6">
                                <div class="table-responsive">
                                    @if($categories->count() > 0)
                                        <table class="table table-striped">
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php $sl = 1 ; ?>
                                            @foreach($categories as $category)
                                                <tr>
                                                    <td>{{ $sl }}</td>
                                                    <td>{{ $category->catTitle }}</td>
                                                    <td>
                                                        <a href="{{ url('/admin/category/'.$category->id.'/edit') }}" class="btn btn-primary btn-xs">Edit</a>
                                                        <a href="{{ url('/admin/category/'.$category->id.'/delete') }}" class="btn btn-danger btn-xs">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php $sl++ ?>
                                            @endforeach
                                        </table>
                                    @else
                                        <tr><td colspan="3">No Category found</td></tr>
                                    @endif
                                </div>
                            </div> <!-- / categorys -->
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
