<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_our_mission').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
    });
</script>
<style>
    #our_mission {
        background-color: <?php echo $instance['bg_color'] ?>;
        height: 520px;
    }              
    #our_mission .om_content p {
        color: <?php echo $instance['headline_font_color'] ?>;
        font-size: <?php echo $instance['headline_font_size'] ?>;
        font-family: gothambook;
    }

</style>
<div id="<?php echo $instance['show_on'] ?>">
    <div class="om_content">
        <p><?php echo $instance['headline']; ?></p>
        <div class="om_description">
            <?php echo $instance['content']; ?>
        </div>
        <a href="<?php echo $instance['link']; ?>" <?php if ($instance['link_target'] == 'new_window') echo 'target="_blank"' ?> class="om_join_revolution"><?php echo $instance['learn_more_text']; ?></a>
    </div>
</div>
<div class="clear"></div>