<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_the_buzz').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
    });
</script>
<style>
    #the_buzz {
        height: 650px;
        background: <?php echo $instance['bg_color'] ?>;
    }
    #the_buzz .main_content p.content {
        font-family: gothamblack;
        font-size: 25px;
        margin-bottom: 30px;
    }
    #the_buzz .main_content p.person {
        font-family: gothambook;
        font-size: <?php echo $instance['headline_font_size'] ?>;
        line-height: 18px;
        color: <?php echo $instance['headline_font_color'] ?>;
        text-align: left;
    }
</style>
<div id="the_buzz">
    <div class="image">
        <img src="<?php echo $image->get_image_src('full'); ?>"/>
    </div>
    <div class="main_content">
        <p class="content">
            <?php echo $instance['content']; ?>
        </p>
        <p class="person">
            <?php echo $instance['headline']; ?>
        </p>
    </div>
</div>
<div class="clear"></div>