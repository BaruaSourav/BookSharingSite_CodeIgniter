<?php

	class home extends CI_Controller {

		function __construct() {
			parent:: __construct();
			$this->load->helper('url','form');
    }
	
	function index() {
		$data['user'] = "well";
      $this->load->view("home_view", $data);


  }
  function about_us(){

  	$this->load->view("aboutus_view");
  }
}
			

?>

