@extends('layouts.main')

@section('title', "Product")

@section('content')

    @include('layouts.headerbottom')
    <section>
        @if(Auth::check())
            <meta name="csrf-token" content="{{ csrf_token() }}"/>
        @endif
        <div class="container">

            <div class="row">

                <div class="col-sm-12 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <!-- image part -->
                            <div class="gallery">
                                <img name="MyImage" id="img_01" src="{{$product->profile_url}}"
                                     data-zoom-image="{{$product->profile_url}}" alt="Trolltunga Norway" width="300"
                                     height="200">
                            </div>
                            <div class="thumbnails">
                                @foreach($product->image_urls as $image)
                                    <a href="" id="{{$image->id}}func">
                                        <img id="img{{$image->id}}" src="{{$image->path}}"/>

                                    </a>
                                    <script>
                                        var id = '{{$image->id}}' + 'func';
                                        document.getElementById(id).onmouseover = function () {
                                            $('img').removeClass('imageFocus');
                                            $('#img{{$image->id}}').addClass('imageFocus');
                                            $('.zoomContainer').remove();
                                            $('#img_01').removeData('elevateZoom')
                                            $('#img_01').attr('src', '{{$image->path}}');
                                            $("#img_01").data('zoom-image', '{{$image->path}}').elevateZoom({
                                                tint: true,
                                                tintColour: '#F90',
                                                tintOpacity: 0.5
                                            });
                                            $("#img_01").elevateZoom({
                                                scrollZoom: true,
                                                easing: true,
                                                borderSize: 3,
                                                borderColour: 'orange',
                                                zoomType: "window",
                                                zoomWindowWidth: "500",
                                                zoomWindowHeight: "500",
                                                zoomWindowFadeIn: 250,
                                                zoomWindowFadeOut: 250,
                                                zoomLevel: 1,
                                                responsive: true,
                                                tintColour: '#F90',
                                                tintOpacity: 0.5
                                            });
                                        };

                                    </script>
                                @endforeach
                                <script>
                                    $("#img_01").elevateZoom({
                                        tint: true,
                                        scrollZoom: true,
                                        easing: true,
                                        borderSize: 3,
                                        borderColour: 'orange',
                                        zoomType: "window",
                                        zoomWindowWidth: "500",
                                        zoomWindowHeight: "500",
                                        zoomWindowFadeIn: 250,
                                        zoomWindowFadeOut: 250,
                                        zoomLevel: 1,
                                        responsive: true,
                                        tintColour: '#F90',
                                        tintOpacity: 0.5
                                    });
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

                            </div><!-- /product-information -->
                        </div>
                    </div><!-- </product-details -->

                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#productSpecs" data-toggle="tab">Product Details</a></li>
                                <li><a href="#reviews" data-toggle="tab">Reviews</a></li>
                                <li><a href="#relatedProducts" data-toggle="tab">Related Products</a></li>

                            </ul>
                        </div>
                        <!-- details profile  -->
                        <div class="tab-content">
                            <div class="tab-pane fade" id="relatedProducts">
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

                            <div class="tab-pane fade active in" id="productSpecs">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="active"  colspan="2">Item Specifics</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($specs as $spec)
                                        <div hidden>
                                            {{ $unit = \App\Unit::where('id',$spec->specification->unit_id)->get()}}
                                        </div>
                                        <tr>
                                            <td >{{$spec->specification->name}}</td>
                                            <td ><b>{{$spec->value}} @if(count($spec->specification->unit)>0){{$spec->specification->unit->name}}@endif </b></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="reviews">
                                <div class="col-sm-12">
                                    <div id="comments-container">
                                        <input id="settings" type="hidden"
                                               value="{{$product->id}},{{ Auth::check() ? Auth::user()->name : '0' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--/category-tab-->


                </div>
            </div>
        </div>


    </section>

    <script src="{{asset("js/productDetails.js")}}" )></script>
    <script src="{{asset('js/bootbox.min.js')}}"></script>



@endsection