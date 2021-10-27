<?
	ini_set('display_errors', 0);
	require 'autoload.php';

	$VKBot = new VKBot([
		'api_secret' => '',
		'confirmation' => '',
		'api_token' => ''
	]);

	$VKBot->execute();