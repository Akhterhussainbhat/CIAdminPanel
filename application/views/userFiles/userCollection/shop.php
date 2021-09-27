 <!-- Shop Section Begin -->
 <?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-danger" >
                <?php echo $this->session->flashdata('message')?>
            </div>
        <?php } ?>
        <?php if($this->session->flashdata('message1')) { ?>
            <div class="alert alert-success" >
                <?php echo $this->session->flashdata('message1')?>
            </div>
        <?php } ?>
 <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                <?php 
								foreach( $categorydata as $row){
								?>
                                    <div class="card">
                                        <div class="card-heading active">
                                            <a data-toggle="collapse" data-target="#collapseOne<?php echo $row['id'];?>" ><?php echo $row['title'];?></a>
                                        </div>
                                        <div id="collapseOne<?php echo $row['id'];?>" class="collapse show<?php echo $row['id'];?>" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul><?php
                                                $subid=$row['id'];
                                                $sql ="SELECT * FROM subcategory where catid=$subid";
                                                 $query = $this->db->query($sql);
                                                 if ($query->num_rows() > 0) {
                                                  foreach ($query->result() as $row1) {?>
                                                    <li onclick="myFunction('<?php echo $row1->id;?>')" ><a   value="<?php echo $row1->id;?>" href="#" ></a><?php echo $row1->subcattitle;?></li>
    
                                                <?php }
                                                  }?>
                                                   
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <?php }?>
                                 
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Shop by price</h4>
                            </div>
                            <div class="filter-range-wrap">
                         <?php foreach($data1 as $row2){?>
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="<?php echo $row2['minimum_range'];?>" data-max="<?php echo $row2['maximum_range'];?>"></div>
                                <?php }?>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Price:</p>
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                            <a href="#" onclick="filterProducts()">Filter</a>
                        </div>
                       
                     
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                
                    <div class="row" id="productlist">
                    <?php
                        foreach($productdata as $data){
                            ?>
                            <a href="<?php echo base_url('UserFile/userSite/productDetails/'.$data['id']);?>">
                        <div class="col-lg-4 col-md-6">
                       
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?php echo base_url().'upload/'. $data['image'];?>">
                                    <div class="label new">New</div>
                                    <ul class="product__hover">
                                        <li><a href="<?php echo base_url().'upload/'. $data['image'];?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="<?php echo base_url('UserFile/userSite/addToWishlist/'.$data['id']);?>"><span class="icon_heart_alt"></span></a></li>
                                        <li  ><a href="<?php echo base_url('UserFile/userSite/addToCart/'.$data['id']);?>" ><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#"><?php echo $data['producttitle'];?></a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price"><span style="color:green"><?php echo $data['actualPrice'];?></span>&nbsp <b style="color:blue"><?php echo $data['discount'];?>%off</b>&nbsp &nbsp   ₹<?php echo $data['salesPrice'];?></div>
           
                                </div>
                            </div>

                        </div>
                        </a>
                        <?php
                        
                    }
                    ?>
                       
                          <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                       

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
    <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script >
 
function myFunction(proAjax){
 
        $.ajax({
            url: "<?php echo base_url();?>UserFile/userSite/shopsubcat",
           type:"POST",
            data: {'proAjax':proAjax},
            success: function(data) {
	  $("#productlist").replaceWith(data);  
     
            },    
});
}
</script>

<script>
function filterProducts(){
   
    var minimum_price=$("#minamount").val();
     var maximum_price=$("#maxamount").val();
     
     $.ajax({
             url: "<?php echo base_url();?>UserFile/userSite/filterPrice",
            type:"POST",
            data: {'minimum_price':minimum_price,'maximum_price':maximum_price },
             success: function(data) {
				
	   $("#productlist").replaceWith(data);
	  
             },
			
 });
 }
</script>