<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_foot_philosophy').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
    });
</script>
<style>
    #foot_philosophy {
        background: url('<?php echo $image->get_image_src("full"); ?>') no-repeat 50% 50%;
        background-size: cover;
        height: 583px;
    }
    #foot_philosophy .main_content h1 {
        font-size: <?php echo $instance['headline_font_size'] ?>;
        color: <?php echo $instance['headline_font_color'] ?>;
        font-family: futurabold;
    }
</style>
<div id="foot_philosophy" class="jabout">
    <div class="about_topdotted"><span class="titledotted1 dottedour_story"><?php echo $instance['title']; ?></span></div>
    <div class="main_content">
        <h1><?php echo $instance['headline']; ?></h1>
        <?php echo $instance['content']; ?>
        <a href="<?php echo $instance['link']; ?>" <?php if ($instance['link_target'] == 'new_window') echo 'target="_blank"' ?> class="foot_philosophy_href"><?php echo $instance['learn_more_text']; ?></a>
    </div>
    <div class="clear"></div>
</div>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var w =  jQuery(window).width();
                var h = w*650/1024;
                jQuery('#foot_philosophy.jabout').css('height', h);
            })
        </script>