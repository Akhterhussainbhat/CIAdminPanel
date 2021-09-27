<?php 
class Admincontroller extends CI_controller{

 function indexadmin(){
     $this->header();
     $this->load->view('AdminpanelView/index');
    // $this->load->view('AdminpanelView/includes/header',$data);

 }
 function loginadmin(){
      
    $this->load->model('adminPanel/adminModel');
    $this->form_validation->set_rules('username', 'username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    if($this->form_validation->run() == false){
        $this->load->view('AdminpanelView/adminPages/login');
    } 
    else {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->adminModel->getlogin($username, $password);
        if($user){
            $userdata = array(
                'id' => $user->id,
                'username' => $user->username,
                'password' => $user->password,   
            );
            $this->session->set_userdata($userdata);
            redirect('Admincon/Admincontroller/indexadmin');
        }
        else {
            $this->session->set_flashdata('message', 'Invalid Username or password');
            redirect('Admincon/Admincontroller/loginadmin');
        }
    }
}

// profile material
public function logout()
{
    $this->session->sess_destroy();
    redirect('Admincon/Admincontroller/loginadmin');
}

public function header(){   
    $this->load->model('adminPanel/adminModel');
   $user= $this->adminModel->getUser();
    $data=array();
    $data['users']=$user;
    $this->load->view('AdminpanelView/includes/header',$data);
}

    
 public function profile(){   
     $this->header();
    $this->load->model('adminPanel/adminModel');
   $user= $this->adminModel->getUser();
    $data=array();
    $data['user']=$user;
   
     $this->load->view('AdminpanelView/adminPages/profile',$data);
    $username= $this->input->post('username');
    
    $email= $this->input->post('email');
    $phone=$this->input->post('phone');
    $education=$this->input->post('education');
    $skills=$this->input->post('skills');
    
//     $imageupload=array(
//         'upload_path'=>'./upload/',
//         'allowed_types'=>'gif|jpg|png'

//      );
     
//      $this->load->library("upload",$imageupload);
     

// if(!$this->upload->do_upload('image')){
//     echo "error";
// }
// else{
//     $filedata=$this->upload->data();
//     $filename= $filedata['file_name'];
    $profiledata= array(
        'username'=>$username,
        'email'=>$email,
        'phone'=>$phone,
        'education'=>$education,
        'skills'=>$skills,
       // 'image'=>$filename
    );
   
        // $this->db->where('id',1);
         $user=  $this->db->update('login',$profiledata,array('id'=>1));
         return $user;
   $this->session->set_flashdata('success','Data is updated Successfully!');
      redirect('Admincon/Admincontroller/profile');

      
    //  $this->adminModel->userUpdate($profiledata);
    //  //$this->session->set_flashdata('success','Data is updated Successfully!');
    //  //redirect('Admincon/Admincontroller/profile');


 }
 // change password
 function changepassword(){
    $this->load->model('adminPanel/adminModel');
    $user= $this->adminModel->getUser();
     $data=array();
     $data['users']=$user;
     $this->load->view('AdminpanelView/includes/header',$data);
     $this->form_validation->set_rules('oldpassword', 'old password', 'callback_password_check');
     $this->form_validation->set_rules('newpassword', 'new password', 'required');
     $this->form_validation->set_rules('confirmpassword', 'confirm password', 'required|matches[newpassword]');
     $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
     if($this->form_validation->run() == false) {    
         $this->load->view('AdminpanelView/adminPages/changepassword',$data);
        
     }
     else {

        $newpassword = $this->input->post('newpassword');

        $this->adminModel->updatepassword( array('password' => $newpassword));
        $this->session->set_flashdata('success','Data is Added Successfully!');

        redirect('Admincon/Admincontroller/loginadmin');
    }
}
    public function password_check($oldpassword)
    {
        $user = $this->adminModel->getpassword();
        if($user->password !== $oldpassword) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }

