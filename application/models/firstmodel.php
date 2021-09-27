<?php 
class Firstmodel extends CI_Model{
    /*public function getuserdata(){
        /*return [
            ['FirstName'=>'Akhter','RollNo'=>'1701003325'],
            ['FirstName'=>'Muneer','RollNo'=>'1701003398'],
        ];
        // acess database now we can acess functionality of database
        $this->load->database();
        // it provides database we cannot change it ->$this->db
     //  $q= $this->db->query("select * from login where id=1");
    // $this->db->select("username"); this is used for only print username coloumn
     $this->db->where ("id",1); /// this techinuqe is called active record
       $q= $this->db->get('login');// by this we can use another database 
        return $q->result_array(); // result can give objects only and result_array() can give array*/

        
      public function insertdata($data)
	{
       
      return $this->db->insert('codeigcrud',$data);
       
	}
    
    }
    ?>
