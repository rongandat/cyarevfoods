<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'revfoods_options', 'revfoods_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'revfoods' ), __( 'Theme Options', 'revfoods' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>"  . __( ' Theme Options', 'revfoods' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'revfoods' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'revfoods_options' ); ?>
			<?php $options = get_option( 'revfoods_theme_options' ); ?>

			<table class="form-table">
				<tr valign="top"><th scope="row"><?php _e( 'Question Link', 'revfoods' ); ?></th>
					<td>
						<input id="revfoods_theme_options[question_url]" class="regular-text" type="text" name="revfoods_theme_options[question_url]" value="<?php esc_attr_e( $options['question_url'] ); ?>" />
						<label class="description" for="revfoods_theme_options[question_url]"><?php _e( 'Question Link', 'revfoods' ); ?></label>
					</td>
				</tr>
                                <tr valign="top"><th scope="row"><?php _e( 'Legal Link', 'revfoods' ); ?></th>
					<td>
						<input id="revfoods_theme_options[legal_url]" class="regular-text" type="text" name="revfoods_theme_options[legal_url]" value="<?php esc_attr_e( $options['legal_url'] ); ?>" />   
                                                <label class="description" for="revfoods_theme_options[legal_url]"><?php _e( 'Legal link in the ver y bottom line of the footer', 'revfoods' ); ?></label>
					</td>
				</tr>
                                <tr valign="top"><th scope="row"><?php _e( 'Veneer Link', 'revfoods' ); ?></th>
					<td>
						<input id="revfoods_theme_options[veneer_url]" class="regular-text" type="text" name="revfoods_theme_options[veneer_url]" value="<?php esc_attr_e( $options['veneer_url'] ); ?>" />
                                                <label class="description" for="revfoods_theme_options[veneer_url]"><?php _e( 'Veneer link in the ver y bottom line of the footer', 'revfoods' ); ?></label>
					</td>
				</tr>

			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'revfoods' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	$input['question_url'] = wp_filter_nohtml_kses( $input['question_url'] );
        $input['legal_url'] = wp_filter_nohtml_kses( $input['legal_url'] );
        $input['veneer_url'] = wp_filter_nohtml_kses( $input['veneer_url'] );
	return $input;
}
