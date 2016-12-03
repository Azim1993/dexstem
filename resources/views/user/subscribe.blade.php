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
                    @if(Auth::user()->subscribed('main'))
                        <div class="col-sm-6">
                            @if(Auth::user()->subscription('main')->cancelled())
                                <div class="well well-sm">You are
                                    <span class="label label-warning">Cancelled</span> subscription . Please Re-subscribe
                                </div>

                                <form action="{{ url('/user/resume_subscribe') }}" method="POST">
                                    {{ csrf_field() }}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="pk_test_TLTrAtcbufmQbw18DFM04RG2"
                                            data-amount="1000"
                                            data-name="Demo Site"
                                            data-description="Weekly Premium"
                                            data-image="{{ asset('/images/logo.png') }}"
                                            data-email="{{ Auth::user()->email }}"
                                            data-locale="auto">
                                    </script>
                                </form>
                            @else
                                <div class="well well-sm">You are now
                                    <span class="label label-danger">Active</span>
                                    <br> Please Upgrade Your subscription
                                </div>
                                <form action="{{ url('/user/upgrade_subscribe') }}" method="POST">
                                    {{ csrf_field() }}
                                    <label for="upgrade"> Upgrade Subscription</label>
                                    <div class="form-group">
                                        <select name="plans" class="form-control">
                                            <option value="weekly">Weekly</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="yearly">Yearly</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Upgrade Subscription</button>
                                    </div>
                                </form><hr>
                                <form action="{{ url('/user/cancel_subscribe') }}" method="POST">
                                    <label for="upgrade"> Cancel Subscription</label>
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <button class="btn btn-danger">Cancel Subscription</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    @else
                        <div class="col-sm-6">
                            <div class="wll well-sm">You do not payment Yet</div>
                            <form action="{{ url('/user/create_subscribe') }}" method="POST">
                                {{ csrf_field() }}
                                <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="pk_test_TLTrAtcbufmQbw18DFM04RG2"
                                    data-amount="1000"
                                    data-name="Demo Site"
                                    data-description="Weekly Premium"
                                    data-image="{{ asset('/images/logo.png') }}"
                                    data-email="{{ Auth::user()->email }}"
                                    data-locale="auto">
                                </script>
                            </form>
                        </div>
                    @endif
                    </div><!-- /admin content -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')

@endsection
