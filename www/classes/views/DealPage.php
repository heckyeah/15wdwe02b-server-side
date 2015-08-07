<?php

class DealPage extends Page {

	private $dealInfo;
	private $dealTags;

	public function __construct($model) {
		parent::__construct($model);

		// Get info for the deal ID in the address bar
		$this->dealInfo = $this->model->getDealInfo();
		$this->dealTags = $this->model->getDealTags();

	}

	public function contentHTML() {
		
		// If something went wrong with the deal
		if( $this->dealInfo == false ) {
			echo 'Something went wrong';
			return;
		}

		echo '<pre>';
		print_r($this->dealInfo);
		echo '</pre>';

		include 'templates/singledeal.php';



	}

}