
<?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-danger" >
                <?php echo $this->session->flashdata('message')?>
            </div>
        <?php } ?>
        <?php if($countitem==''){?>
                <div><h1>Cart is Empty Click on Continue Shopping to Add Items</h1>
                <div class="cart__btn">
                        <a href="<?php echo base_url()?>/UserFile/usersite/shop">Continue Shopping</a>
                    </div>
                </div>
                <?php }else {?>   
<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
               
                    <div class="shop__cart__table">
                    
               
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php 
                             $grandTotal=0;
                            foreach($showcart as $data)
                           
                            {
                                ?>
                            <tbody>
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="<?php echo base_url().'upload/'. $data['pimage'];?>" height="100px" width="100px" alt="">
                                        <div class="cart__product__item__title">
                                            <h6><?php echo $data['ptitle'];?></h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price"><?php 
			                               echo number_format($data['pprice'] ,2)?></td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div>
                                    </td>
                                    <td class="cart__total"><?php 
			                               echo number_format($data['total'] ,2)?></td>
                                    <td class="cart__close"><a href="<?php echo base_url('UserFile/userSite/deleteCart/'.$data['id']);?>" onclick="return confirm('Are you sure want to Delete this User?')" ><span class="icon_close"></span></a></td>
                                </tr>
                               
                            </tbody>
                            <?php
                            $grandTotal= $grandTotal+$data['total'];
                        }
                        ?>
                        </table>
                       
                    </div>
                   
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="<?php echo base_url()?>/UserFile/usersite/shop">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="#"><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div>
                </div>
               
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                        
                            <li>Subtotal <span><?php echo $grandTotal;?></span></li>
                            <li>Total <span><?php echo $grandTotal;?></span></li>
                           
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->
    <?php }?>