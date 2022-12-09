<?php

include 'connect.php';

if(isset($_REQUEST['user_id'])){
    
    $user_id=$_REQUEST['user_id'];
    
    $q=mysqli_query($conn,"select * from transactions where user_id='$user_id'");
    
    if(mysqli_num_rows($q)>=1){
         $response['status']=True;
         $data=array();
         while($to=mysqli_fetch_array($q,MYSQLI_ASSOC)){
             array_push($data,$to);
         }
         $response['data']=$data;
    $response['message']='payment history fetch successfully';
    echo json_encode($response);
    exit();
    }else{
       $response['status']=False;
    $response['message']='no payment history found';
    echo json_encode($response);
    exit(); 
    }
    
}else{
    $response['status']=False;
    $response['message']='user_id is required';
    echo json_encode($response);
    exit();
}


?>