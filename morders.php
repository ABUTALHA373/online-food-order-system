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
<div class="holder">
    <div class="user_name">Hello <span><?php echo $_SESSION['username']; ?></span></div>
    </div>
    <div class="holder">
    <div class="title">
    <div class="c02"><a href="manager_profile.php">All foods</a></div><div class="c02"><a href="morders.php">Orders</a></div><div class="c02"><a href="c.php">Add food</a></div>
    </div>
</div>
    <div class="holder">
    <div class="title">
        <div class="c01" style="margin: auto;">Your Order(s)</div>
    </div>
    <div class="box">
    <?php
    $uid=$_SESSION['user_id'];

    $sql="select * from orders";
    echo '<table style="width:100%">
      <tr>
          <th>Order ID</th>
          <th>Name</th>
          <th>Phone</th>
		  <th>Address type</th>
          <th>Amount</th>
          <th>Payment</th>
          <th>Status</th>
          <th>Date</th>
          <th>View</th>

      </tr>';
    $res=mysqli_query($con, $sql);
    $total=0;
    while($row=mysqli_fetch_assoc($res)){
        $oid=$row ['order_id'];
        $name=$row ['name'];
        $num=$row['phone'];
        $add=$row ['address'];
        $amount=$row['amount'];
        $paym=$row ['pay_m'];
        $status=$row ['status'];
        $date=$row['time'];
        
        echo '
      <tr>
          <td>'.$oid.'</td>
          <td>'.$name.'</td>
          <td>'.$num.'</td>
		  <td>'.$add.'</td>
          <td>'.$amount.' tk</td>
          <td>'.$paym.'</td>';
            if($status==0){
            echo'<td><a href="order_status.php?statusid=' . $oid . '" class="btn">Pending</a></td>
          <td>'.$date.'</td>';
        }elseif($status==1){
            echo'<td>Delivered</td>
          <td>'.$date.'</td>
          ';
        }
        echo '<td><a href="order_status.php?orderid=' . $oid . '" class="btn" style="background-color:#00AC7C">view</a></td>';
          



        //   if($status==1){
        //     echo '
        //     <td><a href="delete.php?deleteid=' . $id . '" class="btn">Delete</a><a href="block.php?blockid=' . $id . '" class="btn">Block</a></td>
        //     </tr>';
        //    }elseif($status==0){
        //       echo '
        //     <td><a href="delete.php?deleteid=' . $id . '" class="btn">Delete</a><a href="unblock.php?unblockid=' . $id . '" class="btn" style="background-color:#00AC7C">Unblock</a></td>
        //     </tr> ';
        //    };
    }
    echo '</table>';
    ?>
    </div>

</div>
</body>
</html>

<?php

include_once 'footer.php'

?>