<?php
/*
Plugin Name: Gravity Forms Salesforce Add-On
Description: Integrate <a href="http://wordpressformplugin.com?r=salesforce">Gravity Forms</a> with Salesforce - form submissions are automatically sent to your Salesforce account!
Version: 1.1.3
Author: Katz Web Services, Inc.
Author URI: http://www.katzwebservices.com
*/

add_action('init',  array('GFSalesforce', 'init'));

class GFSalesforce {

	private static $path = "gravity-forms-salesforce/salesforce.php";
	private static $url = "http://www.gravityforms.com";
	private static $slug = "gravity-forms-salesforce";
	private static $version = "1.1.3";
	private static $min_gravityforms_version = "1.3.9";

    //Plugin starting point. Will load appropriate files
    public static function init(){

		add_action("admin_notices", array('GFSalesforce', 'is_gravity_forms_installed'), 10);
		
		if(!self::is_gravityforms_supported()){
           return;
        }

        if(is_admin()){
		
            //creates a new Settings page on Gravity Forms' settings screen
            if(self::has_access("gravityforms_salesforce")){
                RGForms::add_settings_page("Salesforce", array("GFSalesforce", "settings_page"), self::get_base_url() . "/salesforce-50x50.png");
            }
        }

        //creates the subnav left menu
        add_filter("gform_addon_navigation", array('GFSalesforce', 'create_menu'));

        if(self::is_salesforce_page()){

            //enqueueing sack for AJAX requests
            wp_enqueue_script(array("sack"));
			wp_enqueue_style('gravityforms-admin', GFCommon::get_base_url().'/css/admin.css');
         } else if(in_array(RG_CURRENT_PAGE, array("admin-ajax.php"))){

            add_action('wp_ajax_rg_update_feed_active', array('GFSalesforce', 'update_feed_active'));
            add_action('wp_ajax_gf_select_salesforce_form', array('GFSalesforce', 'select_salesforce_form'));
		} elseif(in_array(RG_CURRENT_PAGE, array('admin.php'))) {
        	add_action('admin_head', array('GFSalesforce', 'show_salesforce_status'));
        } else {
            add_action("gform_pre_submission", array('GFSalesforce', 'push'), 10, 2); //handling post submission.    
        }
        
        #add_action("gform_field_advanced_settings", array('GFSalesforce',"add_salesforce_editor_field"), 10, 2); // For future use
        
        add_action("gform_editor_js", array('GFSalesforce', 'add_form_option_js'), 10);

		add_filter('gform_tooltips', array('GFSalesforce', 'add_form_option_tooltip'));
		
		add_filter("gform_confirmation", array('GFSalesforce', 'confirmation_error'));
    }
    
	public function add_salesforce_editor_field($position, $form_id) {
    	/* For future use */
    }
	
	public static function confirmation_error($confirmation, $form = '', $lead = '', $ajax ='' ) {
		
		if(current_user_can('administrator') && !empty($_REQUEST['salesforceErrorMessage'])) {
			$confirmation .= sprintf(__('%sThe entry was not added to Salesforce because %sboth first and last names are required%s, and were not detected. %sYou are only being shown this because you are an administrator. Other users will not see this message.%s%s', 'gravity-forms-salesforce'), '<div class="error" style="text-align:center; color:#790000; font-size:14px; line-height:1.5em; margin-bottom:16px;background-color:#FFDFDF; margin-bottom:6px!important; padding:6px 6px 4px 6px!important; border:1px dotted #C89797">', '<strong>', '</strong>', '<em>', '</em>', '</div>');
		}			
		return $confirmation;
	}
	
	public static function add_form_option_tooltip($tooltips) {
		$tooltips["form_salesforce"] = "<h6>" . __("Enable Salesforce Integration", "gravity-forms-salesforce") . "</h6>" . __("Check this box to integrate this form with Salesforce. When an user submits the form, the data will be added to Salesforce.", "gravity-forms-salesforce");
		return $tooltips;
	}
	
