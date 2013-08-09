<?php /*
 * Template Name: Join the Revolution Page - Thanks
 */ ?>
<?php get_header(); ?>
<div id="primary" class="site-content">
    <style type="text/css">
        #content.tks  h1{
            color: #44ACC4;
            font-size: 35px;
            margin: 0px;
            font-family: "futurab";
            padding: 20px 0;
        }
         #content.tks .entry-content{
            padding-bottom: 50px;
            border-bottom: 1px dotted #AAA;
        }
    </style>
    <div id="content" role="main" style="width: 800px; margin: 0 auto; height: 500px;" class="tks">

        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'page'); ?>
            <?php comments_template('', true); ?>
        <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
</div><!-- #primary -->
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.site-header-3').css('background',"transparent url('<?php echo get_template_directory_uri(); ?>/images/bg_header_3_.jpg') repeat-x");
    })
</script>
<?php get_footer(); ?>
