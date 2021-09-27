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
                <h3 class="card-title">Edit Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form id="quickForm" action="" method="POST"  enctype="multipart/form-data">
                <div class="card-body">
				  <div class="form-group">
                    <label for="catid"> Category Title</label>
                    <select class="form-control" id="cateid" name="cateid"  >
					<?php
				
				foreach($procat as $fetch2){
						?>
						<option value="<?php echo $fetch2['id']?>"<?php if($fetch2['id']==$editpro['catid']){ echo "selected";}?>><?php echo $fetch2['title']?></option>
					<?php
        }    	
					?>
					</select>
                  </div>
				     <div class="form-group" id="subcatdiv">
                    <label for="catid">Sub Category Title</label>
                    <select class="form-control" id="subCatId" name="subcatid">
                   
					<?php
					
                 foreach($prosubcat as $fetch3){
						?>
						<option value="<?php echo $fetch3["id"]?>" <?php if($fetch3['id']==$editpro['subcatid']){ echo "selected";}?>><?php echo $fetch3['subcattitle']?></option>
					<?php
                }
					?>
					</select>
                  </div>
	                  <div class="form-group">
                    <label for="producttitle"> Product TiTle</label>
                    <input type="text" name="producttitle" value="<?php echo $editpro['producttitle'];?>" class="form-control" id="producttitle" placeholder="Product Title">
                  </div>
				
                  <div class="form-group">
                    <label for="productdescription">Product Description</label>
                    <input type="textare" name="productdescription" value="<?php echo $editpro['productdescription'];?>" class="form-control" id="productdescription" placeholder="Product Description">
                  </div>
				  				  <div class="form-group">
                    <label for="actualPrice">Actual Price</label>
                    <input type="number" name="actualPrice" value="<?php echo $editpro['actualPrice'];?>" class="form-control" id="actualPrice" placeholder="Atual Price">
                  </div>
				  <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="number" name="discount" value="<?php echo $editpro['discount'];?>" class="form-control" id="discount" placeholder="Enter Discount from 1-100%">
                  </div>
				   <div class="form-group" >
				   <label for="salesPrice">Sales Price</label>
				   <input type="number" name="salesPrice" value="<?php echo $editpro['salesPrice'];?>"  class="form-control" id="salesPrice" placeholder="Sales price of your product">
				   </div>
				  
				  <div class="form-group">
                    <label for="image">Product Image</label>
                   <input type="file"  id="image" name="image"/>
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit"  onClick="return confirm('Do you want to update Successfully?')"class="btn btn-primary">Submit</button>&nbsp &nbsp &nbsp &nbsp
				  
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
	$( "#cateid" ).change(function () {
  var cateid = $(this).val();
        $.ajax({
            url: "<?php echo base_url();?>Admincon/Admincontroller/editsubcattitlepro",
           type:"POST",
            data: {cateid:cateid},
            success: function(data) {
                $("#subcatdiv").replaceWith(data);   
              
                 
            },
        });
});
$("#discount,#actualPrice").keyup( function() {
            var main = $('#actualPrice').val();
            var disc = $('#discount').val();
            var dec = (disc / 100).toFixed(2); 
            var mult = main * dec; 
            var discont = main - mult;
            $('#salesPrice').val(discont);
        });
});
</script>