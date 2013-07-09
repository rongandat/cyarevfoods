<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
$theme_locations = get_nav_menu_locations();
$menu_obj_1 = get_term($theme_locations['Bottom-Menu-1'], 'nav_menu');
$menu_name_1 = $menu_obj_1->name;
$menu_obj_2 = get_term($theme_locations['Bottom-Menu-2'], 'nav_menu');
$menu_name_2 = $menu_obj_2->name;
$menu_obj_3 = get_term($theme_locations['Bottom-Menu-3'], 'nav_menu');
$menu_name_3 = $menu_obj_3->name;
$menu_obj_4 = get_term($theme_locations['Bottom-Menu-Social'], 'nav_menu');
$menu_name_4 = $menu_obj_4->name;
?>

<div id="footer">
    <div class="left">
        <div class="column">
            <h3 class="ftr"><?php echo $menu_name_1;?></h3>
            <?php wp_nav_menu(array('theme_location' => 'Bottom-Menu-1', 'container' => '', 'menu_class' => '')); ?>
        </div>
        <div class="column">
            <h3 class="ftr"><?php echo $menu_name_2;?></h3>
            <?php wp_nav_menu(array('theme_location' => 'Bottom-Menu-2', 'container' => '', 'menu_class' => '')); ?>
        </div>
        <div class="column col3">
            <h3 class="ftr"><?php echo $menu_name_3;?></h3>
            <?php wp_nav_menu(array('theme_location' => 'Bottom-Menu-3', 'container' => '', 'menu_class' => '','link_after'      => '<span class="message"></span>',)); ?>
        </div>
    </div>
    <div class="center">
        <a href="http://wpvalet.cyahost.com/revfoods/join-the-revolution"><div class="icon"></div></a>
    </div>
    <div class="right">
        <div class="column1">
            <h3>special offers & updates: </h3>
            <input name="email" class="emailIp" type="text" value="Email*">
            <input id="checkedbox1" type="checkbox" name="inschools" class="css-checkbox" checked="checked"><label for="checkedbox1" class="css-label">in school</label>
            <input id="checkedbox2" type="checkbox" name="instores" class="css-checkbox"><label for="checkedbox2" class="css-label">in store</label>
            <a class="sumbit" onclick="JavaScription();"></a>

        </div>
        <div class="column2">
            <h3 class="lc"><?php echo $menu_name_4;?></h3>
            <a href="http://www.facebook.com/RevolutionFoods" target="_blank"><span class="facebook"></span></a>
            <a href="https://twitter.com/RevolutionFoods" target="_blank"><span class="twet"></span></a>
            <?php wp_nav_menu(array('theme_location' => 'Bottom-Menu-Social', 'container' => '', 'menu_class' => 'bottom-menu-social','link_after' => '<span></span>',)); ?>
        </div>
    </div>
</div>
<div id="power">
    <span class="textA">real food for all <sup>TM</sup></span> <a href="" target="_blank" class="text1">legal</a> <span class="text2">copyright &copy; 2013 revolution foods </span><span class="text3">site by <a href="" target="_blank" class="text2v">veneer</a></span>
</div>
</div><!-- #main .wrapper -->
<!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>