@extends('layouts.main')
@section('title',' Blog')

@section('content')

    <section>
        <div class="container">


            @include('layouts.headerbottom')

            <div class="row">

                @include('layouts.left-sidebar')

                <div class="col-sm-9">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Latest From our Blog</h2>

                        <div class="single-blog-post">
                            <h3>{{$blogsingle->title}}</h3>

                            <div class="post-meta">
                                <ul>
                                    <li><i class="fa fa-user"></i>{{ $blogsingle->store->name}}</li>
                                    <?php
                                    $datetime = new DateTime($blogsingle->created_at);
                                    $date = $datetime->format('Y-m-d');
                                    $time = $datetime->format('H:i:s');
                                    ?>
                                    <li><i class="fa fa-clock-o"></i> {{$time}}</li>
                                    <li><i class="fa fa-calendar"></i> {{$date}}</li>
                                </ul>
                                <span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
                            </div>
                            <a href="">
                                <img src="" alt="">
                            </a>

                            <p>
                                {{ $blogsingle->text}}
                            </p>

                            <div class="pager-area">
                                <ul class="pager pull-right">
                                    <li><a href="#">Pre</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/blog-post-area-->

                    <div class="rating-area">
                        <ul class="ratings">
                            <li class="rate-this">Rate this item:</li>
                            <li>
                                <i class="fa fa-star color"></i>
                                <i class="fa fa-star color"></i>
                                <i class="fa fa-star color"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </li>
                            <li class="color">(6 votes)</li>
                        </ul>
                        <ul class="tag">
                            <li>TAG:</li>
                            <li><a class="color" href="">Pink <span>/</span></a></li>
                            <li><a class="color" href="">T-Shirt <span>/</span></a></li>
                            <li><a class="color" href="">Girls</a></li>
                        </ul>
                    </div>
                    <!--/rating-area-->

                    <div class="socials-share">
                        <a href=""><img src="images/blog/socials.png" alt=""></a>
                    </div>
                    <!--/socials-share-->

                    <!--Comments-->
                    <div class="response-area">

                        <h2>{{count($comments)}} RESPONSES</h2>
                        <ul class="media-list" id="commentarea">
                            @foreach($comments as $comment)
                                <li class="media">

                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="images/blog/man-two.jpg" alt="">
                                    </a>

                                    <div class="media-body">
                                        <ul class="sinlge-post-meta">
                                            <li><i class="fa fa-user"></i>{{$comment->user->name}}</li>
                                            <?php
                                            $datetime = new DateTime($comment->created_at);
                                            $date = $datetime->format('Y-m-d');
                                            $time = $datetime->format('H:i:s');
                                            ?>
                                            <li><i class="fa fa-clock-o"></i> {{$time}}</li>
                                            <li><i class="fa fa-calendar"></i>{{$date}}</li>
                                        </ul>
                                        <p>{{$comment->comment}}</p>
                                        <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <!--/Response-area-->


                    <div class="replay-box">
                        <div class="row">
                            <div class="col-sm-4">
                                <h2>Leave a replay</h2>
                            </div>

                            @if(Auth::check())
                                <form action="{{URL::to('store/blog')}}" method="post" id="commentform">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="blogid" value="{{$blogsingle->id}}">

                                    <div class="col-sm-8">
                                        <div class="text-area">
                                            <div class="blank-arrow">
                                                <label>Your Comment</label>
                                            </div>
                                            <span>*</span>
                                            <textarea name="message" id="message" rows="11"></textarea>
                                            <button type="button" class="btn btn-primary" id="post">post comment
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                    <!--/Repaly Box-->
                </div>
            </div>
        </div>

           </section>
    <script>

        $("#commentform").submit(function(event){
            event.DefaultPrevented; //prevent default action

            var post_url = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data = $(this).serialize(); //Encode form elements for submission
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data
            }).done(function(data){
                $('#message').val('');
                var datetime= new Date(data.comment['created_at']);

                $('#commentarea').append(
                        '<li class="media"><a class="pull-left" href="#"><img class="media-object" src="" alt=""></a><div class="media-body"><ul class="sinlge-post-meta"> <li><i class="fa fa-user"></i>'
                        + "{{Auth::user()->name}}"+
                        '</li> <li><i class="fa fa-clock-o"></i>' +datetime.toLocaleTimeString() +
                        '</li><li><i class="fa fa-calendar"></i>' +
                        datetime.toDateString() +
                        '</li> </ul> <p>' + data.comment['comment']+
                        '</p><a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a></div></li>'
                )

            });

        });
    </script>

    <!-- ./wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>


@endsection