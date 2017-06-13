<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div hidden>
                {{$categories = App\Category::where('parent_id', null)->get()}}
            </div>
            @foreach($categories as $category)
                <div hidden>
                    {{$childCategory = App\Category::where('parent_id', $category->id)->get()}}
                </div>
                @if(count($childCategory)>0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordian" href="#womens{{$category->id}}">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    {{$category->name}}
                                </a>
                            </h4>
                        </div>

                        <div id="womens{{$category->id}}" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul>
                                    @foreach($childCategory as $childCategory)
                                        @if(app('request')->input('searchStoreName'))
                                            <li><a id="categoryPressed"
                                                   href="{{ url('/') . '?' . http_build_query(['id' => $childCategory->id, 'category_name' => $childCategory->name, 'searchStoreName' => app('request')->input('searchStoreName') ]) }}">{{$childCategory->name}}</a>
                                            </li>
                                        @else
                                            <li><a id="categoryPressed"
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
                                <h4 class="panel-title"><a id="categoryPressed"
                                                           href="{{ url('/') . '?' . http_build_query(['id' => $category->id, 'category_name' => $category->name, 'searchStoreName' => app('request')->input('searchStoreName') ]) }}">{{$category->name}}</a>
                                </h4>
                            @else
                                <h4 class="panel-title"><a id="categoryPressed"
                                                           href="{{ url('/') . '?' . http_build_query(['id' => $category->id, 'category_name' => $category->name,  ]) }}">{{$category->name}}</a>
                                </h4>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div><!--/categproductucts-->
    </div>
</div>



