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
        $instance['description'] = $new_instance['description'];
        $instance['readmore'] = strip_tags($new_instance['readmore']);
        $instance['titlefontsize'] = strip_tags($new_instance['titlefontsize']);
        $instance['titlecolor'] = strip_tags($new_instance['titlecolor']);
        $instance['bgcolor'] = strip_tags($new_instance['bgcolor']);
        $instance['cate'] = strip_tags($new_instance['cate']);
        $instance['titlesub'] = strip_tags($new_instance['titlesub']);
        $instance['iconnav'] = strip_tags($new_instance['iconnav']);
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
                <option value="1" <?php if ($numbercols == 1) echo 'selected'; ?>>1</option>
                <option value="2" <?php if ($numbercols == 2) echo 'selected'; ?>>2</option>
                <option value="3" <?php if ($numbercols == 3) echo 'selected'; ?>>3</option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('iconnav'); ?>"><?php _e('icon next/Previous type:'); ?></label> 
            <select id="<?php echo $this->get_field_id('iconnav'); ?>" name="<?php echo $this->get_field_name('iconnav'); ?>">
                <option value="1" <?php if ($instance['iconnav'] == 1) echo 'selected'; ?>>1</option>
                <option value="2" <?php if ($instance['iconnav'] == 2) echo 'selected'; ?>>2</option>
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
        'orderby'         => 'menu_order',
        'order'         => 'ASC',
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
        $isprd = true;
        if ((get_field('revfoodsslideshow_option_product', $item0->ID))) {
            $isprd = true;
        } else {
            $isprd = false;
        }
        if ($instance['description'] != '') {
            $des = true;
        } else {
            $des = false;
        }
        if (count($items) % $cols) {
            $n = $cols - count($items) % $cols;
            for ($j = 0; $j < $n; $j++) {
                $items[] = $items[$j];
            }
        }
        $i = 1;
        if ($islogo) {
            ?>
            <div class="clr"></div>
            <div class="RealFoodsInPress jhome" id="<?php echo strtolower(str_replace(" ", "", $instance['titlesub'])); ?>" style="background-color: <?php echo $instance['bgcolor']; ?>;">
<!--                <div class="topdotted">
                    <div class="topdotted_l fl"></div>
                    <span class="titledotted dottedrealfoodsforall"><?php echo $instance['titlesub']; ?></span>
                    <div class="topdotted_r fr"></div>
                </div>-->
                <div class="about_topdotted"><span class="titledotted1 dottedour_story" style="background-color: <?php echo $instance['bgcolor']; ?>;"><?php echo $instance['title']; ?></span></div>
                <div class="clr"></div>
                <p class="presstitle ftrb" style="color: <?php echo $instance['titlecolor']; ?>; font-size: <?php echo $instance['titlefontsize']; ?>;"><?php echo $instance['title']; ?></p>
                <div id="mcts1" class="mctsall <?php if ($instance['iconnav'] == 2) echo 'mctnav2'; ?>">
                    <!--<div>-->
                        <?php foreach ($items as $item) { ?>
                            <div class="slditem3 i<?php echo $item->ID ?>">
                                <style type="text/css">
                                    div.slditem3.i<?php echo $item->ID ?> div.sldlogo{
                                        background: transparent url('<?php echo get_field('revfoodsslideshow_home_logo_grey', $item->ID); ?>') center center no-repeat;
                                    }
                                    div.slditem3.i<?php echo $item->ID ?> div.sldlogo:hover{
                                        background: transparent url('<?php echo get_field('revfoodsslideshow_home_logo_full', $item->ID); ?>') center center no-repeat;;
                                    }
                                </style>
                                <div class="sldlogo" style="cursor: pointer;"></div>
                                <div class="clr"></div>
                                <div class="slddes"><?php echo $item->post_content; ?></div>
                                <a href="<?php echo get_field('revfoodsslideshow_home_external_link', $item->ID); ?>" class="lc widgetheaderlink fl" target="_blank"><?php echo $instance['readmore']; ?></a>
                                <span class="learnmore fl"></span>
                            </div>
                            <?php // if ($i % $cols == 0 || $i == count($items)) { ?>
                            <!--</div>-->
                            <?php // if ($i < count($items)) { ?>
                                <!--<div>-->
                                <?php // } ?>
                            <?php // }$i++; ?>
                        <?php } ?>

                    </div>
                </div>

                <?php
            } elseif ($isprd) {
                // product
                ?>
            
                <div class="fk1" style="display: none; top: 0; left: 0;width: 100%; height: 100%; background: #000; opacity: 0.8; position: fixed; z-index: 500"></div>
                <div class="fk2" style=" display: none; top: 50px; left: 50%; margin-left: -475px; width: 950px; height: 550px; background: #EAEBEB; position: fixed; z-index: 600">
                    <button  style="font-size: 46px; padding: 10px;" type="button" class="close fkclose" data-dismiss="modal" aria-hidden="true">×</button>
                    <div id="m_cts1_1" class="mctsall insc prd " style="background-image: none; width: 85%; margin-top: 30px;">
                        <div style="display: block; position: relative; width: 100%; height: 550px;">
                            <div style="display: block; /*width: 3040px; position: absolute;*/">
                                <?php $k = 0; ?>
                                <?php foreach ($items as $item) { ?>
                                    <div data-name="<?php echo $k; ?>" class="item item<?php echo $k; ?>" style="display: none; float: left; width: 100%;">
                                        <div style="display: block;">
                                            <div class="slditem1 sldprd" style="left: 0px;">
                                                <div class="fl p50" style="background: transparent url('<?php echo get_field('revfoodsslideshow_prd_thumb', $item->ID); ?>') no-repeat 50% 50%;background-size: contain; height: 400px;">
                                                    <img class="imgprd imgnutri hide" src="<?php echo get_field('revfoodsslideshow_prd_nutrition', $item->ID); ?>" />
                                                    <img class="imgprd imging hide" src="<?php echo get_field('revfoodsslideshow_prd_ing', $item->ID); ?>" style="padding-top: 40px;"/>
                                                </div>
                                                <div class="fr p50" style="">
                                                    <h3 style="color: <?php echo get_field('revfoodsslideshow_title_one_color', $item->ID); ?>;">
                                                        <?php echo $item->post_title; ?>
                                                    </h3>
                                                    <div class="slddes jus" style="min-height: 180px;">
                                                        <?php echo $item->post_content;?>
                                                    </div>
                                                    <div class="clr"></div>
                                                    <p>
                                                        <a  href="javascript:void(0);" target="_blank" class="nutrition lc widgetheaderlink fl"><?php _e('nutrition info'); ?></a>
                                                        <span class="learnmore fl"></span>
                                                        <a href="javascript:void(0);" target="_blank" class="ingredients lc widgetheaderlink fl" style="padding-left: 40px;"><?php _e('ingredients'); ?></a>
                                                        <span class="learnmore fl"></span>
                                                    </p>

                                                    <?php 
                                                        $so = _social_info($item->post_name)
                                                    ?>
                                                    <?php // if (!empty($linkshare)): ?>
                                                    <?php // echo $so['fb-url']; ?>
                                                        <div class="homesocial_instore" style="clear: both;">
                                                            <fb:like href="<?php echo $so['fb-url']; ?>" send="false" layout="button_count" width="350" show_faces="false" style="width: 100px;"></fb:like>
                                                            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $so['fb-url']; ?>/#RealFoodForAll" data-text="<?php echo $so['tw']; ?>">Tweet</a>
                                                            <a href="//pinterest.com/pin/create/button/?url=<?php echo $so['pin-url']; ?>&media=<?php echo get_template_directory_uri(); ?>/images/<?php echo $so['pin-img']; ?>&description=<?php echo $so['pin-des']; ?>" data-pin-do="buttonPin" data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
                                                            
                                                        </div>
                                                    <?php // endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $k++; ?>
                                <?php } ?>
                            </div>
                            <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                        </div>
                        <input id="curent_s" value="0" type="hidden"/>
                        <a class="navPrev" onselectstart="return false"></a>
                        <a class="navPlay" onselectstart="return false" title="Play"></a>
                        <a class="navNext" onselectstart="return false"></a>
                    </div>
                </div>
                <script>
                    jQuery(document).ready( function(){
                        cur_s = jQuery('#curent_s').val();
                        function setcur(i){
                            if(i){
                                if(cur_s==3){
                                    cur_s=0;
                                }else{
                                    cur_s++;
                                }
                            }else{
                                if(cur_s==0){
                                    cur_s=3;
                                }else{
                                    cur_s--;
                                }
                            }
                        }
                        fix_ff_ie();
                        function fix_ff_ie(){
                            jQuery('.fb_iframe_widget > span').css('width','100px');
                            jQuery('.fb_iframe_widget > span').css('height','20px');
                            jQuery('.fb_iframe_widget > span .fb_ltr').css('width','100px');
                            jQuery('.fb_iframe_widget > span .fb_ltr').css('height','20px');
                        }
                        function showpopp(){
                            jQuery('.fk1').fadeIn("slow");
                            jQuery('.fk2').fadeIn("slow");
                            fix_ff_ie();
                        }
                        jQuery('.fkclose').click(function(){
                            jQuery('.fk1').fadeOut("slow");
                            jQuery('.fk2').fadeOut("slow");
                        });
                        jQuery('#m_cts1_1 a.navPrev').click(function(){
                            jQuery('#m_cts1_1 .item').hide();
                            setcur(0);
                            jQuery('#m_cts1_1 .item'+cur_s).fadeIn("slow");
                            fix_ff_ie();
                        });
                        jQuery('#m_cts1_1 a.navNext').click(function(){
                            jQuery('#m_cts1_1 .item').hide();
                            setcur(1);
                            jQuery('#m_cts1_1 .item'+cur_s).fadeIn("slow");
                            fix_ff_ie();
                        });
                        function showitem(i){
                            jQuery('#m_cts1_1 .item').hide();
                            jQuery('#m_cts1_1 .item'+i).fadeIn("slow");
                            fix_ff_ie();
                        }
                        jQuery('.nutrition').live('click',function(e){
                            e.preventDefault();
                            jQuery(this).parent().parent().siblings('.fl.p50').find('.imging').hide();
                            var s = jQuery(this).parent().parent().siblings('.fl.p50').find('.imgnutri').css('display');
                            if(s=='none'){
                                jQuery(this).parent().parent().siblings('.fl.p50').find('.imgnutri').show();
                            }else{
                                jQuery(this).parent().parent().siblings('.fl.p50').find('.imgnutri').hide();
                            }
                                                                                                                                                                                                                                                                                                                                            
                        })
                        jQuery('.ingredients').live('click',function(e){
                            e.preventDefault();
                            jQuery(this).parent().parent().siblings('.fl.p50').find('.imgnutri').hide();
                            var s = jQuery(this).parent().parent().siblings('.fl.p50').find('.imging').css('display');
                            if(s=='none'){
                                jQuery(this).parent().parent().siblings('.fl.p50').find('.imging').show();
                            }else{
                                jQuery(this).parent().parent().siblings('.fl.p50').find('.imging').hide();
                            }
                        })                                                                                                                                                                                                            
                        jQuery('#modal').click(function(){
                            showpopp()
                            showitem(0);
                        })
                                                                                                                                                                                                                
                        jQuery('.prditem').click(function(){
                            showpopp();
                        })
                        jQuery('.prditem1').click(function(){
                            showitem(0);
                        })
                        jQuery('.prditem2').click(function(){
                            showitem(1);
                        })
                        jQuery('.prditem3').click(function(){
                            showitem(2);
                                                                                
                        })
                        jQuery('.prditem4').click(function(){
                            showitem(3);
                                                                                
                        })
                    })
                </script>
                <div class="clr"></div>
                
                <div class = "where_we_server" id = "<?php echo strtolower(str_replace(" ", "", $instance['titlesub'])); ?>" style = "background-color: <?php echo $instance['bgcolor']; ?>;">
                    <div class="info">
                        <p class="presstitle ftrb" style="padding-bottom: 0;font-size: <?php echo $instance['titlefontsize']; ?>;color: <?php echo $instance['titlecolor']; ?>;"><?php echo $instance['title']; ?></p>
                        <p class="deswhere">
                            <?php echo $instance['description']; ?>
                            <span style="display: block; padding: 10px 0px;"><a href="javascript:void(0);" target="_blank" class="foot_philosophy_href" id="modal"><?php echo $instance['readmore']; ?></a></span>
                        </p>
                    </div>
                    <div class="prditems" style="text-align: center;">
                        <div style="display: inline-block; min-width: 903px;">
                            <?php
                            $k = 0;
                            foreach ($items as $item) {
                                ?>
                                <div data-name="<?php echo $k++; ?>" class="prditem prditem<?php echo $k; ?>" style="background: transparent url('<?php echo get_field('revfoodsslideshow_prd_thumb', $item->ID); ?>') no-repeat 50% 50%;background-size: contain;"></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- Break -->
                <?php
            } elseif ($cols == 2) {
                ?>
                <div class="clr"></div>
                <div id="leadership" style="background-color: <?php echo $instance['bgcolor']; ?>;" id = "<?php echo strtolower(str_replace(" ", "", $instance['titlesub'])); ?>">
                    <div class="topdotted">
                        <div class="topdotted_l fl"></div>
                        <span class="titledotted dottedrealfoodsforall"><?php echo $instance['titlesub']; ?></span>
                        <div class="topdotted_r fr"></div>
                    </div>
                    <div class="clr"></div>
                    <style type="text/css">
                        #leadership #mcts1 .navNext,
                        #leadership #mcts1 .navPrev {
                            top: 80px;
                        }
                    </style>
                    <p class="presstitle ftrb" style="color: <?php echo $instance['titlecolor']; ?>; font-size: <?php echo $instance['titlefontsize']; ?>;"><?php echo $instance['title']; ?></p>
                    <div id="mcts1" class="mctsall <?php if ($instance['iconnav'] == 2) echo 'mctnav2'; ?>">
                        <!--<div>-->
                            <?php foreach ($items as $item) { ?>
                                <div class="slditem2">
                                    <h3 style="color: <?php echo get_field('revfoodsslideshow_title_one_color', $item->ID); ?>;">
                                        <?php echo $item->post_title; ?>
                                    </h3>
                                    <div class="meta-des" style="color: <?php echo get_field('revfoodsslideshow_title_two_color', $item->ID); ?>;">
                                        <?php echo get_field('revfoodsslideshow_title_two', $item->ID); ?>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="slddes jus"><?php echo $item->post_content; ?></div>
                                </div>
                                <?php // if ($i % $cols == 0 || $i == count($items)) { ?>
                                <!--</div>-->
                                <?php // if ($i < count($items)) { ?>
                                    <!--<div>-->
                                    <?php // } ?>
                                <?php // }$i++; ?>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="clr"></div>
                    <?php
                } elseif ($cols == 3 && $title2) {
                    ?>
                    <div id="leadership" style="background-color: <?php echo $instance['bgcolor']; ?>;" id = "<?php echo strtolower(str_replace(" ", "", $instance['titlesub'])); ?>">
                        <p class="presstitle ftrb" style="color: <?php echo $instance['titlecolor']; ?>; font-size: <?php echo $instance['titlefontsize']; ?>;"><?php echo $instance['title']; ?></p>
                        <div id="mcts2" class="mctsall <?php if ($instance['iconnav'] == 2) echo 'mctnav2'; ?>">
                            <!--<div>-->
                                <?php foreach ($items as $item) { ?>
                                    <div class="slditem3">
                                        <h3 style="color: <?php echo get_field('revfoodsslideshow_title_one_color', $item->ID); ?>;">
                                            <?php echo $item->post_title; ?>
                                        </h3>
                                        <div class="meta-des" style="color: <?php echo get_field('revfoodsslideshow_title_two_color', $item->ID); ?>;">
                                            <?php echo get_field('revfoodsslideshow_title_two', $item->ID); ?>
                                        </div>
                                        <div class="clr"></div>
                                        <div class="slddes jus"><?php echo $item->post_content; ?></div>
                                    </div>
                                    <?php // if ($i % $cols == 0 || $i == count($items)) { ?>
                                    <!--</div>-->
                                    <?php // if ($i < count($items)) { ?>
                                        <!--<div>-->
                                        <?php // } ?>
                                    <?php // }$i++; ?>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="clr"></div>
                        <?php
                    } elseif ($cols == 3 && $des) {
                        ?>
                        <div class = "where_we_server" id = "<?php echo strtolower(str_replace(" ", "", $instance['titlesub'])); ?>" style = "background-color: <?php echo $instance['bgcolor']; ?>;">
<!--                            <div class = "topdotted">
                                <div class = "topdotted_l fl"></div>
                                <span class = "titledotted dottedrealfoodsforall"><?php echo $instance['titlesub']; ?></span>
                                <div class="topdotted_r fr"></div>
                            </div>-->
<div class="about_topdotted"><span class="titledotted1 dottedour_story" style = "background-color: <?php echo $instance['bgcolor']; ?>;"><?php echo $instance['titlesub']; ?></span></div>
                            <div class="clr"></div>
                            <div class="info">
                                <p class="presstitle ftrb" style="padding-bottom: 0;font-size: <?php echo $instance['titlefontsize']; ?>;color: <?php echo $instance['titlecolor']; ?>;"><?php echo $instance['title']; ?></p>
                                <p class="deswhere">
                                    <?php echo $instance['description']; ?>
                                </p>
                            </div>
                            <div id="mcts1" class="mctsall <?php if ($instance['iconnav'] == 2) echo 'mctnav2'; ?>">
                                <!--<div>-->
                                    <?php foreach ($items as $item) { ?>
                                        <div class="slditem3">
                                            <h3 class="inschool" style="color: <?php echo get_field('revfoodsslideshow_title_one_color', $item->ID); ?>;">
                                                <?php echo $item->post_title; ?>
                                            </h3>

                                            <div class="slddes person"><?php echo $item->post_content; ?></div>
                                        </div>
                                        <?php // if ($i % $cols == 0 || $i == count($items)) { ?>
                                        <!--</div>-->
                                        <?php // if ($i < count($items)) { ?>
                                            <!--<div>-->
                                            <?php // } ?>
                                        <?php // }$i++; ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class = "where_we_server" id = "<?php echo strtolower(str_replace(" ", "", $instance['titlesub'])); ?>" style = "background-color: <?php echo $instance['bgcolor']; ?>;">
<!--                                <div class = "topdotted">
                                    <div class = "topdotted_l fl"></div>
                                    <span class = "titledotted dottedrealfoodsforall"><?php echo $instance['titlesub']; ?></span>
                                    <div class="topdotted_r fr"></div>
                                </div>-->
                                <div class="about_topdotted"><span class="titledotted1 dottedour_story" style = "background-color: <?php echo $instance['bgcolor']; ?>;"><?php echo $instance['titlesub']; ?></span></div>
                                <div class="clr"></div>
                                <div class="info">
                                    <p class="presstitle ftrb" style="padding-bottom: 0;font-size: <?php echo $instance['titlefontsize']; ?>;color: <?php echo $instance['titlecolor']; ?>;"><?php echo $instance['title']; ?></p>
                                    <p class="deswhere">
                                        <?php //echo $instance['description'];      ?>
                                    </p>
                                </div>
                                <div id="mcts1" class="mctsall <?php if ($instance['iconnav'] == 2) echo 'mctnav2'; ?>">
                                    <!--<div>-->
                                        <?php foreach ($items as $item) { ?>
                                            <div class="slditem3">
                                                <h3 class="inschool" style="color: <?php echo get_field('revfoodsslideshow_title_one_color', $item->ID); ?>;">
                                                    <?php echo $item->post_title; ?>
                                                </h3>

                                                <div class="slddes person"><?php echo $item->post_content; ?></div>
                                            </div>
                                            <?php // if ($i % $cols == 0 || $i == count($items)) { ?>
                                            <!--</div>-->
                                            <?php // if ($i < count($items)) { ?>
                                                <!--<div>-->
                                                <?php // } ?>
                                            <?php // }$i++; ?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <?php if ($instance['add_submenu'] == 'on') { ?>
                                <script>
                                    jQuery(document).ready( function(){                            
                                        /*--------------------------------------------------------------------*/                       
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
                        }
                    }