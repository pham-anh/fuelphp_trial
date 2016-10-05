<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(

	/**
	 * Base PDO config
	 */
	'default' => array(
		'type'        => 'pdo',
		'connection'  => array(
			'dsn'        => '',
			'hostname'   => '',
			'username'   => null,
			'password'   => null,
			'database'   => '',
			'persistent' => false,
			'compress'   => false,
		),
		'identifier'   => '`',
		'table_prefix' => '',
		'charset'      => 'utf8',
		'collation'    => false,
		'enable_cache' => true,
		'profiling'    => false,
		'readonly'     => false,
	),
);
