<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="..assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body>
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View your Products</h1>
			<a href='<?php echo base_url()?>/Admincon/Admincontroller/addproduct'><input type='submit' class="btn btn-danger" value='addproduct'></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php?>">Home</a></li>
              <li class="breadcrumb-item active">View Products</li>
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
					  <th>Cat Title</th>
                      <th>SubCat Title</th>
					  <th>Product Title</th>
                      <th>product Description</th>
					  <th>Actual Price </th>
					  <th>Discount</th>
            
					  <th>Sales price</th>
					  <th>Image</th>
            <th>
           Status
            </th>
					  <th>Choose one</th>
                    </tr>
                  </thead>
				  
				  <?php
				  $i=1;
				 
				foreach($fetchpro as $rows){	  
				  ?>
                 <tbody>
    <tr>
	<td><?php echo $i++;?></td>
      <td><?php echo $rows['cattitle'];?></td>
	  <td><?php echo $rows['subcattitle'];?></td>
      <td><?php echo $rows['producttitle'];?></td>
	  <td><?php echo $rows['productdescription'];?></td>
	  <td><?php echo $rows['actualPrice'];?></td>
	  <td><?php echo $rows['discount'];?>%</td>
	  <td> <?php echo $rows['salesPrice'];?></td>
	<td><img src="<?php echo base_url().'upload/'. $rows['image'];?>" height="50px" width="50px"></td>
  
  <td>  <div class="form-check form-switch">
  <input class="form-check-input"<?php if($rows['status']=='1') {echo "Checked";}?> onclick="toggleStatus(<?php echo $rows['id']?>)" type="checkbox" id="check"  >
</div></td>


	  <td>

	<a href='<?php echo base_url().'Admincon/Admincontroller/deleteproduct/'.$rows['id']; ?> '><input type='submit' onClick="return confirm('Do you want to delete element?')" class="btn btn-danger"value='Delete'></a>
	<a href='<?php echo base_url().'Admincon/Admincontroller/editproduct/'.$rows['id']; ?>'><input type='submit' class="btn btn-primary" value='Edit'></a>
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
  <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>

function toggleStatus(id){
  
		var id = id ;
		$.ajax({
			url:"<?php echo base_url();?>Admincon/Admincontroller/changeStatus",
			type:"post",
			data:{catId:id},
			success :function(result){
      
				if(result == '1'){
				   swal("Done!","status is ON","success");		
				}
				else{
					swal("Done!","status is OFF","success");  
					 
				}
			}
		});
	 }
</script>