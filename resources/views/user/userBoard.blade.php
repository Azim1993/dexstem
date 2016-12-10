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
                        <!-- flash message -->
                        @include('errors.flash')
                        <div class="row">
                            <div class="col-sm-4 text-right">Name </div>
                            <div class="col-sm-8 text-left">{{ $user->firstName.' '.$user->lastName }}</div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-4 text-right">Email </div>
                            <div class="col-sm-8 text-left">{{ $user->email }}</div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-4 text-right">Subscribe Status </div>
                            <div class="col-sm-8 text-left">
                                @if($user->userSubscription)
                                    @if($user->subscribed('main'))
                                        @if($user->subscription('main')->cancelled())
                                            <span class="label label-danger">Canceled</span>
                                        @elseif($user->subscription('main'))
                                            <span class="label label-success">Active</span>
                                        @endif
                                    @endif
                                @else
                                    <span class="label label-info">Not Payment</span>
                                @endif
                            </div>
                        </div>
                    </div><!-- /admin content -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')

@endsection
