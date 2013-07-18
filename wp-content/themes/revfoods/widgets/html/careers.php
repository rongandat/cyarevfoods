<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_careers').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
    });
</script>
<style>
    #careers {
        background: url('<?php echo $image->get_image_src("full"); ?>') no-repeat 50% 50%;
        height: 655px;
        background-size: cover;
    }
    #careers .main_content h1 {
        font-size: <?php echo $instance['headline_font_size'] ?>;
        font-family: futurabold;
        color: <?php echo $instance['headline_font_color'] ?>;
    }
</style>
<div id="careers" class="jabout">
    <div class="topdotted">
                    <div class="topdotted_l fl"></div>
                    <span class="titledotted dottedrealfoodsforall"><?php echo $instance['title']; ?></span>
                    <div class="topdotted_r fr"></div>
                </div>
    <div class="main_content">
        <div class="content_text">
            <h1><?php echo $instance['headline']; ?></h1>
            <?php echo $instance['content']; ?>
            <a href="<?php echo $instance['link']; ?>" <?php if ($instance['link_target'] == 'new_window') echo 'target="_blank"' ?> class="careers_href"><?php echo $instance['learn_more_text']; ?></a>
        </div>
    </div>
</div>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var w =  jQuery(window).width();
                var h = w*650/1024;
                jQuery('#careers.jabout').css('height', h);
            })
        </script>