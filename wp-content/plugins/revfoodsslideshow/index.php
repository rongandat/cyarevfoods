<?php

/*
  Plugin Name:  RevFoods Footer SlideShow
  Plugin URI: http://cyasoft.com
  Description: http://cyasoft.com
  Author: Tim http://cyasoft.com
  Author URI: http://cyasoft.com
  Version: 0.0.0.1
 */


require_once ABSPATH . '/wp-content/plugins/revfoodsslideshow/widgets.php';

function RevFoods_SlideShow() {
    register_post_type(
            "revfoodsslideshow", array(
        'labels' => array(
            'add_new' => 'Add New',
            'name' => __('RevFoods SlideShow'),
            'singular_name' => __("RevFoods SlideShow"),
            'all_items' => __("All"),
            'add_new_item' => __("Add"),
            'edit_item' => __("Edit")),
        'public' => true,
        'show_ui' => true,
        'hierarchical' => true,
        'supports' => array('title', 'editor', 'custom-fields'),)
    );

    register_taxonomy('revfoodsss_cat', 'revfoodsslideshow', array(
        'hierarchical' => true,
        'show_ui' => true,
        'labels' => array(
            'name' => 'Category',
            'add_new_item' => 'Add',
            'edit_item' => 'Edit'
        )
    ));
}

add_action('admin_footer', 'SetRadioForCheckbox');
add_action('init', 'RevFoods_SlideShow');
add_action( 'admin_enqueue_scripts', 'admin_enqueue_scripts' );

function SetRadioForCheckbox() {
    ?>
    <script type="text/javascript">
        jQuery('ul#revfoodsss_catchecklist input[type="checkbox"]').each(function(){this.type="radio"});
    </script>;
    <?php

}

function admin_enqueue_scripts($hook_suffix) {
    if ($hook_suffix != 'widgets.php')
        return;
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
}

?>