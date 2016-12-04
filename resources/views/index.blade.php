@extends('layouts.app')

@section('customCss')
    <link href="{{ URL::asset('/css/lightslider.css')}}" rel="stylesheet">

@endsection

@section('content')
<section id="content_area">
    <div class="container">
        <div class="slider">
            @if($slideMedias->count() > 0)
                <ul id="lightSlider">
                    @foreach($slideMedias as $slide)
                        <li>
                            <a href="{{ url('/single/'.encrypt($slide->id))}}">
                            <div class="panel panel-default single_slide">
                                <div class="panel-body">
                                    <img src="{{ URL::asset('/thumbnail/'.$slide->mediaThumbnail) }}" alt="img" class="img-responsive" />
                                    <i class="icon icon-play-circle2"></i>
                                    <h5>{{ $slide->title }}</h5>
                                </div>
                            </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="well well-sm"> No Video found for slider</div>
            @endif
        </div><!-- /slider -->
        <div class="row home_content">
            <div class="left_content col-sm-8">
                <!-- -- populer section -- -->
                <div class="popular_section popular_section_home">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Popular 
                        </div>
                        <div class="panel-body popular_section_in">
                            @if($popularVideos->count() > 0)
                                <div class="row">
                                    @foreach($popularVideos as $popular)
                                        <div class="col-sm-6 ">
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
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                No Popular Video
                            @endif
                        </div>
                    </div>
                </div> <!-- /populer section -->


                <!-- -- left bottom section -- -->
                <div class="popular_section sports_section_home">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Blustering
                        </div>
                        <div class="panel-body popular_section_in">
                            @if($leftVideos->count() > 0)
                                <div class="row">
                                @foreach($leftVideos as $leftVideo)
                                    <div class="col-sm-6 ">
                                    <div class="single_popular">
                                        <a href="{{ url('/single/'.encrypt($leftVideo->id)) }}" class="">
                                            <div class="col-xs-6 single_popular_img">
                                                <img src="{{ URL::asset('/thumbnail/'.$leftVideo->mediaThumbnail) }}" alt="img" class="img-responsive">
                                                <i class="icon icon-play-circle2"></i>
                                            </div>
                                            <div class="col-xs-6 single_popular_content">
                                                <h5>{{ $leftVideo->title }}</h5>
                                                <div class="thumb_user_choose">
                                         <span>
                                             <i class="icon icon-thumbs-up"></i>
                                             {{ ($leftVideo->likeOrDislike['like'] == null)? '0': $leftVideo->likeOrDislike['like'] }}
                                         </span>

                                         <span>
                                             <i class="icon icon-thumbs-down"></i>
                                             {{ ($leftVideo->likeOrDislike['dislike'] == null)? '0': $leftVideo->likeOrDislike['dislike'] }}
                                         </span>
                                                </div>
                                                <div class="duration">{{ $leftVideo->created_at->toFormattedDateString() }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    </div>
                                @endforeach
                                </div>
                            @else
                                <div class="well well-sm">No Video found</div>
                            @endif
                        </div>
                    </div>
                </div> <!-- /sports section -->
            </div>

            <div class="col-sm-4 right_content ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Wanted
                    </div>

                    <div class="panel-body right_content_body_home">
                        @if($rightVideos->count() > 0)
                            @foreach($rightVideos as $rightVideo)
                                <div class="single_popular">
                                    <a href="{{ url('/single/'.encrypt($rightVideo->id)) }}" class="">
                                    <div class="col-xs-6 single_popular_img">
                                        <img src="{{ URL::asset('/thumbnail/'.$rightVideo->mediaThumbnail) }}" alt="img" class="img-responsive">
                                        <i class="icon icon-play-circle2"></i>
                                    </div>
                                    <div class="col-xs-6 single_popular_content">
                                        <h5>{{ $rightVideo->title }}</h5>
                                         <div class="thumb_user_choose">
                                             <span>
                                                 <i class="icon icon-thumbs-up"></i>
                                                 {{ ($rightVideo->likeOrDislike['like'] == null)? '0': $rightVideo->likeOrDislike['like'] }}
                                             </span>

                                             <span>
                                                 <i class="icon icon-thumbs-down"></i>
                                                 {{ ($rightVideo->likeOrDislike['dislike'] == null)? '0': $rightVideo->likeOrDislike['dislike'] }}
                                             </span>
                                        </div>
                                        <div class="duration">{{ $rightVideo->created_at->toFormattedDateString() }}</div>
                                    </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="well well-sm">No Video found</div>
                        @endif
                    </div>
                </div>
            </div><!-- /right content -->
        </div>

    </div>
</section>

<section id="footer">
    <div class="container">
    <div class="row">
        <div class=""></div>
    </div>
    </div>
</section>

@endsection


@section('customJs')

    <script src="{{ asset('/js/lightslider.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#lightSlider").lightSlider({
            item: 4,
            autoWidth: false,
            slideMove: 1, // slidemove will be 1 if loop is true
            slideMargin: 10,

            speed: 400, //ms'
            auto: false,
            pauseOnHover: true,
            loop: false,
            slideEndAnimation: true,
            pause: 2000,

            keyPress: true,
            controls: true,

            responsive : [
            {
                breakpoint:768,
                settings: {
                    item:3,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:480,
                settings: {
                    item:2,
                    slideMove:1
                  }
            }],
        });
    });
</script>

@endsection
