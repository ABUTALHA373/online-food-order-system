
<?php 
session_start();

include_once 'conn.php';
if(isset($_GET['blockid']))
{
		$id= $_GET['blockid']; 
		
	$sql = "UPDATE food SET availability=0 WHERE f_id='$id'";
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