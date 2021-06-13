<?php
require('database.php');
require('functions.php');
session_start() ;
$msg = "";

if(isset($_POST['submit'])){
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $auth = $_POST['rbtn'];
    if($auth==="admin"){
        $sql = "select * from admin where username='$uname' and password='$pass'" ;
    
        $res = mysqli_query($con,$sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error(), E_USER_ERROR);;
   
        if(mysqli_num_rows($res)){
            $_SESSION['LOGIN'] = true ;
            redirect("admin/index.php");
        }
        else {
        $msg = "Please fill valid userame and password ";
        }
    }

    if($auth==="restaurant"){
        $sql = "select * from restaurant where rname='$uname' and rpass='$pass'" ;
    
        $res = mysqli_query($con,$sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error(), E_USER_ERROR);;
   
        if(mysqli_num_rows($res)){
            $_SESSION['LOGIN'] = true ;
            $_SESSION['RES_NAME'] = $uname ;
            redirect("restaurant/index.php");
        }
        else {
        $msg = "Please fill valid userame and password ";
        }
    }

    if($auth==="customer"){

        $hash = password_hash($pass,PASSWORD_DEFAULT);
        $sql = "select * from customer " ;
       
    
        $res = mysqli_query($con,$sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error(), E_USER_ERROR);
   
        while($row = mysqli_fetch_assoc($res)){
            if(password_verify($pass,$row['cpass'])){
                $tcid = $row['cid'];
                $tname = $row['cname'] ;
                $_SESSION['CUSTOMER_NAME'] = $tname ;
                //session_start() ;
                $_SESSION['LOGIN'] = true ;
                $_SESSION['CUSTOMER_ID'] = $tcid ;
                redirect("customer/index.php");
            }
        }
        
        $msg = "Please fill valid userame and password ";
        
    }

}


?>


<?php require('header.html') ?>
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left p-5">
                    <div class="brand-logo text-center myfont">
                        <h2>LOGIN</h2>
                    </div>
                    
                    


                <h6 class="font-weight-light">Sign in to continue.</h6>

                    <form class="pt-3" method="post">

                        <!-- Radio buttons -->
                        <input type="radio" id="admin" name="rbtn" value="admin">
                        <label for="admin">ADMIN</label><br/>
                        <input type="radio" id="restaurant" name="rbtn" value="restaurant">
                        <label for="restaurant">RESTAURANT</label><br/>
                        <input type="radio" id="customer" name="rbtn" value="customer">
                        <label for="user">CUSTOMER</label><br/><br/>

                        <div class="form-group">
                            <input type="textbox" class="form-control form-control-lg" id="email"
                                placeholder="Username" name="username" required>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" id="password"
                                placeholder="Password" name="password" required>
                        </div>

                        <div class="mt-3">
                            <input type="submit" 
                                class="btn btn-block btn-success text-dark btn-lg font-weight-bold auth-form-btn myfont mybtn"
                                value="Sign In" name="submit" />
                        </div>
                        <?php
                            if($msg){
                                echo "<h6 class='font-weight-bold text-danger my-3'>$msg</h6>";
                            }
                        ?>
                    </form>
                        
                            <a href="register.php">Click here to create customer account</a>
                        
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('footer.html') ?>