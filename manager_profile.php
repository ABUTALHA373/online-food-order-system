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
    <div class="c02"><a href="manager_profile.php">All foods</a></div><div class="c02"><a href="morders.php">Orders</a></div><div class="c02"><a href="c.php">Add food</a></div>
    </div>
</div>
<div class="section1">
        <?php
$sql = "SELECT * FROM `food` WHERE  `category`='Beverage'";
$select_run = mysqli_query($con, $sql);
$count=mysqli_num_rows($select_run);

if($count>0){
    echo'<h1 class="title2" style="text-align:center">Beverage</h1>';
}
?>
   <div class="food_container2">
    <?php
   
      while ($row = mysqli_fetch_assoc($select_run)) {
        echo '<div class="food2">
        <div class="food_img">
            <img src="foodimg/'.$row['f_img'].'" alt="">
        </div>
         <div class="food_text">
            <h3>'.$row['f_name'].'</h3>
            <div class="price">'.$row['price'].' tk</div>';
            if($row['availability']==0){
                echo '<div class="action"><a href="available.php?unblockid=' . $row['f_id'] . '" >Make available</a><a href="edit_food.php?foodid=' . $row['f_id'] . '">Edit</a><a href="deletef.php?deleteid=' . $row['f_id'] . '" style="background-color:red">Delete</a></div>';
            }else{
                echo '<div class="action"><a href="unavailable.php?blockid=' . $row['f_id'] . '" style="background-color:red">Make unavailable</a><a href="edit_food.php?foodid=' . $row['f_id'] . '">Edit</a><a href="deletef.php?deleteid=' . $row['f_id'] . '" style="background-color:red">Delete</a></div>';
            }
            echo '
         </div>
      </div>';
      }
   

?>
   
</div>
</div>



<div class="section1">
        <?php
$sql = "SELECT * FROM `food` WHERE  `category`='Snacks'";
$select_run = mysqli_query($con, $sql);
$count=mysqli_num_rows($select_run);

if($count>0){
    echo'<h1 class="title2" style="text-align:center">Snacks</h1>';
}
?>
   <div class="food_container2">
    <?php
   
      while ($row = mysqli_fetch_assoc($select_run)) {
        echo '<div class="food2">
        <div class="food_img">
            <img src="foodimg/'.$row['f_img'].'" alt="">
        </div>
        <div class="food_text">
        <h3>'.$row['f_name'].'</h3>
        <div class="price">'.$row['price'].' tk</div>';
        if($row['availability']==0){
            echo '<div class="action"><a href="available.php?unblockid=' . $row['f_id'] . '" >Make available</a><a href="edit_food.php?foodid=' . $row['f_id'] . '">Edit</a><a href="deletef.php?deleteid=' . $row['f_id'] . '" style="background-color:red">Delete</a></div>';
        }else{
            echo '<div class="action"><a href="unavailable.php?blockid=' . $row['f_id'] . '" style="background-color:red">Make unavailable</a><a href="edit_food.php?foodid=' . $row['f_id'] . '">Edit</a><a href="deletef.php?deleteid=' . $row['f_id'] . '" style="background-color:red">Delete</a></div>';
        }
        echo '
     </div>
  </div>';
      }
   

?>
   
</div>
</div>


<div class="section1">
        <?php
$sql = "SELECT * FROM `food` WHERE  `category`='Vegetables'";
$select_run = mysqli_query($con, $sql);
$count=mysqli_num_rows($select_run);

if($count>0){
    echo'<h1 class="title2" style="text-align:center">Vegetables</h1>';
}
?>
   <div class="food_container2">
    <?php
   
      while ($row = mysqli_fetch_assoc($select_run)) {
        echo '<div class="food2">
        <div class="food_img">
            <img src="foodimg/'.$row['f_img'].'" alt="">
        </div>
        <div class="food_text">
        <h3>'.$row['f_name'].'</h3>
        <div class="price">'.$row['price'].' tk</div>';
        if($row['availability']==0){
            echo '<div class="action"><a href="available.php?unblockid=' . $row['f_id'] . '" >Make available</a><a href="edit_food.php?foodid=' . $row['f_id'] . '">Edit</a><a href="deletef.php?deleteid=' . $row['f_id'] . '" style="background-color:red">Delete</a></div>';
        }else{
            echo '<div class="action"><a href="unavailable.php?blockid=' . $row['f_id'] . '" style="background-color:red">Make unavailable</a><a href="edit_food.php?foodid=' . $row['f_id'] . '">Edit</a><a href="deletef.php?deleteid=' . $row['f_id'] . '" style="background-color:red">Delete</a></div>';
        }
        echo '
     </div>
  </div>';
      }
   

?>
   
</div>
</div>


<div class="section1">
        <?php
$sql = "SELECT * FROM `food` WHERE  `category`='Curry'";
$select_run = mysqli_query($con, $sql);
$count=mysqli_num_rows($select_run);

if($count>0){
    echo'<h1 class="title2" style="text-align:center">Curry</h1>';
}
?>
   <div class="food_container2">
    <?php
   
      while ($row = mysqli_fetch_assoc($select_run)) {
        echo '<div class="food2">
        <div class="food_img">
            <img src="foodimg/'.$row['f_img'].'" alt="">
        </div>
        <div class="food_text">
        <h3>'.$row['f_name'].'</h3>
        <div class="price">'.$row['price'].' tk</div>';
        if($row['availability']==0){
            echo '<div class="action"><a href="available.php?unblockid=' . $row['f_id'] . '" >Make available</a><a href="edit_food.php?foodid=' . $row['f_id'] . '">Edit</a><a href="deletef.php?deleteid=' . $row['f_id'] . '" style="background-color:red">Delete</a></div>';
        }else{
            echo '<div class="action"><a href="unavailable.php?blockid=' . $row['f_id'] . '" style="background-color:red">Make unavailable</a><a href="edit_food.php?foodid=' . $row['f_id'] . '">Edit</a><a href="deletef.php?deleteid=' . $row['f_id'] . '" style="background-color:red">Delete</a></div>';
        }
        echo '
     </div>
  </div>';
      }
   

?>
   
</div>
</div>


<div class="section1">
        <?php
$sql = "SELECT * FROM `food` WHERE  `category`='Rice'";
$select_run = mysqli_query($con, $sql);
$count=mysqli_num_rows($select_run);

if($count>0){
    echo'<h1 class="title2" style="text-align:center">Rice</h1>';
}
?>
   <div class="food_container2">
    <?php
   
      while ($row = mysqli_fetch_assoc($select_run)) {
        echo '<div class="food2">
        <div class="food_img">
            <img src="foodimg/'.$row['f_img'].'" alt="">
        </div>
        <div class="food_text">
        <h3>'.$row['f_name'].'</h3>
        <div class="price">'.$row['price'].' tk</div>';
        if($row['availability']==0){
            echo '<div class="action"><a href="available.php?unblockid=' . $row['f_id'] . '" >Make available</a><a href="edit_food.php?foodid=' . $row['f_id'] . '">Edit</a><a href="deletef.php?deleteid=' . $row['f_id'] . '" style="background-color:red">Delete</a></div>';
        }else{
            echo '<div class="action"><a href="unavailable.php?blockid=' . $row['f_id'] . '" style="background-color:red">Make unavailable</a><a href="edit_food.php?foodid=' . $row['f_id'] . '">Edit</a><a href="deletef.php?deleteid=' . $row['f_id'] . '" style="background-color:red">Delete</a></div>';
        }
        echo '
     </div>
  </div>';
      }
   

?>
   
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