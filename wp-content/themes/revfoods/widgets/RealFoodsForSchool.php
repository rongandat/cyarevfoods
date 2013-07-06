<?php
class Revfoods_RealFoodsForSchool extends WP_Widget {
    var $image_field = 'image';  // the image field ID
    
    public function __construct() {
        parent::__construct(
                'Revfoods_RealFoodsForSchool', // Base ID
                'Revfoods_RealFoodsForSchool', // Name
                array('description' => 'Revfoods Real Foods For School')
        );
    }

    public function widget($args, $instance) {
        extract( $args );  
        //get_RealFoodsForAll($instance);
        $image_id   = $instance[$this->image_field];
        $image      = new WidgetImageField( $this, $image_id );
    ?>
    <style>
        .RealFoodsInSchool{
            height: 650px;
            background: #F6F6F6 url("<?php echo $image->get_image_src( 'full' ); ?>")  repeat-x;
        }
        .RealFoodsInSchool .widgetstitleschool {
            margin: 30px 0px 30px 70px;
            width: 288px;
            height: 288px;
            background: transparent;
            border-radius: 144px;
         }
         .RealFoodsInSchool .title_inschool_1 {
            font-family: 'futurab';
            text-transform: uppercase;
            width: 100px;
            font-weight: bold;
            display: inline-block;
            padding: 45px 40px 0px 65px;
         }
     
    </style>
    <?php    
    if($instance['add_submenu']=='on'){?>
    <script>
        jQuery(document).ready( function(){
            var submenu="<?php echo $instance['title'];?>";
           jQuery("ul.sub_menu").append("<li class='menu-item'><a rel='RealFoodsInSchool' href='#'>"+submenu+"</a></li>");
           jQuery('.menu-item').click(function(){                        
                var id =jQuery(this).children('a').attr('rel');
                jQuery("html, body").animate({ scrollTop: (jQuery('#'+id).offset().top  - 115)}, 1000);                         
           });
        });   
    </script>
    <?php }?>
    <div class="RealFoodsInSchool" id="RealFoodsInSchool">
    <div class="topdotted">
        <div class="topdotted_l fl"></div>
        <span class="titledotted dottedrealfoodsforall"><?php echo $instance['title'];?></span>
        <div class="topdotted_r fr"></div>
        </div>
        <div class="clr"></div>
        <div class="widgetstitleschool lc">
            <span class="title_inschool_1"></span>
            <span class="title_inschool_2"></span>
        </div>
        <p class="gtbook widgetheaderdes inschool">
            <?php echo $instance['content'];?>
        </p>
        <a href="<?php echo $instance['link'];?>" class="lc widgetheaderlink fl"><?php echo $instance['learn_more_text'];?></a><span class="learnmore fl"></span>
    </div>
    <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['add_submenu'] = strip_tags( $new_instance['add_submenu'] );
        $instance[$this->image_field]    = intval( strip_tags( $new_instance[$this->image_field] ) );
//        $instance['headline'] = strip_tags($new_instance['headline']);
//        $instance['headline_font_size'] = strip_tags($new_instance['headline_font_size']);
//        $instance['headline_font_color'] = strip_tags($new_instance['headline_font_color']);
        $instance['content'] = strip_tags($new_instance['content']);
        $instance['link'] = strip_tags($new_instance['link']);
        $instance['learn_more_text'] = strip_tags($new_instance['learn_more_text']);
        return $instance;
    }

    public function form($instance) {
        if (empty($instance['title'])) {
            $title = '';
        } else {
            $title = $instance['title'];
        }
        $image_id   = esc_attr( isset( $instance[$this->image_field] ) ? $instance[$this->image_field] : 0 );
        $image      = new WidgetImageField( $this, $image_id );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <?php $checked=($instance['add_submenu']=='on'?'checked="true"':'')?>
            <input type="checkbox" name="<?php echo $this->get_field_name('add_submenu'); ?>" id="" <?php echo $checked?>>
          <label for="<?php echo $this->get_field_id('add_submenu'); ?>">Add title as submenu</label>        
        </p>
        <div>
            <label><?php _e( 'Background Image:' ); ?></label>
            <?php echo $image->get_widget_field(); ?>
        </div>
<!--        <p>
            <label for="<?php echo $this->get_field_id('headline'); ?>"><?php _e('Headline:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('headline'); ?>" name="<?php echo $this->get_field_name('headline'); ?>" type="text" value="<?php echo esc_attr($instance['headline']); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('headline_font_size'); ?>"><?php _e('Font size of headline:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('headline_font_size'); ?>" name="<?php echo $this->get_field_name('headline_font_size'); ?>" type="text" value="<?php echo esc_attr($instance['headline_font_size']); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('headline_font_color'); ?>"><?php _e('Font color of headline:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('headline_font_color'); ?>" name="<?php echo $this->get_field_name('headline_font_color'); ?>" type="text" value="<?php echo esc_attr($instance['headline_font_color']); ?>" />
        </p>-->
        <p>
            <label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Content:'); ?></label> 
            <textarea rows="8" class="widefat" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo format_to_edit($instance['content']); ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($instance['link']); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('learn_more_text'); ?>"><?php _e('Learn more text:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('learn_more_text'); ?>" name="<?php echo $this->get_field_name('learn_more_text'); ?>" type="text" value="<?php echo esc_attr($instance['learn_more_text']); ?>" />
        </p>
        <?php
    }

}

add_action('widgets_init', create_function('', 'register_widget( "Revfoods_RealFoodsForSchool" );'));
