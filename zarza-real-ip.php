<?php
/*
Plugin Name: Zarza Real IP
Description: This useful and free plugin corrects automatically the user's IP address and allows Wordpress to use the Real IP address if you're behind a proxy or load balancer like nginx, varnish and so on. It will start working as soon as you activate it. It is also compatible with CloudFlare, Incapsula and many others.
Version: 1.0
Author: Zarza Corp
Author URI: https://zarza.com/
License: GPL2
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
    echo "I'm just a plugin, not much I can do when called directly. Thank you!";
    exit;
}

$ip_headers = array(
    'HTTP_X_FORWARDED_FOR',
    'HTTP_X_FORWARDED',
    'HTTP_FORWARDED_FOR',
    'HTTP_FORWARDED',
    'HTTP_X_REAL_IP',
    'HTTP_CF_CONNECTING_IP' //If CloudFlare is enabled
);

foreach($ip_headers as $z) {

    if($_SERVER[$z] == "127.0.0.1" || !(isset($_SERVER[$z]))){ // If some is reporting localhost let's continue
        unset($_SERVER[$z]);
        continue;
    }

    if (!function_exists('filter_var')) {

        if (preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/',$_SERVER[$z])){
            $_SERVER['REMOTE_ADDR'] = $_SERVER[$z];
            break;
        }

    }else{

        if ( filter_var($_SERVER[$z], FILTER_VALIDATE_IP)){
            $_SERVER['REMOTE_ADDR'] = $_SERVER[$z];
            break;
        }

    }

}    

// Fix issues with HTTPS
if ( (!isset($_SERVER['HTTPS'])) && ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') ) {
    $_SERVER['HTTPS'] = 1;
} else {
    $_SERVER['HTTPS'] = 0;       
}

/*
ZARZA | A HEAD OF OUR TIME
https://zarza.com
*/