

<?php 
session_start();

include_once 'conn.php';
if(isset($_GET['statusid']))
{
		$id= $_GET['statusid']; 
		
	$sql = "UPDATE `orders` SET `status`=1 WHERE `order_id`='$id'";
	$run =mysqli_query($con,$sql);
	if($run){
		header("location:morders.php");
	}
		else{
			header("location:morders.php");
	}
	
	
}


?>