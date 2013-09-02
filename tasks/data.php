<?php

namespace Fuel\Tasks;

class Data
{
	public static function run()
	{
		$root = \Model_Category::forge(array(
			'name' => 'Kategóriák',
			'description' => 'Kategória leírások',
			'margin' => 0
		));

		$root->save();

		$alaplap = \Model_Category::forge(array(
			'name' => 'Alaplap',
			'description' => 'Alaplapok',
			'margin' => 10
		))->child($root);
		$alaplap->save();

		$processzor = \Model_Category::forge(array(
			'name' => 'Processzor',
			'description' => 'Processzorok',
			'margin' => 10
		))->child($root);
		$processzor->save();


		$alaplap1 = \Model_Product::forge(array(
			'manufacturer_id' => 1,
			'type_id' => 1,
			'tax_class_id' => 1,
			'name' => 'Alaplap1',
			'Alaplap1 leírása',
			'price' => 10000
		))->set('category', $alaplap);
		$alaplap1->save();

		$alaplap2 = \Model_Product::forge(array(
			'manufacturer_id' => 1,
			'type_id' => 1,
			'tax_class_id' => 1,
			'name' => 'Alaplap2',
			'Alaplap2 leírása',
			'price' => 20000
		))->set('category', $alaplap);
		$alaplap2->save();

		$processzor1 = \Model_Product::forge(array(
			'manufacturer_id' => 1,
			'type_id' => 1,
			'tax_class_id' => 1,
			'name' => 'Processzor1',
			'Processzor1 leírása',
			'price' => 30000
		))->set('category', $processzor);
		$processzor1->save();

		$processzor2 = \Model_Product::forge(array(
			'manufacturer_id' => 1,
			'type_id' => 1,
			'tax_class_id' => 1,
			'name' => 'Processzor2',
			'Processzor2 leírása',
			'price' => 40000
		))->set('category', $processzor);
		$processzor2->save();

		$order = \Model_Order::forge(array(
			'user_id' => 1,
			'shipping_address_id' => 1,
			'payment_address_id' => 1,
			'order_status_id' => 1,
			'order_shipping_id' => 1,
			'order_payment_id' => 1,
			'first_name' => 'Márk',
			'last_name' => 'Sági-Kazár',
			'email' => 'sagikazarmark@gmail.com',
			'phone' => '+36701234567',
			'note' => 'Asd'
		));

		$order->order_product[] = \Model_Order_Product::forge(array(
			'name' => 'Alaplap1',
			'quantity' => 2,
			'price' => 10000,
			'subtotal' => 20000
		))->set('product', $alaplap1);

		$order->order_product[] = \Model_Order_Product::forge(array(
			'name' => 'Alaplap2',
			'quantity' => 1,
			'price' => 20000,
			'subtotal' => 20000
		))->set('product', $alaplap2);

		$order->save();

	}
}