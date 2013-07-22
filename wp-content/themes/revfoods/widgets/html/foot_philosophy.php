<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_foot_philosophy').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
        jQuery('#modal').click(function() {
            jQuery('.modal_meal_program').modal();
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
        <?php if ($instance['link_target'] == 'pop_up') { ?>
            <a class="foot_philosophy_link" href="javascript:void(0)" id="modal"><?php echo $instance['learn_more_text']; ?></a>
        <?php } else { ?>
            <a href="<?php echo $instance['link']; ?>" <?php if ($instance['link_target'] == 'new_window') echo 'target="_blank"' ?>><?php echo $instance['learn_more_text']; ?></a>
        <?php } ?>
    </div>
    <div class="clear"></div>
</div>
<div class="modal_meal_program hide fade jphisi" style="position: fixed;top:20px;overflow: auto;height: 600px;width: 90%; left: 5%; right: 5%; margin: 0;">
    <button style="font-size: 46px; padding: 10px;" type="button" class="close fkclose" data-dismiss="modal" aria-hidden="true">×</button>
    <div class="modal-body">
    <?php 
    //echo apply_filters('the_content', get_post_field('post_content', 119));
    include ABSPATH .'wp-content/themes/revfoods/widgets/lib/simple_html_dom.php';
    $html = file_get_html($instance['link']);
    foreach($html->find('.entry-content') as $element) 
           echo $element;
    ?>
    </div>    
</div>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var w =  jQuery(window).width();
                var h = w*650/1024;
                jQuery('#foot_philosophy.jabout').css('height', h);
            })
        </script>