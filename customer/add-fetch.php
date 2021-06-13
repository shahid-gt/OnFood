<?php
$ch = curl_init() ;
curl_setopt($ch,CURLOPT_URL,"http://ip-api.com/json");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$result = curl_exec($ch);
$result=json_decode($result);
if($result->status=='success'){
   
    echo "zip : ".$result->zip."\n" ;
    echo "city : ".$result->city."\n" ;
    echo "State : ".$result->regionName."\n" ;
    echo "country : ".$result->country."\n" ;
}
?>
