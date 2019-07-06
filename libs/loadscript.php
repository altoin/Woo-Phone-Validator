<?php
function woo_phone_validator_add_scripts()
{
    wp_enqueue_script('wpv_tel_scripts',plugin_dir_url(__FILE__).'../js/intlTelInput.js',array(),null);
    wp_enqueue_script('wpv_util_scripts',plugin_dir_url(__FILE__).'../js/utils.js');
    wp_enqueue_style('wpv_defaultcss_style',plugin_dir_url(__FILE__).'../css/default.css',array(),null);
    wp_enqueue_style('wpv_telinputcss_style',plugin_dir_url(__FILE__).'../css/intlTelInput.min.css',array(),null);
}

add_action('wp_enqueue_scripts','woo_phone_validator_add_scripts');




function load_checkout_script()
{
    if(is_checkout())
    {
        wp_enqueue_script('wpv_default_scripts',plugin_dir_url(__FILE__).'../js/default.js');
    }
}
add_action('wp_enqueue_scripts','load_checkout_script');