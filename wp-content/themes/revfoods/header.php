<?php
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
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slider.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/jquery-ui/css/ui-lightness/jquery-ui-1.10.3.custom.min.css">

<?php wp_enqueue_script('jquery');?>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-slider.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js'></script>
<link rel='stylesheet' id='revfoods-style-css'  href='<?php echo get_template_directory_uri(); ?>/css/bootstrap.css' type='text/css' media='all' />
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
                <?php $options = get_option( 'revfoods_theme_options' ); ?>
                <a href="<?php echo $options['question_url']?>"><span class="question"><?php _e('QUESTION?');?></span></a>
                <ul class="sub_menu" id="submenu"></ul>
            </div>
	</header>
    <!-- #masthead -->

	<div id="main" class="wrapper">