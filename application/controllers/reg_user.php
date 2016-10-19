<?php

	class reg_user extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('reg_model');
			$this->load->library('form_validation');
			$this->load->helper('url','form');
			$this->load->library('session');
			}
	function index() {
			

               //kothai dekhabe error ta
          //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

          //Validating UserName Field
          $this->form_validation->set_rules('reg_username', 'Username', 'required|min_length[4]|max_length[15]');
          $this->form_validation->set_rules('reg_password', 'Password ', 'required|min_length[8]|max_length[15]');  //password validate korbe
          $this->form_validation->set_rules('reg_firstname', 'Firstname', 'required|min_length[4]|max_length[15]'); //fname and lastname validate korbe
          $this->form_validation->set_rules('reg_lastname', 'Lastname', 'required|min_length[4]|max_length[15]'); //fname and lastname validate korbe
          $this->form_validation->set_rules('reg_email', 'Email', 'required|valid_email');

          //Validating Mobile no. Field
          $this->form_validation->set_rules('reg_phn_number', 'Mobile No.', 'required|regex_match[/^[0-9]{11}$/]'); //0 theke 9 er moddhe naki, 11ta naki check kortese

          //Validating Address Field
          $this->form_validation->set_rules('reg_address', 'Address', 'required|min_length[10]|max_length[50]');

         /* if ($this->input->post('reg_username') == '')
               {
                     log_message('error', 'Khali string');
                    }
               else{
                    //$msg= validation_errors();
                    log_message('error', $this->input->post('reg_username'));
                    log_message('error', $this->input->post('reg_password'));
               }
*/

         if ($this->form_validation->run() == FALSE) {
               log_message('error', $this->input->post('reg_username'));
               log_message('error',"Form Validation False"); 
              
               $this->load->view("registration_view");           
          }
               
           
          else {
          //Setting values for tabel columns
               
         $now = new DateTime();
		$now->setTimezone(new DateTimeZone('Asia/Dhaka'));
		$date= $now->format('Y-m-d');  
         



          $data = array(
          'userName' => $this->input->post('reg_username'),
          'password' => md5($this->input->post('reg_password')),
          'firstName' => $this->input->post('reg_firstname'),
          'lastName' => $this->input->post('reg_lastname'),
          'eMail' => $this->input->post("reg_email"),
          'contactNo' =>  $this->input->post("reg_phn_number"),
          
          'memberSince'=> $date

               );
               //Transfering data to Model ; insert kortese DB te
          $this->reg_model->insert_user_info($data);
          $data['message'] = $this->input->post('reg_username');

          //Loading View
          log_message('error', $data['message']);
          $this->load->view('login_view', $data);

          //echo "success";
          }
     }

      

	

}

?>

