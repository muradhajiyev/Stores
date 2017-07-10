<header id="headerbottom"><!--header-bottom-->
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            @if(!empty($store))
                            <li><a href=" {{ URL::to('/store?store_id='.$store->id) }}">Store</a></li>
                            @endif
                            <li><a href="{{URL::to('/store/contactus') }}">Contact</a></li>

                        </ul>
                    </div>
                </div>
                @if(!empty($store))
                @else
                    <form action="/" method="get">
                        @endif
                        <div class="col-sm-6">
                            <div class="search_box pull-right">
                                @if(!empty($store))
                                    <input hidden name="store_id" value="{{$store->id}}">
                                @endif
                                <input hidden id="tags" name="id" value="{{app('request')->input('id')}}"
                                       placeholder="Search" type="text">
                                <input hidden id="tags" name="category_name"
                                       value="{{app('request')->input('category_name')}}" placeholder="Search"
                                       type="text">
                                @if(!empty($store))
                                    <input id="search_text_product" name="searchStoreName"
                                           placeholder="Search" type="text">
                                @else
                                    <input id="search_text_store" name="searchStoreName"
                                           placeholder="Search" type="text">
                                @endif
                                <button id="searchByStoreName" type="submit" class="btn btn-md btn-warning">
                                    Search
                                </button>

                            </div>
                        </div>
                    </form>


            </div>

        </div>
    </div>
</header>
