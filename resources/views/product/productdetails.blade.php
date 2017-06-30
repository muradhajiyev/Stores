@extends('layouts.main')

@section('title', "Product")

@section('content')

    @include('layouts.headerbottom')
    <section>
    @if(Auth::check())
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @endif
        <div class="container">

            <div class="row">

                <div class="col-sm-12 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <!-- image part -->
                            <div class="gallery">
                                <img name="MyImage" id="img_01" src="{{$product->profile_url}}" data-zoom-image="{{$product->profile_url}}" alt="Trolltunga Norway" width="300" height="200">
                            </div>
                            <div class="thumbnails">
                                @foreach($product->image_urls as $image)
                                <a href="" id="{{$image->id}}func" >
                                    <img id="img{{$image->id}}"  src="{{$image->path}}" />
                                </a>
                                    <script>
                                        var id = '{{$image->id}}'+'func';
                                        document.getElementById(id).onmouseover = function() {
                                            $('img').removeClass('imageFocus');
                                            $('#img{{$image->id}}').addClass('imageFocus');
                                            $('.zoomContainer').remove();
                                            $('#img_01').removeData('elevateZoom')
                                            $('#img_01').attr('src','{{$image->path}}');
                                            $("#img_01").data('zoom-image','{{$image->path}}').elevateZoom({tint:true,tintColour:'#F90', tintOpacity:0.5});
                                            $("#img_01").elevateZoom({
                                                scrollZoom : true,
                                                easing:true,
                                                borderSize:3,
                                                borderColour: 'orange',
                                                zoomType: "window",
                                                zoomWindowWidth:"500",
                                                zoomWindowHeight:"500",
                                                zoomWindowFadeIn: 250,
                                                zoomWindowFadeOut: 250,
                                                zoomLevel: 1,
                                                responsive: true,
                                                tintColour:'#F90',
                                                tintOpacity:0.5});};

                                    </script>
                                @endforeach
                                <script>
                                    $("#img_01").elevateZoom({tint:true,
                                        scrollZoom : true,
                                        easing:true,
                                        borderSize:3,
                                        borderColour: 'orange',
                                        zoomType: "window",
                                        zoomWindowWidth:"500",
                                        zoomWindowHeight:"500",
                                        zoomWindowFadeIn: 250,
                                        zoomWindowFadeOut: 250,
                                        zoomLevel: 1,
                                        responsive: true,
                                        tintColour:'#F90',
                                        tintOpacity:0.5});
                                </script>
                            </div>



                        <!-- end of image part -->

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information shaddoww"><!--/product-information-->

                                <!-- <img src="product/images/product-details/new.jpg" class="newarrival" alt="" /> -->
                                <h2>{{$product->name}}</h2>
                                <h3>{{$product->description}}</h3>
                                {{--<p>Web ID: 1089772</p>--}}
                                {{--<img src="product/images/product-details/rating.png" alt=""/>--}}
                                <span>
									<span> {{$product->price}} {{$product->currency->iso}}</span>
									{{--<label>Quantity:</label>--}}
									{{--<input type="text" value="3"/>--}}
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
                                <li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
                            </ul>
                        </div>
                       <!-- details profile  -->
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
                                    <div id="comments-container">
                                       <input id="settings" type="hidden" value="{{$product->id}},{{ Auth::check() ? Auth::user()->name : '0' }}"> 
                                    </div>
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
       

    </section>

<script src="{{asset("js/productDetails.js")}}")></script>
<script src="{{asset('js/bootbox.min.js')}}"></script>



@endsection