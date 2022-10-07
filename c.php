<?php

include_once 'header.php';

if($_SESSION['acc_type']=='admin' || $_SESSION['acc_type']=='user'){
    header('location:index.php');
}elseif($_SESSION['acc_type']=='manager'){
    
}else{
    header('location:index.php');
}


$msg="";

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $avatar_name = $_FILES["avatar"]["name"];
    $avatar_tmpName = $_FILES["avatar"]["tmp_name"];
    $location = "foodimg/";
    $nameForDB = uniqid() . $avatar_name;
    move_uploaded_file($avatar_tmpName, $location . "$nameForDB");
  
  
    $sql = "INSERT INTO `food`(`f_name`, `f_img`, `price`, `category`, `availability`) VALUES ('$name','$nameForDB','$price','$category',1)";
    $result = mysqli_query($con, $sql);
    $msg='Successfully added.';
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
<div class="center2">
        <h1>Add food</h1>
        <div class="from_txt">
            <p id="message" style="color:red"><?php echo $msg?></p>
        </div>
        <form action="c.php" method="POST" enctype="multipart/form-data">
            <div class="textfield">
                <div class="labe">Food name:</div>
                <input type="text"  name="name" required />
            </div>
            <div class="textfield">
                <div class="labe">Food price:</div>
                <input type="text"  name="price" required />
            </div>
            <div class="textfield">
                <div class="labe">Category:</div>
                <select name="category" id="" required>
                    <option value="Snacks">Snacks</option>
                    <option value="Vegetables">Vegetables</option>
                    <option value="Curry">Curry</option>
                    <option value="Rice">Rice</option>
                    <option value="Beverage">Beverage</option>
                </select>
            </div>
            <div class="textfield">
            <div class="labe">Upload an image:</div>
            <input type="file"  placeholder="Upload your pic" name="avatar">
            </div>
            <input style="width: 200px ;" type="Submit" name="submit" value="Add food"/>

        </form>
    </div>
<!-- footer -->
<?php
include_once 'footer.php';
?>
   <!-- footer -->
</body>
</html>



