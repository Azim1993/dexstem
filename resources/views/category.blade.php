@extends('layouts.app')

@section('customCss')

@endsection

@section('content')
    <section id="content_area">
        <div class="container">
            <div class="row home_content">
                <div class="left_content col-sm-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">Search Results</div>
                        <div class="panel-body">
                            @if($result->count() > 0)
                                @foreach($result as $result)
                                    <div class="single_popular">
                                        <a href="{{ url('/single/'.encrypt($result->id)) }}" class="">
                                            <div class="col-xs-4 single_popular_img">
                                                <img src="{{ URL::asset('/thumbnail/'.$result->mediaThumbnail) }}" alt="img" class="img-responsive">
                                                <i class="icon icon-play-circle2"></i>
                                            </div>
                                            <div class="col-xs-8 single_popular_content">
                                                <h5>{{ $result->title }}</h5>
                                                <div class="thumb_user_choose">
                                                     <span style="margin-left: 5px;">views: {{ $result->views['view'] }}</span>
                                                </div>
                                                <div class="duration">{{ $result->created_at->toFormattedDateString() }}</div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="well well-sm">No Search Result</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 right_content ">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Populer
                        </div>
                        <div class="panel-body">
                            @if($popularVideos->count() > 0)
                                @foreach($popularVideos as $popular)
                                    <div class="single_popular">
                                        <a href="{{ url('/single/'.encrypt($popular->postId)) }}" class="">
                                            <div class="col-xs-6 single_popular_img">
                                                <img src="{{ URL::asset('/thumbnail/'.$popular->media['mediaThumbnail']) }}" alt="img" class="img-responsive">
                                                <i class="icon icon-play-circle2"></i>
                                            </div>
                                            <div class="col-xs-6 single_popular_content">
                                                <h5>{{ $popular->media['title'] }}</h5>
                                                <div class="duration">{{ $popular->media['created_at']->toFormattedDateString() }}</div>
                                                <div class="">
                                                    <span> Views {{ ($popular->view == null)? '0': $popular->view }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                No Popular Video
                            @endif
                        </div>

                    </div>
                </div><!-- /right content -->
            </div>

        </div>
    </section>

@endsection


@section('customJs')

@endsection
