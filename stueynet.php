<?php

/**
 * Plugin Name: Stueynet Footer
 * Plugin URI: http://stuey.net
 * Description: Stueynet Footer on the bottom
 * Version: 0.1
 * Author: Stuart Starr
 * Author URI: httpo://stuey.net
*/
 
 
 
// include updater
 
include_once('updater.php');
 
 if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
    $config = array(
        'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
        'proper_folder_name' => 'stueynet-network-footer', // this is the name of the folder your plugin lives in
        'api_url' => 'https://api.github.com/repos/stueynet/stueynet-network-footer', // the github API url of your github repo
        'raw_url' => 'https://raw.github.com/username/stueynet-network-footer/master', // the github raw url of your github repo
        'github_url' => 'https://github.com/stueynet/stueynet-network-footer', // the github url of your github repo
        'zip_url' => 'https://github.com/stueynet/stueynet-network-footer/zipball/master', // the zip url of the github repo
        'sslverify' => true // wether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
        'requires' => '3.0', // which version of WordPress does your plugin require?
        'tested' => '3.3', // which version of WordPress is your plugin tested up to?
        'readme' => 'README.md', // which file to use as the readme for the version number
        'access_token' => '', // Access private repositories by authorizing under Appearance > Github Updates when this example plugin is installed
    );
    new WP_GitHub_Updater($config);
}
 
 
 
function stueynet_footer() {
//	wp_enqueue_style( 'bootstrap3', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' );
    echo '<div class="hidden-xs">';	
	$stueynet = file_get_contents('http://stueynet.com/network_footer.php?site=freshgamer'); 
	echo $stueynet;
	echo '</div>';
}
add_action('wp_footer', 'stueynet_footer');