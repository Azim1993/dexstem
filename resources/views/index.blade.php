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
                                    <p>5:30</p>
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
                <div class="popular_section popular_section_home">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Popular 
                        </div>
                        <div class="panel-body popular_section_in">
                            <div class="row">
                                <div class="col-sm-6 ">
                                <div class="single_popular">
                                    <a href="" class="">
                                    <div class="col-xs-6 single_popular_img">
                                        <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                        <i class="icon icon-sun"></i>
                                    </div>
                                    <div class="col-xs-6 single_popular_content">
                                        <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                         <div class="thumb_user_choose">
                                            <span class="user_choose_icon">
                                                 <i class="icon icon-emo-thumbsup"></i>
                                                 <span>255</span>
                                            </span>
                                            <span class="user_choose_icon">
                                            <i class="icon icon-emo-shoot"></i>
                                            <span class="last">255</span>
                                            </span>
                                        </div>
                                        <div class="duration">Duration : 5:30</div>
                                    </div>
                                    </a>
                                </div>
                                </div>
                                <div class="col-sm-6 ">
                                <div class="single_popular">
                                    <a href="" class="">
                                    <div class="col-xs-6 single_popular_img">
                                        <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                        <i class="icon icon-sun"></i>
                                    </div>
                                    <div class="col-xs-6 single_popular_content">
                                        <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                         <div class="thumb_user_choose">
                                            <span class="user_choose_icon">
                                                 <i class="icon icon-emo-thumbsup"></i>
                                                 <span>255</span>
                                            </span>
                                            <span class="user_choose_icon">
                                            <i class="icon icon-emo-shoot"></i>
                                            <span class="last">255</span>
                                            </span>
                                        </div>
                                        <div class="duration">Duration : 5:30</div>
                                    </div>
                                    </a>
                                </div>
                                </div>
                                <div class="col-sm-6 ">
                                <div class="single_popular">
                                    <a href="" class="">
                                    <div class="col-xs-6 single_popular_img">
                                        <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                        <i class="icon icon-sun"></i>
                                    </div>
                                    <div class="col-xs-6 single_popular_content">
                                        <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                         <div class="thumb_user_choose">
                                            <span class="user_choose_icon">
                                                 <i class="icon icon-emo-thumbsup"></i>
                                                 <span>255</span>
                                            </span>
                                            <span class="user_choose_icon">
                                            <i class="icon icon-emo-shoot"></i>
                                            <span class="last">255</span>
                                            </span>
                                        </div>
                                        <div class="duration">Duration : 5:30</div>
                                    </div>
                                    </a>
                                </div>
                                </div>
                                <div class="col-sm-6 ">
                                <div class="single_popular">
                                    <a href="" class="">
                                    <div class="col-xs-6 single_popular_img">
                                        <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                        <i class="icon icon-sun"></i>
                                    </div>
                                    <div class="col-xs-6 single_popular_content">
                                        <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                         <div class="thumb_user_choose">
                                            <span class="user_choose_icon">
                                                 <i class="icon icon-emo-thumbsup"></i>
                                                 <span>255</span>
                                            </span>
                                            <span class="user_choose_icon">
                                            <i class="icon icon-emo-shoot"></i>
                                            <span class="last">255</span>
                                            </span>
                                        </div>
                                        <div class="duration">Duration : 5:30</div>
                                    </div>
                                    </a>
                                </div>
                                </div>
                                <div class="col-sm-6 ">
                                <div class="single_popular">
                                    <a href="" class="">
                                    <div class="col-xs-6 single_popular_img">
                                        <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                        <i class="icon icon-sun"></i>
                                    </div>
                                    <div class="col-xs-6 single_popular_content">
                                        <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                         <div class="thumb_user_choose">
                                            <span class="user_choose_icon">
                                                 <i class="icon icon-emo-thumbsup"></i>
                                                 <span>255</span>
                                            </span>
                                            <span class="user_choose_icon">
                                            <i class="icon icon-emo-shoot"></i>
                                            <span class="last">255</span>
                                            </span>
                                        </div>
                                        <div class="duration">Duration : 5:30</div>
                                    </div>
                                    </a>
                                </div>
                                </div>
                                <div class="col-sm-6 ">
                                <div class="single_popular">
                                    <a href="" class="">
                                    <div class="col-xs-6 single_popular_img">
                                        <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                        <i class="icon icon-sun"></i>
                                    </div>
                                    <div class="col-xs-6 single_popular_content">
                                        <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                         <div class="thumb_user_choose">
                                            <span class="user_choose_icon">
                                                 <i class="icon icon-emo-thumbsup"></i>
                                                 <span>255</span>
                                            </span>
                                            <span class="user_choose_icon">
                                            <i class="icon icon-emo-shoot"></i>
                                            <span class="last">255</span>
                                            </span>
                                        </div>
                                        <div class="duration">Duration : 5:30</div>
                                    </div>
                                    </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /populer section -->
                <div class="popular_section sports_section_home">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sports 
                        </div>
                        <div class="panel-body popular_section_in">
                            <div class="row">
                                <div class="col-sm-6 ">
                                <div class="single_popular">
                                    <a href="" class="">
                                    <div class="col-xs-6 single_popular_img">
                                        <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                        <i class="icon icon-sun"></i>
                                    </div>
                                    <div class="col-xs-6 single_popular_content">
                                        <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                         <div class="thumb_user_choose">
                                            <span class="user_choose_icon">
                                                 <i class="icon icon-emo-thumbsup"></i>
                                                 <span>255</span>
                                            </span>
                                            <span class="user_choose_icon">
                                            <i class="icon icon-emo-shoot"></i>
                                            <span class="last">255</span>
                                            </span>
                                        </div>
                                        <div class="duration">Duration : 5:30</div>
                                    </div>
                                    </a>
                                </div>
                                </div>
                                <div class="col-sm-6 ">
                                <div class="single_popular">
                                    <a href="" class="">
                                    <div class="col-xs-6 single_popular_img">
                                        <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                        <i class="icon icon-sun"></i>
                                    </div>
                                    <div class="col-xs-6 single_popular_content">
                                        <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                         <div class="thumb_user_choose">
                                            <span class="user_choose_icon">
                                                 <i class="icon icon-emo-thumbsup"></i>
                                                 <span>255</span>
                                            </span>
                                            <span class="user_choose_icon">
                                            <i class="icon icon-emo-shoot"></i>
                                            <span class="last">255</span>
                                            </span>
                                        </div>
                                        <div class="duration">Duration : 5:30</div>
                                    </div>
                                    </a>
                                </div>
                                </div>
                                <div class="col-sm-6 ">
                                <div class="single_popular">
                                    <a href="" class="">
                                    <div class="col-xs-6 single_popular_img">
                                        <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                        <i class="icon icon-sun"></i>
                                    </div>
                                    <div class="col-xs-6 single_popular_content">
                                        <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                         <div class="thumb_user_choose">
                                            <span class="user_choose_icon">
                                                 <i class="icon icon-emo-thumbsup"></i>
                                                 <span>255</span>
                                            </span>
                                            <span class="user_choose_icon">
                                            <i class="icon icon-emo-shoot"></i>
                                            <span class="last">255</span>
                                            </span>
                                        </div>
                                        <div class="duration">Duration : 5:30</div>
                                    </div>
                                    </a>
                                </div>
                                </div>
                                <div class="col-sm-6 ">
                                <div class="single_popular">
                                    <a href="" class="">
                                    <div class="col-xs-6 single_popular_img">
                                        <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                        <i class="icon icon-sun"></i>
                                    </div>
                                    <div class="col-xs-6 single_popular_content">
                                        <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                         <div class="thumb_user_choose">
                                            <span class="user_choose_icon">
                                                 <i class="icon icon-emo-thumbsup"></i>
                                                 <span>255</span>
                                            </span>
                                            <span class="user_choose_icon">
                                            <i class="icon icon-emo-shoot"></i>
                                            <span class="last">255</span>
                                            </span>
                                        </div>
                                        <div class="duration">Duration : 5:30</div>
                                    </div>
                                    </a>
                                </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div> <!-- /sports section -->
            </div>
            <div class="col-sm-4 right_content ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Related
                    </div>

                    <div class="panel-body right_content_body_home">
                        <div class="single_popular">
                            <a href="" class="">
                            <div class="col-xs-6 single_popular_img">
                                <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                <i class="icon icon-sun"></i>
                            </div>
                            <div class="col-xs-6 single_popular_content">
                                <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                 <div class="thumb_user_choose">
                                    <span class="user_choose_icon">
                                         <i class="icon icon-emo-thumbsup"></i>
                                         <span>255</span>
                                    </span>
                                    <span class="user_choose_icon">
                                    <i class="icon icon-emo-shoot"></i>
                                    <span class="last">255</span>
                                    </span>
                                </div>
                                <div class="duration">Duration : 5:30</div>
                            </div>
                            </a>
                        </div>
                        <div class="single_popular">
                            <a href="" class="">
                            <div class="col-xs-6 single_popular_img">
                                <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                <i class="icon icon-sun"></i>
                            </div>
                            <div class="col-xs-6 single_popular_content">
                                <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                 <div class="thumb_user_choose">
                                    <span class="user_choose_icon">
                                         <i class="icon icon-emo-thumbsup"></i>
                                         <span>255</span>
                                    </span>
                                    <span class="user_choose_icon">
                                    <i class="icon icon-emo-shoot"></i>
                                    <span class="last">255</span>
                                    </span>
                                </div>
                                <div class="duration">Duration : 5:30</div>
                            </div>
                            </a>
                        </div>
                        <div class="single_popular">
                            <a href="" class="">
                            <div class="col-xs-6 single_popular_img">
                                <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                <i class="icon icon-sun"></i>
                            </div>
                            <div class="col-xs-6 single_popular_content">
                                <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                 <div class="thumb_user_choose">
                                    <span class="user_choose_icon">
                                         <i class="icon icon-emo-thumbsup"></i>
                                         <span>255</span>
                                    </span>
                                    <span class="user_choose_icon">
                                    <i class="icon icon-emo-shoot"></i>
                                    <span class="last">255</span>
                                    </span>
                                </div>
                                <div class="duration">Duration : 5:30</div>
                            </div>
                            </a>
                        </div>
                        <div class="single_popular">
                            <a href="" class="">
                            <div class="col-xs-6 single_popular_img">
                                <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                <i class="icon icon-sun"></i>
                            </div>
                            <div class="col-xs-6 single_popular_content">
                                <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                 <div class="thumb_user_choose">
                                    <span class="user_choose_icon">
                                         <i class="icon icon-emo-thumbsup"></i>
                                         <span>255</span>
                                    </span>
                                    <span class="user_choose_icon">
                                    <i class="icon icon-emo-shoot"></i>
                                    <span class="last">255</span>
                                    </span>
                                </div>
                                <div class="duration">Duration : 5:30</div>
                            </div>
                            </a>
                        </div>
                        <div class="single_popular">
                            <a href="" class="">
                            <div class="col-xs-6 single_popular_img">
                                <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                <i class="icon icon-sun"></i>
                            </div>
                            <div class="col-xs-6 single_popular_content">
                                <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                 <div class="thumb_user_choose">
                                    <span class="user_choose_icon">
                                         <i class="icon icon-emo-thumbsup"></i>
                                         <span>255</span>
                                    </span>
                                    <span class="user_choose_icon">
                                    <i class="icon icon-emo-shoot"></i>
                                    <span class="last">255</span>
                                    </span>
                                </div>
                                <div class="duration">Duration : 5:30</div>
                            </div>
                            </a>
                        </div>
                        <div class="single_popular">
                            <a href="" class="">
                            <div class="col-xs-6 single_popular_img">
                                <img src="{{ URL::asset('/images/related.jpg') }}" alt="img" class="img-responsive">
                                <i class="icon icon-sun"></i>
                            </div>
                            <div class="col-xs-6 single_popular_content">
                                <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                 <div class="thumb_user_choose">
                                    <span class="user_choose_icon">
                                         <i class="icon icon-emo-thumbsup"></i>
                                         <span>255</span>
                                    </span>
                                    <span class="user_choose_icon">
                                    <i class="icon icon-emo-shoot"></i>
                                    <span class="last">255</span>
                                    </span>
                                </div>
                                <div class="duration">Duration : 5:30</div>
                            </div>
                            </a>
                        </div>
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
