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
<div class="homebn">
    <div class="homevideo">
        <iframe width="350" height="200" src="//www.youtube.com/embed/pa2IDTWvRls" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="homebn_right fr">
        <h1 class="homebn_title">
            Lorem ipsum doloret sit amet consultiteur
        </h1>
        <a href="javascript:void(0)" id="watch-video">watch video</a>
    </div>
</div>

<?php
if (is_active_sidebar('sidebar-home')) :
    dynamic_sidebar('sidebar-home');
endif;
?>
<div class="clr"></div>
<div class="RealFoodsInSchool">
    <div class="topdotted">
        <div class="topdotted_l fl"></div>
        <span class="titledotted dottedrealfoodsforall">Real Foods In School</span>
        <div class="topdotted_r fr"></div>
    </div>
    <div class="clr"></div>
    <div class="widgetstitleschool lc">
        <span class="title_inschool_1">Better Foods Better</span>
        <span class="title_inschool_2">Student</span>
    </div>
    <p class="gtbook widgetheaderdes inschool">
        To us, the math is easy. Each week, we serve over one million freshly prepared, healthy meals to schools across the country. That's a million instances of more productive, more attentive, better motivated and better performing students. We like making math easy. And history. And art. And english. And science.
    </p>
    <a href="" class="lc widgetheaderlink fl">learn more about our school meals program</a><span class="learnmore fl"></span>
</div>

<div class="RealFoodsInStore">
        <div class="topdotted">
        <div class="topdotted_l fl"></div>
        <span class="titledotted dottedrealfoodsforall">Real Foods In Store</span>
        <div class="topdotted_r fr"></div>
    </div>
    <div class="clr"></div>
        <span class="title_instore">healthy meal kits</span>
        <div class="clr"></div>
    <p class="gtbook widgetheaderdes instore fl">
        Our story began in schools. Now, we're bringing our recipe for success to your home with our all natural Meal Kits, perfect for on-the-go nutrition.
    </p>
    <div class="clr"></div>
    <a href="" class="lc widgetheaderlink instore fl">learn more about our retail products</a><span class="learnmore fl"></span>
</div>

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
