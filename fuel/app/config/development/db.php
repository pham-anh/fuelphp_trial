<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=foohost;dbname=foodb',
			'username'   => 'foouser',
			'password'   => 'foopasswd',
		),
		'profiling' => true, //add here to see query
	),
);
