<?php

class userSite extends CI_controller{

    function __construct(){
        parent::__construct();
        $this->load->library('cart');
    }

    function registration(){
        echo '<h2>Welcome - '.$this->session->userdata('username').'</h2>';
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('confirmpassword',' ConfirmPassword','required');

        if( $this->form_validation->run()==false){
        
            $this->load->view('userFiles/userCollection/registration');
        }else{
            $username=$this->input->post('username');//$_POST['username'];
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $confirmpassword=$this->input->post('confirmpassword');
           
           
              $alldata= array(
                'username'=>$username,
                'email'=>$email,
                'password'=>$password,
                'confirmpassword'=>$confirmpassword
              );
if ($password==$confirmpassword){
           $this->db->where('email',$email,'password',$password);
           $fetchdata=$this->db->get('registration');
           if(!$fetchdata->num_rows() > 0){
              $suces=$this->db->insert('registration',$alldata);
              if($suces){
                $this->session->set_flashdata('messagesucces', 'Data is Saved Successfully !');
                redirect('UserFile/userSite/registration');  
              }
            }else{
                $this->session->set_flashdata('message', 'Email or password already exists !');
                redirect('UserFile/userSite/registration');
                //echo("<script>alert('Email or password  already exists')</script>");	
                }
            }else{
                $this->session->set_flashdata('message', 'password and confirmpassword not matching !');
                redirect('UserFile/userSite/registration');
                    }
            

    }
    }
   function login(){
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    
    if($this->form_validation->run() == false){
       $this->load->view('userFiles/userCollection/login');   
    }
    else {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
           
            $this->db->where('email',$email);
            $this->db->where('password',$password);
            $fetchdata=$this->db->get('registration')->row_array();
            if($fetchdata){
                $userdata = array(
                    'username'=>$fetchdata['username'],
                        'email' => $fetchdata['email'],
                        'password' => $fetchdata['password'],
                        
                    ); 
                  
                
            $this->session->set_userdata($userdata);
            redirect('UserFile/userSite/index');
            
        }
        else {
            $this->session->set_flashdata('message', 'Invalid email or password');
            redirect('UserFile/userSite/login');
        }
    }
   
   }
   function logout()  
   {  
    $this->session->sess_destroy('username','email');  
        redirect('UserFile/userSite/index');  
   }  



    function index(){
        $this->load->view('userFiles/userInclude/header');
        $this->db->where('id>',1);
       
        $select= $this->db->get('category')->result_array();
        // $select=$this->db->select('category')->row_array();
        $select1=$this->db->get_where('category',array('id'=> 1))->row_array();
        $fetchallcategory= $this->db->get('category')->result_array();

        $this->db->select('category.title as cattitle, subcategory.*, product.*');
        $this->db->from('product');
        $this->db->join('subcategory', 'subcategory.id=product.subcatid ');
        $this->db->join('category', 'subcategory.catid=category.id ');
       $users= $this->db->get()->result_array();
        // $sql1= "SELECT  formtable.title as cattitle, subcat.*, products.* from products JOIN subcat on subcat.id=products.subcatid join formtable on
		// subcat.catid=formtable.id ORDER BY RAND() LIMIT 8 ";
      
       $data=array();
        $data['alldata']=$select;
        $data['onerow']=$select1;
        $data['allcatdata']=$fetchallcategory;
        $data['sqldata']=$users;
      
        $this->load->view('userFiles/index',$data);
        $this->load->view('userFiles/userInclude/footer');

    }

