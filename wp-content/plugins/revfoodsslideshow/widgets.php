<?php

class Rev_Foods_SlideShow extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'Rev_Foods_SlideShow', // Base ID
                'Rev_Foods_SlideShow', // Name
                array('description' => 'RevFoods SlideShow')
        );
    }

    public function widget($args, $instance) {
        get_Rev_Foods_SlideShow($instance);
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['add_submenu'] = strip_tags($new_instance['add_submenu']);
        $instance['numbercols'] = strip_tags($new_instance['numbercols']);
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['description'] = strip_tags($new_instance['description']);
        $instance['readmore'] = strip_tags($new_instance['readmore']);
        $instance['titlefontsize'] = strip_tags($new_instance['titlefontsize']);
        $instance['titlecolor'] = strip_tags($new_instance['titlecolor']);
        $instance['bgcolor'] = strip_tags($new_instance['bgcolor']);
        $instance['cate'] = strip_tags($new_instance['cate']);
        $instance['titlesub'] = strip_tags($new_instance['titlesub']);
        return $instance;
    }

    public function form($instance) {
        if (empty($instance['titlesub'])) {
            $titlesub = 'Real Press';
        } else {
            $titlesub = $instance['titlesub'];
        }
        if (empty($instance['numbercols'])) {
            $numbercols = 2;
        } else {
            $numbercols = $instance['numbercols'];
        }
        if (empty($instance['title'])) {
            $title = 'in the media';
        } else {
            $title = $instance['title'];
        }
        if (empty($instance['description'])) {
            $description = '';
        } else {
            $description = $instance['description'];
        }
        if (empty($instance['titlefontsize'])) {
            $titlefontsize = '48px';
        } else {
            $titlefontsize = $instance['titlefontsize'];
        }
        if (empty($instance['titlecolor'])) {
            $titlecolor = '#40ABC3';
        } else {
            $titlecolor = $instance['titlecolor'];
        }

        if (empty($instance['bgcolor'])) {
            $bgcolor = '#fff';
        } else {
            $bgcolor = $instance['bgcolor'];
        }
        if (empty($instance['readmore'])) {
            $readmore = 'Read Artical';
        } else {
            $readmore = $instance['readmore'];
        }
        $cate = $instance['cate'];
        ?>
        <p>
            <?php $checked = ($instance['add_submenu'] == 'on' ? 'checked="true"' : '') ?>
            <input type="checkbox" name="<?php echo $this->get_field_name('add_submenu'); ?>" id="" <?php echo $checked ?>>
            <label for="<?php echo $this->get_field_id('add_submenu'); ?>">Add title as submenu</label>        
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('titlesub'); ?>"><?php _e('Title of submenu:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('titlesub'); ?>" name="<?php echo $this->get_field_name('titlesub'); ?>" type="text" value="<?php echo esc_attr($titlesub); ?>" />
        </p>
        <hr>
        <p>
            <label for="<?php echo $this->get_field_id('cate'); ?>"><?php _e('Select category:'); ?></label> 
            <select id="<?php echo $this->get_field_id('cate'); ?>" name="<?php echo $this->get_field_name('cate'); ?>">
                <option value="" <?php if (empty($cate)) echo 'selected'; ?>></option>
                <?php
                $items = get_terms('revfoodsss_cat', array('hide_empty' => false));
                if (count($items) > 0)
                    foreach ($items as $item) {
                        ?>
                        <option value="<?php echo $item->term_id; ?>" <?php if ($cate == $item->term_id) echo 'selected'; ?>><?php echo $item->name; ?></option>
                    <?php } ?>
            </select>
        </p>
        <hr>
        <p>
            <label for="<?php echo $this->get_field_id('numbercols'); ?>"><?php _e('Number columns:'); ?></label> 
            <select id="<?php echo $this->get_field_id('numbercols'); ?>" name="<?php echo $this->get_field_name('numbercols'); ?>">
                <option value="2" <?php if ($numbercols == 2) echo 'selected'; ?>>2</option>
                <option value="3" <?php if ($numbercols == 3) echo 'selected'; ?>>3</option>
            </select>
        </p>
                <p><label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:'); ?></label></p>
        <p><textarea placeholder="descripton of widgets" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" ><?php echo esc_attr($description); ?></textarea></p>
                <p>
            <label for="<?php echo $this->get_field_id('readmore'); ?>"><?php _e('Read more:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('readmore'); ?>" name="<?php echo $this->get_field_name('readmore'); ?>" type="text" value="<?php echo esc_attr($readmore); ?>" />
        </p>
        <hr>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('titlefontsize'); ?>"><?php _e('Title font Size:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('titlefontsize'); ?>" name="<?php echo $this->get_field_name('titlefontsize'); ?>" type="text" value="<?php echo esc_attr($titlefontsize); ?>" placeholder="Example: 48px" />
        </p>
        <p><label for="<?php echo $this->get_field_id('titlecolor'); ?>"><?php _e('Title color:'); ?></label></p>
        <p><input class="widefat" id="<?php echo $this->get_field_id('titlecolor'); ?>" name="<?php echo $this->get_field_name('titlecolor'); ?>" type="text" value="<?php echo esc_attr($titlecolor); ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('bgcolor'); ?>"><?php _e('Background color:'); ?></label> </p>
        <p><input class="widefat" id="<?php echo $this->get_field_id('bgcolor'); ?>" name="<?php echo $this->get_field_name('bgcolor'); ?>" type="text" value="<?php echo esc_attr($bgcolor); ?>" /></p>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                jQuery('#<?php echo $this->get_field_id('titlecolor'); ?>').wpColorPicker();
                jQuery('#<?php echo $this->get_field_id('bgcolor'); ?>').wpColorPicker();
            });
        </script>
        <?php
    }

}

