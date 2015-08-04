<?php

class SearchPage extends Page {

	private $searchResults;

	public function __construct($model) {
		parent::__construct($model);

		$this->searchResults = $this->model->search();

	}

	public function contentHTML() {

		while( $row = $this->searchResults->fetch_assoc() ) {

			echo '<h1>'.$row['name'].'</h1>';
			echo '<p>'.$row['description'].'</p>';

		}

	}

}