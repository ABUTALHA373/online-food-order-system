<?php

include_once 'header.php';

if($_SESSION['acc_type']=='admin' || $_SESSION['acc_type']=='user'){
    header('location:index.php');
}elseif($_SESSION['acc_type']=='manager'){
    
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

<div class="holder">
    <div class="user_name">Hello <span><?php echo $_SESSION['username']; ?></span></div>
</div>
<div class="holder">
<div class="title">
    <div class="c02"><a href="manager_profile.php">All foods</a></div><div class="c02"><a href="manager_profile.php">Orders</a></div><div class="c02"><a href="c.php">Add food</a></div>
    </div>
</div>
<?php

$msg="";

        $fid= $_GET['foodid'];
		
        $get="SELECT * from food where f_id=$fid";
        $isql=mysqli_query($con,$get);

        $rows=mysqli_fetch_assoc($isql);

        $fiid=$rows['f_id'];
        $fname=$rows['f_name'];
        $fprice=$rows['price'];


if (isset($_POST['submit'])) {
    // $tid = $_POST["tid"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $avatar_name = $_FILES["avatar"]["name"];
    $avatar_tmpName = $_FILES["avatar"]["tmp_name"];
    $location = "foodimg/";
    $nameForDB = uniqid() . $avatar_name;
    move_uploaded_file($avatar_tmpName, $location . "$nameForDB");
  
    
    if(empty($avatar_name)){
        $sql1 = "UPDATE `food` SET `f_name`='$name',`price`='$price',`availability`=1 WHERE `f_id`=$fid";
        $result1 = mysqli_query($con, $sql1);
        $msg='Successfully edited.';
    }else{

    $sql = "UPDATE `food` SET `f_name`='$name',`price`='$price', `f_img`='$nameForDB',`availability`=1 WHERE `f_id`=$fid";
    $result = mysqli_query($con, $sql);
    $msg='Successfully edited.';
    }
}
?>

    <div class="center2">
        <h1>Edit food details</h1>
        <div class="from_txt">
            <p id="message" style="color:red"><?php echo $msg?></p>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="textfield">
                <div class="labe">Food id:</div>
                <input type="text"  name="tid" value="<?php echo $fiid;?>" disabled />
            </div>
            <div class="textfield">
                <div class="labe">Food name:</div>
                <input type="text"  name="name" value="<?php echo $fname;?>" required />
            </div>
            <div class="textfield">
                <div class="labe">Food price:</div>
                <input type="text"  name="price" value="<?php echo $fprice;?>" required />
            </div>
            
            <div class="textfield">
            <div class="labe">Upload an image:</div>
            <input type="file" placeholder="Upload your pic" name="avatar">
            </div>
            <input style="width: 200px ;" type="Submit" name="submit" value="Save"/>

        </form>
    </div>

   
</div>
</div>


</div>
<!-- footer -->
<?php

include_once 'footer.php';
?>
   <!-- footer -->
</body>
</html>
