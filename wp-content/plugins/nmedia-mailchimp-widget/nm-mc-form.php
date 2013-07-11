<?php
$form = nmMailChimp::getForm($fid);
$meta = json_decode($form->form_meta);

$arrVars = $meta->vars;
?>

<form id="nm_mc_form_<?php echo $widget_id ?>" onsubmit="return postToMailChimp(this)">
    <input type="hidden" value="<?php echo $fid ?>" name="nm_mc_form_id" />
    <div class="column1">
        <h3><?php _e('special offers & updates:'); ?></h3>
        <?php
        if ($arrVars) {
            foreach ($arrVars as $key => $val):
                $tag = $val->tag;
                $label = $val->label;
                $the_id = $tag . '-' . $widget_id;
                ?>                              
                <input type="text" name="<?php echo $tag ?>" id="<?php echo $the_id ?>" class="emailIp" data-required="<?php echo $val->req ?>" placeholder="Email*" />                              
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
                        <input type="checkbox" name="group[<?php echo $interest->id ?>][<?php echo $g ?>]" id="mc_<?php echo $interest->id ?>_<?php echo $widget_id ?>_<?php echo $g ?>" class="css-checkbox" value="<?php echo $group ?>">
                        <label for="mc_<?php echo $interest->id ?>_<?php echo $widget_id ?>_<?php echo $g ?>"	class="css-label"><?php echo $group ?></label>

                        <?php
                        $g++;
                    }
                    ?>
                </div>
                <?php
            }
        }
        ?>
        <a class="sumbit" href="javascript:void(0)" onclick="jQuery('#nm_mc_form_<?php echo $widget_id ?>').submit()"></a>
        <?php
        echo '<img style="display:none" id="nm-mc-loading" src="' . plugins_url('images/loading.gif', __FILE__) . '" />';
        ?>
        <div id="mc-response-area"></div>

    </div>
</form>