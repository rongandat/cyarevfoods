<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_new_products').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
    });
</script>
<style>
    #new_products {
        background: url('<?php echo $image->get_image_src("full"); ?>') no-repeat top center;
        height: 522px;
    }  
    #new_products h1 span {
        float: right;
        padding: 110px 18px;
        font-size: <?php echo $instance['headline_font_size'] ?>;
        color: <?php echo $instance['headline_font_color'] ?>;
    }
</style>
<div id="<?php echo $instance['show_on'] ?>">
   <h1><span><?php echo $instance['headline'] ?></span></h1>
</div>
<div class="clear"></div>