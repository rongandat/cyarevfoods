<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_nutritional_education').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
    });
</script>
<style>
    #nutritional_education {
        background: <?php echo $instance['bg_color']; ?>;
        height: 645px;
        position: relative;
    }
    #nutritional_education .main_content h1 {
        font-family: futurabold;
        color: <?php echo $instance['headline_font_color'] ?>;
        font-size: <?php echo $instance['headline_font_size'] ?>;
    }
</style>
<div id="<?php echo $instance['show_on'] ?>">
    <div class="about_topdotted"><span class="titledotted1 dottedour_story"><?php echo $instance['title']; ?></span></div>
    <div class="main_image">
        <img src='<?php echo $image->get_image_src("full"); ?>'/>
    </div>

    <div class="main_content">
        <h1><?php echo $instance['headline']; ?></h1>
        <?php echo $instance['content']; ?>
    </div>
</div>