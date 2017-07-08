@extends('layouts.main')
@section('title',' Blog')

@section('content')

    <section>
        <div class="container">
            @include('layouts.storeheaderbottom')
            <div class="row">

                @include('layouts.left-sidebar')

                <div class="col-sm-9">
                    <div class="blog-post-area">

                        <h2 class="title text-center">Latest From our Blog</h2>
                        @if(Auth::check())
                            @if(Auth::user()->isStoreOwner($store->id))
                                <div class="col-sm-12 col-sm-offset-9">
                                    <a href="{{URL::to("/store/blog/create?store=$store->id")}}" class="btn btn-primary">Add New Blog</a>

                                </div>
                            @endif
                        @endif
                                <br/>


               @foreach($bloglist as $blog)
                            <form action="{{URL::to('/store/blogsingle')}}" method="get">
               <?php
                  $datetime = new DateTime($blog->created_at);
                  $date = $datetime->format('Y-m-d');
                  $time = $datetime->format('H:i:s');
                ?>

            <input type="hidden" name="blogsingleid" value="{{$blog->id}}">
                   <input type="hidden" name="storeId" value="{{$blog->store_id}}">

             <div class="single-blog-post">
                 <h3>{{$blog->title}}</h3>
                 <div class="post-meta">
                     <ul>
                         <li><i class="fa fa-user"></i> {{$blog->store->name}}</li>
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
                 <a href="{{URL::to('/store/blogsingle')}}">
                     <img src="{{$blog->getImageUrlAttribute()}}" alt="">
                 </a>
                 <p>{{$blog->text}}</p>
                 <input type="submit" class="btn btn-primary" value="Read More">

             </div>
                            </form>

             @endforeach
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