	public static function show_salesforce_status() {
		global $pagenow; 
		
		if(isset($_REQUEST['page']) && $_REQUEST['page'] == 'gf_edit_forms' && !isset($_REQUEST['id'])) {
			$activeforms = array();
        	$forms = RGFormsModel::get_forms();
        	if(!is_array($forms)) { return; }
        	foreach($forms as $form) {
        		$form = RGFormsModel::get_form_meta($form->id);
        		if(is_array($form) && !empty($form['enableSalesforce'])) {
        			$activeforms[] = $form['id'];
        		}
        	}
        	
        	if(!empty($activeforms)) {
		
?>
<style type="text/css">
	td a.row-title span.salesforce_enabled {
		position: absolute;
		background: url('<?php echo WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)); ?>/salesforce-16x16.png') right top no-repeat;
		height: 16px;
		width: 16px;
		margin-left: 10px;
	}
</style>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('table tbody.user-list tr').each(function() {
			if($('td.column-id', $(this)).text() == <?php echo implode('||', $activeforms); ?>) {
				$('td a.row-title', $(this)).append('<span class="salesforce_enabled" title="<?php _e('Salesforce integration is enabled for this Form', "gravity-forms-salesforce"); ?>"></span>');
			}
		});		
	});
</script>
<?php
			}
		}
	}

	public static function add_form_option_js() { 
		ob_start();
			gform_tooltip("form_salesforce");
			$tooltip = ob_get_contents();
		ob_end_clean();
		$tooltip = trim(rtrim($tooltip)).' ';
	?>
<style type="text/css">
	#gform_title .salesforce,
	#gform_enable_salesforce_label {
		float:right;
		background: url('<?php echo WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)); ?>/salesforce-16x16.png') right top no-repeat;
		height: 16px;
		width: 16px;
		cursor: help;
	}
	#gform_enable_salesforce_label {
		float: none;
		width: auto;
		background-position: left top;
		padding-left: 18px;
		cursor:default;
	}
</style>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#gform_settings_tab_2 .gforms_form_settings').append("<li><input type='checkbox' id='gform_enable_salesforce' /> <label for='gform_enable_salesforce' id='gform_enable_salesforce_label'><?php _e("Enable Salesforce integration", "gravity-forms-salesforce") ?> <?php echo $tooltip; ?></label></li>");
		
		if($().prop) {
			$("#gform_enable_salesforce").prop("checked", form.enableSalesforce ? true : false);
		} else {
			$("#gform_enable_salesforce").attr("checked", form.enableSalesforce ? true : false);
		}
		
		$("#gform_enable_salesforce").live('click change load', function(e) {
			
			var checked = $(this).is(":checked")
			
			form.enableSalesforce = checked;
			
			if(checked) {
				$("#gform_title").append('<span class="salesforce" title="<?php _e("Salesforce integration is enabled.", "gravity-forms-salesforce") ?>"></span>');
			} else {
				$("#gform_title .salesforce").remove();
			}
			
			SortFields(); // Update the form object to include the new enableSalesforce setting
			
		}).trigger('load');
		
		$('.tooltip_form_salesforce').qtip({
	         content: $('.tooltip_form_salesforce').attr('tooltip'), // Use the tooltip attribute of the element for the content
	         show: { delay: 200, solo: true },
	         hide: { when: 'mouseout', fixed: true, delay: 200, effect: 'fade' },
	         style: 'gformsstyle', // custom tooltip style
	         position: {
	      		corner: {
	         		target: 'topRight'
	                ,tooltip: 'bottomLeft'
	      		}
	  		 }
	    });
	});
