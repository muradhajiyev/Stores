@extends('layouts.main')
@section('title',' Blog')

@section('content')

    <section>
        <div class="container">
            @include('layouts.headerbottom')
            <div class="row">
                @if(\Illuminate\Support\Facades\Auth::check())
                @if(Auth::user()->isStore())
                    <a class="btn btn-success" href="{{URL::to('/admin/stores/create')}}" style="height: 40px;font-size: 18px;float: right;"><i class="fa fa-plus fa-fw" style="color:white;"></i>
                    </a>
                @endif
                @endif
                @include('layouts.left-sidebar')

                <div class="col-sm-9">
                    <div class="blog-post-area">

                        <h2 class="title text-center">Latest From our Blog</h2>

          <form action="" method="get">
    @foreach($bloglist as $blog)
        <?php
                  $datetime = new DateTime($blog->created_at);
                  $date = $datetime->format('Y-m-d');
                  $time = $datetime->format('H:i:s');
                ?>
             <div class="single-blog-post">
                 <h3>{{$blog->title}}</h3>
                 <div class="post-meta">
                     <ul>
                         <li><i class="fa fa-user"></i> Mac Doe</li>
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
</section>

@endsection