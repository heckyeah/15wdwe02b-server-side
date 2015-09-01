<?php

class CheckoutModel extends Model {

	public function insertOrder() {

		// Filter the form data
		$name = $this->filter($_POST['name']);
		$postal = $this->filter($_POST['postal']);

		// Combine the contact info
		$contact = $name."\n\n".$postal;

		// Prepare the SQL
		$sql = "INSERT INTO orders VALUES (
											NULL,
											'pending',
											'pending',
											'$contact',
											CURRENT_TIMESTAMP,
											NULL
		)";
		
		// Run the query
		$this->dbc->query($sql);

		// Capture the insert ID so we can reference it when they get back
		$_SESSION['orderID'] = $this->dbc->insert_id;
		$orderID = $_SESSION['orderID'];

		// Make life easier
		$cart = $_SESSION['cart'];

		// Associate all the products with the order
		foreach( $cart as $cartItem ) {

			// Filter the data
			$dealID = $this->filter( $cartItem['id'] );
			$price = $this->filter( $cartItem['discounted-price'] );

			// Prepare SQL
			$sql = "INSERT INTO ordered_deals
					VALUES (
							NULL,
							$dealID,
							$orderID,
							$price
					)";

			$this->dbc->query($sql);

		}

	}

}