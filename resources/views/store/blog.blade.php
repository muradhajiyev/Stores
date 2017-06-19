@extends('layouts.main')
@section('title',' Blog')

@section('content')

    <section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <div class="container">
            @include('layouts.headerbottom')
            <div class="row">

                @include('layouts.left-sidebar')

                <div class="col-sm-9">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        @if(Auth::user()->isStore())
                            <select id="storedropdown">
                                @foreach($storelist as $store )

                                    <option value="{{$store->id}}">{{$store->name}}</option>
                                @endforeach
                            </select>

                        @endif
                    @endif
                    <div class="blog-post-area">

                        <h2 class="title text-center">Latest From our Blog</h2>

          <form action="" method="get">
    @foreach($bloglist as $blog)
        <?php
                  $storename=\App\Store::find($blog->store_id)->name;
                  $datetime = new DateTime($blog->created_at);
                  $date = $datetime->format('Y-m-d');
                  $time = $datetime->format('H:i:s');
                ?>
             <div class="single-blog-post">
                 <h3>{{$blog->title}}</h3>
                 <div class="post-meta">
                     <ul>
                         <li><i class="fa fa-user"></i> {{$storename}}</li>
                         <li><i class="fa fa-clock-o"></i> {{$time}}</li>
                         <li><i class="fa fa-calendar"></i>{{$date}}</li>
                     </ul>
                     <span>
                             <i class="fa fa-star"></i>
                             <i class="fa fa-star"></i>
                             <i class="fa fa-star"></i>
                             <i class="fa fa-star"></i>
                             <i class="fa fa-star-half-o"></i>
                     </span>
                 </div>
                 <a href="">
                     <img src="images/blog/blog-one.jpg" alt="">
                 </a>
                 <p>{{$blog->text}}</p>
                 <a class="btn btn-primary" href="">Read More</a>
             </div>
        @endforeach
             </form>

             <div class="pagination-area">
                 <ul class="pagination">
                     {{$bloglist->render()}}

                     <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
</div>

        <script>
        $('#storedropdown').change(function(){
        var Id = $(this).val();
        $.ajax({
        type: "GET",
        url: "{{ URL::to('/store/blog')}}",
        data: "store_id"+Id,
        success: function( data ) {
        document.getElementById("show").innerHTML = data;
        }
        });
        });
        </script>
</section>

@endsection