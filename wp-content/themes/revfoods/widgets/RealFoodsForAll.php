<?php
class Revfoods_RealFoodsForAll extends WP_Widget {
    var $image_field = 'image';  // the image field ID
    
    public function __construct() {
        parent::__construct(
                'Revfoods_RealFoodsForAll', // Base ID
                'Revfoods_RealFoodsForAll', // Name
                array('description' => 'Revfoods Real Foods For All')
        );
    }

    public function widget($args, $instance) {
        extract( $args );  
        //get_RealFoodsForAll($instance);
        $image_id   = $instance[$this->image_field];
        $image      = new WidgetImageField( $this, $image_id );
    ?>
    <style>
        .RealFoodsForAll{
            height: 650px;
            background: #fff;
            background: #F6F6F6 url("<?php echo $image->get_image_src( 'full' ); ?>")  repeat-x;
        }
        .RealFoodsForAll .widget_header {
            font-family: 'futurab';
            font-size: <?php echo $instance['headline_font_size']?>;
            font-weight: bold;
            color: <?php echo $instance['headline_font_color']?>;
            width: 400px;
            height: 165px;
            margin: 150px 0px 0px 70px;
         }
         .RealFoodsForAll .widgetheader_content{
            color: #333;
            font-size: 13px;
            line-height: 18px;
            width: 280px;
            height: 100px;
            margin: 0px 0px 0px 70px;
        }
 
    </style>
    <?php    
    if($instance['add_submenu']=='on'){?>
    <script>
        jQuery(document).ready( function(){
            var submenu="<?php echo $instance['title'];?>";
           jQuery("ul.sub_menu").append("<li class='menu-item'><a rel='RealFoodsForAll' href='#'>"+submenu+"</a></li>");
           jQuery('.menu-item').click(function(){                        
                var id =jQuery(this).children('a').attr('rel');
                jQuery("html, body").animate({ scrollTop: (jQuery('#'+id).offset().top  - 115)}, 1000);                         
           });
        });   
    </script>
    <?php }?>
    <div class="RealFoodsForAll" id="RealFoodsForAll">
        <div class="topdotted">
            <div class="topdotted_l fl"></div>
            <span class="titledotted dottedrealfoodsforall"><?php echo $instance['title']?></span>
            <div class="topdotted_r fr"></div>
        </div>
        <div class="clr"></div>
        <h1 class="widget_header lc"><?php echo $instance['headline']?></h1>
        <p class="gtbook widgetheader_content">
            <?php echo $instance['content']?>
        </p>
        <a href="<?php echo $instance['link']?>" class="lc widgetheaderlink fl"><?php echo $instance['learn_more_text'];?></a><span class="learnmore fl"></span>
    </div>
    <div class="clr"></div>
    <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['add_submenu'] = strip_tags( $new_instance['add_submenu'] );
        $instance[$this->image_field]    = intval( strip_tags( $new_instance[$this->image_field] ) );
        $instance['headline'] = strip_tags($new_instance['headline']);
        $instance['headline_font_size'] = strip_tags($new_instance['headline_font_size']);
        $instance['headline_font_color'] = strip_tags($new_instance['headline_font_color']);
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
        <p>
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
        </p>
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

add_action('widgets_init', create_function('', 'register_widget( "Revfoods_RealFoodsForAll" );'));
