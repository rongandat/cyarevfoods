<?php
/* Template Name: In Store Page
*/ ?>
<?php get_header(); ?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("In Stores Sidebar") ) : endif; ?>
<?php get_footer(); ?>