</script><?php
	}		
	
    //Returns true if the current page is an Feed pages. Returns false if not
    private static function is_salesforce_page(){
    	if(empty($_GET["page"])) { return false; }
        $current_page = trim(strtolower($_GET["page"]));
        $salesforce_pages = array("gf_salesforce");

        return in_array($current_page, $salesforce_pages);
    }

    //Creates Salesforce left nav menu under Forms
    public static function create_menu($menus){

        // Adding submenu if user has access
        $permission = self::has_access("gravityforms_salesforce");
        if(!empty($permission))
            $menus[] = array("name" => "gf_salesforce", "label" => __("Salesforce", "gravityformssalesforce"), "callback" =>  array("GFSalesforce", "salesforce_page"), "permission" => $permission);

        return $menus;
    }

    public static function settings_page(){
		$message = $validimage = false; global $plugin_page;
        if(!empty($_POST["uninstall"])){
            check_admin_referer("uninstall", "gf_salesforce_uninstall");
            self::uninstall();

            ?>
            <div class="updated fade" style="padding:20px;"><?php _e(sprintf("Gravity Forms Salesforce Add-On have been successfully uninstalled. It can be re-activated from the %splugins page%s.", "<a href='plugins.php'>","</a>"), "gravityformssalesforce")?></div>
            <?php
            return;
        }
        else if(!empty($_POST["gf_salesforce_submit"])){
            check_admin_referer("update", "gf_salesforce_update");
            $settings = stripslashes($_POST["gf_salesforce_org_id"]);
            update_option("gf_salesforce_oid", $settings);
        }
        else{
            $settings = get_option("gf_salesforce_oid");
        }
        
        $api = self::test_api(true);

        if(is_array($api) && empty($api)){
        	$message = "<p>".__('Salesforce.com is temporarily unavailable. Please try again in a few minutes.',"gravityformssalesforce")."</p>";
        	$class = "error";
			$validimage = '';
			$valid = true;
        } elseif($api) {
			$class = "updated";
			$validimage = '<img src="'.GFCommon::get_base_url().'/images/tick.png"/>';
			$valid = true;
		} elseif(!empty($settings)){
            $message = "<p>".__('Invalid Salesforce Organization ID.', "gravityformssalesforce")."</p>";
            $class = "error";
            $valid = false;
            $validimage = '<img src="'.GFCommon::get_base_url().'/images/cross.png"/>';
        }

        ?>
        <style type="text/css">
            .ul-square li { list-style: square!important; }
            .ol-decimal li { list-style: decimal!important; }
        </style>
		<div class="wrap">
		<?php 
			if($plugin_page !== 'gf_settings') {
			
				echo '<h2>'.__('Gravity Forms Salesforce Add-on',"gravityformssalesforce").'</h2>';
			}
			if($message) { 
				echo "<div class='fade below-h2 {$class}'>".wpautop($message)."</div>";
			} ?>
			
        <form method="post" action="">
            <?php wp_nonce_field("update", "gf_salesforce_update") ?>
            <h3><?php _e("Salesforce Account Information", "gravityformssalesforce") ?></h3>
            <p style="text-align: left;">
                <?php _e(sprintf("If you don't have a Salesforce account, you can %ssign up for one here%s", "<a href='http://www.salesforce.com' target='_blank'>" , "</a>"), "gravityformssalesforce") ?>
            </p>
			
			<table class="form-table">
                <tr>
                    <th scope="row"><label for="gf_salesforce_org_id"><?php _e("Salesforce Org. ID", "gravityformssalesforce"); ?></label> </th>
                    <td><input type="text" size="75" id="gf_salesforce_org_id" class="code pre" style="font-size:1.1em; margin-right:.5em;" name="gf_salesforce_org_id" value="<?php echo esc_attr($settings) ?>"/> <?php echo $validimage; ?>
                    <?php echo '<small style="display:block;">'.__('To find your Salesforce.com Organization ID, in your Salesforce.com account, go to [Your Name] &raquo; Setup &raquo; Company Profile (near the bottom of the left sidebar) &raquo; Company Information','gravityformssalesforce').'</small>';?></td>
                </tr>
                <tr>
                    <td colspan="2" ><input type="submit" name="gf_salesforce_submit" class="submit button-primary" value="<?php _e("Save Settings", "gravityformssalesforce") ?>" /></td>
                </tr>

            </table>
        </form>
		
	<?php if(isset($valid) && $valid) { ?>
		<div class="hr-divider"></div>
		
		<h3>Usage Instructions</h3>
		
		<div class="delete-alert alert_gray">
			<h4>To integrate a form with Salesforce:</h4>
			<ol class="ol-decimal">
				<li>Edit the form you would like to integrate (choose from the <a href="<?php _e(admin_url('admin.php?page=gf_edit_forms')); ?>">Edit Forms page</a>).</li>
				<li>Click "Form Settings"</li>
				<li>Click the "Advanced" tab</li>
				<li><strong>Check the box "Enable Salesforce integration"</strong></li>
				<li>Save the form</li>
			</ol>
		</div>
		
		<h4><?php _e('Custom Fields', "gravityformssalesforce"); ?></h4>
		<?php echo wpautop(sprintf(__('When you are trying to map a custom field, you need to set either the "Admin Label" for the input (in the Advanced tab of each field in the  Gravity Forms form editor) or the Parameter Name (in Advanced tab, visible after checking "Allow field to be populated dynamically") to be the API Name of the Custom Field as shown in Salesforce. For example, a Custom Field with a Field Label "Web Source" could have an API Name of `SFGA__Web_Source__c`.

You can find your Custom Fields under [Your Name] &rarr; Setup &rarr; Leads &rarr; Fields, then at the bottom of the page, there&rsquo;s a list of "Lead Custom Fields & Relationships". This is where you will find the "API Name" to use in the Admin Label or Parameter Name.

For more information on custom fields, %sread this Salesforce.com Help Article%s', "gravityformssalesforce"), '<a href="https://help.salesforce.com/apex/htviewhelpdoc?id=customize_customfields.htm&language=en" target="_blank">', '</a>')); ?>
		
        <h4><?php _e('Form Fields', "gravityformssalesforce"); ?></h4>
        <p><?php _e('Fields will be automatically mapped by Salesforce using the default Gravity Forms labels.', "gravityformssalesforce"); ?></p>
        <p><?php _e('If you have issues with data being mapped, make sure to use the following keywords in the label to match and send data to Salesforce.', "gravityformssalesforce"); ?></p>
		
        <ul class="ul-square">
        	<li><?php _e(sprintf('%sname%s (use to auto-split names into First Name and Last Name fields)', '<code>', '</code>'), "gravityformssalesforce"); ?></li>
            <li><?php _e(sprintf('%sfirst name%s', '<code>', '</code>'), "gravityformssalesforce"); ?></li>
            <li><?php _e(sprintf('%slast name%s', '<code>', '</code>'), "gravityformssalesforce"); ?></li>
            <li><?php _e(sprintf('%scompany%s', '<code>', '</code>'), "gravityformssalesforce"); ?></li>
            <li><?php _e(sprintf('%semail%s', '<code>', '</code>'), "gravityformssalesforce"); ?></li>
            <li><?php _e(sprintf('%sphone%s', '<code>', '</code>'), "gravityformssalesforce"); ?></li>
            <li><?php _e(sprintf('%scity%s', '<code>', '</code>'), "gravityformssalesforce"); ?></li>
            <li><?php _e(sprintf('%scountry%s', '<code>', '</code>'), "gravityformssalesforce"); ?></li>
            <li><?php _e(sprintf('%szip%s', '<code>', '</code>'), "gravityformssalesforce"); ?></li>
            <li><?php _e(sprintf('%ssubject%s', '<code>', '</code>'), "gravityformssalesforce"); ?></li>
            <li><?php _e(sprintf('%sdescription%s, %squestion%s, %smessage%s, or %scomments%s for Description', '<code>', '</code>','<code>', '</code>','<code>', '</code>','<code>', '</code>'), "gravityformssalesforce"); ?></li>
        </ul>
		
		<form action="" method="post">
            <?php wp_nonce_field("uninstall", "gf_salesforce_uninstall") ?>
            <?php if(GFCommon::current_user_can_any("gravityforms_salesforce_uninstall")){ ?>
                <div class="hr-divider"></div>

                <h3><?php _e("Uninstall Salesforce Add-On", "gravityformssalesforce") ?></h3>
                <div class="delete-alert alert_red">
                	<h3><?php _e('Warning', 'gravityformssalesforce'); ?></h3>
                	<p><?php _e("This operation deletes ALL Salesforce Feeds. ", "gravityformssalesforce") ?></p>
                    <?php
                    $uninstall_button = '<input type="submit" name="uninstall" value="' . __("Uninstall Salesforce Add-On", "gravityformssalesforce") . '" class="button" onclick="return confirm(\'' . __("Warning! ALL Salesforce Feeds will be deleted. This cannot be undone. \'OK\' to delete, \'Cancel\' to stop", "gravityformssalesforce") . '\');"/>';
                    echo apply_filters("gform_salesforce_uninstall_button", $uninstall_button);
                    ?>
                </div>
            <?php } ?>
        </form>
        <?php } // end if($api) ?>
        </div>
        <?php
    }

    public static function salesforce_page(){
        if(isset($_GET["view"]) && $_GET["view"] == "edit") {
            self::edit_page($_GET["id"]);
        } else {
			self::settings_page();
		}
    }
	
    private static function test_api($debug = false){
    	$api = false;

        return self::send_request(array(), $debug);
        
    }
		
	public static function send_request($post, $debug = false) {
		global $wp_version;
        $post['oid'] 			= get_option("gf_salesforce_oid");
		$post['debug']			= $debug;
		
		if(empty($post['oid'])) { return false; }
		
		// Set SSL verify to false because of server issues.
		$args = array( 	
			'body' 		=> $post,
			'headers' 	=> array(
				'user-agent' => 'Gravity Forms Salesforce Add-on plugin - WordPress/'.$wp_version.'; '.get_bloginfo('url'),
			),
			'sslverify'	=> false,  
		);
		
		$sub = $debug ? 'test' : 'www';
		//Add by Ant
    if (!isset($args['body']['Company']) && isset($args['body']['School name'])) {
      $args['body']['company'] = $args['body']['School name'];  
    }
    if (!isset($args['body']['Name']) && isset($args['body']['Contact name'])) {
      $body_name = str_replace(' ', ',', trim($args['body']['Contact name']));
      $body_names = explode(' ', $body_name);
      
      foreach ($body_names as $k=>$v) {
        if (empty($v)) {
          unset($body_names[$k]);
        } 
      }
      
      $body_name = implode(',', $body_names); 
      $args['body']['name'] = $body_name;
      $args['body']['Name'] = $body_name;      
    }
    if (!isset($args['body']['Grades']) && isset($args['body']['Grades served'])) {
      $args['body']['Grades'] = $args['body']['Grades served'];  
    }
        
		//echo '<pre>'; print_r($args); die();		
		$result = wp_remote_post('https://'.$sub.'.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8', $args);
		
		if(wp_remote_retrieve_response_code($result) !== 200) { // Server is down.
			return array();
		} elseif(!isset($result['headers']['is-processed'])) { // For a valid debug test
			return $result;
		} else if ($result['headers']['is-processed'] === "true") { // For a valid request
			return $result;
		} elseif(strpos($result['headers']['is-processed'], 'Exception')) { // For an invalid request
			return false;
		}
		
		return $result;
	}
	
    public static function push($form_meta, $entry = array()){
    	global $wp_version;

    	if(!isset($form_meta['enableSalesforce']) || empty($form_meta['enableSalesforce'])) { return; }
    	
    	$defaults = array(
			'first_name' 	=> array('label' => 'First name'),
			'last_name' 	=> array('label' => 'Last name'),
			'company'		=> array('label' => 'Company'),
			'salutation'	=> array('label' => 'Salutation'),
			'URL'			=> array('label' => 'Website'),
			'email' 		=> array('label' => 'Email'),
			'phone' 		=> array('label' => 'Phone'),
			'mobile' 		=> array('label' => 'Mobile'),
			'fax' 			=> array('label' => 'Fax'),
			'description' 	=> array('label' => 'Message'),
			'title' 		=> array('label' => 'Title'),
			'street' 		=> array('label' => 'Street'),
			'city'	 		=> array('label' => 'City'),
			'state'	 		=> array('label' => 'State'),
			'country'		=> array('label' => 'Country'),
			'zip'	 		=> array('label' => 'ZIP'),
			'lead_source'	=> array('label' => 'Lead Source'),
			'industry'		=> array('label' => 'Industry'),
			'rating'		=> array('label' => 'Rating'),
			'revenue'		=> array('label' => 'Annual Revenue'),
			'employees'		=> array('label' => 'Employees'),
			'Campaign_ID'	=> array('label' => 'Campaign ID'),
			'member_status'	=> array('label' => 'Member Status'),
			'emailOptOut'	=> array('label' => 'Opt Out of Emails'),
			'faxOptOut'		=> array('label' => 'Opt Out of Faxes'),
			'doNotCall'		=> array('label' => 'Do Not Call'),
			'retURL'		=> array('label' => 'Return URL')
		);
		
		$data = array();
    	
    	
    	//displaying all submitted fields
		foreach($form_meta["fields"] as $fieldKey => $field){
			
			if($field['type'] == 'section') {
				continue;
			}
			
			if( is_array($field["inputs"]) ){
				$valuearray = array();
			   //handling multi-input fields such as name and address
			   foreach($field["inputs"] as $inputKey => $input){
				   $value = trim(rtrim(stripslashes(@$_POST["input_" . str_replace('.', '_', $input["id"])])));
				   $label = self::getLabel($input["label"], $field, $input);
				   if(!$label) { $label = self::getLabel($field['label'], $field, $input); }
				   if ($label == 'BothNames' && !empty($value)) {
					    $names = explode(" ", $value);
					    $names[0] = trim(rtrim($names[0]));
					    $names[1] = trim(rtrim($names[1]));
					    if(!empty($names[0])) {
					   		$data['first_name'] = $names[0];
					   	}
					   	if(!empty($names[1])) {
					   		$data['last_name'] = $names[1];
					   	}
				   } else if ($label == 'description') {
			   	   		$message = 'true';
					   $data['description'] .= "\n".$value."\n";
			   	   } else if($label == 'street') {
			   	   		$data['street'] = isset($data['street']) ? $data['street'].$value."\n" : $value."\n";
			   	   } else if (trim(strtolower($label)) == 'salesforce' ) {
			   	   		$salesforce = $value;
			   	   } else {
			   	   		if(!empty($field['inputName']) && (apply_filters('gf_salesforce_use_inputname', true) === true)) {
							$valuearray["{$field['inputName']}"][] = $value;
						} elseif(!empty($field['adminLabel']) && (apply_filters('gf_salesforce_use_adminlabel', true) === true)) {
							$valuearray["{$field['adminLabel']}"][] = $value;
						} elseif((!empty($data["{$label}"]) && !empty($value) && $value !== '0') || empty($data["{$label}"]) && array_key_exists("{$label}", $defaults)) {
					   		$data[$label] = $value ;
						}
				   }
			   }
			   if(isset($valuearray["{$field['adminLabel']}"])) {
			   		$data[$label] = implode(apply_filters('gf_salesforce_implode_glue', ', '), $valuearray["{$field['adminLabel']}"]);
			   } elseif(isset($valuearray["{$field['inputName']}"])) {
			   		$data[$label] = implode(apply_filters('gf_salesforce_implode_glue', ', '), $valuearray["{$field['inputName']}"]);
			   }
		   } else {
			   //handling single-input fields such as text and paragraph (textarea)
			   $value = trim(rtrim(stripslashes(@$_POST["input_" . $field["id"]])));		 
			   $label = self::getLabel($field["label"], $field);
			   
			   if ($label == 'BothNames' && !empty($value)) {
				    $names = explode(" ", $value);
				    $names[0] = trim(rtrim($names[0]));
				    $names[1] = trim(rtrim($names[1]));
				    if(!empty($names[0])) {
				   		$data['first_name'] = $names[0];
				   	}
				   	if(!empty($names[1])) {
				   		$data['last_name'] = $names[1];
				   	}
			   } else if ($label == 'description') {
		   	   		$message = 'true';
				   $data['description'] = empty($data['description']) ? $value."\n" : $data['description']."\n".$value."\n";
		   	   } else if($label == 'street') {
			   		$data['street'] .= $value."\n";
			   } else if (trim(strtolower($label)) == 'salesforce' ) {
		   	   		$salesforce = $value;
		   	   } else {
		   	   		if(!empty($field['inputName']) && (apply_filters('gf_salesforce_use_inputname', true) === true)) {
						$data["{$field['inputName']}"] = $value ;
					} elseif(!empty($field['adminLabel']) && (apply_filters('gf_salesforce_use_adminlabel', true) === true)) {
						$data["{$field['adminLabel']}"] = $value ;
					} elseif((!empty($data["{$label}"]) && !empty($value) && $value !== '0') || empty($data["{$label}"]) && (array_key_exists("{$label}", $defaults) || apply_filters('gf_salesforce_use_custom_fields', true) === true)) {
				   		$data["{$label}"] = $value ;
				   }
			   }
		   }
	   }
	   
	   	$data['description'] = isset($data['description']) ? trim(rtrim($data['description'])) : '';
	   	$data['street'] = isset($data['street']) ? trim(rtrim($data['street'])) : '';
	  	$data['emailOptOut'] = !empty($data['emailOptOut']);
	  	$data['faxOptOut'] = !empty($data['faxOptOut']);
	  	$data['doNotCall'] = !empty($data['doNotCall']);
	  	
		$post = $data;
    	
    	$lead_source = isset($form_meta['title']) ? $form_meta['title'] : 'Gravity Forms Form';
		$data['lead_source'] = apply_filters('gf_salesforce_lead_source', $lead_source, $form_meta, $data);
		$data['debug']			= 0;
    //Fixed by Ant for revfoods only.
    if (isset($data['Anticipated meal service start date'])) {
      if (isset($_POST['input_18']) && is_array($_POST['input_18']) && count($_POST['input_18']) == 3) {
        $data['Anticipated meal service start date'] = implode($_POST['input_18'], '/');  
      }      
    }

		$result = self::send_request($data);
		
		if($result && !empty($result)) {
			return true;
		} else {
			return false;
		}
    }
	
	public static function getLabel($temp, $field = '', $input = false){
		$label = false;
				
		if($input && isset($input['id'])) {
			$id = $input['id'];
		} else {
			$id = $field['id'];
		}
		
		$type = $field['type'];
		
		switch($type) {
		
			case 'name':
				if($field['nameFormat'] == 'simple') {
					$label = 'BothNames';
				} else {
					if(strpos($id, '.2')) {
						$label = 'salutation'; // 'Prefix'
					} else if(strpos($id, '.3')) {
						$label = 'first_name';
					} else if(strpos($id, '.6')) {
						$label = 'last_name';
					} else if(strpos($id, '.8')) {
						$label = 'suffix'; // Suffix
					}
				}
				break;
			case 'address':
				if(strpos($id, '.1') || strpos($id, '.2')) {
					$label = 'street'; // 'Prefix'
				} else if(strpos($id, '.3')) {
					$label = 'city';
				} else if(strpos($id, '.4')) {
					$label = 'state'; // Suffix
				} else if(strpos($id, '.5')) {
					$label = 'zip'; // Suffix
				} else if(strpos($id, '.6')) {
					$label = 'country'; // Suffix
				}
				break;
			case 'email':
				$label = 'email';
				break;
		}
		
		if($label) { 
			return $label; 
		}
				
		$the_label = strtolower($temp);
		
		if(!empty($field['inputName']) && (apply_filters('gf_salesforce_use_inputname', true) === true)) {
			$label = $field['inputName'];
		} elseif(!empty($field['adminLabel']) && (apply_filters('gf_salesforce_use_adminlabel', true) === true)) {
			$label = $field['adminLabel'];
		} 
		
		if(!apply_filters('gf_salesforce_autolabel', true) || !empty($label)) { return $label; }
		
		if ($type == 'name' && ($the_label === "first name" || $the_label === "first")) {
			$label = 'first_name'; 
		} else if ($type == 'name' && ($the_label === "last name" || $the_label === "last")) {
			$label = 'last_name';
		} elseif($the_label == 'prefix' || $the_label == 'salutation' || $the_label === 'prefix' || $the_label === 'salutation') {
			$label = 'salutation';
		} else if ( $the_label === 'both names') {
			$label = 'BothNames';
		} else if ($the_label === "company") {
			$label = 'company';
		} else if ($the_label == 'member_status') {
			$label = 'member_status';
		} else if ( $the_label === "emailoptout" ) {
			$label = 'emailOptOut';
		} else if ( $the_label === "faxoptout") {
			$label = 'faxOptOut';
		} else if ( $the_label === "donotcall") {
			$label = 'doNotCall';
		} else if ( $the_label === "email" || $the_label === "e-mail" || $type == 'email') {
			$label = 'email';
		} else if ( strpos( $the_label,"mobile") !== false || strpos( $the_label,"cell") !== false ) {
			$label = 'mobile';
		} else if ( strpos( $the_label,"fax") !== false) {
			$label = 'fax';
		} else if ( strpos( $the_label,"phone") !== false ) {
			$label = 'phone';
		} else if ( strpos( $the_label,"city") !== false ) {
			$label = 'city';
		} else if ( strpos( $the_label,"country") !== false ) {
			$label = 'country';
		} else if ( strpos( $the_label,"state") !== false ) {
			$label = 'state';
		} else if ( strpos( $the_label,"zip") !== false ) {
			$label = 'zip';
		} else if ( strpos( $the_label,"street") !== false || strpos( $the_label,"address") !== false ) {
			$label = 'street';
		} else if ( strpos( $the_label,"website") !== false || strpos( $the_label,"web site") !== false || strpos( $the_label,"web") !== false ||  strpos( $the_label,"url") !== false) {
			$label = 'URL';
		} else if ( strpos( $the_label,"source") !== false ) {
			$label = 'lead_source';
		} else if ( strpos( $the_label,"rating") !== false ) {
			$label = 'rating';
		} else if ( strpos( $the_label,"industry") !== false ) {
			$label = 'industry';
		} else if ( strpos( $the_label,"revenue") !== false ) {
			$label = 'revenue';
		} else if ( strpos( $the_label,"employees") !== false ) {
			$label = 'employees';
		} else if ( strpos( $the_label,"campaign") !== false ) {
			$label = 'Campaign_ID';
		} else if ( strpos( $the_label,"salesforce") !== false ) {	
			$label = 'salesforce';
		} else if ( strpos( $the_label,"title") !== false ) {
			$label = 'title';
		} else if ( strpos( $the_label,"question") !== false || strpos( $the_label,"message") !== false || strpos( $the_label,"comments") !== false || strpos( $the_label,"description") !== false ) {
			$label = 'description';
		} elseif(!empty($field['label']) && (apply_filters('gf_salesforce_use_label', true) === true)) {
			$label = $field['label'];
		} else {
			$label = false;
		}

		return $label;
    }

    public static function disable_salesforce(){
        delete_option("gf_salesforce_oid");
    }

    public static function uninstall(){

        if(!GFSalesforce::has_access("gravityforms_salesforce_uninstall"))
            (__("You don't have adequate permission to uninstall Salesforce Add-On.", "gravityformssalesforce"));

        //removing options
        delete_option("gf_salesforce_oid");

        //Deactivating plugin
        $plugin = "gravityformssalesforce/salesforce.php";
        deactivate_plugins($plugin);
        update_option('recently_activated', array($plugin => time()) + (array)get_option('recently_activated'));
    }

    private static function is_gravityforms_installed(){
        return class_exists("RGForms");
    }

    private static function is_gravityforms_supported(){
        if(class_exists("GFCommon")){
            $is_correct_version = version_compare(GFCommon::$version, self::$min_gravityforms_version, ">=");
            return $is_correct_version;
        }
        else{
            return false;
        }
    }

	public static function is_gravity_forms_installed() {
		global $pagenow, $page; $message = '';

		if($pagenow != 'plugins.php') { return;}

		if(!class_exists('RGForms')) {
			if(file_exists(WP_PLUGIN_DIR.'/gravityforms/gravityforms.php')) {
				$message .= '<p>Gravity Forms is installed but not active. <strong>Activate Gravity Forms</strong> to use the Gravity Forms Salesforce plugin.</p>';
			} else {
				$message .= '<h2><a href="http://katz.si/gravityforms">Gravity Forms</a> is required.</h2><p>You do not have the Gravity Forms plugin enabled. <a href="http://katz.si/gravityforms">Get Gravity Forms</a>.</p>';
			}
		}
		if(!empty($message)) {
			echo '<div id="message" class="error">'.$message.'</div>';
		}
	}
	
    protected static function has_access($required_permission){
        $has_members_plugin = function_exists('members_get_capabilities');
        $has_access = $has_members_plugin ? current_user_can($required_permission) : current_user_can("level_7");
        if($has_access)
            return $has_members_plugin ? $required_permission : "level_7";
        else
            return false;
    }

    //Returns the url of the plugin's root folder
    protected function get_base_url(){
        return plugins_url(null, __FILE__);
    }

    //Returns the physical path of the plugin's root folder
    protected function get_base_path(){
        $folder = basename(dirname(__FILE__));
        return WP_PLUGIN_DIR . "/" . $folder;
    }


}
?>
