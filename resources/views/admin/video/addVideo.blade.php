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
                <h4 class="well well-sm">Add New Media</h4>
                
                <!-- video add -->
                <div class="video_add">
                    @if (session('mediaError'))
                        <div class="alert alert-warning">
                            {{ session('mediaError') }}
                        </div>
                    @endif
                    <form action="{{ url('/admin/create-media') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('mediaTitle') ? ' has-error' : '' }}">
                            <label for="mediaTitle" class="col-sm-2 control-label">Media Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Media Title" name="mediaTitle" value="{{ old('mediaTitle') }}">
                                @include('errors.formError',['inputName' => 'mediaTitle'])
                            </div>
                        </div><!-- /title -->

                        <div class="form-group {{ $errors->has('mediaDiscription') ? ' has-error' : '' }}">
                            <label for="mediaDiscription" class="col-sm-2 control-label">Media Discription</label>
                            <div class="col-sm-10">
                                <textarea name="mediaDiscription" placeholder="Your Discription" class="form-control">{{ old('mediaDiscription') }}</textarea>
                                @include('errors.formError',['inputName' => 'mediaDiscription'])
                            </div>
                        </div><!-- /discription -->

                        <div class="form-group {{ $errors->has('mediaCategory') ? ' has-error' : '' }}">
                            <label for="mediaCategory" class="col-sm-2 control-label">Media Category</label>
                            <div class="col-sm-10">
                                <select name="mediaCategory" class="form-control" id="mediaCategory">

                                @if($categorys->count() > 0)
                                    @foreach($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->catTitle }}</option>
                                    @endforeach
                                @else
                                        <option>No Category set</option>
                                @endif

                                </select>
                                @include('errors.formError',['inputName' => 'mediaCategory'])
                            </div>
                        </div><!-- /Category -->

                        <div class="form-group {{ $errors->has('mediaThumbnail') ? ' has-error' : '' }}">
                            <label for="mediaThumbnail" class="col-sm-2 control-label">Media Discription</label>
                            <div class="col-sm-6">
                                <div class="mediaImage">
                                    <input type="file" name="mediaThumbnail" value="{{ old('mediaThumbnail') }} " accept=".jpeg, .jpg, .jpe, .jfif, .jif">
                                    <img src="" alt="" width="200" style="display:none;">
                                </div>
                            </div>
                            <div class="col-sm-4 fileName"></div>
                            @include('errors.formError',['inputName' => 'mediaThumbnail'])
                        </div><!-- /discription -->
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
                </div><!-- /video add -->

            </div><!-- /admin content -->
        </div>
    </div>
    </div>
</section>
@endsection

@section('customJs')
    <script>
        $(document).ready(function(){
            $('.mediaImage input').change( function(event) {
                var fileName = $(this).val().split('\\').pop();
                var tmppath = URL.createObjectURL(event.target.files[0]);
                $(".mediaImage img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
                $('.fileName').html(fileName);
            });
        });
    </script>
@endsection
