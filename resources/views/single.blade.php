@extends('layouts.app')

@section('customCss')
    <link href="{{ URL::asset('/css/videojs.css')}}" rel="stylesheet">

     <!-- If you'd like to support IE8 -->
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

    <style>
        .vjs-poster{
            background-color: #3097d1;
        }
    </style>
@endsection

@section('content')
<section id="content_area">
    <div class="container">
        @include('errors.flash')
        <div class="panel panel-default video_section">
            @if(Auth::guest())
                <div class="alert alert-warning" role="alert">You Have to subscrive to Play full video</div>
            @elseif(Auth::user()->subscribed('main'))
                @if(Auth::user()->subscription('main')->cancelled())
                @else
                    <div class="alert alert-warning" role="alert">You Have to Renew Your subscription to Play full video</div>
                @endif
            @else
                <div class="alert alert-warning" role="alert">You Have to subscrive to Play full video</div>
            @endif
            <div class="row content_top_area">
                <div class="col-sm-8 player_area">
                    <video id="my-video" class="video-js" controls preload="auto" width="auto" height="350"
                           poster="{{ url('/thumbnail/'.$video->mediaThumbnail) }}" data-setup="{}">
                        @if(Auth::guest())
                            <source src="{{ url('videos/'.$video->id.'/'.$video->video['demoName']) }}" type='video/mp4'>
                        @elseif(Auth::user()->subscribed('main'))
                            @if(Auth::user()->subscription('main')->cancelled())
                                <source src="{{ url('videos/'.$video->id.'/'.$video->video['videoName']) }}" type='video/mp4'>
                            @else
                                <source src="{{ url('videos/'.$video->id.'/'.$video->video['demoName']) }}" type='video/mp4'>
                            @endif
                        @else
                            <source src="{{ url('videos/'.$video->id.'/'.$video->video['demoName']) }}" type='video/mp4'>
                        @endif
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                        </p>
                    </video>
                </div>
                
                <div class="col-sm-4 related_media">
                    <div class="demand">
                        <div class="demand_title">
                            Demand Your Expect
                        </div>
                        <div class="demand_form">
                            <form action="{{ url('/user/store_demand') }}" method="post">
                                {{ csrf_field() }}
                                <textarea name="demand_body" placeholder="Write Your Demand" class="form-control"></textarea>
                                <button class="btn" type="submit"><span>Demand</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /content top area -->
        </div>

        <div class="row content_bottom">
            <div class="col-sm-8">
                
                <div class="panel panel-default media_info">
                    <h4>{{ $video->title }}</h4>
                    <div class="user_interaction_media">
                        <div class="user_choose pull-left">
                            <form action="{{ url('/media_like/'.$video->id) }}" method="post">
                                {{ csrf_field() }}
                                <button class="btn" type="submit"><i class="icon icon-thumbs-up"></i></button>
                                <span>{{ ($video->likeOrDislike['like'] == null)?'0': $video->likeOrDislike['like'] }}</span>
                            </form>
                            <form action="{{ url('/media_dislike/'.$video->id) }}" method="post">
                                {{ csrf_field() }}
                                <button class="btn" type="submit"><i class="icon icon-thumbs-down"></i></button>
                                <span>{{ ($video->likeOrDislike['dislike'] == null)? '0': $video->likeOrDislike['dislike'] }}</span>
                            </form>
                        </div>
                        <div class="user_view pull-right">
                            <i class="icon icon-tape"></i>
                            <span id="views">{{ ($video->views == null)? '0' : $video->views['view'] }}</span>
                        </div>
                    </div>
                    <div class="media_discription">
                        {{ $video->description }}
                    </div>

                    <div class="social">
                        <div class="publish pull-left">
                            <i class="icon-back-in-time"></i> {{ $video->created_at->toFormattedDateString() }}
                        </div>
                        <ul class="pull-right">
                            <li>Shout</li>
                            <li><a href=""><i class="icon icon-facebook"></i></a></li>
                            <li><a href=""><i class="icon icon-twitter"></i></a></li>
                            <li><a href=""><i class="icon icon-gplus"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="panel panel-default comment">
                    <div class="panel-body">
                        <form action="{{ url('/user/store_comment/'.$video->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group  {{ $errors->has('comment') ? ' has-error' : '' }}">
                                <textarea name="comment" class="form-control" placeholder="Your comment"></textarea>
                                @include('errors.formError',['inputName'=>'comment'])
                            </div>
                            <div class="row">
                                <div class="col-xs-6 text-left">
                                    <a href="#" id="comments">{{ $video->comment->count() == 0? 'No Comment':'Comments '.$video->comment->count() }}</a>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <button class="btn btn-sm btn-primary" type="submit">Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="comment_display">
                </div>
                <div class="popular_section popular_section_single">
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
            </div> <!-- left content -->

            <div class="col-sm-4 right_content">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Related
                    </div>
    
                    <div class="panel-body right_content_body">
                        {{--{{ DB::table('mediaInfo') }}--}}
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

                        <a href="" class="more_load_btn btn btn-block btn-primary btn-sm">Load More</a>
                    </div>
                </div>
                

            </div><!--/right content -->

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

    <script src="{{ asset('/js/videojs.js')}}"></script>
    <script src="http://cdn.sc.gl/videojs-hotkeys/latest/videojs.hotkeys.min.js"></script>
    <script type="text/javascript">
        $('.player_area').bind('contextmenu', function(e) {
            return false;
        });

        videojs('my-video').ready(function() {
          this.hotkeys({
            volumeStep: 0.1,
            seekStep: 5
          });
        });

        // for view count
        var initial = 0;
        $('.player_area').click(function(){
            if(initial == 0 ){
                setTimeout(postView, 3000);
                initial++;
            }
            else {
                return;
            }
        });
        function postView() {
            var id = '<?php echo encrypt($video->id) ?>';
            $.get("/view/"+id, function(data) {
                $('#views').text(data)
            });
        }

        $('#comments').click(function(e) {
            e.preventDefault();
            var id = '<?php echo $video->id ?>';
            var display_results = $("#comment_display");
            display_results.html("loading...");
            var results  = '<div class="panel panel-default">';
                results += '<div class="panel">';
                results += '<div class="panel-body">';
            $.get('/comments/'+id,function(data) {
                if (data.length == 0) {
                    results = 'No Results';
                } else {
                    var sl = 1
                    $.each(data, function() {
                        console.log(data);
                        results += '<div class="row" style="padding: 5px 0">';
                            results += '<div class="col-sm-2">';
                                results += '<div class="comment_owner" ">Azim</div>';
                                results +=  '<div class="time">'+ prettyDate(this.created_at)+'</div>';
                            results += '</div>';
                            results += '<div style="border-left: 2px solid #efefef" class="col-sm-10">';
                                results += this.comment;
                            results += '</div>';
                        results += '</div>';
                        if(data.length > sl){
                            results += '<hr>';
                        }
                        sl =sl+1;
                    });
                }
                results += "</div></div></div>";
                display_results.html(results);
            });
        });
        function prettyDate(time) {
            var date = new Date((time || "").replace(/-/g, "/").replace(/[TZ]/g, " ")),
                    diff = (((new Date()).getTime() - date.getTime()) / 1000),
                    day_diff = Math.floor(diff / 86400);

            if (isNaN(day_diff) || day_diff < 0 || day_diff >= 31) return;

            return day_diff == 0 && (
                    diff < 60 && "just now" || diff < 120 && "1 minute ago" || diff < 3600 && Math.floor(diff / 60) + " minutes ago" || diff < 7200 && "1 hour ago" || diff < 86400 && Math.floor(diff / 3600) + " hours ago") || day_diff == 1 && "Yesterday" || day_diff < 7 && day_diff + " days ago" || day_diff < 31 && Math.ceil(day_diff / 7) + " weeks ago";
        }

        // If jQuery is included in the page, adds a jQuery plugin to handle it as well
        if (typeof jQuery != "undefined") jQuery.fn.prettyDate = function() {
            return this.each(function() {
                var date = prettyDate(this.title);
                if (date) jQuery(this).text(date);
            });
        };
    </script>

@endsection
