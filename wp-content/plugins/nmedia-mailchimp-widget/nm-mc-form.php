<?php
$form = nmMailChimp::getForm($fid);
$meta = json_decode($form->form_meta);

$arrVars = $meta->vars;
?>

<form id="nm_mc_form_<?php echo $widget_id ?>" onsubmit="return postToMailChimp(this)">
    <input type="hidden" value="<?php echo $fid ?>" name="nm_mc_form_id" />
    <div class="column1">
        <h3><?php _e('special offers & updates:');?></h3>
        <?php
        if ($arrVars) {
            foreach ($arrVars as $key => $val):
                $tag = $val->tag;
                $label = $val->label;
                $the_id = $tag . '-' . $widget_id;
                ?>                              
                <input type="text" name="<?php echo $tag ?>" id="<?php echo $the_id ?>" class="st-forminput" data-required="<?php echo $val->req ?>" placeholder="Email*" />                              
                <?php
            endforeach;
        }
        ?>
        <?php
        if ($meta->interest) {  //if interests are selected
            foreach ($meta->interest as $interest) {

                $groups = explode(',', $interest->groups)
                ?>
                <div class="send_info">
                    <?php
                    $g = 1;
                    foreach ($groups as $group) {
                        ?>  
                        <label for="mc_<?php echo $interest->id ?>_<?php echo $widget_id ?>"	class="css-label"><?php echo $group ?></label>
                        <input type="checkbox" name="group[<?php echo $interest->id ?>][<?php echo $g ?>]" id="mc_<?php echo $interest->id ?>_<?php echo $widget_id ?>" class="css-checkbox" value="<?php echo $group ?>">

                        <?php
                        $g++;
                    }
                    ?>
                </div>
                <?php
            }
        }
        ?>
        <input type="submit" class="nm_mc_button" value="<?php echo $button_text ?>" id="nm_mc_button-<?php echo $widget_id ?>"  />
        <?php
        echo '<img style="display:none" id="nm-mc-loading" src="' . plugins_url('images/loading.gif', __FILE__) . '" />';
        ?>
        <div id="mc-response-area"></div>

    </div>
</form>