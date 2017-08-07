$(document).ready(function() {
    //swiper class object
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        paginationBulletRender: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + '</span>';
        }
    });

    function get_base_url() {
      var pathArray = location.href.split( '/' );
      var protocol = pathArray[0];
      var host = pathArray[2];
      return protocol + '//' + host  + "/epsweldingservices/gallery/";
    }

    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000));
      var expires = "expires="+ d.toUTCString();
      document.cookie = cname + "=" + cvalue + "; " + expires;
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length,c.length);
            }
        }
        return "";
    }

/** 
 * PREV PHOTO SET BUTTON
 */
  $("#prev_photo_set_button").click(function (e) {
      var base_url = get_base_url();
      //prevent default event
      e.preventDefault();

      var new_offset = 0;
      if ( getCookie('offset') == '') {
        setCookie('offset',0, 1);
      } else {
        var current_offset = +getCookie('offset');
        new_offset = (current_offset > 9) ? current_offset -= 10 : 0;
        setCookie('offset',new_offset,1);
      }

      var url = base_url+new_offset;
      window.location = url;
 
  });


/** 
 * NEXT PHOTO SET BUTTON
 */
  $("#next_photo_set_button").click(function (e) {
      var base_url = get_base_url();
      //prevent default event
      e.preventDefault();

      var new_offset = 0;
      if ( getCookie('offset') == '') {
        setCookie('offset',10, 1);
      } else {
        var current_offset = +getCookie('offset');
        new_offset = (current_offset < 36) ? current_offset += 10 : 0;
        setCookie('offset',new_offset,1);
      }

      var url = base_url+new_offset;
      window.location = url;
  });








/** 
 * ADD PHOTO BUTTON
 */
  $("#photo_submission_form_button").click(function (e) {

      //prevent default event
      e.preventDefault();

      if($("#url_textarea").val()==='')
      {
        //alert("You have not submitted a URL to upload a photo...");
        return false;
      }
      if($("#category").val()===0)
      {
        //alert("Please make sure to select a category...");
        return false;
      }

      //hide add photo button
      $("#photo_submission_form_button").hide();

      var url = $("#url_textarea").val();
      var post_data = 'url='+ url+'&description='+ $("#description_textarea").val()+'&category='+$("#category").val(); 

      //ajax handler
      jQuery.ajax({
      type: "POST",
      url: "business/admin_response.php", 
      dataType:"text",
      data:post_data,
      success:function(response){
        //append the response to div element
        //$("#photo_submission_response").replaceWith(response);

    var div = document.createElement("DIV");
    //give the div a class
    div.className = "swiper-slide swiper-slide-active";
    
    //create the img element and give it its show_source
    var img = document.createElement("IMG");
    //give the img a source
    img.src=url;

    //append the image within the div and our new child div is read to get prepended
    div.appendChild(img);
    //cool but maybe append will work better
    swiper.prependSlide(div);
    swiper._slideTo(0,1000);


        //empty text field on success
        $("#url_textarea").val('');

        //empty description text field on success
        //$("#description_textarea").val('');

        //empty category selection
        //$("#category").val(0);

        //show add photo button
        $("#photo_submission_form_button").show();

        console.log(" URL, Description, and Category sent properly.");
      },
      error:function (xhr, ajaxOptions, thrownError){
        //show submit button
        $("#photo_submission_form_button").show();
        //hide loading image
        //$("#LoadingImage").hide();
        console.log(thrownError);
      }
      });
  });




/** 
 * DELETE PHOTO BUTTON
 */
 $("#delete_photo_button").click(function (e) {
      e.preventDefault();
      //hide delete button
      $("#delete_photo_button").hide();

      //get all the image slides
      var swiper_slides = document.getElementsByClassName("swiper-slide");
      var i = 0;

      while(i < swiper_slides.length)
      {
        //if found
        if (swiper_slides[i].className == "swiper-slide swiper-slide-active")
          //exit loop
            break;
        i++;
      }

      // //alert("active index: "+i+"\n "+swiper_slides[i].getElementsByTagName('img')[0].src);

      //create post data object
      var url_of_photo_to_delete = 'deleted_photo_url='+ swiper_slides[i].getElementsByTagName('img')[0].src;

      //swiper class remove slide at index given from loop after you save its source of course... you are allowed to remove.
      swiper.removeSlide(i);

      /** 
       * ajax handler
       */

      jQuery.ajax({
      type: "POST",
      //scripting languages are a little different compared to php server side languages for files... i had this at ../business/admin.php... and it logically makes sense but didnt work properly on localhost or live afterwards.. why is this? solution found this is not a javascript thing this is a file system thing for all filing of all sorts... point of entry this cms.js runs at should be calling the file from where its running not where its originated
      url: "business/admin_response.php", 
      dataType:"text",
      data:url_of_photo_to_delete,
      success:function(response){

        //replace the div 
        //$("#delete_response").replaceWith(response);


        if(swiper_slides.length==1)
        {
          window.location.reload();
          return;
        }
        

        //alert("DELETEWORKS") ;

        //show delete button
        $("#delete_photo_button").show();

        
      },
      error:function (xhr, ajaxOptions, thrownError){
          //error
          //alert("error please refresh. You are deleting too fast!");
          deleted_photo_element.style.display="block";
      }
      });
  });


});

// $(window).on("orientationchange",function(){
//   alert('zooming out')
/*! A fix for the iOS orientationchange zoom bug. Script by @scottjehl, rebound by @wilto.MIT License.*/(function(m){if(!(/iPhone|iPad|iPod/.test(navigator.platform)&&navigator.userAgent.indexOf("AppleWebKit")>-1)){return}var l=m.document;if(!l.querySelector){return}var n=l.querySelector("meta[name=viewport]"),a=n&&n.getAttribute("content"),k=a+",maximum-scale=1",d=a+",maximum-scale=10",g=true,j,i,h,c;if(!n){return}function f(){n.setAttribute("content",d);g=true}function b(){n.setAttribute("content",k);g=false}function e(o){c=o.accelerationIncludingGravity;j=Math.abs(c.x);i=Math.abs(c.y);h=Math.abs(c.z);if(!m.orientation&&(j>7||((h>6&&i<8||h<8&&i>6)&&j>5))){if(g){b()}}else{if(!g){f()}}}m.addEventListener("orientationchange",f,false);m.addEventListener("devicemotion",e,false)})(this);

// });