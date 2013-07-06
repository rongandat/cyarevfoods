<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
?>
<?php
if (is_active_sidebar('sidebar-home')) :
    dynamic_sidebar('sidebar-home');
endif;
?>
<div class="RealFoodsInPress">
    <div class="topdotted">
        <div class="topdotted_l fl"></div>
        <span class="titledotted dottedrealfoodsforall">Real Press</span>
        <div class="topdotted_r fr"></div>
    </div>
    <div class="clr"></div>
    <p class="presstitle ftrb">in the media</p>
            <div id="mcts1">
                <div class="slditem">
                    <div class="sldlogo" style="background: transparent url('<?php echo get_template_directory_uri(); ?>/images/itemlogo1.jpg') center center no-repeat;"></div>
                    <div class="clr"></div>
                    <p class="slddes">Revolution Foods listed as one of the World's Most Innovative Companies!</p>
                    <a href="" class="lc widgetheaderlink fl">Read Artical</a>
                    <span class="learnmore fl"></span>
                </div>
                <div class="slditem">
                    <div class="sldlogo" style="background: transparent url('<?php echo get_template_directory_uri(); ?>/images/itemlogo2.jpg') center center no-repeat;"></div>
                    <p class="slddes">Revolution Foods on making school meals healthier.</p>
                    <a href="" class="lc widgetheaderlink fl">Read Artical</a>
                    <span class="learnmore fl"></span>
                </div>
                <div class="slditem">
                    <div class="sldlogo" style="background: transparent url('<?php echo get_template_directory_uri(); ?>/images/itemlogo3.jpg') center center  no-repeat;"></div>
                    <p class="slddes">Lorem ipsum dolor sit amet consultit eur. Erat sit amet consultiteur lorem. Dolor sit amet erat sit amet.</p>
                    <a href="" class="lc widgetheaderlink fl">Read Artical</a>
                    <span class="learnmore fl"></span>
                </div>
                <div class="slditem">
                    <div class="sldlogo" style="background: transparent url('<?php echo get_template_directory_uri(); ?>/images/itemlogo1.jpg') center center  no-repeat;"></div>
                    <p class="slddes">Revolution Foods listed as one of the World's Most Innovative Companies!</p>
                    <a href="" class="lc widgetheaderlink fl">Read Artical</a>
                    <span class="learnmore fl"></span>
                </div>
        </div>
</div>
<?php
get_footer();
?>
