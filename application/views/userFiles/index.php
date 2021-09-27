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


<!-- Categories Section Begin -->
<section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
               
                    <div class="categories__item categories__large__item set-bg"
                    data-setbg="<?php echo base_url().'upload/'. $onerow['image'];?>">
                    <div class="categories__text">
                        <h1><?php echo $onerow['title'];?></h1>
                        <p><?php echo $onerow['description'];?></p>
                        <a href="#">Shop now </a>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-6">
                <div class="row">
                <?php foreach($alldata as $data){
                ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="<?php echo base_url().'upload/'. $data['image'];?>">
                            <div class="categories__text">
                                <h4><?php echo $data['title'];?></h4>
                                <p>358 items</p>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                   
                    <?php }?>
                </div>

            </div>

           
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>
                    <?php
                    foreach($allcatdata as $catdata){
?>
                    <li data-filter=".<?php echo $catdata['title'];?>"><?php echo $catdata['title'];?></li>
                    <?php }?>
                </ul>
            </div>
        </div>
        <div class="row property__gallery">
        <?php
        foreach($sqldata as $row2){
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $row2['cattitle'];?>">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?php echo base_url().'upload/'. $row2['image'];?>">
                        <div class="label new">New</div>
                        <ul class="product__hover">
                            <li><a href="<?php echo base_url().'upload/'. $row2['image'];?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="<?php echo base_url('UserFile/userSite/addToWishlistIndex/'.$row2['id']);?>"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="<?php echo base_url('UserFile/userSite/addToCartInIndex/'.$row2['id']);?>"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#"><?php echo $row2['producttitle'];?></a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price"><span style="color:green"><?php echo $row2['actualPrice'];?></span>&nbsp <b style="color:blue"><?php echo $row2['discount'];?>%off</b>&nbsp &nbsp   ₹<?php echo $row2['salesPrice'];?></div>
                    </div>
                </div>
              
            </div>
            <?php 
		}
		?>
        </div>
    </div>
</section>
<!-- Product Section End -->
