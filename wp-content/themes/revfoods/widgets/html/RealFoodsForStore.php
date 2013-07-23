<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_real_food_in_store').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
    });
</script>
<style>
    .RealFoodsInStore{
        background: transparent url("<?php echo $image->get_image_src('full'); ?>")  no-repeat;
        height: 650px;
        background-size: cover;
    }
    .RealFoodsInStore .about_topdotted{
        padding: 30px 0 40px;
    }
    .RealFoodsInStore .dottedour_story{
        background: #db5aad;
    }
    .RealFoodsInStore .headline_instore{
        margin-top: 85px;
        font-family: 'futurab';
        text-transform: lowercase;
        color: <?php echo $instance['headline_font_color'] ?>;
        width: 400px;
        display: inline-block;
        font-size: <?php echo $instance['headline_font_size'] ?>;
        font-weight: bold;
        float: left;
        line-height: 70px;
    }

</style>
<div class="RealFoodsInStore jhome" id="<?php echo $instance['show_on'] ?>">
    <div class="about_topdotted"><span class="titledotted1 dottedour_story"><?php echo $instance['title']; ?></span></div>
    <div style="width: 520px;" class="fr">
        <div class="clr"></div>
        <span class="headline_instore"><?php echo $instance['headline']; ?></span>
        <div class="clr"></div>
        <p class="gtbook widgetheaderdes instore fl">
            <?php echo $instance['content']; ?>
        </p>
        <div class="clr"></div>
        <a href="<?php echo $instance['link']; ?>" <?php if ($instance['link_target'] == 'new_window') echo 'target="_blank"' ?> class="lc widgetheaderlink instore fl"><?php echo $instance['learn_more_text']; ?></a><span class="learnmore fl"></span>
    </div>

</div>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var w =  jQuery(window).width();
                var h = w*650/1024;
                jQuery('.RealFoodsInStore.jhome').css('height', h);
            })
        </script>