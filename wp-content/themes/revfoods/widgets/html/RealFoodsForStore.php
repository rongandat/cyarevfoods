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
    }
    .RealFoodsInStore .about_topdotted{
        padding: 30px 0 40px;
    }
    .RealFoodsInStore .dottedour_story{
        background: #db5aad;
    }
    .RealFoodsInStore .headline_instore{
        font-family: 'futurab';
        text-transform: lowercase;
        color: <?php echo $instance['headline_font_color'] ?>;
        width: 400px;
        display: inline-block;
        font-size: <?php echo $instance['headline_font_size'] ?>;
        font-weight: bold;
        margin: 0 0px 0px 507px;
        float: left;
    }

</style>
<div class="RealFoodsInStore" id="<?php echo $instance['show_on'] ?>">
    <div class="about_topdotted"><span class="titledotted1 dottedour_story"><?php echo $instance['title']; ?></span></div>
    <div class="clr"></div>
    <span class="headline_instore"><?php echo $instance['headline']; ?></span>
    <div class="clr"></div>
    <p class="gtbook widgetheaderdes instore fl">
        <?php echo $instance['content']; ?>
    </p>
    <div class="clr"></div>
    <a href="<?php echo $instance['link']; ?>" <?php if ($instance['link_target'] == 'new_window') echo 'target="_blank"' ?> class="lc widgetheaderlink instore fl"><?php echo $instance['learn_more_text']; ?></a><span class="learnmore fl"></span>
</div>