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
        extract( $args );  
        //get_RealFoodsForAll($instance);
        $image_id   = $instance[$this->image_field];
        $image      = new WidgetImageField( $this, $image_id );
    ?>
    <?php    
    if($instance['add_submenu']=='on'){?>
    <script>
        jQuery(document).ready( function(){
            var submenu="<?php echo $instance['title'];?>";
            var rel="<?php echo $instance['show_on']?>";
           jQuery("ul.sub_menu").append("<li class='menu-item'><a rel='"+rel+"' href='#'>"+submenu+"</a></li>");
           jQuery('.menu-item').click(function(){                        
                var id =jQuery(this).children('a').attr('rel');
                jQuery("html, body").animate({ scrollTop: (jQuery('#'+id).offset().top  - 115)}, 1000);                         
           });
        });   
    </script>
    <?php }?>
    <?php 
    if($instance['show_on']=='real_food_for_all'){?>
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
    <div class="RealFoodsForAll" id="<?php echo $instance['show_on']?>">
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
        <a href="<?php echo $instance['link']?>" <?php if($instance['link_target']=='new_window') echo 'target="_blank"'?> class="lc widgetheaderlink fl"><?php echo $instance['learn_more_text'];?></a><span class="learnmore fl"></span>
    </div>
    <div class="clr"></div>
    <?php
        }
        if($instance['show_on']=='real_food_in_school'){?>
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
            <div class="RealFoodsInSchool" id="<?php echo $instance['show_on']?>">
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
                <a href="<?php echo $instance['link'];?>" <?php if($instance['link_target']=='new_window') echo 'target="_blank"'?>  class="lc widgetheaderlink fl"><?php echo $instance['learn_more_text'];?></a><span class="learnmore fl"></span>
            </div>
        <?php
        }
        if($instance['show_on']=='real_food_in_store'){?>
            <style>
                .RealFoodsInStore{
                    background: transparent url("<?php echo $image->get_image_src( 'full' ); ?>")  no-repeat;
                    height: 650px;
                }
                .RealFoodsInStore .headline_instore{
                    font-family: 'futurab';
                    text-transform: lowercase;
                    color: <?php echo $instance['headline_font_color']?>;
                    width: 400px;
                    display: inline-block;
                    font-size: <?php echo $instance['headline_font_size']?>;
                    font-weight: bold;
                    margin: 60px 0px 0px 507px;
                    float: left;
                }

            </style>
            <div class="RealFoodsInStore" id="<?php echo $instance['show_on']?>">
                <div class="topdotted">
                <div class="topdotted_l fl"></div>
                <span class="titledotted dottedrealfoodsforall"><?php echo $instance['title'];?></span>
                <div class="topdotted_r fr"></div>
                </div>
                <div class="clr"></div>
                    <span class="headline_instore"><?php echo $instance['headline'];?></span>
                    <div class="clr"></div>
                <p class="gtbook widgetheaderdes instore fl">
                    <?php echo $instance['content'];?>
                </p>
                <div class="clr"></div>
                <a href="<?php echo $instance['link'];?>" <?php if($instance['link_target']=='new_window') echo 'target="_blank"'?> class="lc widgetheaderlink instore fl"><?php echo $instance['learn_more_text'];?></a><span class="learnmore fl"></span>
            </div>
        <?php
        }
        if($instance['show_on']=='our_mission'){?>
            <style>
                #our_mission {
                    background-color: <?php echo $instance['bg_color']?>;
                    height: 520px;
                }              
                #our_mission .om_content p {
                    color: <?php echo $instance['headline_font_color']?>;
                    font-size: <?php echo $instance['headline_font_size']?>;
                    font-family: gothambook;
                 }
                 
            </style>
            <div id="<?php echo $instance['show_on']?>">
                <div class="om_content">
                    <p><?php echo $instance['headline'];?></p>
                    <div class="om_description">
                        <?php echo $instance['content'];?>
                    </div>
                    <a href="<?php echo $instance['link'];?>" <?php if($instance['link_target']=='new_window') echo 'target="_blank"'?> class="om_join_revolution"><?php echo $instance['learn_more_text'];?></a>
                </div>
            </div>
            <div class="clear"></div>
        <?php
        }
        if($instance['show_on']=='our_story'){?>
            <style>
                #our_story {
                    background: <?php echo $instance['bg_color']?>;
                    height: 655px;
                }
                #our_story h1 {
                    font-size: <?php echo $instance['headline_font_size']?>;
                    font-family: futurabold;
                    color: <?php echo $instance['headline_font_color']?>;
                }
            </style>
                
            <div id="<?php echo $instance['show_on']?>">
                <div class="about_topdotted"><span class="titledotted1 dottedour_story"><?php echo $instance['title'];?></span></div>
                <div class="main_image">
                    <img src="<?php echo $image->get_image_src( 'full' ); ?>"/>
                </div>

                <div class="main_content">
                    <h1><?php echo $instance['headline'];?></h1>
                    <?php echo $instance['content'];?>
                </div>
            </div>
            <div class="clear"></div>
        <?php
        }
        if($instance['show_on']=='foot_philosophy'){?>
            <style>
                #foot_philosophy {
                    background: url('<?php echo $image->get_image_src( "full" ); ?>') no-repeat top left;
                    height: 583px;
                }
                #foot_philosophy .main_content h1 {
                    font-size: <?php echo $instance['headline_font_size']?>;
                    color: <?php echo $instance['headline_font_color']?>;
                    font-family: futurabold;
                }
            </style>
            <div id="foot_philosophy">
                <div class="about_topdotted"><span class="titledotted1 dottedour_story"><?php echo $instance['title'];?></span></div>
                <div class="main_content">
                    <h1><?php echo $instance['headline'];?></h1>
                    <?php echo $instance['content'];?>
                    <a href="<?php echo $instance['link'];?>" <?php if($instance['link_target']=='new_window') echo 'target="_blank"'?> class="foot_philosophy_href"><?php echo $instance['learn_more_text'];?></a>
                </div>
                <div class="clear"></div>
            </div>
        <?php
        }
        if($instance['show_on']=='nutritional_education'){?>
            <style>
                #nutritional_education {
                    background: <?php echo $instance['bg_color'];?>;
                    height: 645px;
                    position: relative;
                 }
                #nutritional_education .main_content h1 {
                    font-family: futurabold;
                    color: <?php echo $instance['headline_font_color']?>;
                    font-size: <?php echo $instance['headline_font_size']?>;
                }
            </style>
            <div id="<?php echo $instance['show_on']?>">
                <div class="about_topdotted"><span class="titledotted1 dottedour_story"><?php echo $instance['title'];?></span></div>
                <div class="main_image">
                    <img src='<?php echo $image->get_image_src( "full" ); ?>'/>
                </div>

                <div class="main_content">
                    <h1><?php echo $instance['headline'];?></h1>
                    <?php echo $instance['content'];?>
                </div>
            </div>
        <?php
        }
        if($instance['show_on']=='careers'){?>
            <style>
                #careers {
                    background: url('<?php echo $image->get_image_src( "full" ); ?>') no-repeat left top;
                    height: 655px;
                }
                #careers .main_content h1 {
                    font-size: <?php echo $instance['headline_font_size']?>;
                    font-family: futurabold;
                    color: <?php echo $instance['headline_font_color']?>;
                }
            </style>
            <div id="careers">
                    <div class="about_topdotted">
                        <div class="left-topdotted"></div>
                        <span class="titledotted1 dottedour_story"><?php echo $instance['title'];?></span>
                        <div class="right-topdotted"></div>
                    </div>
                    <div class="main_content">
                        <div class="content_text">
                            <h1><?php echo $instance['headline'];?></h1>
                    <?php echo $instance['content'];?>
                            <a href="<?php echo $instance['link'];?>" <?php if($instance['link_target']=='new_window') echo 'target="_blank"'?> class="careers_href"><?php echo $instance['learn_more_text'];?></a>
                        </div>
                    </div>
                </div>
        <?php
        }
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['add_submenu'] = strip_tags( $new_instance['add_submenu'] );
        $instance['show_on'] = strip_tags( $new_instance['show_on'] );
        $instance[$this->image_field]    = intval( strip_tags( $new_instance[$this->image_field] ) );
        $instance['bg_color'] = strip_tags( $new_instance['bg_color'] );
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
        $image_id   = esc_attr( isset( $instance[$this->image_field] ) ? $instance[$this->image_field] : 0 );
        $image      = new WidgetImageField( $this, $image_id );
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
                var show_on ="<?php echo $instance['show_on']?>";
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
            <?php $checked=($instance['add_submenu']=='on'?'checked="true"':'')?>
            <input type="checkbox" name="<?php echo $this->get_field_name('add_submenu'); ?>" id="" <?php echo $checked?>>
          <label for="<?php echo $this->get_field_id('add_submenu'); ?>">Add title as submenu</label>        
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('show_on'); ?>"><?php _e('Show on'); ?>:</label><br/>
	<select name="<?php echo $this->get_field_name('show_on'); ?>" id="<?php echo $this->get_field_id('show_on'); ?>">
		<option value="real_food_for_all" <?php if($instance['show_on']=='real_food_for_all') echo "selected='true'";?>><?php _e('Real food for all on Home page'); ?></option>
		<option value="real_food_in_school" <?php if($instance['show_on']=='real_food_in_school') echo "selected='true'";?>><?php _e('Real food in school on Home page'); ?></option>
                <option value="real_food_in_store" <?php if($instance['show_on']=='real_food_in_store') echo "selected='true'";?>><?php _e('Real food in store on Home page'); ?></option>
                <option value="our_mission" <?php if($instance['show_on']=='our_mission') echo "selected='true'";?>><?php _e('Our mission on About page'); ?></option>
                <option value="our_story" <?php if($instance['show_on']=='our_story') echo "selected='true'";?>><?php _e('Our story on About page'); ?></option>
                <option value="foot_philosophy" <?php if($instance['show_on']=='foot_philosophy') echo "selected='true'";?>><?php _e('Foot philosophy on About page'); ?></option>
                <option value="nutritional_education" <?php if($instance['show_on']=='nutritional_education') echo "selected='true'";?>><?php _e('Nutritional education on About page'); ?></option>
                <option value="careers" <?php if($instance['show_on']=='careers') echo "selected='true'";?>><?php _e('Careers on About page'); ?></option>
	</select>
        </p>
        <div id="div_background_image">
            <label><?php _e( 'Background Image:' ); ?></label>
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
		<option value="new_window" <?php if($instance['link_target']=='new_window') echo "selected='true'";?>><?php _e('New Window'); ?></option>
		<option value="stay_in_window" <?php if($instance['link_target']=='stay_in_window') echo "selected='true'";?>><?php _e('Stay in window'); ?></option>
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
