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


	}

}