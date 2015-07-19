=== Zarza Real IP ===
Contributors:       zarzacorp
Donate link:        https://zarza.com
Tags:               varnish, nginx, cloudflare, incapsula, cloudlayer, real ip, comments, spam, ip, proxy, ip-address, load balancer
Requires at least:  2.7
Tested up to:       4.3
Stable tag:         1.0.3
License:            GPLv3 or later
License URI:        http://www.gnu.org/licenses/gpl.html

This useful and free plugin corrects automatically the user's IP address if you're behind a proxy.

== Description ==

Thank you for your interest in Zarza Real IP. This useful and free plugin corrects automatically the user's IP address and allows Wordpress to use the Real IP address if you're behind a proxy or load balancer like nginx, varnish and so on. It will start working as soon as you activate it. It is also compatible with CloudFlare, Incapsula and many others.

[ZARZA](https://zarza.com/software/) | AHEAD OF OUR TIME
== Changelog ==
= 1.0.3 = 
* Updated: Minor documentation updates. 

= 1.0.2 =
* Improved: Added $_SERVER["HTTP_CF_VISITOR"] verification to turn $_SERVER['HTTPS'] = 'on' if CloudFlare report it on.

= 1.0.1 =
* Updated: Minor documentation updates.

= 1.0 =
* Initial Release Launched

== Installation ==
Automatic installation:

1. Log into your WordPress admin
2. Click __Plugins__
3. Click __Add New__
4. Search for __Zarza Real IP__
5. Click __Install Now__ under "Zarza Real IP"
6. Activate the plugin

Manual installation:

1. Download the __Zarza Real IP__ plugin from https://wordpress.org/plugins/zarza-real-ip/
2. Extract the contents of the zip file
3. Upload the `zarza-real-ip` folder to the `/wp-content/plugins/` directory
4. Activate the __Zarza Real IP__ plugin through the __Plugins__ menu in WordPress