<?php
session_start();
include 'connect.php';
include 'variables.php';

 $verify_qry    = "SELECT * FROM tbl_license ORDER BY id DESC LIMIT 1";
 $verify_result = mysqli_query($conn, $verify_qry);
  $verify_row   = mysqli_fetch_assoc($verify_result);
    $item_id    = $verify_row['item_id'];
    $purchase_code1    = $verify_row['purchase_code'];
if(isset($_POST['email'])){
	$email=$_POST['email'];
	 $password=$_POST['password'];
	$password=md5($password);
	$res=mysqli_query($conn,"SELECT * FROM admin WHERE email='$email' and password='$password'");
	$num=mysqli_num_rows($res);
	if($num>=1){
		 if ($item_id == $var_item_id) {
    	$row=mysqli_fetch_array($res);
		$_SESSION['name']=$row['name'];
		$_SESSION['email']=$row['email'];
		verify_code($purchase_code1,"false",$var_item_id,$var_personal_token,$conn);
                    } else {
                        header("location: verify_purchase_code.php");
                    }
		
	}
	else{
		$_SESSION['wrong']=true;
		header('location:login.php');
	}
}


if(isset($_POST['purchase_code'])){
    $product_code = $_POST['purchase_code'];
    verify_code($product_code,"true",$var_item_id,$var_personal_token,$conn);
}

function verify_code($purchase_code,$isFromVerification,$item_id_my,$token,$con){
    
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.envato.com/v3/market/author/sale?code='.$purchase_code,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$token
  ),
));

$envatoRes = curl_exec($curl);
curl_close($curl);
$envatoRes=json_decode($envatoRes);
 if (isset($envatoRes->item->name)) {
             $item_id=$envatoRes->item->id;
             $item_name=$envatoRes->item->name;
             $buyer=$envatoRes->buyer;
             $license=$envatoRes->license;
             $purchase_date=$envatoRes->sold_at;
            
            if ($item_id != $item_id_my) {
                  $_SESSION['wrong_code'] = true;
                  header('location:verify_purchase_code.php');
            } else {
                mysqli_query($con,'TRUNCATE TABLE tbl_license');
                
                $q1=mysqli_query($con,"insert into tbl_license (purchase_code,item_id,item_name,buyer,license_type,purchase_date) values ('$purchase_code','$item_id','$item_name','$buyer','$license','$purchase_date')");
                
                if($q1){
                     if($isFromVerification == "true"){
                  header('location:login.php');
                  echo("zzzz"); 
              }else{
                  $_SESSION['login']=true;
                 	header('location:index');
             }
                }else{
                  echo("hi".mysqli_error($con)); 
                }
            }
        } else { 
            $_SESSION['wrong_code'] = true;
          header('location:verify_purchase_code.php');
          echo("zzzz");
        }
    
}

?>