<?php

class HomeModel extends Model {

	// Methods
	public function getLatestDeals() {
		
		return $this->dbc->query("SELECT id, name, image, description FROM deals ORDER BY start_date DESC LIMIT 6");

	}

}