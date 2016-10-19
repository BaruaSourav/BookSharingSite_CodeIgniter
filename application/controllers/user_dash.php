<?php

	class user_dash extends CI_Controller {

		function __construct(){
			  parent::__construct();
			  $this->load->library('session');
	          $this->load->helper('form');
	          $this->load->helper('url');
	          $this->load->helper('html');
	          $this->load->database();
	          //$this->load->library('form_validation');
	          //load the book model for book table
	          $this->load->model('book_model');
	          //model for the user table
	          $this->load->model('user_model');

		}



		function index(){

			if(!$this->session->userdata('userID'))
			{
				$data['error'] = "<div class=alert-danger><center>You must have to login to get access to the site</center></div>";

				$this->load->view("login_view",$data);

			}
			else{
			$username= $this->session->userdata('username');
			$userID = $this->session->userdata('userID');
			//debuging in log 
			//log_message('error',$username);
			log_message('error',$userID);

			$this->load_dash();
		}
	}
	function add_book(){

		$this->load_addbook();
	}

	function load_addbook(){
		$userID = $this->session->userdata('userID');
		//$data['book'] =$this->book_model->get_book_by_id($bookID);
		$data['user']= $this->user_model->get_user_byid($userID);
		//log_message('error',$data['book']->bookName);
		$this ->load->view('addbook_view',$data);
	}




	function load_bookDetails($bookID){
		$userID = $this->session->userdata('userID');
		$data['book'] =$this->book_model->get_book_by_id($bookID);
		$data['user']= $this->user_model->get_user_byid($userID);
		log_message('error',$data['book']->bookName);
		$this->load->view("bookDetails_view",$data);
	}
	function load_dash(){
		$username= $this->session->userdata('username');
			$userID = $this->session->userdata('userID');
			//debuging in log 
			//log_message('error',$username);
			log_message('error',$userID);


			$data['user']= $this->user_model->get_user_byid($userID);
			$data['books'] =$this->book_model->get_user_books($userID);
			/*$debugBook= $this->book_model->get_user_books($userID);
			foreach ($debugBook as $book) {
				log_message('error',$book->bookName);
				# code...
			}*/

			$this->load->view("dashboard_view",$data);
	}
	function delete_book($id)
	{
		$this->book_model->del_by_id($id);
		$this->load_dash();
		log_message('error','deletecalled'.$id);

	}







	}



?>