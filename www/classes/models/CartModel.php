<?php

class CartModel extends Model {

	public function getProductForCart( $productID ) {

		// Filter the ID
		$productID = $this->filter( $productID );

		// Get basic info about this product
		$sql = "SELECT name, discounted_price FROM deals WHERE id = $productID";

		// Run the query
		$result = $this->dbc->query($sql);

		// Validate

		// Return as an associative array
		return $result->fetch_assoc();




	}

}