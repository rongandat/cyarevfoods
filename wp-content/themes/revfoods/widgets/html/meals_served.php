<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_meals_served').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
    });
</script>
<style>
    #meals_served {
        height: 520px;
        background: url("<?php echo $image->get_image_src('full'); ?>") no-repeat center top;
        background-color: <?php echo $instance['bg_color'] ?>;
    }
    #meals_served .real_foot h1 {
        color: <?php echo $instance['headline_font_color'] ?>;
        font-family: futurabold;
        font-size: <?php echo $instance['headline_font_size'] ?>;
        padding: 65px 20px 0 20px;
    }
 </style>
<div id="meals_served">
    <div class="real_foot"><h1><?php echo $instance['headline']; ?></h1></div>
    <div class="content">
        <?php echo $instance['content']?>
    </div>
</div>
<div class="clear"></div>
