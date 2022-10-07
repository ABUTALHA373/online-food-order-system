<?php

include_once 'header.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="section1">
<h1 class="title" style="background-color: white;text-align:center;color:#00AC7C;padding:10px">Our Delicious Foods</h1>
</div>
<div class="big_container">
    <div class="left"><div class="section1">
        <?php
$sql = "SELECT * FROM `food` WHERE  `category`='Beverage' && availability=1";
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
            if(!empty($_SESSION['user_id'])){
                echo '<div class="action"><a href="add_cart.php?f_id='. $row['f_id'].'">Add to Cart</a></div>';
            }else{
                echo '<div class="action"><a href="login.php">Add to Cart</a></div>';
            }echo'
         </div>
      </div>';
      }
   

?>
   
</div>
</div>



<div class="section1">
        <?php
$sql = "SELECT * FROM `food` WHERE  `category`='Snacks' && availability=1";
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
        if(!empty($_SESSION['user_id'])){
            echo '<div class="action"><a href="add_cart.php?f_id='. $row['f_id'].'">Add to Cart</a></div>';
        }else{
            echo '<div class="action"><a href="login.php">Add to Cart</a></div>';
        }echo'
     </div>
  </div>';
  }
   

?>
   
</div>
</div>


<div class="section1">
        <?php
$sql = "SELECT * FROM `food` WHERE  `category`='Vegetables' && availability=1";
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
        if(!empty($_SESSION['user_id'])){
            echo '<div class="action"><a href="add_cart.php?f_id='. $row['f_id'].'">Add to Cart</a></div>';
        }else{
            echo '<div class="action"><a href="login.php">Add to Cart</a></div>';
        }echo'
     </div>
  </div>';
  }
   

?>
   
</div>
</div>


<div class="section1">
        <?php
$sql = "SELECT * FROM `food` WHERE  `category`='Curry' && availability=1";
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
        if(!empty($_SESSION['user_id'])){
            echo '<div class="action"><a href="add_cart.php?f_id='. $row['f_id'].'">Add to Cart</a></div>';
        }else{
            echo '<div class="action"><a href="login.php">Add to Cart</a></div>';
        }echo'
     </div>
  </div>';
  }
   

?>
   
</div>
</div>


<div class="section1">
        <?php
$sql = "SELECT * FROM `food` WHERE  `category`='Rice' && availability=1";
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
        if(!empty($_SESSION['user_id'])){
            echo '<div class="action"><a href="add_cart.php?f_id='. $row['f_id'].'">Add to Cart</a></div>';
        }else{
            echo '<div class="action"><a href="login.php">Add to Cart</a></div>';
        }echo'
     </div>
  </div>';
  }
   

?>
   
</div>
</div>
</div>
    <div class="right">
        <div class="section1" style="height: 800px;">
            <h1 class="title2" style="text-align:center">Cart</h1>
        <?php
        if(isset($_SESSION['user_id'])){
        
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
                <div class="foodc"><div class="col3"><a href="remove_cart.php?cartid='.$row['cart_id'].'">Remove</a></div><div class="price">'. $price.' tk</div></div>
            
            </div>';
                    }
            }
            
            // echo $stprice;
            $tprice=$stprice+20;
            echo '<div class="food2">
            <div class="foodc"><div class="price">Subtotal:'.$stprice.' tk</div></div>
            <div class="foodc">Delivery charge: 20 tk</div>
            <div class="foodc"><div class="price">Total: '.$tprice.' tk</div></div>
        
        </div>
        <div class="col4"><a href="cart.php">Checkout</a></div>';
        }
        }
        ?>
            
            





        </div>
    </div>


</div>



</body>
<?php

include_once 'footer.php'

?>
</html>