    function shop(){
        $this->load->view('userFiles/userInclude/header');


       
$this->db->order_by('rand()');
$this->db->limit(8);
$query = $this->db->get('product')->result_array();
$allcategory= $this->db->get('category')->result_array();

//$minmax= "SELECT MIN(salesPrice) as minimum_range ,MAX(salesPrice) as maximum_range from product";
$this->db->select('MAX(salesPrice) as maximum_range, MIN(salesprice) as minimum_range');
$this->db->from('product');
$query1 = $this->db->get()->result_array();;
// $query1 = $this->db->query($minmax);
 



$data=array();
$data['productdata']=$query;
$data['categorydata']=$allcategory;
$data['data1']=$query1;
// echo '<pre>';
//  print_r($data['data1']);
//  exit;


        $this->load->view('userFiles/userCollection/shop',$data);

        $this->load->view('userFiles/userInclude/footer');

    }
    // shop sub category div replace
     function shopsubcat(){
        //$query = $this->db->get('product')->result_array();
        if($this->input->post('proAjax')){
            $catid=$this->input->post('proAjax');   
            $subcatdiv=$this->db->get_where('product',array('subcatid'=>$catid))->result_array();
            $data=array();
            $data['subcatdiv']=$subcatdiv;
                 $this->load->view('userFiles/userCollection/shopSubcategoryReplace',$data);
     }
    }
    function addToCart($proId){
       // $proId=$this->input->post('proId');
       if(!$this->session->userdata('username')){
        redirect('UserFile/userSite/login');
    }
    else{
       
        $productItem=$this->db->get_where('product',array('id'=>$proId))->row_array();  
       
        $data = array( 
            'qty'  => 1,
            'pprice'  => $productItem['salesPrice'],
            'ptitle'=> $productItem['producttitle'],
           'pimage' => $productItem['image'],
           'total' =>$productItem['salesPrice'],
           'pid' => $productItem['id'],
        
    );
    $pid=$this->db->get_where('cart',array('pid'=>$proId))->row_array();  
       $Id=$pid['pid'];   
       if(!$Id){
      $this->db->insert('cart',$data);   
      $this->session->set_flashdata('message1', 'Item is added Successfully'); 
    
   redirect('UserFile/userSite/shop');
       }
       else{
          
        $this->session->set_flashdata('message', 'Item is already in cart');
        redirect('UserFile/userSite/shop');
        
           
       }
   
    }
    
       
} 
// add cart elements from index page 
function addToCartInIndex($proId){
    // $proId=$this->input->post('proId');
    if(!$this->session->userdata('username')){
     redirect('UserFile/userSite/login');
 }
 else{
    
     $productItem=$this->db->get_where('product',array('id'=>$proId))->row_array();  
    
     $data = array( 
         'qty'  => 1,
         'pprice'  => $productItem['salesPrice'],
         'ptitle'=> $productItem['producttitle'],
        'pimage' => $productItem['image'],
        'total' =>$productItem['salesPrice'],
        'pid' => $productItem['id'],
     
 );
 $pid=$this->db->get_where('cart',array('pid'=>$proId))->row_array();  
    $Id=$pid['pid'];   
    if(!$Id){
   $this->db->insert('cart',$data);   
   $this->session->set_flashdata('message1', 'Item is added Successfully'); 
 
redirect('UserFile/userSite/index');
    }
    else{
       
     $this->session->set_flashdata('message', 'Item is already in cart');
     redirect('UserFile/userSite/index');
     
        
    }

 }
 
    
} 
function showcart(){
    $this->load->view('userFiles/userInclude/header');
      //$email=$this->session->userdata('email')
    $cartelements=$this->db->get_where('cart')->result_array(); 
   $cartitem=count($cartelements);
$data=array();
$data['showcart']=$cartelements;
$data['countitem']=$cartitem;

    $this->load->view('userFiles/userCollection/showCart',$data);

    $this->load->view('userFiles/userInclude/footer');


}
function deleteCart($cid){
    $deleteItem=$this->db->delete('cart',array('id'=>$cid));
    if($deleteItem){
        $this->session->set_flashdata('message', 'Item is Deleted Successfully');
        redirect('UserFile/userSite/showcart');

    }    
}
function addToWishlist($wid){
    if(!$this->session->userdata('username')){
        redirect('UserFile/userSite/login');
    }
    else{
       
        $productItem=$this->db->get_where('product',array('id'=>$wid))->row_array();  
       
        $data = array( 
           'userid'=>$this->session->userdata('email'),
            'wprice'  => $productItem['salesPrice'],
            'wtitle'=> $productItem['producttitle'],
           'wimage' => $productItem['image'],
           'proid' => $productItem['id'],
        
    );
    $wid=$this->db->get_where('wishlist',array('proid'=>$wid))->row_array();  
    $Wd=$wid['proid'];   
    if(!$Wd){
    $this->db->insert('wishlist',$data); 
    $this->session->set_flashdata('message1', 'Item is added Successfully'); 
  redirect('UserFile/userSite/shop');
      }
      else{
         
       $this->session->set_flashdata('message', 'Item is already in Wishlist');
       redirect('UserFile/userSite/shop');
    }
}
}
// add item in wishlist in index page
function addToWishlistIndex($wid){
    if(!$this->session->userdata('username')){
        redirect('UserFile/userSite/login');
    }
    else{
       
        $productItem=$this->db->get_where('product',array('id'=>$wid))->row_array();  
       
        $data = array( 
           'userid'=>$this->session->userdata('email'),
            'wprice'  => $productItem['salesPrice'],
            'wtitle'=> $productItem['producttitle'],
           'wimage' => $productItem['image'],
           'proid' => $productItem['id'],
        
    );
    $wid=$this->db->get_where('wishlist',array('proid'=>$wid))->row_array();  
    $Wd=$wid['proid'];   
    if(!$Wd){
    $this->db->insert('wishlist',$data); 
    $this->session->set_flashdata('message1', 'Item is added Successfully'); 
  redirect('UserFile/userSite/index');
      }
      else{
         
       $this->session->set_flashdata('message', 'Item is already in Wishlist');
       redirect('UserFile/userSite/index');
    }
}
}
function showwishlist(){
    $this->load->view('userFiles/userInclude/header');
      $email=$this->session->userdata('email');
    $wishlistelements=$this->db->get_where('wishlist',array('userid'=>$email))->result_array(); 
   $wishlistitem=count($wishlistelements);
$data=array();
$data['showwishlist']=$wishlistelements;
$data['countitem']=$wishlistitem;

    $this->load->view('userFiles/userCollection/showWishlist',$data);

    $this->load->view('userFiles/userInclude/footer');

 

}
function deleteWishlist($wlid){
    $deleteItem=$this->db->delete('wishlist',array('id'=>$wlid));
    if($deleteItem){
        $this->session->set_flashdata('message', 'Item is Deleted Successfully');
        redirect('UserFile/userSite/showwishlist');

    }    
}

function filterPrice(){
    $min_price= $this->input->post('minimum_price');
    $max_price= $this->input->post('maximum_price');
    $priceValues= $this->db->get_where('product',"salesPrice BETWEEN '$min_price' AND '$max_price'")->result_array();
     $data=array();
     $data['pricevalue']=$priceValues;
     $this->load->view('userFiles/userCollection/filterPriceAjax',$data);

    
}
function productDetails(){
    $this->load->view('userFiles/userInclude/header');
    // $productdetail=$this->db->get_where('product',array('id'=>$id))->row_array();  
    //   $data=array();
    //   $data['productdetail'] =$productdetail;

     $this->load->view('userFiles/userCollection/productDetails');

    $this->load->view('userFiles/userInclude/footer');

}

}
?>