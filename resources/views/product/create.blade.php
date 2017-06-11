@extends('layouts.main')
@section('title',' Add Product')
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-sm-offset-1">
                    <div class="add-product-form"><!--login form-->
                        <h2> @lang('createProduct.header1') </h2>
                        <form action="#" enctype="multipart/form-data">
                            <div class="row">
                                <h4>@lang('createProduct.header2')</h4>
                                <div class="col-md-3">
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
                                        <select class="form-control" name="productCurrency" required>
                                            <option selected value="" disabled>Currency</option>
                                            @foreach($currencies as $currency)
                                                <option value="{{$currency->id}}">{{$currency->iso}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>@lang('createProduct.header3')</h4>
                                    <div id="subCategories">
                                        <div class="form-group parentCategory">
                                            <select class="form-control parentCategorySelect"  name="productCategory" required>
                                                <option selected value="" disabled>Select category</option>
                                                @foreach($parentCategories as $parent)
                                                    <option value="{{$parent->id}}">{{$parent->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row" >
                                <div class="col-md-12" id="specificationsArea" >


                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-1 form-group" id="newSpec" hidden>
                                    <button id="addNewSpec"  class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button>
                                </div>
                                <div class="col-md-1 form-group" id="deleteSpec" hidden>
                                <button id="deleteLastSpec"  class="btn btn-primary"><span class="glyphicon glyphicon-minus"></span></button>
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
                                    <input type="checkbox" name="isNew" />
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-8">
                                    <h4>@lang('createProduct.header6')</h4>
                                    <input type="file" name="files">
                                </div>
                            </div>
                            <hr/>


                            <div class="row">

                                <div class="col-sm-8 col-sm-offset-6">
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-primary">@lang('createProduct.submit')</button>
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