<?php
class Firsttime extends CI_controller{
   
    public function savedata()
  {
        
      
        $this->load->model('Firstmodel');
		$this->load->view('firstlist');
	
		
		    //if($this->input->post('submit')){
        
			
		    $data['username']=$this->input->post('username');
			$data['email']=$this->input->post('email');
		
			
		$data['password']=$this->input->post('password');
            $data['course']=$this->input->post('course');
            /*$data=$this->input->post('btech[]');
            $data['department']=implode(",", $data);*/
            $data['gender']=$this->input->post('gender');
			$response=$this->Firstmodel->insertdata($data);
			if($response==true){
			echo "Records Saved Successfully";
			   }
			else{
			echo "Insert error !";
			}
			
	}

}


?>