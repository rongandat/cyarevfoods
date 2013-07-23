<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_meal_kits').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
    });
</script>
<style>
    #meal_kits div.mmm{
        width: 1024px;
        margin: 0 auto;
    }
    #meal_kits {
        background: <?php echo $instance['bg_color'] ?> url('<?php echo $image->get_image_src('full'); ?>') no-repeat center top;
        /*background-size: cover;*/
        height: 650px;
        /*background-color: <?php echo $instance['bg_color'] ?>;*/
    } 
    #meal_kits .main_content h1 {
        color: <?php echo $instance['headline_font_color'] ?>;
        font-family: futurabold;
        font-size: <?php echo $instance['headline_font_size'] ?>;
        line-height: 50px;
    }
</style>
<div id="<?php echo $instance['show_on'] ?>" class="mealkitsinstore jstore">
    <div class="about_topdotted"><span class="titledotted1 dottedour_story"><?php echo $instance['title']; ?></span></div>
    <div class="mmm">
    <div class="main_content">
        <h1><?php echo $instance['headline']; ?></h1>
        <?php echo $instance['content']; ?>
    </div>
    </div>
</div>
<div class="clear"></div>
<!--        <script type="text/javascript">
            jQuery(document).ready(function(){
                var w =  jQuery(window).width();
                var h = w*650/1024;
                    jQuery('.mealkitsinstore.jstore').css('height', h);
            })
        </script>-->