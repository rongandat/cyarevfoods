<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
?>

<div id="primary" class="site-content">
    <div id="content" role="main">

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
<?php get_sidebar(); ?>

<?php get_footer(); ?>