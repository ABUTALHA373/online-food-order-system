

<?php 
session_start();

include_once 'conn.php';
if(isset($_GET['cartid']))
{
		$id= $_GET['cartid']; 
		
	$sql = "DELETE FROM cart WHERE cart_id='$id'";
	$run =mysqli_query($con,$sql);
	if($run){
		header("location:dishes.php");
	}
		else{
			header("location:dishes.php");
	}
	
	
}


?>

</body> 
</html>