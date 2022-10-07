<?php
session_start();


include_once 'conn.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>
<header>

<div class="nav-logo">
   <h2><a href="index.php">HUNGRY</a></h2>
</div>
<div class="nav-items">
   <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="dishes.php">Dishes</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>
   </ul>
</div>
<?php
if(!isset($_SESSION['username'])){
   echo '<div class="nav-button"><a href="login.php"><button class="b1">Login</button></a><a href="signup.php"><button class="b2">Signup</button></a></div>';
}
elseif($_SESSION['acc_type']=='user'){
   echo '<div class="nav-button"><a href="user_profile.php"><button class="b1">Profile</button></a><a href="cart.php"><button class="b3">Cart</button></a><a href="logout.php"><button class="b2">Logout</button></a></div>';
}
elseif($_SESSION['acc_type']=='manager'){
   echo '<div class="nav-button"><a href="manager_profile.php"><button class="b1">Profile</button></a><a href="logout.php"><button class="b2">Logout</button></a></div>';
}elseif($_SESSION['acc_type']=='admin'){
   echo '<div class="nav-button"><a href="admin_profile.php"><button class="b1">Profile</button></a><a href="logout.php"><button class="b2">Logout</button></a></div>';
}
?>


</header>
</body>
</html>