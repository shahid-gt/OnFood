<?php
require('database.php');
require('functions.php');
$efound = "";
$pnotmatch = "";
if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $mobile = $_POST['mobile'];
    $status=true;


    //now first check email-id is exist or not in our database. 
    $res = mysqli_query($con , "select email from customer");
    while($row = mysqli_fetch_assoc($res)){
        if($email===$row['email']){
            $status=false;
        }
    }

    if($status){
        //now check password correctness. 
        if($password1===$password2){
            //now encrypt the password 
            $hash = password_hash($password1,PASSWORD_DEFAULT);
            //insert into the database
            mysqli_query($con,"insert into customer values(NULL,'$name','$email','$hash','$mobile')");
            $sql = "CREATE DATABASE $name";
            
            if($con->query($sql)==false){
                echo " Error : $sql --> $Con->error ";
            }

            $NewCusCon = mysqli_connect("localhost","root","",$name);

            $sql1 = "CREATE TABLE cart(
                cart_id INT AUTO_INCREMENT PRIMARY KEY ,
                fid VARCHAR(30) NOT NULL,
                qty INT NOT NULL ,
                price INT NOT NULL ,
                rname VARCHAR(30) NOT NULL,
                added_on DATETIME  
            ) "; 

            if($NewCusCon->query($sql1)==true){
                redirect('index.php');
            }

          
        }
        else{
            $pnotmatch="password does not match . ";
        }

    }
    else{
        $efound="This email id is already Register . ";
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
                        <h2>Customer Registration</h2>
                    </div>
                    
                    


                    <form class="pt-3" method="post">

                        <div class="form-group">
                            <input type="textbox" class="form-control form-control-lg" 
                                placeholder="Username" name="username" required>
                        </div>

                        
                        <div class="form-group">
                            <input type="textbox" class="form-control form-control-lg" 
                                placeholder="Mobile No." name="mobile" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg" 
                                placeholder="Email-id" name="email" required>
                            <?php if($efound) {
                                echo "<p class='msgRegister'>$efound</p>" ;
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" id="password"
                                placeholder="Password" name="password1" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" id="password"
                                placeholder="Re-enter password" name="password2" required>
                                <?php if($pnotmatch) {
                                echo "<p class='msgRegister'>$pnotmatch</p>" ;
                            }
                            ?>
                        </div>

                        <div class="mt-3">
                            <input type="submit" 
                                class="btn btn-block btn-success text-dark btn-lg font-weight-bold auth-form-btn myfont mybtn"
                                value="Register" name="submit" />
                        </div>
                    
                    </form>
                        
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('footer.html') ?>