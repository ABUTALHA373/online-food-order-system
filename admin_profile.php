<?php

include_once 'header.php';


if ($_SESSION['acc_type'] == 'user' || $_SESSION['acc_type'] == 'manager') {
    header('location:index.php');
} elseif ($_SESSION['acc_type'] == 'admin') {

} else {
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
        <div class="c01" style="margin: auto;">All users</div>
    </div>
    <div class="box">
    <?php
    $sql="select * from user";
    echo '<table style="width:100%">
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Phone</th>
		  <th>Account type</th>
          <th>Account Status</th>
          <th width="20%"> Action</th>

      </tr>';
    $res=mysqli_query($con, $sql);
    $total=0;
    while($row=mysqli_fetch_assoc($res)){
        $id=$row ['id'];
        $name=$row ['Name'];
        $num=$row['Phone'];
        $type=$row ['acc_type'];
        $status=$row['Status'];
        if($status==0){
            $statusup='Blocked';
        }elseif($status==1){
            $statusup='OK';
        }
        echo '
      <tr>
          <td>'.$id.'</td>
          <td>'.$name.'</td>
          <td>'.$num.'</td>
		  <td>'.$type.'</td>
          <td>'.$statusup.'</td>';
          if($status==1){
            echo '
            <td><a href="delete.php?deleteid=' . $id . '" class="btn">Delete</a><a href="block.php?blockid=' . $id . '" class="btn">Block</a></td>
            </tr>';
           }elseif($status==0){
              echo '
            <td><a href="delete.php?deleteid=' . $id . '" class="btn">Delete</a><a href="unblock.php?unblockid=' . $id . '" class="btn" style="background-color:#00AC7C">Unblock</a></td>
            </tr> ';
           };
    }
    echo '</table>';
    ?>
    </div>

</div>

<?php

include_once 'footer.php';

?>

</body>

</html>
