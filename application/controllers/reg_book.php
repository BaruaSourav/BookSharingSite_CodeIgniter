<?php

	class reg_book extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('reg_model');
			$this->load->library('form_validation');
			$this->load->helper('url','form');
			$this->load->library('session');
               $this->load->model('book_model');
               $this->load->model('user_model');
              
			}
	function index() {
			

               //kothai dekhabe error ta
          //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

          
          $this->form_validation->set_rules('reg_bookname', 'Book Name', 'required|min_length[6]|max_length[100]');
          $this->form_validation->set_rules('reg_authorname', 'Author Name ', 'required|min_length[6]|max_length[100]');  //author name validate korbe
          $this->form_validation->set_rules('reg_category', 'Category', 'required|min_length[4]|max_length[100]'); 
         // $this->form_validation->set_rules('fileupload', 'The book file upload', 'required'); 

          $username= $this->session->userdata('username');
          $userID = $this->session->userdata('userID');


         /* $config['upload_path'] = './books/';
          $config['allowed_types'] = 'pdf';
          $config['file_name'] ='book_'.$userID.'_'.rand() ;
          
          $this->load->library('upload', $config);*/

//////////////////////////Debug purpose////////////////////////////////////////////////////////
          if ($this->input->post('reg_bookname') == '')
               {
                     log_message('error', 'Khali string'); 
                    }
               else{
                    //$msg= validation_errors();
                   // log_message('error', $this->input->post('fileupload'));
                    log_message('error', $this->input->post('reg_category'));
                    //log_message('error', $config['file_name']);
               }
/////////////////////////////Orii////////////////////////////////////////////////////////////////////

         if ($this->form_validation->run() == FALSE) {
               log_message('error', $this->input->post('reg_bookname'));
               log_message('error',"Form Validation False"); 
              
               $this->load_addbook();  
               
          }
               
           
          else {
              // $this->upload->do_upload();
          //Setting values for tabel columns

          $fileLink='book_'.$userID.'_'.rand() ;
          $imgLink= 'bookcover_'.$userID.'_'.rand() ;
          
          //$this->do_upload_cover($imgLink);
               
          $now = new DateTime();
		$now->setTimezone(new DateTimeZone('Asia/Dhaka'));
		$date= $now->format('Y-m-d');  
         
         
          $this->do_upload_pdf($fileLink);

          $data = array(
          'bookName' => $this->input->post('reg_bookname'),
          'authorName' => $this->input->post('reg_authorname'),
          'category' => $this->input->post('reg_category'),
          'isPurchasable' => $this->input->post('buyable'),
          'isLendable' => $this->input->post("lendable"),
          'fileLink' => $fileLink,
          'ownerID'=> $userID,
          'uploadDate'=> $date,
          'description'=>$this->input->post('comment')
          
               );
               //Transfering data to Model ; insert kortese DB te
          
          $this->book_model->insert_book($data);
          
          //$data['message'] = $this->input->post('reg_username');

          //Loading View
          //log_message('error', $data['message']);
          /*$data['user']= $this->user_model->get_user_byid($userID);
          $data['books'] =$this->book_model->get_user_books($userID);*/
           $this->load_addbook();

          //echo "success";
          }
     }

     function do_upload_pdf($name)
     {
          

          $userID = $this->session->userdata('userID');// $SESSION['userID']

          log_message('error', 'In upload');
          $config['upload_path'] = './books/';
          $config['allowed_types'] = 'pdf';
          $config['max_size'] = '51200';

          $config['file_name'] =$name;

          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('pdfupload'))
               {
            // case - failure
                    $data['pdferror'] = $this->upload->display_errors();
                     $data['user']= $this->user_model->get_user_byid($userID);
                    $data['books'] =$this->book_model->get_user_books($userID);
                     $this->load_addbook();
          }
        else
        {
            // case - success
            $upload_data = $this->upload->data();
             $data['user']= $this->user_model->get_user_byid($userID);
               $data['books'] =$this->book_model->get_user_books($userID);

            $data['success_msg'] = '<div class="alert alert-success text-center">Your file <strong>' . $upload_data['file_name'] . '</strong> was successfully uploaded!</div>';
            $this->load->view("addbook_view",$data);
            
             
        }

         
     }

     function do_upload_cover($name)
     {
          

          $userID = $this->session->userdata('userID');


          $config['upload_path'] = './bookcover/';
          $config['allowed_types'] = 'jpg|png|jpeg';
          $config['max_size'] = '3072';
          $config['max_width']  = '512';
          $config['max_height']  = '384';

          $config['file_name'] =$name ;
          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('coverupload'))
               {
            // case - failure
                    $data['covererror'] = $this->upload->display_errors();
                     $data['user']= $this->user_model->get_user_byid($userID);
                    $data['books'] =$this->book_model->get_user_books($userID);
                     $this->load_addbook();
          }
        else
        {
            // case - success
            $upload_data = $this->upload->data();
             $data['user']= $this->user_model->get_user_byid($userID);
               $data['books'] =$this->book_model->get_user_books($userID);

            $data['success_msg'] = '<div class="alert alert-success text-center">Your file <strong>' . $upload_data['file_name'] . '</strong> was successfully uploaded!</div>';

           
        }

         
     }
     function load_addbook(){
          $username= $this->session->userdata('username');
               $userID = $this->session->userdata('userID');
               //debuging in log 
               //log_message('error',$username);
               log_message('error',$userID);


               $data['user']= $this->user_model->get_user_byid($userID); /******/
               $data['books'] =$this->book_model->get_user_books($userID);
               /*$debugBook= $this->book_model->get_user_books($userID);
               foreach ($debugBook as $book) {
                    log_message('error',$book->bookName);
                    # code...
               }*/

               $this->load->view("addbook_view",$data);
     }

      

	

}

?>

