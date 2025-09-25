<?php

return [
	'controls' => [
		'default' => [
			'case' => 'users',
			// 'driver' => 'session',
		],
	],
	
	'cases' => [
		'users' => [
			'use' => 'engine',
			'model' => env('AUTH_USER_MODEL', App\Models\User::class),
		],
	],
];
