<!DOCTYPE html>
<html>
<head>
    <style>
        .gallery img{
            width: 500px;
            height: 400px;
        }
        .thumbnails img{
            display: inline;
            height: 100px;
            width: 122px;
        }
        .active img{border:2px solid #333 !important;}
    </style>
    <script type="text/javascript" src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
    <script src="{{asset('js/jquery.elevatezoom.js')}}" type="text/javascript"></script>
</head>
<body>

<h2>Responsive Image Gallery</h2>

<div class="responsive">
    <div class="gallery">
            <img name="MyImage" id="img_01" src="https://static.pexels.com/photos/23049/pexels-photo.jpg" data-zoom-image="https://static.pexels.com/photos/23049/pexels-photo.jpg" alt="Trolltunga Norway" width="300" height="200">
    </div>
    <div class="thumbnails">
        <a href="" onMouseOver="b()" >
            <img id="img_011" src="https://static.pexels.com/photos/6548/cold-snow-winter-mountain.jpeg" />

        </a>
        <script>
        function b() {
            $('.zoomContainer').remove();
            $('#img_01').removeData('elevateZoom')
            $('#img_01').attr('src','https://static.pexels.com/photos/6548/cold-snow-winter-mountain.jpeg');
            $("#img_01").data('zoom-image','https://static.pexels.com/photos/6548/cold-snow-winter-mountain.jpeg').elevateZoom({tint:true, tintColour:'#F90', tintOpacity:0.5});
            $("#img_01").elevateZoom({tint:true, tintColour:'#F90', tintOpacity:0.5});
        }

        </script>
    </div>
</div>
<script>
    $("#img_01").elevateZoom({tint:true, tintColour:'#F90', tintOpacity:0.5});
</script>

</body>
</html>
