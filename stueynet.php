<?php

/**
 * Plugin Name: Stueynet Footer
 * Plugin URI: http://stuey.net
 * Description: Stueynet Footer on the bottom
 * Version: 0.4
 * Author: Stuart Starr
 * Author URI: http://stuey.net
*/
 
 
 
// include updater
 
add_action( 'init', 'stueynet_update_init' );
function stueynet_update_init() {

	include_once 'updater.php';

	define( 'WP_GITHUB_FORCE_UPDATE', true );

	if ( is_admin() ) { // note the use of is_admin() to double check that this is happening in the admin

		$config = array(
			'slug' => plugin_basename( __FILE__ ),
			'proper_folder_name' => 'stueynet-network-footer',
			'api_url' => 'https://api.github.com/repos/stueynet/stueynet-network-footer',
			'raw_url' => 'https://raw.github.com/stueynet/stueynet-network-footer/master',
			'github_url' => 'https://github.com/stueynet/stueynet-network-footer',
			'zip_url' => 'https://github.com/stueynet/stueynet-network-footer/archive/master.zip',
			'sslverify' => true,
			'requires' => '3.0',
			'tested' => '3.3',
			'readme' => 'README.md',
			'access_token' => '',
		);

		new WP_GitHub_Updater( $config );

	}

} 
 
 
function stueynet_footer() {
//	wp_enqueue_style( 'bootstrap3', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' );
    echo '<div class="hidden-xs">';	
	$stueynet = file_get_contents('http://stueynet.com/network_footer.php?site=freshgamer'); 
	echo $stueynet;
	echo '</div>';
}
add_action('wp_footer', 'stueynet_footer');