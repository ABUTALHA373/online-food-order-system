

<?php 
session_start();

include_once 'conn.php';


if(isset($_GET['f_id']))
{
		$fid= $_GET['f_id']; 
        $uid= $_SESSION['user_id'];

        $sq2="SELECT * FROM `food` WHERE `f_id`='$fid'";
        
        $rs2=mysqli_query($con,$sq2);
        $c2=mysqli_num_rows($rs2);
        $row2=mysqli_fetch_assoc($rs2);

        $fname=$row2['f_name'];
        $fprice=$row2['price'];

        $sq="SELECT * FROM `cart` WHERE `u_id`='$uid' AND `f_id`='$fid'";
        
        $rs=mysqli_query($con,$sq);
        $c=mysqli_num_rows($rs);
        $row=mysqli_fetch_assoc($rs);

    if($c==0){
        $sql = "INSERT INTO `cart`(`u_id`, `f_id`,`f_name`,`price`, `quantity`, `status`) VALUES ('$uid','$fid','$fname','$fprice',1,1)";
        $run =mysqli_query($con,$sql);
        if($run){
            header("location:dishes.php");
        }
            else{
                header("location:dishes.php");
        }
    }elseif($row['quantity']>0){
        $qup=$row['quantity']+1;
        $cid=$row['cart_id'];
        $qur="UPDATE `cart` SET `quantity`='$qup',`status`=1 WHERE `cart_id`='$cid'";
        $run2=mysqli_query($con,$qur);
        if($run2){
            header("location:dishes.php");
        }
            else{
                header("location:dishes.php");
        }
    }
}
?>

</body> 
</html>