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
                        <div class="table-responsive">
                            @if($users->count() > 0)
                            <table class="table table-striped">
                                <?php $sl=1 ?>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Subscribe</th>
                                </tr>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $sl }}</td>
                                        <td>{{ $user->firstName.' '.$user->lastName }}</td>
                                        <td>@if($user->userSubscription)
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
                                        </td>
                                    </tr>
                                    <?php $sl++ ?>
                                @endforeach
                            </table>
                            @else
                            <div class="well well-sm">No user set Yet</div>
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
