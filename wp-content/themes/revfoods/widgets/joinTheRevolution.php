<?php

class Revfoods_Join_The_Revolution extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'Revfoods_Join_The_Revolution', // Base ID
                'Revfoods_Join_The_Revolution', // Name
                array('description' => 'Revfoods Join The Revolution Form ')
        );
    }

    public function widget($args, $instance) {
        extract($args);
        ?>
        <style>
            #join_revolution .main_content .content h1 {
                font-family: futurabold;
                font-size: <?php echo $instance['headline_font_size'] ?>;
                color: <?php echo $instance['headline_font_color'] ?>;
                text-align: left;
                padding-bottom: 0px;
            }
        </style>
        <div id="join_revolution">
            <div class="main_content">
                <div class="content">
                    <h1><?php echo $instance['headline']; ?></h1>
                    <p class="content">
                        <?php echo $instance['content']; ?>
                    </p>
                </div>
                <div class="form">
                    <input type="text" value="" placeholder="enter your email address" class="st-forminput" name="email_address">
                    <div class="send_info">
                        <span class="send_me">send me information about...</span>
                        <input id="checkedbox_j1" class="css-checkbox" type="checkbox" name="inschools">
                        <label class="css-label" for="checkedbox_j1">In Schools</label>
                        <input id="checkedbox_j2" checked="checked" class="css-checkbox" type="checkbox" name="instores">
                        <label for="checkedbox_j2" class="css-label">Instore</label>
                    </div>
                </div>
                <a href="#">sign up</a>
            </div>
        </div>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['headline'] = $new_instance['headline'];
        $instance['headline_font_size'] = strip_tags($new_instance['headline_font_size']);
        $instance['headline_font_color'] = strip_tags($new_instance['headline_font_color']);
        $instance['content'] = $new_instance['content'];
        return $instance;
    }

    public function form($instance) {
        $default['title'] = __('join the revolution', 'revfoods');
        $default['headline'] = 'join the revolution';
        $default['content'] = 'Lorem ipsum dolor sit amet consultiteur. Erat sit amet lorem dolor. 
                Lorem ipsum dolor sit amet con. Lorem ipsum dolor sit amet consultiteur. 
                Erat sit amet lorem dolor. Lorem ipsum dolor sit amet con.';
        $default['headline_font_size'] = '86px';
        $default['headline_font_color'] = '#59ba47';

        $instance = wp_parse_args($instance, $default);
        ?>     
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>       
        <p id="div_headline">
            <label for="<?php echo $this->get_field_id('headline'); ?>"><?php _e('Headline:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('headline'); ?>" name="<?php echo $this->get_field_name('headline'); ?>" type="text" value="<?php echo esc_attr($instance['headline']); ?>" />
        </p>
        <p id="div_headline_font_size">
            <label for="<?php echo $this->get_field_id('headline_font_size'); ?>"><?php _e('Font size of headline:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('headline_font_size'); ?>" name="<?php echo $this->get_field_name('headline_font_size'); ?>" type="text" value="<?php echo esc_attr($instance['headline_font_size']); ?>" />
        </p>
        <p id="div_headline_font_color">
            <label for="<?php echo $this->get_field_id('headline_font_color'); ?>"><?php _e('Font color of headline:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('headline_font_color'); ?>" name="<?php echo $this->get_field_name('headline_font_color'); ?>" type="text" value="<?php echo esc_attr($instance['headline_font_color']); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Content:'); ?></label> 
            <textarea rows="8" class="widefat" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo format_to_edit($instance['content']); ?></textarea>
        </p>
        <?php
    }

}

add_action('widgets_init', create_function('', 'register_widget( "Revfoods_Join_The_Revolution" );'));