add_action('widgets_init', create_function('', 'register_widget( "Rev_Foods_SlideShow" );'));

function get_Rev_Foods_SlideShow($instance) {
    $cate = $instance['cate'];
    if (empty($cate))
        $cate = 0;
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'revfoodsslideshow',
        'tax_query' => array(array(
                'taxonomy' => 'revfoodsss_cat',
                'field' => 'id',
                'terms' => $cate
        )));
    $items = get_posts($args);
    if (count($items) > 0) {
        $item0 = $items[0];
        if ((get_field('revfoodsslideshow_option_logo', $item0->ID))) {
            $islogo = true;
        } else {
            $islogo = false;
        }
        $cols = $instance['numbercols'];
        $title2 = true;
        if ((get_field('revfoodsslideshow_option_title', $item0->ID))) {
            $title2 = true;
        } else {
            $title2 = false;
        }
        if ($instance['description'] != '') {
            $des = true;
        } else {
            $des = false;
        }

        if ($islogo) {
            ?>
<!--        <pre>
<?php print_r($items);?>
        </pre>-->
        <div class="RealFoodsInPress" id="<?php echo strtolower(str_replace(" ", "", $instance['titlesub'])); ?>" style="background-color: <?php echo $instance['bgcolor']; ?>;">
                <div class="topdotted">
                    <div class="topdotted_l fl"></div>
                    <span class="titledotted dottedrealfoodsforall"><?php echo $instance['titlesub']; ?></span>
                    <div class="topdotted_r fr"></div>
                </div>
                <div class="clr"></div>
                <style type="text/css">
                    p.presstitle.ftrb{
                        font-size: <?php echo $instance['titlefontsize']; ?>;
                        color: <?php echo $instance['titlecolor']; ?>;
                    }
                </style>
                <p class="presstitle ftrb"><?php echo $instance['title']; ?></p>
                <div id="mcts1">
                    <?php foreach($items as $item){?>
                    <div class="slditem3 i<?php echo $item->ID?>">
                        <style type="text/css">
                            div.slditem3.i<?php echo $item->ID?> div.sldlogo{
                                background: transparent url('<?php echo get_field('revfoodsslideshow_home_logo_grey', $item->ID);?>') center center no-repeat;
                            }
                            div.slditem3.i<?php echo $item->ID?> div.sldlogo:hover{
                                background: transparent url('<?php echo get_field('revfoodsslideshow_home_logo_full', $item->ID);?>') center center no-repeat;;
                            }
                        </style>
                        <div class="sldlogo" style="cursor: pointer;"></div>
                        <div class="clr"></div>
                        <p class="slddes"><?php echo esc_attr($item->post_content);?></p>
                        <a href="<?php echo get_field('revfoodsslideshow_home_external_link', $item->ID);?>" class="lc widgetheaderlink fl" target="_blank"><?php echo $instance['readmore']; ?></a>
                        <span class="learnmore fl"></span>
                    </div>
                    <?php }?>
<!--                    <div class="slditem3">
                        <div class="sldlogo" style="background: transparent url('<?php echo get_template_directory_uri(); ?>/images/itemlogo2.jpg') center center no-repeat;"></div>
                        <p class="slddes">Revolution Foods on making school meals healthier.</p>
                        <a href="" class="lc widgetheaderlink fl">Read Artical</a>
                        <span class="learnmore fl"></span>
                    </div>
                    <div class="slditem3">
                        <div class="sldlogo" style="background: transparent url('<?php echo get_template_directory_uri(); ?>/images/itemlogo3.jpg') center center  no-repeat;"></div>
                        <p class="slddes">Lorem ipsum dolor sit amet consultit eur. Erat sit amet consultiteur lorem. Dolor sit amet erat sit amet.</p>
                        <a href="" class="lc widgetheaderlink fl">Read Artical</a>
                        <span class="learnmore fl"></span>
                    </div>
                    <div class="slditem3">
                        <div class="sldlogo" style="background: transparent url('<?php echo get_template_directory_uri(); ?>/images/itemlogo1.jpg') center center  no-repeat;"></div>
                        <p class="slddes">Revolution Foods listed as one of the World's Most Innovative Companies!</p>
                        <a href="" class="lc widgetheaderlink fl">Read Artical</a>
                        <span class="learnmore fl"></span>
                    </div>-->
                </div>
            </div>
            <?php if ($instance['add_submenu'] == 'on') { ?>
                <script>
                    jQuery(document).ready( function(){
                        var submenu="<?php echo $instance['titlesub']; ?>";
                        var rel="<?php echo strtolower(str_replace(" ", "", $instance['titlesub'])); ?>";
                        jQuery("ul.sub_menu").append("<li class='menu-item'><a rel='"+rel+"' href='#'>"+submenu+"</a></li>");
                        jQuery('.menu-item').click(function(){                        
                            var id =jQuery(this).children('a').attr('rel');
                            jQuery("html, body").animate({ scrollTop: (jQuery('#'+id).offset().top  - 115)}, 1000);                         
                        });
                    });   
                </script>
            <?php } ?>
            <?php
        } elseif ($cols == 2) {
            ?>
            <?php
        } elseif ($cols == 3 && $title2) {
            ?>
            <?php
        } elseif ($cols == 3 && $des) {
            $s = 'Programs we serve: District Schools, Charter Schools, Private Schools, Parochial Schools, After School Programs, Summer School Programs, Child Development Programs Lorem iosum dolor sit amet consultiteur. Lorem iosum dolor sit amet consultiteur.';
            ?>
            <?php
        } else {
            ?>
            <?php
        }
    }
}