<?php
require("header.php"); 
$rest_res = mysqli_query($con,"select * from restaurant ") ;
$product_sql="select * from food where status=1";

?>


<div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="index.php">Shop</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="container">
        <div class="shop-page-area pt-100 pb-100">
        <div class="row ">
        <?php while($rest_row=mysqli_fetch_assoc($rest_res)){
                            
                            $catid=0;
                           
                            //now get the connection of the restaurant .
                            $rname = $rest_row['rname']; 
                            $ResCon = getResCon($rname);
                            //echo $product_sql;
                            $product_res=mysqli_query($ResCon,$product_sql);
                            $product_count=mysqli_num_rows($product_res);
                            
                    ?>
            
                
                    <div class="col-lg-9">
                    <!--PHP CODE --> 

                    
                    <p class="para_res_name"><?php echo $rname ?></p>
                        <div class="grid-list-product-wrapper">
                            <div class="product-grid product-view pb-20">
                                
                                    <div class="row">
                                        <?php while($product_row=mysqli_fetch_assoc($product_res)){?>
                                        <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30" style="padding:30px">
                                            <div class="product-wrapper">
                      
                                            <div class="product-img">
                                                    <a href="javascript:void(0)">
                                                        <img src="<?php echo SITE_FOOD_IMAGE.$product_row['image']?>" style="height:255px;width:255px"alt="">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <h4>
                                                        <a href="javascript:void(0)"><?php echo $product_row['fname']?> </a>
                                                    </h4>
                                                    <div class="product-price-wrapper">
                                                        <span><?php echo $product_row['price']?></span>
                                                    </div>
                                                </div>
                                            <div>
                                                <select id="<?php echo 'qty'.$product_row['fid'] ?>">
                                                    <option value="0">Qty</option>
                                                    <?php for($i=1;$i<=11;$i++){ 
                                                        echo "<option>$i</option>";
                                                    }?>
                                            <br>
                                                </select>
                                                <i class="fa fa-cart-plus cart_icon" onclick="add_cart('<?php echo $product_row['fid'] ?>','<?php echo $product_row['price']?>','<?php echo $rname ?>')" ></i>

                                            </div>
                                                
                                            </div>
                                        </div>
                                        
                                        <?php } ?>
                                        
                                                
                                    </div>
                            </div>
                            
                        </div>
                        </div>
                
                    
                    
                <?php } ?>
                    
                    
                </div>
            </div>
        </div>

      

<?php
include("footer.php");
?>