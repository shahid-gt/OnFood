<?php
include ("header.php");
$msg='';
if(isset($_POST['submit'])){
    $cid = $_SESSION['CUSTOMER_ID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $time = date('Y-m-d h:i:s');
    $sql="insert into contact_us values('$cid','$name','$email','$subject','$message','$time')";
    
    if($con->query($sql)==true){}
    else{echo "$sql <br> $con->error" ;}
    
    $msg="Thank you for your feedback\n we will approching soon :) .";
}

?>

<div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="shop.php">Home</a></li>
                        <li class="active"> Contact Us </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="contact-area pt-100 pb-100">
            <div class="container">
                
                <div class="row">
                    <div class="col-12">
                        <div class="contact-message-wrapper">
                            <h4 class="contact-title">GET IN TOUCH</h4>
                            <div class="contact-message">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="contact-form-style mb-20">
                                                <input name="name" placeholder="Full Name" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="contact-form-style mb-20">
                                                <input name="email" placeholder="Email Address" type="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-style mb-20">
                                                <input name="subject" placeholder="Subject" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-style">
                                                <textarea name="message" placeholder="Message"></textarea>
                                                <button class="submit btn-style" name="submit" type="submit">SEND MESSAGE</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <p class="msg"><?php if($msg){echo $msg;} ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
include("footer.php");
?>