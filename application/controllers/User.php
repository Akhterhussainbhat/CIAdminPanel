<?php 
class User extends CI_controller{
   
   
    public function index(){
    $this->load->model('User_model');
     $users= $this->User_model->fetchall();
     $data=array();
     $data['users']=$users;
       $this->load->view('list',$data);
   }


    public function create(){
        $this->load->model('User_model');
       
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('phone','PhoneNumber','required');
      

        if( $this->form_validation->run()==false){
        
        $this->load->view('create');
    }else{
        
        $username=$this->input->post('username');//$_POST['username'];
        $email=$this->input->post('email');
        $phone=$this->input->post('phone');
        $gender=$this->input->post('gender');
        $Game=$this->input->post('game');
        $game= implode(",",$Game);
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
          $formArray= array(
            'username'=>$username,
            'email'=>$email,
            'phone'=>$phone,
            'gender'=>$gender,
            'game'=>$game,
            'image'=>$filename

          );
        
        $this->User_model->create($formArray);
         $this->session->set_flashdata('success','Data is Added Successfully!');
         redirect(base_url().'user/index');
        }
    }
    }
    public function edit($userId){
        $this->load->model('User_model');
       $user= $this->User_model->getUser($userId);
        $data=array();
        $data['user']=$user;

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('phone','PhoneNumber','required');


        if( $this->form_validation->run()==false){
        $this->load->view('edit',$data);
        }
        else{
            $username=$this->input->post('username');
            $email=$this->input->post('email');
            $phone=$this->input->post('phone');
            $gender=$this->input->post('gender');
            $Game=$this->input->post('game');
            $game= implode(",",$Game);
            
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
              $formArray= array(
                'username'=>$username,
                'email'=>$email,
                'phone'=>$phone,
                'gender'=>$gender,
                'game'=>$game,
                'image'=>$filename
    
              );
            
            $this->User_model->userUpdate($userId,$formArray);
             $this->session->set_flashdata('success','Data is Added Successfully!');
             redirect(base_url().'user/index');
            }
            
         }


     }
     public function delete($userid){
        $this->load->model('User_model');
        $user= $this->User_model->getUser($userid);
        if(empty($user)){
            $this->session->set_flashdata('failure','Data is not found!');
             redirect(base_url().'user/index');  
        }else{
        $this->User_model->userDelete($userid);
        $this->session->set_flashdata('success','Data is Successfully deleted');
        redirect(base_url().'user/index');  
     }
    }
    function loginUser(){
      
        $this->load->model('User_model');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        if($this->form_validation->run() == false){
            $this->load->view('login');
        } 
        else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $user = $this->User_model->login1($username, $password);
            if($user){
                $userdata = array(
                    'id' => $user->id,
                    'username' => $user->username,
                    'password' => $user->password,
                    'authenticated' => TRUE
                );
                
                $this->session->set_userdata($userdata);
                
                redirect('user/create');
            }
            else {
                $this->session->set_flashdata('message', 'Invalid email or password');
                redirect('user/loginUser');
            }
        }
    }
    
    
}?>