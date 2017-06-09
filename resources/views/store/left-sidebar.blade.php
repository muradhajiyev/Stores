<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div hidden>
            {{$categories = App\Category::where('parent_id', null)->get()}}
            </div>
            @foreach($categories as $category)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4  class="panel-title"><a href="#">{{$category->name}}</a></h4>
                </div>
            </div>
            @endforeach

            {{--<div class="panel panel-default">--}}
            {{--<div class="panel-heading">--}}
            {{--<h4 class="panel-title">--}}
            {{--<a data-toggle="collapse" data-parent="#accordian" href="#womens">--}}
            {{--<span class="badge pull-right"><i class="fa fa-plus"></i></span>--}}
            {{--Womens--}}
            {{--</a>--}}
            {{--</h4>--}}
            {{--</div>--}}
            {{--<div id="womens" class="panel-collapse collapse">--}}
            {{--<div class="panel-body">--}}
            {{--<ul>--}}
            {{--<li><a href="#">Fendi</a></li>--}}
            {{--<li><a href="#">Guess</a></li>--}}
            {{--<li><a href="#">Valentino</a></li>--}}
            {{--<li><a href="#">Dior</a></li>--}}
            {{--<li><a href="#">Versace</a></li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

        </div><!--/categproductucts-->
    </div>
</div>

