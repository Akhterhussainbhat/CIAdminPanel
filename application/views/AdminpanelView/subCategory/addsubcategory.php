<?php
// $this->load->view('AdminpanelView/includes/header');
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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add your sub Category</h1>
			<a href=''><input type='submit'  class="btn btn-danger" value='Viewsubcategory'></a>
		
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sub Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="" method="POST"  enctype="multipart/form-data">
                <div class="card-body">
				
				 <div class="form-group">
                    <label for="cattitle"> Category Title</label>
                    <select class="form-control" name="cattitle" >
					
					<?php
					/*$sql2= "SELECT * from formtable ";
					$result2= mysqli_query($conn,$sql2);*/
					foreach($fetchall as $fetch2){
						?>
						<option value="<?php echo $fetch2['id']?>"><?php echo $fetch2['title']?></option>
					<?php
					}	
					?>
					</select>
                  </div>

	                  <div class="form-group">
                    <label for="title"> SubCategory TiTle</label>
                    <input type="text" name="subcattitle" class="form-control" id="title" placeholder="SubCatTitle">
                  </div>
				
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="textarea" name="description" class="form-control" id="description" placeholder="Description">
                  </div>
				  
				  <div class="form-group">
                    <label for="image">Product Image</label>
                   <input type="file"  id="image" name="image"/>
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>&nbsp &nbsp &nbsp &nbsp
				 
                </div>
				
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
	</div>
    <?php
  $this->load->view('AdminpanelView/includes/footer');
  ?>