<?php
require("header.php");
require("models.php");


$cartArr = getUserCart($cusCon) ;
if(count($cartArr)<=0){
    redirect("index.php");
}

if(isset($_POST['submit'])){
   
    $user_id =  $_SESSION['CUSTOMER_ID'] ;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $zipcode = $_POST['zipcode'];
    $payment_mode = $_POST['payment_mode'];
    $time = date('Y-m-d h:i:s');
   

    $o = new Order($user_id,$name,$email,$address,$mobile,$zipcode,$time,$payment_mode);
    echo $o->show_order_details();
    echo $o->process_data($cartArr,$cusCon);

    $TPrice = $_POST['total_price'];
}
else{
    $TPrice=0;
}

?>

<div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="<?php echo FRONT_SITE_PATH?>shop">Home</a></li>
                        <li class="active"> Checkout </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- checkout-area start -->
        <div class="checkout-area pb-80 pt-100">
            <div class="container">
                <div class="row">
                <form method="POST">
                    <div class="col-lg-9">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1.</span> <a data-toggle="collapse" data-parent="#faq" href="">Delivery Address</a></h5>
                                    </div>
                                    <div id="payment-2" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Full Name</label>
                                                            <input name="name" type="text">
                                                        </div>
                                                    </div>
            
                                                  
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Email Address</label>
                                                            <input name="email" type="email">
                                                        </div>
                                                    </div>
                                                    <a href="javascript:void(0)" onclick="fetch_add()" style="color:blue;margin-left:400px;"><i class="fa fa-home" aria-hidden="true"></i>Fetch Address</a>
                                                    <div class="col-lg-12 col-md-12">

                                                        <div class="billing-info">
                                                            
                                                            <label>Address</label>
                                                            <input name="address" type="text">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Telephone</label>
                                                            <input name="mobile" type="text">
                                                        </div>
                                                        <div class="billing-info">
                                                            <label>Zipcode</label>
                                                            <input name="zipcode" id="zipcode" type="text">
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>2.</span> <a data-toggle="collapse" data-parent="#faq" href="">payment information</a></h5>
                                    </div>
                                    <div id="payment-5" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <div class="payment-info-wrapper">
                                                <div class="ship-wrapper">
                                                    <div class="single-ship">
                                                        <input type="radio" checked="" value="COD" name="payment_mode">
                                                        <label>CASH ON DELIVERY </label>
                                                    </div>
                                                   
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>3.</span> <a data-toggle="collapse" data-parent="#faq" href="">Order Review</a></h5>
                                    </div>
                                    <div id="payment-6" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <div class="order-review-wrapper">
                                                <div class="order-review">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="width-1">Product Name</th>
                                                                    <th class="width-2">Price</th>
                                                                    <th class="width-3">Qty</th>
                                                                    <th class="width-4">Subtotal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php 
                                                            
                                                            foreach($cartArr as $list){
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="o-pro-dec">
                                                                            <p><?php echo $list['fname'] ?></p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-price">
                                                                            <p><?php echo $list['price'] ?> Rs.</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-qty">
                                                                            <p><?php echo $list['qty'] ?></p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-subtotal">
                                                                            <p>
                                                                                <?php 
                                                                                    $temp=$list['qty']*$list['price'] ;
                                                                                    echo $temp." Rs.";
                                                                                    $TPrice=$TPrice+$temp ;

                                                                                ?>
                                                                             </p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="3">Subtotal </td>
                                                                    <td colspan="1"><?php echo $TPrice ?></td>
                                                                </tr>
                                                                <tr class="tr-f">
                                                                    <td colspan="3">Shipping & Handling (Flat Rate - Fixed</td>
                                                                    <td colspan="1">45 Rs.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3">Grand Total</td>
                                                                    <td colspan="1"><?php echo ($TPrice+45)." "; ?>Rs.</td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <input type="hidden" name="total_price" value="<?php echo ($TPrice+45) ?>">
                                                    <div class="billing-back-btn">
                                                        <span>
                                                            Forgot an Item?
                                                            <a href="cart.php"> Edit Your Cart.</a>

                                                        </span>
                                                        <div class="billing-btn">
                                                            <button name="submit" type="submit">PLACE ORDER</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    
                </div>
            </div>
        </div>

<?php
require("footer.php");
?>