

<?php 
session_start();

include_once 'conn.php';
if(isset($_GET['deleteid']))
{
		$id= $_GET['deleteid']; 
		
	$sql = "DELETE FROM user WHERE id='$id'";
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