<?php
// we can only use this Widget if the plugin is active
if (class_exists('WidgetImageField'))
    add_action('widgets_init', create_function('', "register_widget( 'Revfoods_HomeVideo' );"));

class Revfoods_HomeVideo extends WP_Widget {

    var $image_field = 'image';  // the image field ID

    function __construct() {
        $widget_ops = array(
            'classname' => 'image_otm',
            'description' => __("Revfoods Home Video")
        );
        parent::__construct('image_otm', __('Revfoods Home Video'), $widget_ops);
    }

    function form($instance) {
        $image_id = esc_attr(isset($instance[$this->image_field]) ? $instance[$this->image_field] : 0 );
        $title = esc_attr(isset($instance['title']) ? $instance['title'] : '' );
        $codeembed = esc_attr(isset($instance['codeembed']) ? $instance['codeembed'] : '' );
        $textshowvideo = esc_attr(isset($instance['textshowvideo']) ? $instance['textshowvideo'] : '' );
        $linkshare = esc_attr(isset($instance['linkshare']) ? $instance['linkshare'] : '' );

        $image = new WidgetImageField($this, $image_id);
        ?>
        <div>
            <label><?php _e('Background:'); ?></label>
            <?php echo $image->get_widget_field(); ?>
        </div>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('headline:'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('codeembed'); ?>"><?php _e('codeembed:'); ?>
                <textarea class="widefat" id="<?php echo $this->get_field_id('codeembed'); ?>" name="<?php echo $this->get_field_name('codeembed'); ?>"><?php echo $codeembed; ?></textarea>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('textshowvideo'); ?>"><?php _e('Text Show Video:'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('textshowvideo'); ?>" name="<?php echo $this->get_field_name('textshowvideo'); ?>" type="text" value="<?php echo $textshowvideo; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linkshare'); ?>"><?php _e('Link Share:'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('linkshare'); ?>" name="<?php echo $this->get_field_name('linkshare'); ?>" type="text" value="<?php echo $linkshare; ?>" />
            </label>
        </p>
        <?php
    }

    function widget($args, $instance) {
        extract($args);

        $title = $instance['title'];
        $codeembed = $instance['codeembed'];
        $image_id = $instance[$this->image_field];
        $textshowvideo = $instance['textshowvideo'];
        $linkshare = $instance['linkshare'];

        $image = new WidgetImageField($this, $image_id);

        if (empty($title)) {
            $title = 'Lorem ipsum doloret sit amet consultiteur';
        }
        if (empty($image_id)) {
            $url = get_template_directory_uri() . '/images/bg_homebn.png';
        } else {
            $url = $image->get_image_src('full');
        }
        if (empty($textshowvideo)) {
            $textshowvideo = 'watch video';
        }
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var w =  screen.width;
                var h = w*523/1024;
                jQuery('.homebn.jhome').css('height', h);
            })
        </script>
        <div class="homebn jhome" style="background: transparent url('<?php echo $url; ?>') no-repeat; background-size: cover;">
            <div class="homevideo">
                <span class="close homevideoclose" style="position: absolute;right: -20px;top: -15px;font-weight: bold;color: #FFF;">×</span>
                <?php echo $codeembed;?>
                <!--<iframe width="350" height="200" src="//www.youtube.com/embed/pa2IDTWvRls" frameborder="0" allowfullscreen></iframe>-->
            </div>
            <div class="homebn_right fr">
                <h1 class="homebn_title">
                    <?php echo $title; ?>
                </h1>
                <a href="javascript:void(0)" id="watch-video"><?php echo $textshowvideo;?></a>
            </div>
            <div class="clr"></div>
            <?php if(!empty($linkshare)):?>
            <div class="homesocial">
                <fb:like href="<?php echo $linkshare;?>" send="false" layout="button_count" width="450" show_faces="false" style="width: 100px;"></fb:like>
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $linkshare;?>" data-text="<?php echo get_title_des($linkshare);?>">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                <a href="//pinterest.com/pin/create/button/?url=<?php echo $linkshare;?>" data-pin-do="buttonPin" data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
                <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
            </div>
            <?php endif;?>
        </div>
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['codeembed'] = $new_instance['codeembed'];
        $instance[$this->image_field] = intval(strip_tags($new_instance[$this->image_field]));
        $instance['textshowvideo'] = strip_tags($new_instance['textshowvideo']);
        $instance['linkshare'] = strip_tags($new_instance['linkshare']);

        return $instance;
    }

}