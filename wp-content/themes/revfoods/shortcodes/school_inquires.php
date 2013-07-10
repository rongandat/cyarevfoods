<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function revfoods_school_inquires($atts, $content = null) {
    extract(shortcode_atts(array(
               
                    ), $atts));

    return revfoods_get_form();
}

function revfoods_get_form() {
        $s = '';
        $s .='<div id="inquiryform">';
        $s .='<h1>'.__('school inquiry form','revfoods').'</h1>';
        $s .='<p>'.__('Thanks you for your interest in Revolution Foods meal-service for your school. Please fill out as much of the folling infor-mation as you can,and a Revolution Foods representative will get bank to you as soon as possible.').'</p>';
        $s .='<div class="line"></div>';
        $s .='<div class="st-form-line">';
        $s .='<span class="st-labeltext">'.__('School name','revfoods').'</span>';
        $s .='<input name="sort_order" type="text" class="st-forminput" id="sort_order" style="width:300px" value="">';
        $s .='<div class="clear"></div></div>';
        $s .='<div class="st-form-line">';
        $s .='<span class="st-labeltext">'.__('# of Students','revfoods').'</span>';
        $s .='<input name="sort_order" type="text" class="st-forminput" id="sort_order" style="width:300px" value="">';
        $s .='<div class="clear"></div></div>';
        $s .='<div class="st-form-line">';
        $s .='<span class="st-labeltext">'.__('% of Students on free/reduced lunch','revfoods').'</span>';
        $s .='<input name="sort_order" type="text" class="st-forminput" id="sort_order" style="width:300px" value="">';
        $s .='<div class="clear"></div></div>';
        $s .='<div class="st-form-line">';
        $s .='<span class="st-labeltext">'.__('Grades served','revfoods').'</span>';
        $s .='<input name="sort_order" type="text" class="st-forminput" id="sort_order" style="width:300px" value="">';
        $s .='<div class="clear"></div></div>';
        $s .='<div class="st-form-line"><span class="st-labeltext">'.__('Address(street,city,state,zip)','revfoods').'</span><input name="sort_order" type="text" class="st-forminput" id="sort_order" style="width:300px" value=""><div class="clear"></div></div>';
        $s .='<div class="st-form-line">';
        $s .='<span class="st-labeltext">'.__('Region','revfoods').' <span class="error">*</span></span>';
        $s .='<div class="formsl">';
        $s .='<select name="status" class="styled-select">';
        $s .='<option value="0" selected="selected">'.__('Northern California','revfoods').'</option>';
        $s .='<option value="1">'.__('New york','revfoods').'</option>';
        $s .='</select></div><div class="clear"></div></div>';
        $s .='<div class="st-form-line">';
        $s .='<span class="st-labeltext">'.__('Lunch','revfoods').'</span>	';
        $s .='<input name="sort_order" type="text" class="st-forminput" id="sort_order" style="width:300px" value="">';
        $s .='<div class="clear"></div></div>';
        $s .='<div class="st-form-line">';
        $s .='<span class="st-labeltext">'.__('Snack','revfoods').'</span>	';
        $s .='<input name="sort_order" type="text" class="st-forminput" id="sort_order" style="width:300px" value="">';
        $s .='<div class="clear"></div></div>';
        $s .='<div class="st-form-line">';
        $s .='<span class="st-labeltext">'.__('Time of daily lunch period','revfoods').'</span>	';
        $s .='<input name="sort_order" type="text" class="st-forminput" id="sort_order" style="width:300px" value="">';
        $s .='<div class="clear"></div></div>';
        $s .='<div class="st-form-line">';
        $s .='<span class="st-labeltext">'.__('Contact name','revfoods').'</span>	';
        $s .='<input name="sort_order" type="text" class="st-forminput" id="sort_order" style="width:300px" value="">';
        $s .='<div class="clear"></div></div>';
        $s .='<div class="st-form-line">';
        $s .='<span class="st-labeltext">'.__('Contact title','revfoods').'</span>	';
        $s .='<input name="sort_order" type="text" class="st-forminput" id="sort_order" style="width:300px" value="">';
        $s .='<div class="clear"></div></div>';
        $s .='<div class="st-form-line">';
        $s .='<span class="st-labeltext">'.__('Email','revfoods').'<span class="error">*</span></span>	';
        $s .='<input name="sort_order" type="text" class="st-forminput" id="sort_order" style="width:300px" value="">';
        $s .='<div class="clear"></div></div>';
        $s .='<div class="st-form-line">';
        $s .='<span class="st-labeltext">'.__('Anticpated meal service start date','revfoods').'</span>	';
        $s .='<input name="sort_order" type="text" class="st-forminput" id="sort_order" style="width:105px" value=""><span class="lich"></span>';
        $s .='<div class="clear"></div></div>';
        $s .='<div class="st-form-line">';
        $s .='<span class="st-labeltext">'.__('Current or previous food provider','revfoods').'</span>	';
        $s .='<input name="sort_order" type="text" class="st-forminput" id="sort_order" style="width:500px" value="">';
        $s .='<div class="clear"></div></div>';
        $s .='<div class="st-form-line">';
        $s .='<span class="st-labeltext">'.__('Other Comment','revfoods').'<span class="error">*</span></span>	';
        $s .='<textarea name="description" id="description" style="width: 508px;height: 165px;"> </textarea>';
        $s .='<div class="clear"></div></div>';
        $s .='<div class="st-form-line">';
        $s .='<span class="st-labeltext"></span>';
        $s .='<a href="#" class="subbt"></a>';
        $s .='<div class="clear"></div></div>';
        
        $s .= <<<EOF
              <script type="text/javascript">            
            jQuery(document).ready(function() {
                
            });           
        </script>
EOF;
        $s .='</div>';
    return $s;
}

add_shortcode('school_inquires', 'revfoods_school_inquires');
?>
