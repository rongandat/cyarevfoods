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
?>

<div id="footer">
    <div class="left">
        <div class="column">
            <h3>quick links</h3>
            <ul>
                <li><a href="">about us</a></li>
                <li><a href="">in schools</a></li>
                <li><a href="">in stores</a></li>
                <li><a href="">careers</a></li>
            </ul>
        </div>
        <div class="column">
            <h3>help</h3>
            <ul>
                <li><a href="">faq + support</a></li>
                <li><a href="">where to buy</a></li>
                <li><a href="">login</a></li>
            </ul>
        </div>
        <div class="column">
            <h3>contact us</h3>
            <ul>
                <li><a href="">general inquires</a></li>
                <li><a href="">school inquires</a></li>
                <li><a href="">retail products</a><span class="message"></span></li>
                <li><a href="">press inquires</a><span class="message"></span></li>
            </ul>
        </div>
    </div>
    <div class="center">
        <div class="icon"></div>
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
            <h3>follow us: </h3>
            <a href="http://www.facebook.com/RevolutionFoods" target="_blank"><span class="facebook"></span></a>
            <a href="https://twitter.com/RevolutionFoods" target="_blank"><span class="twet"></span></a>
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