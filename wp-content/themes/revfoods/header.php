<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/fonts.css">

<?php wp_enqueue_script('jquery');?>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js" type="text/javascript"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
            <div class="site-header-1 pfixed" style="<?php if ( is_user_logged_in() ) { echo "top:28px;"; } ?>" >
                <?php wp_nav_menu( array( 'theme_location' => 'Top-Menu-1', 'container'=>'','after'=>'<span></span>' , 'menu_class' => 'top-menu-1' ) ); ?>
            </div>
            <div class="site-header-2 pfixed" style="<?php if ( is_user_logged_in() ) { echo "top:48px;"; } ?>">
                <?php $header_image = get_header_image();
                    if ( ! empty( $header_image ) ) :
                        $urllogo = $header_image;
                    else:
                        $urllogo = get_template_directory_uri().'/images/logo.png';
                    endif;
                ?>
                <a class="logohome fl" href="<?php echo home_url();?>">
                    <img src="<?php echo esc_url( $urllogo ); ?>" class="logo" />
                </a>
                <?php wp_nav_menu( array( 'theme_location' => 'Top-Menu-2', 'container'=>'','menu_class' => 'top-menu-2 fl' ) ); ?>
                <?php wp_nav_menu( array( 'theme_location' => 'Top-Menu-Social', 'container'=>'','menu_class' => 'top-menu-social fl' ) ); ?>
                <span class="topsocial" ></span>
            </div>
            <div class="site-header-3 pfixed" style="<?php if ( is_user_logged_in() ) { echo "top:151px;"; } ?>">
                <span class="question"><?php _e('QUESTION');?></span>
                <?php wp_nav_menu( array( 'theme_location' => 'Top-Menu-3', 'container'=>'','menu_class' => 'top-menu-3' ) ); ?>
            </div>
	</header>
    <!-- #masthead -->

	<div id="main" class="wrapper">