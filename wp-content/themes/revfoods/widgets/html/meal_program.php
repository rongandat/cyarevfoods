<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_meal_program').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
        jQuery('#modal').click(function(e) {
            jQuery('.modal_meal_program').modal();
        });
    });
</script>
<style>
    #meal_program{
        /*background: <?php echo $instance['bg_color'] ?>;*/
        background: <?php echo $instance['bg_color'] ?> url("<?php echo $image->get_image_src('full'); ?>") no-repeat center top;
    }
    #meal_program > div.mmm{
        margin: 0 auto;
        width: 1024px;
        height: 650px;

        /*background-color: <?php echo $instance['bg_color'] ?>;*/
    }   
    #meal_program h1 {
        font-family: futurabold;
        color: <?php echo $instance['headline_font_color'] ?>;
        font-size: <?php echo $instance['headline_font_size'] ?>;
        text-align: left;
        line-height: 70px;
    }


</style>
<div id="meal_program">
    <div class="about_topdotted"><span class="titledotted1 dottedour_story"><?php echo $instance['title']; ?></span></div>
    <div class="mmm">
        <div class="main_content">
            <h1><?php echo $instance['headline']; ?></h1>
            <p class="description">
                <?php echo $instance['content']; ?>
            </p>
            <?php if ($instance['link_target'] == 'pop_up') { ?>
                <a href="javascript:void(0)" id="modal"><?php echo $instance['learn_more_text']; ?></a>
            <?php } else { ?>
                <a href="<?php echo $instance['link']; ?>" <?php if ($instance['link_target'] == 'new_window') echo 'target="_blank"' ?>><?php echo $instance['learn_more_text']; ?></a>
            <?php } ?>
        </div>
    </div>
</div>
<div class="modal_meal_program hide fade" style="position: fixed;top:20px;overflow: auto;height: 600px;width: 90%; left: 5%; right: 5%; margin: 0;">
    <button style="font-size: 46px; padding: 10px;" type="button" class="close fkclose" data-dismiss="modal" aria-hidden="true">×</button>
    <div class="modal-body">
        <?php
        $pid = url_to_postid($instance['link']);
        if ($pid) {
            $p = get_post($pid);
            echo $p->post_content;
        }
        //echo apply_filters('the_content', get_post_field('post_content', 119));
//    include ABSPATH .'wp-content/themes/revfoods/widgets/lib/simple_html_dom.php';
//    $html = file_get_html($instance['link']);
//    foreach($html->find('.entry-content') as $element) 
//           echo $element;
        ?>
    </div>    
</div>
<div class="clear"></div>