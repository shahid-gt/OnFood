<?php
require("header.php");

$cartArr = getUserCart($cusCon) ;
//prx($cartArr);

?>

<div class="cart-main-area pt-95 pb-100">
            <div class="container">
                <h3 class="page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form method="post">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Restaurant Name</th>
                                            <th>Until Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    foreach($cartArr as $list){
                                    ?>
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="#"><img src="<?php echo SITE_FOOD_IMAGE.$list['fimage']?>" style="height:75px" alt=""></a>
                                                </td>

                                                <td class="product-name"> <?php echo $list['fname'] ?> </td>

                                                <td class="product-name"> <?php echo $list['rname'] ?> </td>

                                                <td class="product-price-cart"><span class="amount"><?php echo $list['price'] ?> Rs</span></td>
                                               
                                                <td class="product-quantity">
                                                   
                                                        <input class="cart-plus-minus-box" type="text" name="qty[<?php echo ($list['cart_id']) ; ?>]" value="<?php echo $list['qty'] ?>" >
                                                    
                                                </td>

                                                <td class="product-subtotal"><?php echo ($list['qty']*$list['price'] ) ; ?> Rs</td>

                                                <td class="product-remove">
                                                    <a href="javascript:void(0)" onclick="delete_cart('<?php echo ($list['cart_id']) ?>')"><i class="fa fa-times"></i></a>
                                                </td>

                                            </tr>
                                    <?php } ?>
                                     </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="index.php">ADD MORE FOOD</a>
                                        </div>
                                        <div class="cart-clear">
                                            <a href="checkout.php">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       

<?php
require("footer.php");
?>