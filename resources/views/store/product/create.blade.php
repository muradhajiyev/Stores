@extends('store.main')
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-1">
                    <div class="add-product-form"><!--login form-->
                        <h2>Add a new product</h2>
                        <form action="#">
                            <div class="form-group">
                            <h4>Name &amp; Price</h4>
                                <div class="col-sm-4">
                                <input type="text" placeholder="Name" class="form-control"  required>
                                </div>
                                <div class="col-sm4">
                                <input type="number" placeholder="Price" class="form-control" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Add</button>
                        </form>
                    </div><!--/login form-->
                </div>

            </div>
        </div>
    </section><!--/form-->

@endsection