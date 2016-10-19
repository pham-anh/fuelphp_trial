<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
	'account/view/:id' => 'account/view/$1',
	'account/edit/:id' => 'account/edit/$1',
	'payment/order/view/:id' => 'payment/order/view/$1',
);
