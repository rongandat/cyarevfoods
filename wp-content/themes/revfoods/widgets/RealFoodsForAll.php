<?php

class Revfoods_RealFoodsForAll extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'Revfoods_RealFoodsForAll', // Base ID
                'Revfoods_RealFoodsForAll', // Name
                array('description' => 'Revfoods Real Foods For All')
        );
    }

    public function widget($args, $instance) {
        if (!empty($instance['title'])) {
            $t = $instance['title'];
        } else {
            $t = '';
        }
        get_RealFoodsForAll($t);
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    public function form($instance) {
        if (empty($instance['title'])) {
            $title = '';
        } else {
            $title = $instance['title'];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php
    }

}

add_action('widgets_init', create_function('', 'register_widget( "Revfoods_RealFoodsForAll" );'));

function get_RealFoodsForAll($t) {
    ?>
        <div class="RealFoodsForAll">
            <div class="topdotted"><span class="titledotted dottedrealfoodsforall">Real Foods For All</span></div>
            <h1 class="widgetheadertitle lc">Real Foods For All</h1>
            <p class="gtbook widgetheaderdes">
                We create healthy, fresh, real food for schools and retailers across the country. Our meals are made from all natural ingredients. Nothing fake. Nothing artificial. Because you deserve nothing less.
            </p>
            <a href="" class="lc widgetheaderlink fl">Learn more</a><span class="learnmore fl"></span>
        </div>
    <?php
}