<?php
/*
Plugin Name:    Zarza Real IP
Plugin URI:     https://wordpress.org/plugins/zarza-real-ip/ 
Description:    This useful and free plugin corrects automatically the user's IP address and allows Wordpress to use the Real IP address if you're behind a proxy or load balancer like nginx, varnish and so on. It will start working as soon as you activate it. It is also compatible with CloudFlare, Incapsula and many others.
Version:        1.0.3
Author:         Zarza Corp
Author URI:     https://zarza.com/
License:        GPL3

Copyright 2015  Zarza  (website : https://zarza.com)
*/

// Make sure we don't expose any info if called directly
defined('ABSPATH') or die("I'm a plugin, not much I can do when called directly.");   # From wp-load.php

$zrz_ip_headers = array(
    'HTTP_CF_CONNECTING_IP', #CloudFlare
    'HTTP_X_FORWARDED_FOR',  #Incapsula, Cloudlayer
    'HTTP_X_FORWARDED',
    'HTTP_FORWARDED_FOR',
    'HTTP_FORWARDED',
    'HTTP_X_REAL_IP',

);

foreach($zrz_ip_headers as $z) {

    if( ($_SERVER[$z] == "127.0.0.1") || !(isset($_SERVER[$z])) ) { # If some header is reporting localhost let's continue

        unset($_SERVER[$z]);
        continue;
    }

    if(!isset($zrz_ri_lock)){
        if (!function_exists('filter_var')) {

            if (preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/',$_SERVER[$z])){
                $_SERVER['REMOTE_ADDR'] = $_SERVER[$z];
                $zrz_ri_lock = 1;
                continue;
            }

        }else{

            if ( filter_var($_SERVER[$z], FILTER_VALIDATE_IP)){
                $_SERVER['REMOTE_ADDR'] = $_SERVER[$z];
                $zrz_ri_lock = 1;
                continue;
            }

        }
    }
}    

// Fix issues with HTTPS
if (($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') || (strpos($_SERVER["HTTP_CF_VISITOR"], "https")) ) {
    $_SERVER['HTTPS'] = 'on';
} 

/*
ZARZA REAL IP
https://wordpress.org/plugins/zarza-real-ip/

ZARZA | A HEAD OF OUR TIME
https://zarza.com
*/
