
<?php 
session_start();

include_once 'conn.php';
if(isset($_GET['unblockid']))
{
		$id= $_GET['unblockid']; 
		
	$sql = "UPDATE user SET Status=1 WHERE id='$id'";
	$run =mysqli_query($con,$sql);
	if($run){
		header("location:admin_profile.php");
	}
		else{
			header("location:admin_profile.php");
	}
	
	
}


?>

</body> 
</html>