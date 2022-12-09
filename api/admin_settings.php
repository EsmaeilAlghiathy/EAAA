 <?php
include 'connect.php';

if(isset($_REQUEST['get_settings'])){
    $query=mysqli_query($conn,"SELECT * FROM admin_control WHERE id=1");
    $num=mysqli_num_rows($query);
    $response['number of rows']=$num;
	if($num>=1){
		$response=array();
		$response['status']=True;
		$row=mysqli_fetch_array($query);
		array_push($response, $row);
	}
	else{
		$response['status']=False;
		$response['message']='No  Settings Found';
		$response['error']=mysqli_error($conn);
	}
	echo json_encode($response);
}


?>