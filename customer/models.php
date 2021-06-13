<?php

class Order {
    private $user_id ;
    private $name ;
    private $email ;
    private $address;
    private $mobile;
    private $zipcode;
    private $time ;
    private $payment_mode;

    function __construct($user_id,$name,$email,$address,$mobile,$zipcode,$time,$payment_mode){
        $this->user_id = $user_id ;
        $this->name = $name ;
        $this->email = $email ;
        $this->address = $address ;
        $this->mobile = $mobile ;
        $this->zipcode = $zipcode ;
        $this->time = $time ;
        $this->payment_mode = $payment_mode;
    }

    function process_data($cartArr,$cusCon){
        global $con2;
        foreach($cartArr as $list){
            
            $fname = $list['fname'] ;
            $sql="insert into orders values(NULL,$this->user_id,'$this->name','$this->email','$this->address','$this->mobile','$this->zipcode','$fname','$this->time','$this->payment_mode')";
            //$sql = "select * from food";
            echo $sql;
            $resname=$list['rname'];
            $ResCon = mysqli_connect("localhost","root","",$resname);
            $res  =mysqli_query($ResCon,$sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($sql), E_USER_ERROR);
        }
        if($res){
            $sql2="TRUNCATE TABLE cart" ;
            $res  =mysqli_query($cusCon,$sql2) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($sql), E_USER_ERROR);
            redirect("placesuccess.php") ;            
        }
        else{echo "unsuccess";}
    }

    function show_order_details(){
        return ($this->user_id." ".$this->name." ".$this->email." ".$this->address." ".$this->mobile." ".$this->zipcode." ".$this->time." ".$this->payment_mode) ;
    }
} 
?>