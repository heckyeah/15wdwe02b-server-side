<?php

class SearchModel extends Model {

	public function search() {

		// Filter the user input
		$query = $this->filter($_GET['query']);

		// Prepare SQL
		$sql = "SELECT
					name,
					description
				FROM
					deals
				WHERE 
					name
				LIKE
					'%$query%'
				";

		// Run the query
		$result = $this->dbc->query($sql);

		return $result;


	}

}