<section id="slider"><!--slider-->

  <div class="container">
  <hr style="border-color: orange;">

   <div class="row">
    <div class="col-sm-12">
     <div id="slider-carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
       <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
       <li data-target="#slider-carousel" data-slide-to="1"></li>
       <li data-target="#slider-carousel" data-slide-to="2"></li>
      </ol>
      
      <div class="carousel-inner">
       <div class="item active">
        <div class="col-sm-12" style="height: 360px">
         <img src="{{asset("images/banner.jpg")}}" class="girl img-responsive" alt="" style = "width: 100%; height: 100%"/>
     </div>
       </div>
       <div class="item">
        <div class="col-sm-12" style="height: 360px">
         <img src="{{asset("images/banner1.jpg")}}" class="girl img-responsive" alt="" style = "width: 100%; height: 100%"/>
        </div>

       </div>
       
       <div class="item">
        <div class="col-sm-12" style="height: 360px">
         <img src="{{asset("images/banner2.jpg")}}" class="girl img-responsive" alt="" style = "width: 100%; height: 100%"/>
        </div>
       </div>
       
      </div>
      
      <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
       <i class="fa fa-angle-left"></i>
      </a>
      <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
       <i class="fa fa-angle-right"></i>
      </a>
     </div>
     
    </div>
   </div>
   <div class="row">
    <div class="col-sm-2" style="margin-left: 10%;">
    	<img src="{{asset("images/home/ecommerce.jpg")}}"  style="height: 180px;width: 160px; border-radius: 35%; box-shadow: 2px 2px 2px 2px black; margin-top: 5%;" />
     <!-- <img src="images/home/pricing.png"  class="pricing" alt="" /> -->
    </div>
    <div class="col-sm-4">
    	<span ><a href="#" style="color: black;"><h2>New Yorker</h2></a></span>
    	<p><i>Just do it</i></p>   
    	<p>The Carousel plugin is a component for cycling through elements, like a carousel (slideshow). Tip: Plugins can be included individually (using Bootstrap's individual "carousel.js" file), or all at once (using "bootstrap.js" or <a href="#">see more</a></p>
    </div>
   </div>
<hr style="border-color: orange;">
    </div>

  </div>
 </section><!--/slider-->
