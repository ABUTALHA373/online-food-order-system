
<?php 
session_start();

include_once 'conn.php';

if(isset($_GET['unblockid']))
{
		$id= $_GET['unblockid']; 
		
	$sql = "UPDATE food SET availability=1 WHERE f_id='$id'";
	$run =mysqli_query($con,$sql);
	if($run){
		header("location:manager_profile.php");
	}
		else{
			header("location:manager_profile.php");
	}
	
	
}


?>

</body> 
</html>