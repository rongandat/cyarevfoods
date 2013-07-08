<?php
/* Template Name: About Page
*/ ?>
<?php get_header(); ?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("About sidebar") ) : endif; ?>
<?php get_footer(); ?>
