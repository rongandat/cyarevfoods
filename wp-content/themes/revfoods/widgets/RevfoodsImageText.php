<?php

class Revfoods_Image_Text extends WP_Widget {

    var $image_field = 'image';  // the image field ID

    public function __construct() {
        parent::__construct(
                'Revfoods_Image_Text', // Base ID
                'Revfoods_Image_Text', // Name
                array('description' => 'Revfoods Image Text')
        );
    }

    public function widget($args, $instance) {
        extract($args);
        //get_RealFoodsForAll($instance);
        $image_id = $instance[$this->image_field];
        $image = new WidgetImageField($this, $image_id);
        ?>
        <?php if ($instance['add_submenu'] == 'on') { ?>
            <script>
                jQuery(document).ready(function() {
                    var submenu = "<?php echo $instance['title']; ?>";
                    var rel = "<?php echo $instance['show_on'] ?>";
                    jQuery("ul.sub_menu").append("<li class='menu-item' id='submenu_"+rel+"'><a rel='" + rel + "' href='#'>" + submenu + "</a></li>");
                    
                    
                });
            </script>
        <?php } ?>
        <?php
        if ($instance['show_on'] == 'real_food_for_all') {
            include ABSPATH . 'wp-content/themes/revfoods/widgets/html/RealFoodsForAll.php';
        }
        if ($instance['show_on'] == 'real_food_in_school') {
            include ABSPATH . 'wp-content/themes/revfoods/widgets/html/RealFoodsForSchool.php';
        }
        if ($instance['show_on'] == 'real_food_in_store') {
            include ABSPATH . 'wp-content/themes/revfoods/widgets/html/RealFoodsForStore.php';
        }
        if ($instance['show_on'] == 'our_mission') {
            include ABSPATH . 'wp-content/themes/revfoods/widgets/html/our_mission.php';
        }
        if ($instance['show_on'] == 'our_story') {
            include ABSPATH . 'wp-content/themes/revfoods/widgets/html/our_story.php';
        }
        if ($instance['show_on'] == 'foot_philosophy') {
            include ABSPATH . 'wp-content/themes/revfoods/widgets/html/foot_philosophy.php';
        }
        if ($instance['show_on'] == 'nutritional_education') {
            include ABSPATH . 'wp-content/themes/revfoods/widgets/html/nutritional_education.php';
        }
        if ($instance['show_on'] == 'careers') {
            include ABSPATH . 'wp-content/themes/revfoods/widgets/html/careers.php';
        }
        if ($instance['show_on'] == 'meals_served') {
            include ABSPATH . 'wp-content/themes/revfoods/widgets/html/meals_served.php';
        }
        if ($instance['show_on'] == 'meal_program') {
            include ABSPATH . 'wp-content/themes/revfoods/widgets/html/meal_program.php';
        }
        if ($instance['show_on'] == 'our_kind_of_partners') {
            include ABSPATH . 'wp-content/themes/revfoods/widgets/html/our_kind_of_partners.php';
        }
        if ($instance['show_on'] == 'in_school_products') {
            include ABSPATH . 'wp-content/themes/revfoods/widgets/html/in_school_products.php';
        }
        if ($instance['show_on'] == 'the_buzz') {
            include ABSPATH . 'wp-content/themes/revfoods/widgets/html/the_buzz.php';
        }
        if ($instance['show_on'] == 'new_products') {
            include ABSPATH . 'wp-content/themes/revfoods/widgets/html/new_products.php';
        }
        if ($instance['show_on'] == 'meal_kits') {
            include ABSPATH . 'wp-content/themes/revfoods/widgets/html/meal_kits.php';
        }
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['add_submenu'] = strip_tags($new_instance['add_submenu']);
        $instance['show_on'] = strip_tags($new_instance['show_on']);
        $instance[$this->image_field] = intval(strip_tags($new_instance[$this->image_field]));
        $instance['bg_color'] = strip_tags($new_instance['bg_color']);
        $instance['headline'] = $new_instance['headline'];
        $instance['headline_font_size'] = strip_tags($new_instance['headline_font_size']);
        $instance['headline_font_color'] = strip_tags($new_instance['headline_font_color']);
        $instance['content'] = $new_instance['content'];
        $instance['link'] = strip_tags($new_instance['link']);
        $instance['link_target'] = strip_tags($new_instance['link_target']);
        $instance['learn_more_text'] = strip_tags($new_instance['learn_more_text']);
        return $instance;
    }

