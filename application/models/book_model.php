<?php
//all the functions that are related to the book table of bookhub database
	class book_model extends CI_Model
	{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }

     //book table theke userID milai book ane-- sourav

     function get_user_books($uID)
     {
        $this->db->where('ownerID', $uID);
        $query = $this->db->get('book');
        return $query->result();
     }
     //id er respect a ekta BOOK row return korbe --sourav
     function get_book_by_id($id)
     {
        $this->db->where('bookID', $id);
        $query = $this->db->get('book');
        return $query->row();

     }
     //inserts a book
     function insert_book($data)
     {
         $this->db->insert('book',$data);
     }

     //eta userid dile book er number return korbe
     function user_books($ownerid)
      {
              $this->db->where('ownerID', $ownerid);
              $query = $this->db->get('book');
              return $query->row();
       }
       //sourav -deletes a book by id
       function del_by_id($bid){
          $this->db->where('bookID', $bid);
          $this->db->delete('book');

       }
       function search($text){

          
           $this->db->like('bookName',$text);
           $this->db->or_like('authorName',$text);
           $this->db->limit(10);
           $query =$this->db->get("book");
            return $query->result();


       }
       

     
}?>