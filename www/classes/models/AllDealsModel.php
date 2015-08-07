<?php

class AllDealsModel extends Model {

	public $itemsPerPage = 3;
	public $totalPages;

	public function howManyPages() {
		// Find out how many items there are in the database
		$totalItems = $this->dbc->query("SELECT COUNT(Title) AS TotalItems FROM pages ");
		$totalItems = $totalItems->fetch_assoc();
		$totalItems = $totalItems['TotalItems'];

		// Calculate how many pages are needed
		$this->totalPages = $totalItems / $this->itemsPerPage;
	}

	public function getSomeDeals() {

		

	}
	
}