    public function form($instance) {
        if (empty($instance['title'])) {
            $title = '';
        } else {
            $title = $instance['title'];
        }
        $image_id = esc_attr(isset($instance[$this->image_field]) ? $instance[$this->image_field] : 0 );
        $image = new WidgetImageField($this, $image_id);
        ?>
        <!--        <script>
                function setShowHide(show_on){
                    alert(show_on);
                    if(show_on==='real_food_in_school') {
                            jQuery('#div_headline').hide();
                            jQuery('#div_headline_font_size').hide();
                            jQuery('#div_headline_font_color').hide();
                    } 
                }
                jQuery(document).ready( function(){
                    jQuery('#div_headline').show();
                    jQuery('#div_headline_font_size').show();
                    jQuery('#div_headline_font_color').show();
                    var show_on ="<?php echo $instance['show_on'] ?>";
                    setShowHide(show_on);
                   jQuery('#show_on').change(function() {                    
                        var show_on1 =jQuery(this).val();
                        setShowHide(show_on1);
                   });
                });   
            </script>    -->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
        <?php $checked = ($instance['add_submenu'] == 'on' ? 'checked="true"' : '') ?>
            <input type="checkbox" name="<?php echo $this->get_field_name('add_submenu'); ?>" id="" <?php echo $checked ?>>
            <label for="<?php echo $this->get_field_id('add_submenu'); ?>">Add title as submenu</label>        
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('show_on'); ?>"><?php _e('Show on'); ?>:</label><br/>
            <select name="<?php echo $this->get_field_name('show_on'); ?>" id="<?php echo $this->get_field_id('show_on'); ?>">
                <option value="real_food_for_all" <?php if ($instance['show_on'] == 'real_food_for_all') echo "selected='true'"; ?>><?php _e('Real food for all on Home page'); ?></option>
                <option value="real_food_in_school" <?php if ($instance['show_on'] == 'real_food_in_school') echo "selected='true'"; ?>><?php _e('Real food in school on Home page'); ?></option>
                <option value="real_food_in_store" <?php if ($instance['show_on'] == 'real_food_in_store') echo "selected='true'"; ?>><?php _e('Real food in store on Home page'); ?></option>
                <option value="our_mission" <?php if ($instance['show_on'] == 'our_mission') echo "selected='true'"; ?>><?php _e('Our mission on About page'); ?></option>
                <option value="our_story" <?php if ($instance['show_on'] == 'our_story') echo "selected='true'"; ?>><?php _e('Our story on About page'); ?></option>
                <option value="foot_philosophy" <?php if ($instance['show_on'] == 'foot_philosophy') echo "selected='true'"; ?>><?php _e('Food philosophy on About page'); ?></option>
                <option value="nutritional_education" <?php if ($instance['show_on'] == 'nutritional_education') echo "selected='true'"; ?>><?php _e('Nutritional education on About page'); ?></option>
                <option value="careers" <?php if ($instance['show_on'] == 'careers') echo "selected='true'"; ?>><?php _e('Careers on About page'); ?></option>
                <option value="meals_served" <?php if ($instance['show_on'] == 'meals_served') echo "selected='true'"; ?>><?php _e('Meals served on In Schools page'); ?></option>
                <option value="meal_program" <?php if ($instance['show_on'] == 'meal_program') echo "selected='true'"; ?>><?php _e('Meal program on In Schools page'); ?></option>
                <option value="our_kind_of_partners" <?php if ($instance['show_on'] == 'our_kind_of_partners') echo "selected='true'"; ?>><?php _e('Our kind of partners on In Schools page'); ?></option>
                <option value="in_school_products" <?php if ($instance['show_on'] == 'in_school_products') echo "selected='true'"; ?>><?php _e('In School products on In Schools page'); ?></option>
                <option value="the_buzz" <?php if ($instance['show_on'] == 'the_buzz') echo "selected='true'"; ?>><?php _e('The buzz on In Schools page'); ?></option>
                <option value="new_products" <?php if ($instance['show_on'] == 'new_products') echo "selected='true'"; ?>><?php _e('New products on In Stores page'); ?></option>
                <option value="meal_kits" <?php if ($instance['show_on'] == 'meal_kits') echo "selected='true'"; ?>><?php _e('Meal kits on In Stores page'); ?></option>
            </select>
        </p>
        <div id="div_background_image">
            <label><?php _e('Background Image:'); ?></label>
        <?php echo $image->get_widget_field(); ?>
        </div>
        <p id="div_bg_color">
            <label for="<?php echo $this->get_field_id('bg_color'); ?>"><?php _e('Background Color:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('bg_color'); ?>" name="<?php echo $this->get_field_name('bg_color'); ?>" type="text" value="<?php echo esc_attr($instance['bg_color']); ?>" />
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
        <p id="div_link">
            <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($instance['link']); ?>" />
            <select name="<?php echo $this->get_field_name('link_target'); ?>" id="<?php echo $this->get_field_id('link_target'); ?>">
                <option value="new_window" <?php if ($instance['link_target'] == 'new_window') echo "selected='true'"; ?>><?php _e('New Window'); ?></option>
                <option value="stay_in_window" <?php if ($instance['link_target'] == 'stay_in_window') echo "selected='true'"; ?>><?php _e('Stay in window'); ?></option>
                <option value="pop_up" <?php if ($instance['link_target'] == 'pop_up') echo "selected='true'"; ?>><?php _e('Open popup'); ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('learn_more_text'); ?>"><?php _e('Learn more text:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('learn_more_text'); ?>" name="<?php echo $this->get_field_name('learn_more_text'); ?>" type="text" value="<?php echo esc_attr($instance['learn_more_text']); ?>" />
        </p>
        <?php
    }

}

add_action('widgets_init', create_function('', 'register_widget( "Revfoods_Image_Text" );'));
