<?php

include_once 'header.php';

if($_SESSION['acc_type']=='admin' || $_SESSION['acc_type']=='manager'){
    header('location:index.php');
}elseif($_SESSION['acc_type']=='user'){

}else{
    header('location:index.php');
}

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

        


        if (isset($_POST['submit'])) {

        $name=$_POST['name'];
        $add=$_POST['address'];
        $pass=$_POST['pass'];

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


    <div class="holder">
    <div class="user_name">Hello <span><?php echo $_SESSION['username']; ?></span></div>
    </div>
    <div class="holder">
    <div class="title">
    <div class="c02"><a href="user_profile.php">Edit Profile</a></div><div class="c02"><a href="uorders.php">Orders</a></div>
    </div>
    </div>
    <div class="center2">
        <h1>Account details</h1>
        <div class="from_txt">
            <p id="message" style="color:red"><?php echo $msg?></p>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="textfield">
                <div class="labe">Name:</div>
                <input type="text"  name="name" value="<?php echo $fname;?>" required />
            </div>
            <div class="textfield">
                <div class="labe">Phone:</div>
                <input type="text" style="color: gray;" name="phone" value="<?php echo $fphone;?>" disabled />
            </div>
            <div class="textfield">
                <div class="labe">Address:</div>
                <input type="text"  name="address" value="<?php echo $fadd;?>" required />
            </div>
            <div class="textfield">
                <div class="labe">Password:</div>
                <input type="password"  name="pass" value=""  />
            </div>
            <input style="width: 200px ;" type="Submit" name="submit" value="Update"/>

        </form>
    </div>
</div>




<!-- footer -->
<?php
include_once 'footer.php';
?>
   <!-- footer -->
</body>
</html>