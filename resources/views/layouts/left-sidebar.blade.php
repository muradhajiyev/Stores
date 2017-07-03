<div class="col-sm-3">
    <div class="left-sidebar">
        @if(!empty($store))
            @if(!empty($subCategories))
                <div hidden>
                    {{
                    $parent_id = $subCategories[0]->parent_id,
                    $categoriess = App\Category::find($parent_id)
                    }}
                </div>
                <h2><a id="backCategory"
                       href="{{ url('/store') . '?' . http_build_query(['store_id' => $store->id, 'id' => $categoriess->id,'category_name' => $categoriess->name,  ]) }}">{{$categoriess->name}}</a>
                </h2>
            @else
                <h2>All Categories</h2>
            @endif
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                {{--@if(app('request')->input('id'))--}}
                @if(empty($subCategories))
                    <div hidden>
                        {{$categories = App\Category::where('parent_id', null)->get()}}
                    </div>
                @else
                    <div hidden>
                        {{$categories = App\Category::where('parent_id', $categoriess->id)->get()}}
                    </div>
                @endif
                @if(app('request')->input('id'))
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a class="link0" id="categoryPressed"
                                                       href="{{ url('/store') . '?' . http_build_query(['store_id' => $store->id ]) }}">All
                                    Categories</a>
                            </h4>
                        </div>
                    </div>
                @endif
                @foreach($categories as $category)
                    <div hidden>
                        {{$childCategory = App\Category::where('parent_id', $category->id)->get()}}
                    </div>
                    @if(count($childCategory)>0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="link{{$category->id}}" id="toggleb{{$category->id}}"
                                       data-toggle="collapse" data-parent="#accordian"
                                       href="#womens{{$category->id}}">
                                        <span class="badge pull-right"><i id="icon{{$category->id}}"
                                                                          class="fa fa-plus"></i></span>
                                        {{$category->name}}
                                    </a>
                                </h4>
                            </div>
                            <script>
                                /**
                                 * Created by Gadir on 6/14/2017.
                                 */
                                $(document).ready(function () {
                                    $('#toggleb{{$category->id}}').on('click', function () {
                                        $('#icon{{$category->id}}').toggleClass("fa-minus");
                                    });
                                });
                            </script>
                            <div id="womens{{$category->id}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        @foreach($childCategory as $childCategory)
                                            @if(app('request')->input('searchStoreName'))
                                                <li><a class="link{{$childCategory->id}}" id="categoryPressed"
                                                       href="{{ url('/store') . '?' . http_build_query(['store_id' => $store->id,'id' => $childCategory->id, 'category_name' => $childCategory->name, 'searchStoreName' => app('request')->input('searchStoreName') ]) }}">{{$childCategory->name}}</a>
                                                </li>
                                            @else
                                                <li><a class="link{{$childCategory->id}}" id="categoryPressed"
                                                       href="{{ url('/store') . '?' . http_build_query(['store_id' => $store->id,'id' => $childCategory->id, 'category_name' => $childCategory->name ]) }}">{{$childCategory->name}}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                    @else
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                @if(app('request')->input('searchStoreName'))
                                    <h4 class="panel-title"><a class="link{{$category->id}}" id="categoryPressed"
                                                               href="{{ url('/store') . '?' . http_build_query(['store_id' => $store->id,'id' => $category->id, 'category_name' => $category->name, 'searchStoreName' => app('request')->input('searchStoreName') ]) }}">{{$category->name}}</a>
                                    </h4>
                                @else
                                    <h4 class="panel-title"><a class="link{{$category->id}}" id="categoryPressed"
                                                               href="{{ url('/store') . '?' . http_build_query(['store_id' => $store->id, 'id' => $category->id, 'category_name' => $category->name,  ]) }}">{{$category->name}}</a>
                                    </h4>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
                <script>
                    $(document).ready(function () {
                        var target = '';
                        @if(app('request')->input('id'))
                            target = '{{app('request')->input('id')}}';

                        @else
                            target = '{{app('request')->input('productCategory')}}';
                        @endif
                        $('.link' + target + '').addClass('focus');
                    });
                </script>
            </div><!--/categproductucts-->
        @else
            @if(!empty($subCategories))
                <div hidden>
                    {{
                    $parent_id = $subCategories[0]->parent_id,
                    $categoriess = App\Category::find($parent_id)
                    }}
                </div>
                <h2><a id="backCategory"
                       href="{{ url('/store') . '?' . http_build_query(['id' => $categoriess->id,'category_name' => $categoriess->name,  ]) }}">{{$categoriess->name}}</a>
                </h2>
            @else
                <h2>All Categories</h2>
            @endif
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                {{--@if(app('request')->input('id'))--}}
                @if(empty($subCategories))
                    <div hidden>
                        {{$categories = App\Category::where('parent_id', null)->get()}}
                    </div>
                @else
                    <div hidden>
                        {{$categories = App\Category::where('parent_id', $categoriess->id)->get()}}
                    </div>
                @endif
                @if(app('request')->input('id'))
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a class="link0" id="categoryPressed"
                                                       href="{{ url('/')}}">All Categories</a>
                            </h4>
                        </div>
                    </div>
                @endif
                @foreach($categories as $category)
                    <div hidden>
                        {{$childCategory = App\Category::where('parent_id', $category->id)->get()}}
                    </div>
                    @if(count($childCategory)>0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="link{{$category->id}}" id="toggleb{{$category->id}}"
                                       data-toggle="collapse" data-parent="#accordian"
                                       href="#womens{{$category->id}}">
                                        <span class="badge pull-right"><i id="icon{{$category->id}}"
                                                                          class="fa fa-plus"></i></span>
                                        {{$category->name}}
                                    </a>
                                </h4>
                            </div>
                            <script>
                                /**
                                 * Created by Gadir on 6/14/2017.
                                 */
                                $(document).ready(function () {
                                    $('#toggleb{{$category->id}}').on('click', function () {
                                        $('#icon{{$category->id}}').toggleClass("fa-minus");
                                    });
                                });
                            </script>
                            <div id="womens{{$category->id}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        @foreach($childCategory as $childCategory)
                                            @if(app('request')->input('searchStoreName'))
                                                <li><a class="link{{$childCategory->id}}" id="categoryPressed"
                                                       href="{{ url('/') . '?' . http_build_query(['id' => $childCategory->id, 'category_name' => $childCategory->name, 'searchStoreName' => app('request')->input('searchStoreName') ]) }}">{{$childCategory->name}}</a>
                                                </li>
                                            @else
                                                <li><a class="link{{$childCategory->id}}" id="categoryPressed"
                                                       href="{{ url('/') . '?' . http_build_query(['id' => $childCategory->id, 'category_name' => $childCategory->name ]) }}">{{$childCategory->name}}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                    @else
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                @if(app('request')->input('searchStoreName'))
                                    <h4 class="panel-title"><a class="link{{$category->id}}" id="categoryPressed"
                                                               href="{{ url('/') . '?' . http_build_query(['id' => $category->id, 'category_name' => $category->name, 'searchStoreName' => app('request')->input('searchStoreName') ]) }}">{{$category->name}}</a>
                                    </h4>
                                @else
                                    <h4 class="panel-title"><a class="link{{$category->id}}" id="categoryPressed"
                                                               href="{{ url('/') . '?' . http_build_query(['id' => $category->id, 'category_name' => $category->name,  ]) }}">{{$category->name}}</a>
                                    </h4>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
                <script>
                    $(document).ready(function () {
                        var target = '{{app('request')->input('id')}}';
                        $('.link' + target + '').addClass('focus');
                    });
                </script>
            </div><!--/categproductucts-->
        @endif
    </div>
</div>



