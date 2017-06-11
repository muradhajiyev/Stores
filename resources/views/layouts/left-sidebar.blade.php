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
                                <a  data-toggle="collapse" data-parent="#accordian" href="#womens{{$category->id}}">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    {{$category->name}}
                                </a>
                            </h4>
                        </div>

                        <div id="womens{{$category->id}}" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul>
                                    @foreach($childCategory as $childCategory)
                                        <li><a id="categoryPressed" href="{{ url('/'.$childCategory->name.'/stores/'.$childCategory->id) }}">{{$childCategory->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                @else
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a id="categoryPressed" href="{{ url('/'.$category->name.'/stores/'.$category->id) }}">{{$category->name}}</a></h4>
                        </div>
                    </div>
                @endif
            @endforeach
        </div><!--/categproductucts-->
    </div>
</div>

