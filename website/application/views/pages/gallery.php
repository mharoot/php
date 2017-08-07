<div class="swiper-container" style="width:100%; padding:0px;">
    <div class="swiper-wrapper"style="width:100%; padding:0px;">
        <?php 
        foreach($photos as $photo)
        {
            echo '
            <div class="swiper-slide" ><img src="'.$photo['url'].'"></div>
            ';
        }
        ?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination" ></div>
</div>

<div id="middle-background-image" style="height:15%; width:100%;">
    <div class="gallery_buttons"> 
    <img id="prev_photo_set_button" src="<?php echo base_url(); ?>assets/images/prev_i.png">        
    <div> </div> <!-- could be here for css reason check later -->
    <img id="next_photo_set_button" src="<?php echo base_url(); ?>assets/images/next_i.png">
    </div>
</div>