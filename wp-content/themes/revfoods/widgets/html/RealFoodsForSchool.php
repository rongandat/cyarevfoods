<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_real_food_in_school').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
    });
</script>
<style>
    .RealFoodsInSchool{
        height: 650px;
        background: #F6F6F6 url("<?php echo $image->get_image_src('full'); ?>")  repeat-x;
    }
    .RealFoodsInSchool .widgetstitleschool {
        margin: 30px 0px 30px 70px;
        width: 288px;
        height: 288px;
        background: transparent;
        border-radius: 144px;
    }
    .RealFoodsInSchool .title_inschool_1 {
        font-family: 'futurab';
        text-transform: uppercase;
        width: 100px;
        font-weight: bold;
        display: inline-block;
        padding: 45px 40px 0px 65px;
    }

</style>
<div class="RealFoodsInSchool" id="<?php echo $instance['show_on'] ?>">
    <div class="topdotted">
        <div class="topdotted_l fl"></div>
        <span class="titledotted dottedrealfoodsforall"><?php echo $instance['title']; ?></span>
        <div class="topdotted_r fr"></div>
    </div>
    <div class="clr"></div>
    <div class="widgetstitleschool lc">
        <span class="title_inschool_1"></span>
        <span class="title_inschool_2"></span>
    </div>
    <p class="gtbook widgetheaderdes inschool">
        <?php echo $instance['content']; ?>
    </p>
    <a href="<?php echo $instance['link']; ?>" <?php if ($instance['link_target'] == 'new_window') echo 'target="_blank"' ?>  class="lc widgetheaderlink fl"><?php echo $instance['learn_more_text']; ?></a><span class="learnmore fl"></span>
</div>