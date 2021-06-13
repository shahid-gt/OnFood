function add_cart(id,price,rname){
    // alert("Food Id "+id);
    // alert("Quantity "+document.getElementById("qty"+id).value);
    //alert("Restaurant Name"+rname);
    var fid = id ;
    var qty = document.getElementById("qty"+id).value ; 
     jQuery.ajax({
         url:"http://localhost/OnFood/customer/managecart.php" ,
         type:"post",
         data:"fid="+fid+"&qty="+qty+"&price="+price+"&type=add"+"&rname="+rname,
         success:function(result){
             swal("Congratulation!", "Food added Successfully", "success");
             //alert(result);
         }

     });

}

function fetch_add(){
    jQuery.ajax({
        url:"http://localhost/OnFood/customer/add-fetch.php" ,
        type:"post",
        data:"",
        success:function(result){
            //alert(result);
        }
    });

}

function delete_cart(id){
    alert("in custom.js");
    alert(id);
    jQuery.ajax({
        url:"http://localhost/OnFood/customer/managecart.php" ,
        type:"post",
        data:'cart_id='+id+'&type=delete',
        success:function(result){
           // alert(result);
            window.location.href = window.location.href ;
        }
    });
}