        return true;
    

 }

 // category material
  function addcategory(){
      $this->header();
      $this->load->model('adminPanel/adminModel');
         $this->form_validation->set_rules('title','Title','required');
    $this->form_validation->set_rules('description','Description','required');
  
    if($this->form_validation->run()==false){
        $this->load->view('AdminpanelView/Category/addcategory');  

    }
    else{
        $title=$this->input->post('title');
        $description=$this->input->post('description');
        $imgupload=array(
            'upload_path'=>'./upload/',
            'allowed_types'=>'gif|jpg|png'
         );
        
         $this->load->library("upload",$imgupload);
      

        if(!$this->upload->do_upload('image')){
            echo "error";
        }
       else{
          $filedata=$this->upload->data();
          $filename=$filedata['file_name'];  
          $adddata= array(
            'title'=>$title,
            'description'=>$description,
            'image'=>$filename

          );
          $this->adminModel->insertcategory($adddata);
          $this->session->set_flashdata('success','Data is Added Successfully!');
          redirect('Admincon/Admincontroller/viewcategory');
    }

    }
    
  }
  // view category
  function viewcategory(){
      $this->header();
    $this->load->model('adminPanel/adminModel');
    $fetch=$this->adminModel->viewcategory();
    $data=array();
    $data['fetchall']=$fetch;
    $this->load->view('AdminpanelView/Category/viewcategory',$data);  


  }
  // edit category
  function editcategory($id){
      $this->header();
      $this->load->model('adminPanel/adminModel');
      $edituser=$this->adminModel->editcategory1($id);
      $data=array();
      $data['editdata']=$edituser;
      $this->form_validation->set_rules('title','Title','required');
      $this->form_validation->set_rules('description','Description','required');

      if($this->form_validation->run()==false){

    $this->load->view('AdminpanelView/Category/editcategory',$data);  
      }
      // update data
      else{
          $title=$this->input->post('title');
          $description=$this->input->post('description');
          $imageupload=array(
            'upload_path'=>'./upload/',
            'allowed_types'=>'gif|jpg|png'
        );
        $this->load->library("upload",$imageupload);   
        if(!$this->upload->do_upload('image')){
            echo "error";
        }
        else{
            $filedata=$this->upload->data();
            $filename=$filedata['file_name'];  
            $updatedata= array(
              'title'=>$title,
              'description'=>$description,
              'image'=>$filename
            );
           
            $this->adminModel->updatecategory($id,$updatedata);
            $this->session->set_flashdata('success','Data is Added Successfully!');
            redirect(base_url().'Admincon/Admincontroller/viewcategory');
            
        }
      }
  }
  // delete category
  public function deletecategory($userid){
    $this->load->model('adminPanel/adminModel');
    $user=$this->adminModel->editcategory1($userid);
    if(empty($user)){
        $this->session->set_flashdata('failure','Data is not found!');
        redirect(base_url().'Admincon/Admincontroller/viewcategory');
    }
    else{
        $this->adminModel->deletecategory($userid);
    $this->session->set_flashdata('success','Data is Successfully deleted');
    redirect('Admincon/Admincontroller/viewcategory');
 }
}
// show category title and insert subcategory
function addsubcategory(){
    $this->header();
    $this->load->model('adminPanel/adminModel');
    $fetch=$this->adminModel->viewcattitle();
    $data=array();
    $data['fetchall']=$fetch; 
    $this->form_validation->set_rules('subcattitle','Subcattitle','required');
    $this->form_validation->set_rules('description','Description','required');
   if($this->form_validation->run()==false){
    $this->load->view('AdminpanelView/subCategory/addsubcategory',$data);  
}
else{
    $cattitle=$this->input->post('cattitle');
    $subcattitle=$this->input->post('subcattitle');
    $description=$this->input->post('description');
    $imageupload=array(
                'upload_path'=>'./upload/',
                'allowed_types'=>'gif|jpg|png'

    );
    $this->load->library('upload',$imageupload);
    if(!$this->upload->do_upload('image')){
        echo "error";
    }
    else{
        $filedata=$this->upload->data();
        $filename=$filedata['file_name'];
        $addsubdata= array(
            'catid'=>$cattitle,
            'subcattitle'=>$subcattitle,
            'description'=>$description,
            'image'=>$filename

          );
         
          $this->adminModel->insertsubcategory($addsubdata);
          $this->session->set_flashdata('success','Data is Added Successfully!');
          redirect(base_url().'Admincon/Admincontroller/viewsubcategory');   
    }
}
  }
  //  view subcategory
  function viewsubcategory(){
      $this->header();
    $this->load->model('adminPanel/adminModel');
    $fetch=$this->adminModel->viewsubcategory();
    $data=array();
    $data['fetchsubcat']=$fetch;
    $this->load->view('AdminpanelView/subCategory/viewsubcategory',$data);  
  }
  // edit sub category
  function editsubcategory($id){
      $this->load->model('adminPanel/adminModel');
      $editval=$this->adminModel->editsubcat($id);
      $fetch=$this->adminModel->viewcategory();
      $user= $this->adminModel->getUser();
      $data=array();
      $data['showedit']=$editval;
      $data['fetch']=$fetch;
      $data['users']=$user;
      $this->load->view('AdminpanelView/includes/header',$data);
      
      $this->form_validation->set_rules('subcattitle','Subcattitle','required');
      $this->form_validation->set_rules('description','Description','required');
     if($this->form_validation->run()==false){
    $this->load->view('AdminpanelView/subCategory/editsubcategory',$data);
  }
  else{
    $cattitle=$this->input->post('cateid');
    $subcattitle=$this->input->post('subcattitle');
    $description=$this->input->post('description');
  /*  $imageuploading=array(
                'upload_path'=>'./upload/',
                'allowed_types'=>'gif|jpg|png'

    );
    $this->load->library('upload',$imageupload);
    if(!$this->upload->do_upload('image')){
        echo "error is here but i dont know what error is";
    }*/
   // else{
      /*  $filedata=$this->upload->data();
        $filename=$filedata['file_name'];*/
        $updatesubdata= array(
            'catid'=>$cattitle,
            'subcattitle'=>$subcattitle,
            'description'=>$description,
            //'image'=>$filename

          );
         
          $this->adminModel->updatesubcategory($id,$updatesubdata);
          $this->session->set_flashdata('success','Data is updated Successfully!');
          redirect(base_url().'Admincon/Admincontroller/viewsubcategory');
          
   // }
     
  }
}
// delete sub category
    function deletesubcategory($id){
        $this->load->model('adminPanel/adminModel');
        $fetch=$this->adminModel->viewsubcategory($id);
        if(empty($fetch)){
            $this->session->set_flashdata('failure','Data is not available!');
            redirect(base_url().'Admincon/Admincontroller/viewsubcategory');
        }
        else{
            $fetch=$this->adminModel->deletesubcat($id);
            $this->session->set_flashdata('success','Data is deleted Successfully!');
            redirect(base_url().'Admincon/Admincontroller/viewsubcategory');
            
        }
    }
     function addproduct(){
         $this->header();
         $this->load->model('adminPanel/adminModel');
         $showcatpro=$this->adminModel->showcattitleproduct();
         $data=array();
         $data['showcatpro']=$showcatpro;
         $this->form_validation->set_rules('producttitle','Producttitle','required');
         $this->form_validation->set_rules('productdescription','Productdescription','required');
         $this->form_validation->set_rules('actualPrice','actualPrice','required');
         $this->form_validation->set_rules('discount','Discount','required');
         $this->form_validation->set_rules('salesPrice','SalesPrice','required');
         if($this->form_validation->run()==false){
         $this->load->view('AdminpanelView/products/addproduct',$data);
         }
         else{
             $cattitle=$this->input->post('cattitle');
             $subcattitle=$this->input->post('subcattitle');
             $producttitle=$this->input->post('producttitle');
             $productdescription=$this->input->post('productdescription');
             $actualPrice=$this->input->post('actualPrice');
             $discount=$this->input->post('discount');
             $salesPrice=$this->input->post('salesPrice');
             $imageupload=array(
                'upload_path'=>'./upload/',
                'allowed_types'=>'gif|jpg|png'

    );
    $this->load->library('upload',$imageupload);
    if(!$this->upload->do_upload('image')){
        echo "error";
    }else{
        $filedata=$this->upload->data();
        $filename=$filedata['file_name'];
        $insertprodata= array(
            'catid'=>$cattitle,
            'subcatid'=>$subcattitle,
            'producttitle'=>$producttitle,
            'productdescription'=>$productdescription,
            'actualPrice'=> $actualPrice,
            'discount'=>$discount,
            'salesPrice'=> $salesPrice,
            'image'=>$filename);
            $this->adminModel->insertproduct($insertprodata);
            $this->session->set_flashdata('success','Data is Added Successfully!');
            redirect(base_url().'Admincon/Admincontroller/viewproduct');    
    }
         }

     }
     function subcattitlepro(){
         $this->load->model('adminPanel/adminModel');
          if($this->input->post('cateid')){
             $catid=$this->input->post('cateid');   
             $query['subcatdata']=$this->db->get_where('subcategory',array('catid'=>$catid))->result_array();
         $this->load->view('AdminpanelView/products/replaceSubcategory',$query);    
            
            }
    }
    // view product
    function viewproduct(){
        $this->header();
        $this->load->model('adminPanel/adminModel');
        $fetchpro1= $this->adminModel->fetchproduct();
        $data=array();
        $data['fetchpro']=$fetchpro1;
        $this->load->view('AdminpanelView/products/viewproduct', $data);
    }
    function editproduct($id){
         $this->header(); 
         $this->load->model('adminPanel/adminModel');
         $procat=$this->adminModel->showprocategory(); 
         $editpro= $this->adminModel->showproduct($id);
         $prosubcat=$this->adminModel->showproductsubcategory(); 
         $data=array();
              $data['prosubcat']=$prosubcat;
         $data['procat']=$procat;
         $data['editpro']=$editpro;
        $this->load->view('AdminpanelView/products/editproduct',$data);
       
    }   
    // function subprocategory(){
    //     $this->load->model('adminPanel/adminModel');
    //      if($this->input->post('cateid')){
    //         $data=$this->input->post('cateid');   


    //  echo $this->adminModel->showsubcattitlepro($data);
   
    //        }
   //}
   function editsubcattitlepro(){
    $this->load->model('adminPanel/adminModel');
     if($this->input->post('cateid')){
        $catid=$this->input->post('cateid');   
        $query['subcatdata']=$this->db->get_where('subcategory',array('catid'=>$catid))->result_array();
    $this->load->view('AdminpanelView/products/editsubCategory',$query);    
   // $this->load->view('AdminpanelView/products/editproduct',$query);   
       }}
      public function changeStatus(){
          
           $catId=$_POST['catId'];
           $selectStatus=$this->db->get_where('product',array('id'=>$catId))->row_array();
        
           if($selectStatus['status']=='1'){
               $Status['status']='0';
           }
           else{
            $Status['status']='1'; 
           }
           $update['status']=$this->db->update('product',$Status,array('id'=>$catId));
           echo $Status['status'];
       
}
function deleteproduct($id){
  
        $this->db->where('id',$id);
         $user=$this->db->delete('product');
         $data['deletedata']=$user;
         $this->load->view('AdminpanelView/products/viewproduct', $data);
         redirect(base_url().'Admincon/Admincontroller/viewproduct'); 
       
      
    
}

}?>