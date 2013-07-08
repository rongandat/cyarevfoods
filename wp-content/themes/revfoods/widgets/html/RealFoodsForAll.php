<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_real_food_for_all').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
    });
</script>
<style>
    .RealFoodsForAll{
        height: 650px;
        background: #fff;
        background: #F6F6F6 url("<?php echo $image->get_image_src('full'); ?>")  repeat-x;
    }
    .RealFoodsForAll .widget_header {
        font-family: 'futurab';
        font-size: <?php echo $instance['headline_font_size'] ?>;
        font-weight: bold;
        color: <?php echo $instance['headline_font_color'] ?>;
        width: 400px;
        height: 165px;
        margin: 150px 0px 0px 70px;
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
<div class="RealFoodsForAll" id="<?php echo $instance['show_on'] ?>">
    <div class="topdotted">
        <div class="topdotted_l fl"></div>
        <span class="titledotted dottedrealfoodsforall"><?php echo $instance['title'] ?></span>
        <div class="topdotted_r fr"></div>
    </div>
    <div class="clr"></div>
    <h1 class="widget_header lc"><?php echo $instance['headline'] ?></h1>
    <p class="gtbook widgetheader_content">
        <?php echo $instance['content'] ?>
    </p>
    <a href="<?php echo $instance['link'] ?>" <?php if ($instance['link_target'] == 'new_window') echo 'target="_blank"' ?> class="lc widgetheaderlink fl"><?php echo $instance['learn_more_text']; ?></a><span class="learnmore fl"></span>
</div>
<div class="clr"></div>
