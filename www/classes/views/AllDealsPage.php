<?php 

class AllDealsPage extends Page {

	private $deals;

	public function __construct($model) {
		parent::__construct($model);

		// Get the deals for this page
		$this->totalPages 	= $this->model->howManyPages();
		$this->deals 		= $this->model->getSomeDeals();

	}

	public function contentHTML() {
		include 'templates/alldeals.php';
	}

}