

<?php 
session_start();

include_once 'conn.php';
if(isset($_GET['deleteid']))
{
		$id= $_GET['deleteid']; 
		
	$sql = "DELETE FROM food WHERE f_id='$id'";
	$run =mysqli_query($con,$sql);
	if($run){
		header("location:manager_profile.php");
	}
		else{
			header("location:manager_profile.php");
	}
	
	
}


?>
