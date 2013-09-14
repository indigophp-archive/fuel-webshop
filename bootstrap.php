<?php

$paths = \Config::get( 'module_paths', array() );
$paths[] = __DIR__.DS.'modules'.DS;
\Config::set('module_paths', $paths);

\Module::load('webshop');

Autoloader::add_core_namespace('Webshop');

Autoloader::add_classes(array(
	'Webshop\\Webshop'          => __DIR__ . '/classes/webshop.php',
	'Webshop\\WebshopException' => __DIR__ . '/classes/webshop.php',
	'Webshop\\Webshop_Driver'   => __DIR__ . '/classes/webshop/driver.php',

	'Webshop\\Model_Product'       => __DIR__ . '/classes/model/product.php',
	'Webshop\\Model_Product_Meta'  => __DIR__ . '/classes/model/product/meta.php',
	'Webshop\\Model_Product_Field' => __DIR__ . '/classes/model/product/field.php',
	'Webshop\\Model_Category'      => __DIR__ . '/classes/model/category.php',
	'Webshop\\Model_Price'         => __DIR__ . '/classes/model/price.php',
	'Webshop\\Model_Price_List'    => __DIR__ . '/classes/model/price/list.php',

	'Webshop\\Model_Order'         => __DIR__ . '/classes/model/order.php',
	'Webshop\\Model_Order_Meta'    => __DIR__ . '/classes/model/order/meta.php',
	'Webshop\\Model_Order_Product' => __DIR__ . '/classes/model/order/product.php',
	'Webshop\\Model_Order_History' => __DIR__ . '/classes/model/order/history.php',

	'Webshop\\Model_Address' => __DIR__ . '/classes/model/address.php',
	'Webshop\\Model_Manufacturer' => __DIR__ . '/classes/model/manufacturer.php',

	'Webshop\\Model_Distributor'      => __DIR__ . '/classes/model/distributor.php',
	'Webshop\\Model_Distributor_Meta' => __DIR__ . '/classes/model/distributor/meta.php',
	'Webshop\\Distributor'            => __DIR__ . '/classes/distributor.php',
	'Webshop\\Distributor_Driver'     => __DIR__ . '/classes/distributor/driver.php',
	'Webshop\\Distributor_Request'    => __DIR__ . '/classes/distributor/request.php',
	'Webshop\\Distributor_Curl'       => __DIR__ . '/classes/distributor/curl.php',
	'Webshop\\Distributor_Soap'       => __DIR__ . '/classes/distributor/soap.php',

));
