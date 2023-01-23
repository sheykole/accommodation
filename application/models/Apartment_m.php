<?php 
Class Apartment_m extends MY_model{
	public function __construct()
	{
		parent::__construct();
		$this->table="accommodations";
	}
	
}