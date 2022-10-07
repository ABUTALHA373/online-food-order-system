<?php

session_start();

if(isset($_SESSION['username'])){
    header('location:index.php');
 }
 include_once 'conn.php';

    $msg="";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $pass = $_POST['con_pass'];
    $address = $_POST['address'];

    $pcheck = "select * from user where Phone='$phone'";

    $result = mysqli_query($con, $pcheck);

    $row = mysqli_num_rows($result);
    if ($row >0) {
        $msg="Phone number already registered.";

    } else {
        $signup = "INSERT INTO user(Name, Password,Phone, Address,acc_type, Status) VALUES ('$name','$pass','$phone','$address','user',1)";
        mysqli_query($con, $signup);
        $msg="Signup Successful!";

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Signup</title>
    <script>
        function checkpass() {
            let name = document.getElementById("name").value;
            let phone = document.getElementById("phone").value;
            let password = document.getElementById("pass").value;
            let con_password = document.getElementById("con_pass").value;
            let address = document.getElementById("address").value;
            let message = document.getElementById("message");
            if (name.length != 0 && phone.length != 0 && address.length != 0){
                if(phone.length<12 && phone.length>10){
                    if (password.length != 0) {
                    if (password == con_password) {
                        if (password.length < 7) {
                            message.textContent = "At least 8 characters Password.";
                            message.style.color = "#ff0000";
                            return false;
                        } else {
                            message.textContent = "";
                            return true;
                        }
                    } else {
                        message.textContent = "Password didn't match!";
                        message.style.color = "#ff0000";
                        return false;
                    }
                } else {
                    message.textContent = "Enter your password.";
                    message.style.color = "#ff0000";
                    return false;
                }
                }
                else{
                    message.textContent = "Enter the 11-digit phone number..";
                    message.style.color = "#ff0000";
                    return false;
                }
            }
            else {
                message.textContent = "All fields are required.";
                message.style.color = "#ff0000";
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="center">
        <h1>Signup</h1>
        <form action="" method="POST">
            <div class="textfield">
                <input type="text" id="name" name="name" required />
                <span>Name</span>
            </div>
            <div class="textfield">
                <input type="number" id="phone" name="phone" required />
                <span>Phone</span>
            </div>
            <div class="textfield">
                <input type="password" id="pass" name="pass" required />
                <span>Password</span>
            </div>
            <div class="textfield">
                <input type="password" id="con_pass" name="con_pass" required />
                <span>Confirm Password</span>
            </div>
            <div class="textfield">
                <input type="text" id="address" name="address" required />
                <span>Address</span>
            </div>
            <div class="from_txt">
            <p id="message" style="color:red"><?php echo $msg?></p>
            </div>

            <input type="Submit" name="submit" value="SignUP" onclick="return checkpass()" />
            <div class="from_txt">
                Already a member? <a href="login.php">Login</a>
            </div>
            <div class="back_to_home"><a href="index.php">BACK TO HOME</a></div>
        </form>
    </div>
</body>

</html>