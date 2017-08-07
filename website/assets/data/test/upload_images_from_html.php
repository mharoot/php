<html>
<head>

    <title>EPS WELDING SERVICES ::   WELDING SERVICES AND METAL FABRICATION</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="Welding and Fabrication">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>


    <div id="response">
</div>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide" ><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/DSC00988_zpsv0h3yzgs.jpg"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/20141115_132006_zpsepexolbf.jpg"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/20150309_164903_zpsth2lpur6.jpg"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/20150926_123648_zpsekvbfdwt.jpg"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/2015092695120138_zpsymrpbmgr.jpg"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/2015092695123608_zpspisl1wj2.jpg"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/2015100195123158-1_zps3d5iig0i.jpg"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/20151123_152941_zpsdlvaegdl.jpg"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/2016071195145138_zpsao8tg29t.jpg"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/20160513_090420_zpspdeto7jl.jpg"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/20160421_144039_zps6ydtzk59.jpg"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/DSC01093_zpscajvsz1m.jpg"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/DSC01090_zpsshvbmdot.jpg"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/DSC00987_zpsynb05yee.jpg"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/DSC00986_zpsy4gqai2k.jpg"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/DSC00724_zpsgxum3r6a.jpg?t=1470854308"></div>             <div class="swiper-slide"><img src="http://i1268.photobucket.com/albums/jj580/epsweldingservices/20150523_123820_zpsbm75v50d.jpg"></div>

    <!-- Initialize Swiper -->
        <script>
        /*
        *   This scripts job is to Grab All swiper_slide class image sources
        *   
        *
        */
//printing
var image_source_array = "";
for(i=0; i <document.getElementsByClassName("swiper-slide").length;i++)
{
            image_source_array += document.getElementsByClassName("swiper-slide")[i].getElementsByTagName('img')[0].src;
            image_source_array +=" ";
}
alert(image_source_array);
//end of printing

$(document).ready(function() {
//ajax
$.ajax({
   url: 'response_from_html.php',
   type: 'post',
   data: {"points" : JSON.stringify(image_source_array)},
   success: function(data) {
       alert("OK");
       $("#response").append(data);
        
   }

});
});

        </script>
</body>

</html>