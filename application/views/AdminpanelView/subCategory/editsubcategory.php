<?php
 //$this->load->view('AdminpanelView/includes/header');
?>


<html>
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
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action=" " method="POST"  enctype="multipart/form-data">
                <div class="card-body">
				
				<div class="form-group">
                    <label for="catid">CatTitle</label>
                    <select class="form-control" name="cateid" >
					<?php
                    foreach($fetch as $fetch2){
                       
						?>
						<option value="<?php echo $fetch2['id']?>"<?php if($fetch2['id']== $showedit['catid']){echo "selected";}?>> <?php echo $fetch2['title']?></option>
					<?php
                    }	
					?>
					</select>
                  </div>
				  
                  <div class="form-group">
                    <label for="title"> Subcategory TiTle</label>
                    <input type="text" value="<?php echo $showedit['subcattitle'];?>" name="subcattitle" class="form-control" id="title" placeholder="Title">
                  </div>
				  
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="textarea" value="<?php echo $showedit['description'];?>" name="description" class="form-control" id="description" placeholder="Description">
                  </div>
				  
				  <div class="form-group">
                    <label for="image">Product Image</label>
                   <input type="file"  id="image" name="image"/>
                   <img src="<?php echo base_url().'upload/'. $showedit['image'];?>" height="70px" width="70px" />
                  </div>
  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
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