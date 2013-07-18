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
        background-size: cover;
        background-color: <?php echo $instance['bg_color'] ?>;
    }
    #meals_served .real_foot h1 {
        color: <?php echo $instance['headline_font_color'] ?>;
        font-family: futurabold;
        font-size: <?php echo $instance['headline_font_size'] ?>;
        padding: 65px 20px 0 20px;
    }
    .meals_footer{
        background-color: <?php echo $instance['bg_color'] ?>;
        margin: 0 auto;
    }
    .meals_footer > div {
        margin: 0 auto;
        padding: 20px 0px;
        text-align: center;
        width: 655px;
        font-family: gothambook;
        font-size: 13px;
        color: #666;
        line-height: 18px;
        
    }
</style>
<div id="meals_served" class="jschool">
    <div class="real_foot"><h1><?php echo $instance['headline']; ?></h1></div>
</div>
<div class="clear"></div>
<div class="meals_footer">
    <div>
    <?php echo $instance['content'] ?>
    </div>
</div>
<div class="clear"></div>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var w =  screen.width;
                var h = w*650/1024;
                jQuery('#meals_served.jschool').css('height', h);
            })
        </script>
