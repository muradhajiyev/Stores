<section id="slider"><!--slider-->
  <div class="container">
  <hr style="border-color: orange;">

   <div class="row">
    <div class="col-sm-12">
     <div id="slider-carousel" class="carousel slide" data-ride="carousel" style="box-shadow: 1px 1px 1px 1px gray; background: url('/images/home/default-cover.png');">
      <ol class="carousel-indicators">
       <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
       <li data-target="#slider-carousel" data-slide-to="1"></li>
       <li data-target="#slider-carousel" data-slide-to="2"></li>
      </ol>
      
      <div class="carousel-inner">
       <div class="item active">
        <div class="col-sm-12" style="height: 360px;">
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
    <div class="col-sm-2" style="margin-left: 6%;">
    	<img src="{{asset("images/home/default-logo.png")}}"  style="height: 180px;width: 160px; border-radius: 35%; box-shadow: 2px 2px 2px 2px black; margin-top: 7%;" />
    </div>
    <div class="col-sm-8" style="margin-left: 1%; margin-top: 2%;">
    	<span ><a href="#" style="color: orange;font-size: 30px;">New</span> <span style="color: gray;font-size: 30px;">Yorker</span></a>
    	<p style="margin-top: 2%;"><i>The Only Art Gallery in the World Located in a Railroad Station</i></p>   
    	<p>The New Yorker is an American magazine of reportage, commentary, criticism, essays, fiction, satire, cartoons, and poetry. It is published by Condé Nast. Started as a weekly in 1925, the magazine is now published 47 times annually, with five of these issues covering two-week spans.

     </p><p id="show" style="display: none;">
        Although its reviews and events listings often focus on the cultural life of New York City, The New Yorker has a wide audience outside of New York and is read internationally. It is well known for its illustrated and often topical covers, its commentaries on popular culture and eccentric Americana, its attention to modern fiction by the inclusion of short stories and literary reviews, its rigorous fact checking and copyediting, its journalism on politics and social issues, and its single-panel cartoons sprinkled throughout each issue.
      </p> <span id="toggle" style="color: blue" class="hideLink"><u>See more</u></span>
    </div>
   </div>
<hr style="border-color: orange;">
    </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script>
          $(document).ready(function(){
              $("#toggle").click(function(){
                  $("#show").toggle();
              });
          });
          $(".hideLink").on("click", function(){
          if($(this).text()=="See less")
          {
              $(this).text("See more");
          } else {
              $(this).text("See less");
          }
          $(".ISProductBody").toggle(); 
              return false;
          });
          </script>
  </div>
 </section><!--/slider-->