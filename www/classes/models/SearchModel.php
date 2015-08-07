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

	public function searchByCategory() {

		// Filter the category ID
		$categoryID = $this->filter($_GET['categoryid']);

		// Prepare SQL
		$sql = "SELECT 
					name, description
				FROM
					deals
				JOIN
					deals_categories
				ON
					deals.id = Deal_ID
				WHERE
					Category_ID = $categoryID
		";

		// Run the query
		$result = $this->dbc->query($sql);

		return $result;



	}

}