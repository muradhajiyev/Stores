@extends('store.main')
@section('title',' Add Product')
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-1">
                    <div class="add-product-form"><!--login form-->
                        <h2> @lang('createProduct.header1') </h2>
                        <form action="#">
                            <div class="row">
                                <h4>@lang('createProduct.header2')</h4>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" placeholder="Name" name="productName" class="form-control"
                                               required>
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="number" placeholder="Price" name="productPrice"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control" name="productCategory" required>
                                            <option selected disabled>Currency</option>
                                            @foreach($currencies as $currency)
                                                <option value="{{$currency->id}}">{{$currency->iso}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-8">
                                    <h4>@lang('createProduct.header3')</h4>
                                    <div id="subCategories">
                                        <div class="form-group parentCategory">
                                            <select class="form-control parentCategorySelect" id="0" name="productCategory"
                                                    required>
                                                <option selected disabled>Select</option>
                                                @foreach($parentCategories as $parent)
                                                    <option value="{{$parent->id}}">{{$parent->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div id="specifications" hidden>
                            <hr/>
                            <div class="row">
                                <div class="col-md-3 form-group" >
                                    <h4>@lang('createProduct.header4')</h4>
                                    <select class="form-control" name="productSpec" id="productSpec" required>

                                    </select>
                                </div>
                                <div class="col-md-3 form-group" id="specValue" hidden>
                                    <h4>@lang('createProduct.header8')</h4>

                                </div>
                                <div class="col-md-2 form-group" id="specUnit" hidden >
                                    <h4>@lang('createProduct.header9')</h4>

                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-2 form-group" id="newSpec" hidden>

                                        <button id="addNewSpec"  class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button>

                                    </div>

                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>@lang('createProduct.header5')</h4>
                                    <select class="form-control" name="productBrand">
                                        <option selected disabled>Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <h4>@lang('createProduct.header7')</h4>
                                    <input type="checkbox" name="isNew"  required/>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-8">
                                    <h4>@lang('createProduct.header6')</h4>
                                    <input type="file" class="form-control" name="productImages">
                                </div>
                            </div>
                            <hr/>


                            <div class="row">

                                <div class="col-sm-8 col-sm-offset-6">
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-success">@lang('createProduct.submit')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!--/login form-->
                </div>

            </div>
        </div>
    </section><!--/form-->

@endsection