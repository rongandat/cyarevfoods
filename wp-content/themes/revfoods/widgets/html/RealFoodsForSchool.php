<script>
    jQuery(document).ready(function() {
        jQuery('#submenu_real_food_in_school').click(function() {
            var id = jQuery(this).children('a').attr('rel');
            jQuery("html, body").animate({scrollTop: (jQuery('#' + id).offset().top - 115)}, 1000);
        });
    });
</script>
<style>
    .RealFoodsInSchool{
        background: <?php echo $instance['bg_color']; ?>;
    }
    .RealFoodsInSchool > div.sss{
        margin: 0 auto;
        width: 1024px;
        height: 650px;
        background: #F6F6F6 url("<?php echo $image->get_image_src('full'); ?>")  no-repeat;
        background-size: cover;
    }
    .RealFoodsInSchool .about_topdotted{
        padding: 30px 0 55px;
    }
    .RealFoodsInSchool .dottedour_story{
        background: #fff;
    }
    .RealFoodsInSchool .widgetstitleschool {
        margin: 30px 0px 30px 70px;
        width: 1px;
        height: 40%;
        background: transparent;
        border-radius: 144px;
    }
    .RealFoodsInSchool .title_inschool_1 {
        font-family: 'futurab';
        text-transform: uppercase;
        width: 100px;
        font-weight: bold;
        display: inline-block;
        padding: 0 40px 0px 65px;
    }

</style>
<div class="RealFoodsInSchool jhome" id="<?php echo $instance['show_on'] ?>">
    <div class="about_topdotted"><span class="titledotted1 dottedour_story"><?php echo $instance['title']; ?></span></div>
    <div class="clr"></div>
    <div class="sss">
        <p class="gtbook widgetheaderdes inschool">
            <?php echo $instance['content']; ?>
        </p>
        <a href="<?php echo $instance['link']; ?>" <?php if ($instance['link_target'] == 'new_window') echo 'target="_blank"' ?>  class="lc widgetheaderlink fl"><?php echo $instance['learn_more_text']; ?></a><span class="learnmore fl"></span>
    </div>
</div>
<!--<script type="text/javascript">
    jQuery(document).ready(function(){
        var w =  screen.width;
        var h = w*650/1024;
        if(h>650){
            jQuery('.RealFoodsInSchool.jhome').css('height', h);
        }
    })
</script>-->