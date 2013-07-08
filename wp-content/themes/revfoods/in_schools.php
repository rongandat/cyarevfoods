<?php
/* Template Name: In Schools Page
*/ ?>
<?php get_header(); ?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("In School Sidebar") ) : endif; ?>
<?php get_footer(); ?>