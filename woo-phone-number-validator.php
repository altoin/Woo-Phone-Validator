<?php
/**
 * Plugin Name: Woo Phone Number Validator
 * Description: Validates the phone number field on checkout page of WooCommerce. Just install and activate the plugin, no settings is required.
 * Author: Toyin Alagbe
 * Version: 1.0
 *Author URI: https://twitter.com/_saucecode
 *
 */

if (! defined( 'ABSPATH' )) {
    exit;
}


function check_woocomerce_is_active() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        add_action( 'admin_notices', 'woocommerce_is_not_active' );

        deactivate_plugins( plugin_basename( __FILE__ ) );

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }
}
add_action( 'admin_init', 'check_woocomerce_is_active' );

function woocommerce_is_not_active(){
    ?>
    <div class="error">
        <p><?php _e("Sorry, Woo Phone Number Validator requires the WooCommerce plugin to be installed and activated","default");?>.
        </p>
    </div>

    <?php
}

require_once(plugin_dir_path(__FILE__).'/libs/loadscript.php');