<?php
 //$this->load->view('AdminpanelView/includes/header');
?>

<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Validation Form</title>

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
      <div class="col-md-12">
  <?php if($this->session->userdata('success')){?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success')?>
            </div>
        <?php } ?>
  </div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View your SubCategory</h1>
			<a href='<?php ?>'><input type='submit' class="btn btn-danger" value='addsubcategory'></a>
		
          </div>
		  
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">View SubCategory</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title">SubCategory Details</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">id</th>
					  <th> Cat Title</th>
                      <th> SubCat Title</th>
                      <th>Description</th>
					  <th> Image</th>
					  <th>Choose one</th>
                    </tr>
                  </thead>
				  
				  <?php
				  $i=1;
				 foreach($fetchsubcat as $rows){
					  
				  ?>
                 <tbody>
    <tr>
	<td><?php echo $i++;?></td>
      <td><?php echo $rows['cattitle'];?></td>
      <td><?php echo $rows['subcattitle'];?></td>
	  <td><?php echo $rows['description'];?></td>
	<td><img src="<?php echo base_url().'upload/'. $rows['image'];?>" height="50px" width="50px"></td>
	  <td>
	<a href='<?php echo base_url().'Admincon/Admincontroller/deletesubcategory/'.$rows['id'];?> '><input type='submit' onClick="return confirm('Do you want to delete element?')" class="btn btn-danger"value='Delete'></a>
	<a href='<?php echo base_url().'Admincon/Admincontroller/editsubcategory/'.$rows['id'];?>'><input type='submit' class="btn btn-primary" value='Edit'></a>
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