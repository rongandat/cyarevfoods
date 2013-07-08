<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_our_kind_of_partners').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
    });
</script>
<style>
    #our_kind_of_partners {
        height: 645px;
        background: url("<?php echo $image->get_image_src('full'); ?>") no-repeat center top;
    }
    #our_kind_of_partners h1 {
        font-family: futurabold;
        font-size: <?php echo $instance['headline_font_size'] ?>;
        color: <?php echo $instance['headline_font_color'] ?>;
        text-align: left;
    }
</style>
<div id="our_kind_of_partners">
    <div class="main_content">
        <h1><?php echo $instance['headline']; ?></h1>
        <?php echo $instance['content']; ?>
        <a href="<?php echo $instance['link']; ?>" <?php if ($instance['link_target'] == 'new_window') echo 'target="_blank"' ?> class="foot_philosophy_href"><?php echo $instance['learn_more_text']; ?></a>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>