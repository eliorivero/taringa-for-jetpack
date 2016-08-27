<?php

include('vendor/autoload.php');


function taringa_for_jetpack_authorize() {

	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	$server = new League\OAuth1\Client\Server\Taringa(array(
		'identifier' => get_option( 'taringa-for-jetpack_identifier' ),
		'secret' => get_option( 'taringa-for-jetpack_secret' ),
		'callback_uri' => home_url(),
		) );

	$temporaryCredentials = $server->getTemporaryCredentials();
	$server->authorize($temporaryCredentials);
	
}