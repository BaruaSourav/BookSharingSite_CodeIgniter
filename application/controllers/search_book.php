<?php

	class search_book extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('reg_model');
			$this->load->library('form_validation');
			$this->load->helper('url','form');
			$this->load->library('session');
        $this->load->model('book_model');
        $this->load->model('user_model');
              
			}
	   function index() 
     {
			

             
     }
     function ajaxSearch()
     {
          if($this->input->method() == 'post')
          {
            log_message('error','in Ajax search from post method .ajax worked');
            $q =$this->input->post("search");
            $str= $this->input->post("search");
            $results= $this->book_model->search($str);
            foreach($results as $res)
            {
              log_message('error',$res->bookName);
            }
             
              if(empty($results))
              {
                echo '<p>no result</p>';

              }

              else {
              foreach ($results as $res)
                  {
                      $bookname=$res->bookName;
                      $author=$res->authorName;
                      $link=$res->coverImg;
                      $b_bookname='<strong><font size = 4px;>'.$q.'</font></strong>';
                      $b_author='<strong><font size = 4px ;>'.$q.'</font></strong>';
                      $final_bookname = str_ireplace($q, $b_bookname, $bookname);
                      $final_author = str_ireplace($q, $b_author, $author);
                      ?>
                      <div class="show" align="left">
                                  


                          <?php 
                            if(!$link=='') : ?>
                                <img  src="<?php echo base_url('bookcover/'.$link);?> "/>
                          <?php else: ?>
                              <img style="width:40px; height:43px; margin-right:6px; margin-top: -7px;"  src="<?php echo base_url('defaults/noCover.png');?>" />
                            <?php endif;?>

                        

                              <span id ="name" class="name text-left" style = "position:relative; left:-4px; top:-15px;"><?php echo $final_bookname; ?></span>&nbsp;<br/>
                              <span id="author" class="text-left" style=" position:relative; left: 45px; font-size:10px; top :-25px;"><?php echo $final_author; ?></span>&nbsp;<br/>
          
                    </div>
            
           

            <?php
           
          }
        }


        }

     }

     
     function load_search(){
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

               $this->load->view("searchbook_view",$data);
     }

      

	

}

?>