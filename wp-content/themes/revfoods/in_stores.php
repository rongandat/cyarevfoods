<?php /* Template Name: In Store Page
 */ ?>
<?php get_header(); ?>
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("In Stores Sidebar")) : endif; ?>
<?php if ($_GET['go']) { ?>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            if (jQuery('#wheretobuy').length >0 ){
                jQuery("html, body").animate({scrollTop: (jQuery('#wheretobuy').offset().top - 115)}, 1000);
            }
        })
    </script>
<?php } ?>
<?php
add_action('wp_head', 'fb_header');

function fb_header() {
    ?>
    <!--    <meta property="og:title" content="Chocolate Pecan Pie" />
        <meta property="og:url" content="http://revfoods.luxcerclients.com/in-stores" />
        <meta property="og:image" content="https://fbcdn-dragon-a.akamaihd.net/hphotos-ak-prn1/851565_496755187057665_544240989_n.jpg" />
        <meta property="og:description" content="ggg hh jjj" />-->
    <?php
}
?>

<?php get_footer(); ?>