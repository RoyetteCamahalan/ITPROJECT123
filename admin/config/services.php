<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your variant_round(variant, decimals)s credentials.
	|
	*/

	'mailgun' => [
        'domain' => 'sandbox8cb0fea402984f3ba7c9174b5cfd67b5.mailgun.org',
        'secret' => 'key-fdc84fd7aefbdba498dface332812a29',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'secret' => '',
	],

];
