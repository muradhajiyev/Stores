<!-- Modal -->
<div class="modal fade" id="advancedSearchModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Advanced search</h4>
            </div>
            <div class="modal-body">

                <form method="get">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseFour"><span class="glyphicon glyphicon-file"></span>Content</a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse in">
                                        <div class="list-group">
                                            <div class="list-group" id="tabLinks">
                                                <a href="#" class="list-group-item tabLink"
                                                   id="category">Categories</a>
                                                <a href="#" class="list-group-item tabLink" id="brand">Brands</a>
                                                <a href="#" class="list-group-item tabLink" id="price">Price</a>
                                                <a href="#" class="list-group-item tabLink"
                                                   id="condition">Condition</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-8" id="advancedSearchPanels">
                            <div class="panel panel-default advancedSearchPanel" id="categoryPanel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Categories</h3>
                                </div>
                                <div class="panel-body">
                                    <div id="subCategories">
                                        <div class="form-group parentCategory">
                                            <select class="form-control parentCategorySelect" name="productCategory"
                                                    required>
                                                <option selected value="" disabled>Select category</option>
                                                @foreach($categories as $parent)
                                                    <option value="{{$parent->id}}">{{$parent->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default advancedSearchPanel" id="brandPanel" hidden>
                                <div class="panel-heading">
                                    <h3 class="panel-title">Brands</h3>
                                </div>
                                <div class="panel-body">
                                    @foreach($brands as $brand)
                                        <input name="brand" type="checkbox" value="{{$brand->id}}">
                                        <label for="brand">{{$brand->name}}</label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="panel panel-default advancedSearchPanel" id="pricePanel" hidden>
                                <div class="panel-heading">
                                    <h3 class="panel-title">Price Range</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="price-range"><!--price-range-->
                                        <div class="well text-center">
                                            <input type="text" class="span2" value="" data-slider-min="0"
                                                   data-slider-max="1000" data-slider-step="5"
                                                   data-slider-value="[250,450]" id="sl2"><br/>
                                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 1000</b>
                                        </div>
                                    </div><!--/price-range-->
                                </div>
                            </div>
                            <div class="panel panel-default advancedSearchPanel" id="conditionPanel" hidden>
                                <div class="panel-heading">
                                    <h3 class="panel-title">Condition</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-sm-12 col-md-12">
                                        <input type="checkbox" name="used">
                                        <label for="used">Used</label>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="checkbox" name="new">
                                        <label for="new">New</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-sm-offset-10">
                            <button class="btn btn-primary">Apply</button>
                        </div>
                    </div>
                    {{--<div class="col-sm-6">--}}
                    {{--<div class="col-xs-3"> <!-- required for floating -->--}}
                    {{--<!-- Nav tabs -->--}}
                    {{--<ul class="nav nav-tabs tabs-left">--}}
                    {{--<li class="tabLinks" id="category"><a href="#" data-toggle="tab">Categories</a></li>--}}
                    {{--<li class="tabLinks" id="brand"><a href="#" data-toggle="tab">Brands</a></li>--}}
                    {{--<li class="tabLinks" id="price"><a href="#" data-toggle="tab">Price</a></li>--}}
                    {{--<li class="tabLinks" id="condition"><a href="#" data-toggle="tab">Condition</a></li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}

                    {{--<div class="col-xs-9">--}}
                    {{--<!-- Tab panes -->--}}
                    {{--<div class="tab-content">--}}
                    {{--<div class="tab-pane advancedSearchTabs" id="categoryTab">Category Tab.</div>--}}
                    {{--<div class="tab-pane advancedSearchTabs" id="brandTab">Brand Tab.</div>--}}
                    {{--<div class="tab-pane advancedSearchTabs" id="priceTab">Price Tab.</div>--}}
                    {{--<div class="tab-pane advancedSearchTabs" id="conditionTab">Condition Tab.</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="clearfix"></div>--}}

                    {{--</div>--}}
                    {{--<div class="clearfix"></div>--}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>