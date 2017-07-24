<?php

// You can find the keys here : https://apps.twitter.com/

return [
	'debug'               => env('APP_DEBUG', false),

	'API_URL'             => 'api.twitter.com',
	'UPLOAD_URL'          => 'upload.twitter.com',
	'API_VERSION'         => '1.1',
	'AUTHENTICATE_URL'    => 'https://api.twitter.com/oauth/authenticate',
	'AUTHORIZE_URL'       => 'https://api.twitter.com/oauth/authorize',
	'ACCESS_TOKEN_URL'    => 'https://api.twitter.com/oauth/access_token',
	'REQUEST_TOKEN_URL'   => 'https://api.twitter.com/oauth/request_token',
	'USE_SSL'             => true,

	'CONSUMER_KEY'        => env('TWITTER_CONSUMER_KEY', 'cdgWG3j38GE7ZzguypD4iSWts'),
	'CONSUMER_SECRET'     => env('TWITTER_CONSUMER_SECRET', 'AGHoYBUnEKvTV6sbuQPzsEjRh2V7LF8nxek6JYdXrqE9bgBabn'),
	'ACCESS_TOKEN'        => env('TWITTER_ACCESS_TOKEN', '889569677403402245-OgDReYaNQ3bbLdPagwUuycQI2oh2Vv5'),
	'ACCESS_TOKEN_SECRET' => env('TWITTER_ACCESS_TOKEN_SECRET', 'La3KckU79SlRniKNv1SPhWeRDjZgz8QRfk9QITi2jh6SI'),
];
