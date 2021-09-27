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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
			<a href='<?php //echo viewproducturl?>'><input type='submit'  class="btn btn-danger" value='ViewProduct'></a>
		
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
            <div class="card card-green">
              <div class="card-header">
                <h3 class="card-title">Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="" method="POST"  enctype="multipart/form-data">
                <div class="card-body">
				
				 <div class="form-group">
                    <label for="catid"> Category Title</label>
                    <select class="form-control" id="cateid" name="cattitle"  >
					<option  value="" >Select Your Category </option>
					<?php
			
				foreach($showcatpro as $fetch2){
						?>
						<option value="<?php echo $fetch2['id']?>"><?php echo $fetch2['title']?></option>
					<?php
				}	
					?>
					</select>
                  </div>
                  <div class="form-group" id="subcatdiv">
          <!-- <label for="catid"> Subcategory Title</label>
           <select class="form-control" id="subCatId" name="subcattitle" >
           </select>-->
           </div>

	                 <div class="form-group">
                    <label for="producttitle"> Product TiTle</label>
                    <input type="text" name="producttitle" class="form-control" id="producttitle" placeholder="Product Title">
                  </div>
				
                  <div class="form-group">
                    <label for="productdescription">Product Description</label>
                    <input type="textarea" name="productdescription" class="form-control" id="productdescription" placeholder="Product Description">
                  </div>
				  <div class="form-group">
                    <label for="actualPrice">Actual Price</label>
                    <input type="number" name="actualPrice" class="form-control" id="actualPrice" placeholder="Atual Price">
                  </div>
				  <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="number" name="discount" class="form-control" id="discount" placeholder="Enter Discount from 1-100%">
                  </div>
				   <div class="form-group" >
				   <label for="salesprice">Sales Price</label>
				   <input  type="number" name="salesPrice"  class="form-control" id="salesprice"  placeholder="Sales price of your product">
				
				   </div>
				  
				  <div class="form-group">
				  <label for="image">Product Image</label>
				  
				  <input type='file' id="uploadfile" name="image" onchange="readURL(this);"/><br>
                  <img id="blah" src="" width="150px" height="150px" alt="this image will be stored"/>
                    
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>&nbsp &nbsp &nbsp &nbsp
				  <button type="reset" name="reset" class="btn btn-danger">Reset</button>
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
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script >
$(document).ready(function(){
  $("#subcatdiv").hide();	
$( "#cateid" ).change(function () {
  $("#subcatdiv").show();	
  var cateid = $(this).val();
        $.ajax({
            url: "<?php echo base_url();?>Admincon/Admincontroller/subcattitlepro",
           type:"POST",
            data: {cateid:cateid},
            success: function(data) {
              
                $("#subcatdiv").replaceWith(data);   
              
                 
            },
        });
});
 $("#actualPrice,#discount").keyup( function() {
            var main = $('#actualPrice').val();
            var disc = $('#discount').val();
            var dec = (disc / 100).toFixed(2); 
            var mult = main * dec; 
            var discont = main - mult;
            $('#salesprice').val(discont);
        });	
});
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
   $("#camerbtn").click(function(){
	   $("#uploadfile").click();
   });
</script>


