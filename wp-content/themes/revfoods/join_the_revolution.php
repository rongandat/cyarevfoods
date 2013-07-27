<?php /*
 * Template Name: Join the Revolution Page
 */ ?>
<?php get_header(); ?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Join the revolution sidebar") ) : endif; ?>
<style>
    div.jfb{
        text-align: center;
        background: #F6F6F6;
            
    }
    div.jtw{
        text-align: center;
        background: #fff;
    }
</style>
<div class="jfb">
    <div class="about_topdotted" style="height: 30px;"><span class="titledotted1 dottedour_story" style="background: #f6f6f6;">food philosophy</span></div>
    <a href="https://www.facebook.com/RevolutionFoods"><img src="<?php echo get_template_directory_uri(); ?>/images/rev_joinrevolution_fb.jpg" /></a>
</div>
<div class="jtw">
    <a href="https://twitter.com/revolutionfoods"><img src="<?php echo get_template_directory_uri(); ?>/images/rev_joinrevolution_tw.jpg" /></a>
</div>
<?php get_footer(); ?>
