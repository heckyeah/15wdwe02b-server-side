<?php

class CheckoutPage extends Page {

	private $grandTotal = 0;

	public function __construct($model) {
		parent::__construct($model);

		// Tally up the cart
		foreach( $_SESSION['cart'] as $cartItem ) {
			$this->grandTotal += $cartItem['discounted-price'];
		}

		// Process the "submit" form
		if( isset($_POST['go-pay']) ) {

			// Validate

			// Enter order into database BEFORE!!!! asking for payment
			$this->model->insertOrder();

		}


		

	}

	public function contentHTML() {

		// echo 'Checkout page. Checkout form. Total of purchase';
		include 'templates/checkout.php';


	}


}