@extends('layouts.app')

@section('customCss')

@endsection

@section('content')
<section id="content_area">
    <div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>DeshBoard</strong>
        </div>
        <div class="panel-body">

            <!-- admin menu -->
            @include('admin.sideMenu')
            <!-- /admin menu -->

            <!-- admin content -->
            <div class="col-sm-10 admin_content">
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Current Viewers
                        </div>
                        <div class="panel-body">
                            <h1>{{ $totalView }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Total Video
                        </div>
                        <div class="panel-body">
                            <h1>{{ $totalVideo }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Subscriber's
                        </div>
                        <div class="panel-body">
                            <h1>{{ $totalUser }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <a href="{{ url('/admin/add-media') }}" class="btn btn-primary">Add New Media</a>
                </div>
             </div><!-- /admin content -->
        </div>
    </div>
    </div>
</section>
@endsection

@section('customJs')

@endsection
