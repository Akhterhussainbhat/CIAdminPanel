<?php
 //$this->load->view('AdminpanelView/includes/header');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>

<body>
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-md-12">
  <?php if($this->session->userdata('success')){?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success')?>
            </div>
        <?php } ?>
  </div>
          <div class="col-sm-6">
            <h1>View your Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">View Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title">Product Details</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">id</th>
                      <th> Title</th>
                      <th>Description</th>
					  <th> Image</th>
					  <th>Choose one</th>
                    </tr>
                  </thead>
				  
				  <?php
				  $i=1;
				 foreach($fetchall as $rows){
				  ?>
                 <tbody>
    <tr>
      <td><?php echo $i++;?></td>
      <td><?php echo $rows['title'];?></td>
	  <td><?php echo $rows['description'];?></td>
	<td><img src="<?php echo base_url().'upload/'. $rows['image'];?>" height="70px" width="100px"></td>
    <td><a href="<?php echo base_url().'Admincon/Admincontroller/editcategory/'.$rows['id'];?>" class="btn btn-primary">Edit</a>
      <a href="<?php echo base_url().'Admincon/Admincontroller/deletecategory/'.$rows['id'];?>"  onclick="return confirm('are you really want to delete this item');" class="btn btn-danger">Delete</a>
      </td>
    </tr>
  </tbody>
  <?php
				  }
				  ?>
                </table>
              </div>
              <!-- /.card-body -->
             
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
		  </div>



<?php
  $this->load->view('AdminpanelView/includes/footer');
  ?>