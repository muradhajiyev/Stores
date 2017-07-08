@extends('layouts.main')
@section('title',' Blog')

@section('content')

    <section>
        @if(Auth::check())
            <meta name="csrf-token" content="{{ csrf_token() }}" />
        @endif
        <div class="container">


            @include('layouts.storeheaderbottom')

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
                       
                                <img src="{{$blogsingle->getImageUrlAttribute()}}" alt="">
                         

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


                            <div class="tab-pane fade active in" id="reviews">
                                <div class="col-sm-12">
                                    <div id="comments-container">
                                        <input id="settings" type="hidden" value="{{$blogsingle->id}},{{ Auth::check() ? Auth::user()->name : '0' }}">
                                    </div>
                                </div>

                        </ul>
                    </div>
                    <!--/Response-area-->






                    </div>
                    <!--/Repaly Box-->
                </div>
            </div>
        </div>

           </section>



    <script src="{{asset("js/commentPanel.js")}}")></script>
    <script src="{{asset('js/bootbox.min.js')}}"></script>


@endsection
