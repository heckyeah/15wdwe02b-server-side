<?php

abstract class Page {

	// Properties
	public $title;
	public $description;
	public $model;

	// Constructor
	public function __construct($model) {
		$this->model = $model;

		// Get page data
		$this->model->getPageInfo();
	}

	// Function to build the HTML
	public function buildHTML() {

		// Header
		include 'templates/header.php';

		// Content
		$this->contentHTML();

		// Footer
		include 'templates/footer.php';

	}

	abstract function contentHTML();

	public function foundationAlert( $message, $type ) {
		if( $message == '' ) { return; }

		echo '<small class="alert-box '.$type.'">';
		echo $message;
		echo '</small>';
		
	}

}