<?php

include_once 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
		$msg='';

        $uid=$_SESSION['user_id'];

        $get="SELECT * from user where id= '$uid'";
        $isql=mysqli_query($con,$get);

        $rows=mysqli_fetch_assoc($isql);

        $fname=$rows['Name'];
        $fphone=$rows['Phone'];
        $fadd=$rows['Address'];
        $fpass=$rows['Password'];

        


       


?>


<div class="center2" style="margin-bottom: 10px;margin-top: 10px;">
        <h1>Your Order</h1>
        <div class="section1" style="padding-bottom: 10px;">
        <?php
        $uid=$_SESSION['user_id'];
        $sq="SELECT * FROM `cart` WHERE `u_id`='$uid' AND `status`=1";

        $rs=mysqli_query($con,$sq);
        $c=mysqli_num_rows($rs);
        $stprice=0;

            if($c>0){

                while($row=mysqli_fetch_assoc($rs)){
                    if($row['status']>0){
                $price=($row['price'])*($row['quantity']);
                $stprice=$stprice+$price;
                echo '
                <div class="food2">
                <div class="foodc"><h3>'. $row['f_name'] .'</h3><div class="price">Unit price: '. $row['price'] .' tk</div></div>
                <div class="foodc">Quantity: '. $row['quantity'] .'</div>
                <div class="foodc"><div class="col3"><a href="remove2_cart.php?cartid='.$row['cart_id'].'">Remove</a></div><div class="price">'. $price.' tk</div></div>
            
            </div>';
                    }
            }
            
            // echo $stprice;
            $tprice=$stprice+20;
            echo '<div class="food2">
            <div class="foodc"><div class="price">Subtotal:'.$stprice.' tk</div></div>
            <div class="foodc">Delivery charge: 20 tk</div>
            <div class="foodc"><div class="price">Total: '.$tprice.' tk</div></div>
        
        </div>';
        }
            ?>
        </div>
    </div>
    </div>
</div>
<?php
    if($c>0){


        if (isset($_POST['submit'])) {

            $name=$_POST['uname'];
            $add=$_POST['address'];
            $phone=$_POST['phone'];
            $pay=$_POST['pay'];
    
                $sql1="INSERT INTO `orders`(`u_id`, `name`, `address`, `phone`, `amount`, `pay_m`, `status`) VALUES ('$uid','$name','$add','$phone','$tprice','$pay',0)";

                $res=mysqli_query($con,$sql1);


                $sql2="DELETE FROM `cart` WHERE `u_id`='$uid'";

                $res2=mysqli_query($con,$sql2);

                if($res==1 && $res2==1){
                    header('location:uorders.php');
                }else{
                    
                }
                // // $tid = $_POST["tid"];
                // $name = $_POST["name"];
                // $price = $_POST["price"];
                // $avatar_name = $_FILES["avatar"]["name"];
                // $avatar_tmpName = $_FILES["avatar"]["tmp_name"];
                // $location = "foodimg/";
                // $nameForDB = uniqid() . $avatar_name;
                // move_uploaded_file($avatar_tmpName, $location . "$nameForDB");
                
                // if(!empty($pass)){
                //     $sql = "UPDATE `user` SET `Name`='$name',`Address`='$add', `Password`='$pass' WHERE `id`=$uid";
                // $result = mysqli_query($con, $sql);
                // $msg='Successfully Updated.';
                // header('location:user_profile.php');
                // }else{
                //     $sql = "UPDATE `user` SET `Name`='$name',`Address`='$add'  WHERE `id`=$uid";
                //     $result = mysqli_query($con, $sql);
                //     $msg='Successfully Updated.';
                //     header('location:user_profile.php');
                // }
                
            }
?>
    <div class="center2" style="margin-top: 10px;">
        <h1>Other details</h1>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="textfield">
                <div class="labe">Name:</div>
                <input type="text"  name="uname" value="<?php echo $fname;?>"  readonly/>
            </div>
            <div class="textfield">
                <div class="labe">Phone:</div>
                <input type="text" style="color: gray;" name="phone" value="<?php echo $fphone;?>" readonly />
            </div>
            <div class="textfield">
                <div class="labe">Address:</div>
                <input type="text"  name="address" value="<?php echo $fadd;?>" required />
            </div>
            <div class="textfield">
                <div class="labe">Payment:</div>
                <div class="type_radio">
                <div class="ra">
                    <input type="radio"  name="pay" value="Cash on delivery" id="cash" required /><label for="cash">Cash on delivery</label>
                </div>
                <div class="ra">
                    <input type="radio"  name="pay" id="online"  disabled/><label style="color:red ;" for="online">Online payment</label>
                </div>
                </div>
            </div>
            <input style="width: 200px ;" type="Submit" name="submit" value="Confirm Order"/>

        </form>
    </div>
    <?php
    }
    ?>
</div>



<?php

include_once 'footer.php'

?>
</body>
</html>