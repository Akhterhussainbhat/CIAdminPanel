<?php 

class adminModel extends CI_model{
    function getlogin($username1,$password1){
        $this->db->where('username', $username1);
        $this->db->where('password',$password1);
        $query = $this->db->get('login');
 
        if($query->num_rows() == 1) {
            return $query->row();
        }
 
        return false;
    }
    function getUser(){
    $this->db->where('id',1);
       
      return $user = $this->db->get('login')->row_array();
    }
    // function userUpdate($profiledata){
    //   // $this->db->where('id',1);
    //    $user=  $this->db->update('login',$profiledata);
    
 
    // }

    function insertcategory($adddata){
        $this->db->insert('category',$adddata);
    }
     function viewcategory(){
        return $users= $this->db->get('category')->result_array();
    
     }
     function editcategory1($id){
         $this->db->where('id',$id);
          return $users = $this->db->get('category')->row_array();
     }
     
     function updatecategory($id,$updatedata){
         $this->db->where('id',$id);
         return $users1=$this->db->update('category',$updatedata);

     }
     function deletecategory($id){
        $this->db->where('id',$id);
        $this->db->delete('category');
    
       }
       function viewcattitle(){
        return $users= $this->db->get('category')->result_array();
    
     }
     function insertsubcategory($addsubdata){
        $this->db->insert('subcategory',$addsubdata);
     }
     function viewsubcategory(){
        $this->db->select('category.title as cattitle, subcategory.*');
        $this->db->from('category');
        $this->db->join('subcategory', 'subcategory.catid = category.id');
        return $users= $this->db->get()->result_array();

     }
     function editsubcat($id){
        $this->db->where('id',$id);
         return $users = $this->db->get('subcategory')->row_array();
    }
    function updatesubcategory($id,$updatesubdata){
        $this->db->where('id',$id);
        return $users1=$this->db->update('subcategory',$updatesubdata);
    }
    function deletesubcat($id){
        $this->db->where('id',$id);
        $this->db->delete('subcategory');
    
       }
       function getpassword(){
           $this->db->where('id',1);
          $query=$this->db->get('login');
           return $query->row();
       }
       public function updatepassword( $passdata)
       {
           $this->db->where('id', 1);
           $this->db->update('login', $passdata);
       }

       public function showcattitleproduct(){
        return $users= $this->db->get('category')->result_array();

       }



       public function showsubcattitlepro($catid){
        //    $this->db->where('catid',$catid);
        //     $query=$this->db->get('subcategory')->result_array();
          
    //  $query=$this->db->get_where('subcategory',array('catid'=>$catid))->result_array();
    //     print_r($query);
    //     exit;
    //          foreach($query as $row){
              
    //            $output='<option value='.$row['id'].'>'.$row['subcattitle'].'</option> ';
               
    //        } 
          
    //         return $output;  
   // $this->db->get_where('subcategory',array('catid'=>$catid))->result_array();
    }

    function insertproduct($insertprodata){
        $this->db->insert('product',$insertprodata);   
    }
    function fetchproduct(){
        $this->db->select('category.title as cattitle, subcategory.subcattitle as subcattitle, product.*');
        $this->db->from('subcategory');
        $this->db->join('subcategory', 'category.id=subcategory.catid ');
        $this->db->join('product', 'subcategory.id=product.subcatid ');
       return $users= $this->db->get()->result_array();
    }
    function showproduct($id){
        $this->db->where('id',$id);
        return $user = $this->db->get('product')->row_array();
    }
    function showprocategory(){
        return $users= $this->db->get('category')->result_array();
    }
    function showproductsubcategory(){
        return $users= $this->db->get('subcategory')->result_array();
    }
//     public function showprosubcategorytitle($catid){
//         $this->db->where('catid',$catid);
//          $query=$this->db->get('subcategory')->result_array();
       
//     // $query=$this->db->get_where('subcategory',array('catid'=>$catid))->result_array();
     
//           foreach($query as $row){
           
//             $output='<option value='.$row['id'].'>'.$row['subcattitle'].'</option> ';
            
//         } 
       
//          return $output;  
//  }
}
?>