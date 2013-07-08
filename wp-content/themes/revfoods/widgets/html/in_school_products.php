<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_in_school_products').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
    });
</script>
<style>
    #in_school_products {
        height: 655px;
        background-color: <?php echo $instance['bg_color'] ?>;
    }
    #in_school_products h1 {
        font-family: futurabold;
        color: <?php echo $instance['headline_font_color'] ?>;
        font-size: <?php echo $instance['headline_font_size'] ?>;
        text-align: left;
    }

</style>
<div id="in_school_products">
    <div class="about_topdotted"><span class="titledotted1 dottedour_story"><?php echo $instance['title']; ?></span></div>
    <div class="main_content">
        <h1><?php echo $instance['headline']; ?></h1>
        <p class="description">
            <?php echo $instance['content']; ?>
        </p>
        <a href="<?php echo $instance['link']; ?>" <?php if ($instance['link_target'] == 'new_window') echo 'target="_blank"' ?>><?php echo $instance['learn_more_text']; ?></a>
    </div>
    <div class="image">
        <img src="<?php echo $image->get_image_src('full'); ?>"/>
    </div>
</div>
<div class="clear"></div>