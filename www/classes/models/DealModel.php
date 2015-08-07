<?php

class DealModel extends Model {

	public function getDealInfo() {

		// Filter the ID
		$dealID = $this->filter($_GET['dealid']);

		// Make sure the dealID is a number
		if( !is_numeric($dealID) ) {
			// ID is not a number. It has been tampered with
			return false;
		}

		// Prepare SQL
		$sql = "SELECT
					deals.name AS deal_name,
					original_price,
					discounted_price, 
					image,
					start_date, 
					end_date, 
					deals.description AS deal_description,
					code,
					businesses.name AS business_name,
					logo,
					phone,
					website,
					businesses.description AS business_description
				FROM
					deals
				JOIN
					businesses
				ON
					businesses.id = deals.businessID
				WHERE
					deals.id = $dealID
				";
		
		// Run the query
		$result = $this->dbc->query($sql);

		// If there is a result
		if( $result->num_rows == 1 ) {
			return $result->fetch_assoc();
		} else {
			// Either the deal didn't exist or the ID was tampered with
			return false;
		}

	}

	public function getDealTags() {

		// Filter the ID
		$dealID = $this->filter($_GET['dealid']);

		// Make sure the dealID is a number
		if( !is_numeric($dealID) ) {
			// ID is not a number. It has been tampered with
			return false;
		}

		// Prepare SQL
		$sql = "SELECT
					category, categories.id
				FROM 
					categories
				JOIN
					deals_categories
				ON
					categories.id = Category_ID
				WHERE
					Deal_ID = $dealID";

		// Run the query
		$result = $this->dbc->query($sql);

		return $result;

	}

}