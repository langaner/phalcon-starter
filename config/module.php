<?php

/**
 * Defining a modules. 
 */
return [
	'folder' => '',
	'modules' => [
		'api'	=> [
			'name' => 'Api\Module',
			'path' => '/../app/Api',
			'useRoutes'	=> true
		],
		'backend'	=> [
			'name' => 'Backend\Module',
			'path' => '/../app/Backend',
			'useRoutes'	=> true
		]
	]
];

