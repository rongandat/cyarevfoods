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
</style>
<div id="<?php echo $instance['show_on'] ?>">
   
</div>
<div class="clear"></div>