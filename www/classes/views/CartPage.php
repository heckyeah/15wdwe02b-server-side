<?php

class CartPage extends Page {

	public function __construct($model) {
		parent::__construct($model);

		// If the user has submitted the add-to-cart form
		if( isset($_POST['add-to-cart']) ) {

			// Get the discounted price of this product
			$productInfo = $this->model->getProductForCart( $_POST['productID'] );

			// If the item is already in the cart
			// ...

			// Prepare new array of data to go into cart
			$cartItem = [
				'id'=>$_POST['productID'],
				'name'=>$productInfo['name'],
				'discounted-price'=>$productInfo['discounted_price']
			];

			// Add item to cart
			$_SESSION['cart'][] = $cartItem;

			//array_push($_SESSION['cart'], $cartItem);

			// Redirect the user to the cart page so they can't resubmit the form
			header('Location: index.php?page=cart');

		}

	}

	public function contentHTML() {
			
		include 'templates/cart-contents.php';

	}

}