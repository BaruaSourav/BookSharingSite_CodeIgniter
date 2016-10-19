<?php

	class readpdf extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('reg_model');
			$this->load->library('form_validation');
			$this->load->helper('url','form');
			$this->load->library('session');
            $this->load->model('book_model');
             $this->load->model('user_model');
    }
	
	
  
  	function read($bid){
  				$username= $this->session->userdata('username');
               $userID = $this->session->userdata('userID');
               //debuging in log 
               //log_message('error',$username);
               log_message('error',$userID);


               $data['user']= $this->user_model->get_user_byid($userID);
               $data['book'] =$this->book_model->get_book_by_id($bid);


               $book=$this->book_model->get_book_by_id($bid);

               $source =  base_url("web/viewer.html").'?file='.base_url("books/".$book->fileLink).'.pdf';
               log_message('error', $source);
               $data['source']= $source;
               $this->load->view("bookRead_view",$data);



  	}
}
			

?>