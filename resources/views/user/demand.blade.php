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
                            @if($demands->count() > 0)
                                <table class="table table-striped">
                                    <?php $sl=1 ?>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Demand By</th>
                                        <th>Demand</th>
                                        <th>Publish</th>
                                        <th>At</th>
                                        <th>Time</th>
                                    </tr>
                                    @foreach($demands as $demand)
                                        <tr>
                                            <td>{{ $sl }}</td>
                                            <td>{{ $demand->user['firstName'] .' '.$demand->user['lastName'] }}</td>
                                            <td>{{ $demand->demand }}</td>
                                            <td>
                                                @if($demand->publish == 0)
                                                    <form action="{{ url('admin/demand/'.$demand->id.'/publish/') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-xs btn-danger" type="submit">Mark Publish</button>
                                                    </form>
                                                @else
                                                    <span class="label label-success"> Published</span>
                                                @endif
                                            </td>
                                            <td>{{ $demand->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $demand->created_at->format('h:i A') }}</td>
                                        </tr>
                                        <?php $sl++ ?>
                                    @endforeach
                                </table>
                            @else
                                <div class="well well-sm">No demand set Yet</div>
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
