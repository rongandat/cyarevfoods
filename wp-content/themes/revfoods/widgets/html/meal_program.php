<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_meal_program').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
        jQuery('#modal').click(function() {
            jQuery('.modal_meal_program').modal();
        });
    });
</script>
<style>
    #meal_program {
        height: 650px;
        background: url("<?php echo $image->get_image_src('full'); ?>") no-repeat right bottom;
        background-color: <?php echo $instance['bg_color'] ?>;
    }   
    #meal_program h1 {
        font-family: futurabold;
        color: <?php echo $instance['headline_font_color'] ?>;
        font-size: <?php echo $instance['headline_font_size'] ?>;
        text-align: left;
        line-height: 1;
    }
    .modal_meal_program {
        background-clip: padding-box;
        background-color: #eaebeb;
        box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
        left: 37%;
        margin-left: -280px;
        outline: medium none;
        position: absolute;
        top: 10%;
        width: 915px;
        z-index: 1050;

    }

    .modal_meal_program .close {
        color: #000000;
        display: block;
        float: right;
        font-size: 35px;
        font-weight: bold;
        line-height: 20px;
        margin: 0 20px 0 0;
        opacity: 0.2;
        text-shadow: 0 1px 0 #FFFFFF;
        margin-top: 10px;

    }

    .modal_meal_program .modal-body{
        padding: 25px;  
        max-height: none;
    }

    .modal_meal_program h1{
        color: #902b8c;
        font-size: 30px;
        font-family: futurabold;
        width: 800px; 
    }
    .modal_meal_program p{
        font-family: gothambook;
        font-size: 13px;
        line-height: 18px;
        text-align: left;
        padding: 0 0 15px 0;
    }
    .modal_meal_program p span.bold{
        font-family: gothambold;
    }
    .modal_meal_program p.description{
        padding-top: 5px;
    }

    .modal_meal_program ul.sample_lunch li{
        width: 265px;
        margin-left: 20px;
        display: block;
        float: left;
    }

    .modal_meal_program ul.sample_lunch li:first-child{
        margin-left: 0;
    }

</style>
<div id="meal_program">
    <div class="about_topdotted"><span class="titledotted1 dottedour_story"><?php echo $instance['title']; ?></span></div>
    <div class="main_content">
        <h1><?php echo $instance['headline']; ?></h1>
        <p class="description">
            <?php echo $instance['content']; ?>
        </p>
        <?php if ($instance['link_target'] == 'pop_up') { ?>
            <a href="#" id="modal"><?php echo $instance['learn_more_text']; ?></a>
        <?php } else { ?>
            <a href="<?php echo $instance['link']; ?>" <?php if ($instance['link_target'] == 'new_window') echo 'target="_blank"' ?>><?php echo $instance['learn_more_text']; ?></a>
        <?php } ?>
    </div>
</div>
<div class="modal_meal_program hide fade">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
<div class="clear"></div>