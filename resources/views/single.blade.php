@extends('layouts.app')

@section('customCss')
    <link href="{{ URL::asset('/css/videojs.css')}}" rel="stylesheet">

     <!-- If you'd like to support IE8 -->
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

@endsection

@section('content')
<section id="content_area">
    <div class="container">
        @include('errors.flash')
        <div class="panel panel-default video_section">
        
            <div class="row content_top_area">
                <div class="col-sm-8 player_area">
                    <video id="my-video" class="video-js" controls preload="auto" width="auto" height="350"
                           poster="{{ url('/thumbnail/'.$video->mediaThumbnail) }}" data-setup="{}">
                        @if(Auth::guest())
                            <source src="{{ url('videos/'.$video->video['id'].'/demo'.'.'.$video->video['videoName']) }}" type='video/mp4'>
                        @else
                            <source src="{{ url('videos/'.$video->video['id'].'/premium'.'.'.$video->video['videoName']) }}" type='video/mp4'>
                        @endif
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                        </p>
                    </video>
                </div>
     
                <div class="col-sm-4 related_media">
                    <form action="" method="post">

                    </form>
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
                            <span>{{ ($video->views == null)? '0' : $video->views['view'] }}</span>
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
                        <form action="" class="">
                            <div class="col-sm-10">
                                <textarea name="" class="form-control" placeholder="Your comment"></textarea>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                         <a href="" class="btn btn_comment btn-primary btn-block btn-sm">Comments <span class="badge">25</span></a>
                    </div>
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
                setTimeout(postView, 30000);
                initial++;
            }
            else {
                return;
            }
        });
        function postView() {
            $.get('/view/<?php encrypt($video->id); ?>')
            .error(
                console.log('Error' + data)
            )
            .success(
                console.log('added view' + data)
            );
        }
    </script>

@endsection
