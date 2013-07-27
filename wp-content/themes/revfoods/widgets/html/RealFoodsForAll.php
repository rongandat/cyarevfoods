<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_real_food_for_all').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
    });
</script>
<style>
    .RealFoodsForAll div.rrr{
        width: 1024px;
        margin: 0 auto;
    }
    .RealFoodsForAll { 
        height: 650px;
        background: <?php echo $instance['bg_color']; ?> url("<?php echo $image->get_image_src('full'); ?>")  no-repeat center top;
        /*background-size: cover;*/
    }
    .RealFoodsForAll .about_topdotted{
         padding: 30px 0 145px;
    }
    .RealFoodsForAll .dottedour_story{
        background: #f6f6f6;
    }
    .RealFoodsForAll .widget_header {
        font-family: 'futurab';
        font-size: <?php echo $instance['headline_font_size'] ?>;
        font-weight: bold;
        color: <?php echo $instance['headline_font_color'] ?>;
        width: 500px;
        height: 165px;
        margin: 0 0px 0px 70px;
    }
    .RealFoodsForAll .widgetheader_content{
        color: #333;
        font-size: 13px;
        line-height: 18px;
        width: 280px;
        height: 100px;
        margin: 0px 0px 0px 70px;
    }

</style>
<div class="RealFoodsForAll jhome" id="<?php echo $instance['show_on'] ?>">
    <div class="about_topdotted"><span class="titledotted1 dottedour_story"><?php echo $instance['title'] ?></span></div>
    <div class="clr"></div>
     <div class="rrr">
    <h1 class="widget_header lc"><?php echo $instance['headline'] ?></h1>
    <p class="gtbook widgetheader_content">
        <?php echo $instance['content'] ?>
    </p>
    <a href="<?php echo $instance['link'] ?>" <?php if ($instance['link_target'] == 'new_window') echo 'target="_blank"' ?> class="lc widgetheaderlink fl"><?php echo $instance['learn_more_text']; ?></a><span class="learnmore fl"></span>
    </div>
</div>
<div class="clr"></div>
<!--        <script type="text/javascript">
            jQuery(document).ready(function(){
                var w =  screen.width;
                var h = w*650/1024;
                if(h>650){
                    jQuery('.RealFoodsForAll.jhome').css('height', h);
                }
                
            })
        </script>-->
