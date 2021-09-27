<?php 
class User_model extends CI_model{

 function create($formArray){
     $this->db->insert('codeigcrud',$formArray);
 }
  function fetchall(){
     return $users= $this->db->get('codeigcrud')->result_array();
  }
   function getUser($id){
       $this->db->where('id',$id);
     return $user = $this->db->get('codeigcrud')->row_array();
   }
   function userUpdate($id,$formArray){
       $this->db->where('id',$id);
       $this->db->update('codeigcrud',$formArray);

   }
   function userDelete($id){
    $this->db->where('id',$id);
    $this->db->delete('codeigcrud');

   }
   public function login1($username1, $password1)
   {
       $this->db->where('username', $username1);
       $this->db->where('password',$password1);
       $query = $this->db->get('login');

       if($query->num_rows() == 1) {
           return $query->row();
       }

       return false;
   }
}?>




