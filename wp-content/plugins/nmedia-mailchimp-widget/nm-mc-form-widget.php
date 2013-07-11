<?php
/**
  rendering form in wiget area
 * */
$form = nmMailChimp::getForm($fid);
$meta = json_decode($form->form_meta);

$arrVars = $meta->vars;

?>
<style>
    #join_revolution .main_content .content h1 {
        font-family: futurabold;
        font-size: <?php echo $headline_font_size ?>;
        color: <?php echo $headline_font_color ?>;
        text-align: left;
        padding-bottom: 0px;
    }
</style>
<form id="nm_mc_form_<?php echo $widget_id ?>" onsubmit="return postToMailChimp(this)">
    <input type="hidden" value="<?php echo $fid ?>" name="nm_mc_form_id" />
    <div id="join_revolution">
        <div class="main_content">
            <div class="content">
                <h1><?php echo $boxTitle; ?></h1>
                <p class="content">
                    <?php echo $detail; ?>
                </p>
            </div>
            <div class="form">
                
                <?php
                if ($arrVars) {
                    foreach ($arrVars as $key => $val):
                        $tag = $val->tag;
                        $label = $val->label;
                        $the_id = $tag . '-' . $widget_id;
                        ?>                              
                        <input type="text" name="<?php echo $tag ?>" id="<?php echo $the_id ?>" class="st-forminput" data-required="<?php echo $val->req ?>" placeholder="Enter your email" />                              
                        <?php
                    endforeach;
                }
                ?>
                <!-- show interest -->
                <?php
                if ($meta->interest) {  //if interests are selected
                    foreach ($meta->interest as $interest) {

                        $groups = explode(',', $interest->groups)
                        ?>
                        <div class="send_info">
                            <span class="send_me"><?php echo $interest->name ?></span>

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

            </div>
            <input type="submit" class="nm_mc_button" value="<?php echo $buttonText ?>" id="nm_mc_button-<?php echo $widget_id ?>"  />
            <?php
            echo '<img style="display:none" id="nm-mc-loading" src="' . plugins_url('images/loading.gif', __FILE__) . '" />';
            ?>
            <div id="mc-response-area">
            </div>

        </div>
    </div>
</form>




