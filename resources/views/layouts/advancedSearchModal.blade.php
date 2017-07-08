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
                <form method="get" action="/store">
                    <input type="hidden" name="store_id" value="{{$store->id}}" id="storeId"/>
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="panel-group advancedSearchPanelGroup" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseFour"><span class="glyphicon glyphicon-file"></span>Details</a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse in">
                                        <div class="list-group">
                                            <div class="list-group" id="tabLinks">
                                                <a href="#" class="list-group-item tabLink"
                                                   id="category">Categories</a>
                                                @if(count($brands)>0)
                                                    <a href="#" class="list-group-item tabLink" id="brand">Brands</a>
                                                @endif

                                                <a href="#" class="list-group-item tabLink" id="price">Price</a>
                                                <a href="#" class="list-group-item tabLink"
                                                   id="condition">Condition</a>
                                                <div id="dynamicTabLink">

                                                </div>
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
                                            @if($category)
                                                <h4>{{$category->name}}</h4>
                                                <input name="productCategory" value="{{$category->id}}" type="hidden"/>
                                                @if(count($category->childs)>0)
                                                    <select class="form-control parentCategorySelect"
                                                            name="productCategory">
                                                        <option selected value="" disabled>Select category</option>
                                                        @foreach($category->childs as $parent)
                                                            <option value="{{$parent->id}}">{{$parent->name}}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            @else
                                                <select class="form-control parentCategorySelect"
                                                        name="productCategory">
                                                    <option selected value="" disabled>Select category</option>
                                                    @foreach($categories as $parent)
                                                        <option value="{{$parent->id}}">{{$parent->name}}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(count($brands)>0)
                                <div class="panel panel-default advancedSearchPanel" id="brandPanel" hidden>
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Brands</h3>
                                    </div>
                                    <div class="panel-body">

                                        @foreach($brands as $brand)

                                            <input name="brand_id" type="checkbox" value="{{$brand->brand_id}}">
                                            <label for="brand">{{$brand->brand_name}}</label>
                                            <br/>

                                        @endforeach

                                    </div>
                                </div>
                            @endif
                            <div class="panel panel-default advancedSearchPanel" id="pricePanel" hidden>
                                <div class="panel-heading">
                                    <h3 class="panel-title">Price Range</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-sm-5 col-md-5">
                                        <label for="minPrice"> Min Price :</label> <input type="number"
                                                                                          name="minPrice"
                                                                                          class="form-control"
                                                                                          value="{{app('request')->input('minPrice')}}"/>
                                    </div>
                                    <div class="col-sm-5 col-md-5">
                                        <label for="maxPrice">Max Price : </label><input type="number"
                                                                                         name="maxPrice"
                                                                                         class="form-control"
                                                                                         value="{{app('request')->input('maxPrice')}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class=" panel panel-default advancedSearchPanel" id="conditionPanel" hidden>
                                <div class="panel-heading">
                                    <h3 class="panel-title">Condition</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-sm-12 col-md-12">
                                        <input type="hidden" name="used" value="0">
                                        @if(app('request')->input('used')==1)
                                            <input type="checkbox" name="used" checked value="1">
                                        @else
                                            <input type="checkbox" name="used" value="1">
                                        @endif

                                        <label for="used">Used</label>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="hidden" name="new" value="0">
                                        @if(app('request')->input('new')==1)
                                            <input type="checkbox" checked name="new" value="1">
                                        @else
                                            <input type="checkbox" name="new" value="1">
                                        @endif
                                        <label for="new">New</label>
                                    </div>
                                </div>
                            </div>
                            <div id="dynamicSpecificationPanel">

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-sm-offset-10">
                            <button class="btn btn-primary">Apply</button>
                        </div>
                    </div>
                </form>

                <div id="chosenSpecs" hidden>
                    {{$jsonRequest}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>