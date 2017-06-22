@extends('layouts.main')

@section('title', "Product")

@section('content')

    @include('layouts.headerbottom')
    <section>
        <div class="container">

            <style type="text/css">
                .shaddoww {
                    box-shadow: 1px 1px 1px 1px gray;
                }
            </style>
            <div class="row">

                <div class="col-sm-12 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-4">
                            <!-- image part -->

                            <div class="view-product shaddoww">
                                <a href="#" data-toggle="modal" data-target=".pop-up-1">
                                    <img src="{{$product->profile_url}}" alt=""/>
                                </a>
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        @if(count($product->image_urls)>3)
                                            @foreach($product->image_urls as $image)
                                            <a href="#" data-toggle="modal" data-target=".pop-up-1">
                                                    <img src="{{$product->image_urls}}"
                                                         class="img-responsive img-rounded center-block" alt=""
                                                         style="width: 71px; height: 56px; margin-bottom: 10px;">
                                                </a>
                                                @endforeach
                                        @else
                                        @foreach($product->image_urls as $image)
                                        <a href="#" data-toggle="modal" data-target=".pop-up-1">
                                            <img src="{{$image}}"
                                                 class="img-responsive img-rounded center-block" alt=""
                                                 style="width: 100px; height: 80px;">
                                        </a>
                                      @endforeach
                                    @endif
                                    </div>

                                </div>
                                <!-- Controls -->
                                {{--<a class="left item-control" href="#similar-product" data-slide="prev">--}}
                                    {{--<i class="fa fa-angle-left"></i>--}}
                                {{--</a>--}}
                                {{--<a class="right item-control" href="#similar-product" data-slide="next">--}}
                                    {{--<i class="fa fa-angle-right"></i>--}}
                                {{--</a>--}}
                            </div>


                            <div class="modal fade pop-up-1" tabindex="-1" role="dialog"
                                 aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" style="margin-top: 7%;">
                                    <div class="">
                                        <div id="similar-popup" class="carousel slide" data-ride="carousel">
                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner">
                                                <!-- <div class="modal-header" style="color: black;background-color: white;">Header Part</div>
           -->
                                                <div class="item active">
                                                    <div class="modal-body" style="width: 80%;height: 80%;">

                                                        <img src="{{$product->profile_url}}"
                                                             class="img-responsive center-block" alt="">


                                                    </div>
                                                </div>
                                                @foreach($product->image_urls as $image)

                                                <div class="item">
                                                    <div class="modal-body" style="width: 80%;height: 80%;">

                                                        <img src="{{$image}}"
                                                             class="img-responsive center-block" alt="">
                                                    </div>
                                                </div>
                                                    @endforeach
                                            </div>
                                            <a class="left item-control" href="#similar-popup" data-slide="prev"
                                               style="margin-top: 10%;">
                                                <i class="fa fa-angle-left"
                                                   style="border-radius: 50%;width: 50px;height: 60px;font-size: 50px;"></i>
                                            </a>
                                            <a class="right item-control" href="#similar-popup" data-slide="next"
                                               style="margin-top: 10%;margin-right: 3%;">
                                                <i class="fa fa-angle-right"
                                                   style="border-radius: 50%;width: 50px;height: 60px;font-size: 50px;"></i>
                                            </a>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="modal fade pop-up-2" tabindex="-1" role="dialog"
                                 aria-labelledby="myLargeModalLabel-2" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="">
                                        <div class="modal-body" style="width: 80%;height: 80%;">
                                            <div class="modal-header" style="color: black;background-color: white;">
                                                Header Part
                                            </div>

                                            <img src="{{asset("images/home/default-avatar.png")}}"
                                                 class="img-responsive center-block" alt="">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end of image part -->


                        <div class="col-sm-8">
                            <div class="product-information shaddoww"><!--/product-information-->

                                <!-- <img src="product/images/product-details/new.jpg" class="newarrival" alt="" /> -->
                                <h2>{{$product->name}}</h2>
                                {{--<p>Web ID: 1089772</p>--}}
                                {{--<img src="product/images/product-details/rating.png" alt=""/>--}}
                                <span>
									<span> {{$product->price}} {{$product->currency->iso}}</span>
									<label>Quantity:</label>
									<input type="text" value="3"/>
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>

                                @if($product->is_new==1)
                                    <p><b>Condition:</b> New</p>
                                @elseif($product->is_new==0)
                                    <p><b>Condition:</b> Second Hand</p>
                                @else
                                    <p><b>Condition:</b> Undefined</p>
                                @endif
                                @if(!empty($product->brand->name))
                                    <p><b>Brand:</b> {{$product->brand->name}}</p>
                                @endif
                                {{--<a href=""><img src="product/images/product-details/share.png"--}}
                                {{--class="share img-responsive" alt=""/></a>--}}
                            </div><!-- /product-information -->
                        </div>
                    </div><!-- </product-details -->

                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li><a href="#details" data-toggle="tab">Related Products</a></li>
                                <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                                <li><a href="#tag" data-toggle="tab">Tag</a></li>
                                <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="details">
                                @foreach($relatedProducts as $relatedProduct)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{$relatedProduct->profile_url}}" alt=""/>
                                                <h2>{{$relatedProduct->price}} {{$relatedProduct->currency->iso}}</h2>
                                                <p>{{$relatedProduct->name}}</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="tab-pane fade" id="companyprofile">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="product/images/home/gallery1.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="product/images/home/gallery3.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="product/images/home/gallery2.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="product/images/home/gallery4.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tag">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="product/images/home/gallery1.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="product/images/home/gallery2.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="product/images/home/gallery3.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="product/images/home/gallery4.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade active in" id="reviews">
                                <div class="col-sm-12">
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur.</p>
                                    <p><b>Write Your Review</b></p>

                                    <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                                        <textarea name=""></textarea>
                                        <b>Rating: </b> <img src="product/images/product-details/rating.png" alt=""/>
                                        <button type="button" class="btn btn-default pull-right">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div><!--/category-tab-->

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="product/images/home/recommend1.jpg" alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="product/images/home/recommend2.jpg" alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="product/images/home/recommend3.jpg" alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="product/images/home/recommend1.jpg" alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="product/images/home/recommend2.jpg" alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="product/images/home/recommend3.jpg" alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel"
                               data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel"
                               data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div><!--/recommended_items-->

                </div>
            </div>
        </div>
        <div id="comments-container">
	<input id="settings" type="hidden" value="{{$product->id}},{{ Auth::user()->name}}">
</div>
    </section>

<script src="{{asset("js/productDetails.js")}}")></script>


@endsection