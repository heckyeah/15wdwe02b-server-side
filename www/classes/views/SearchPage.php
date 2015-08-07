<?php

class SearchPage extends Page {

	private $searchResults;

	public function __construct($model) {
		parent::__construct($model);

		// If the user is searching for deals based on keywords
		if( isset($_GET['query']) ) {
			$this->searchResults = $this->model->search();
		}elseif( isset($_GET['categoryid']) ) {
			$this->searchResults = $this->model->searchByCategory();
		}
		

	}

	public function contentHTML() {

		while( $row = $this->searchResults->fetch_assoc() ) {

			echo '<h1>'.$row['name'].'</h1>';
			echo '<p>'.$row['description'].'</p>';

		}

	}

}