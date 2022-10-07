<?php

session_start();

if (isset($_SESSION['username'])) {
    header('location:index.php');
}

include_once 'conn.php';
$error = "";
if (isset($_POST['submit'])) {
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

    $log_check = "SELECT * FROM user WHERE Phone='$phone' AND Password='$pass'";

    $log_result = mysqli_query($con, $log_check);

    $count = mysqli_num_rows($log_result);
    $row = mysqli_fetch_assoc($log_result);

    if ($count == 1) {
        if($row['Status']==1){
            if($row['acc_type']=='user'){
                $_SESSION['username'] = $row['Name'];
                $_SESSION['acc_type'] = $row['acc_type'];
                $_SESSION['user_id'] = $row['id'];
                header('location:user_profile.php');
            }elseif($row['acc_type']=='manager'){
                $_SESSION['username'] = $row['Name'];
                $_SESSION['acc_type'] = $row['acc_type'];
                $_SESSION['user_id'] = $row['id'];
                header('location:manager_profile.php');
            }elseif($row['acc_type']=='admin'){
                $_SESSION['username'] = $row['Name'];
                $_SESSION['acc_type'] = $row['acc_type'];
                $_SESSION['user_id'] = $row['id'];
                header('location:admin_profile.php');
            }else{
                $error = "Login error!";
            }
        }elseif($row['Status']==0){
            $error = "You are blocked.";
        }else{
            $error = "Login error!";
        }

    } else {
        $error = "Phone or Password is not valid.";

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
        function checklogin() {
            let phone = document.getElementById("phone").value;
            let password = document.getElementById("pass").value;
            let message = document.getElementById("message");
            if (phone.length != 0){
                if(phone.length<12 && phone.length>10){
                    if (password.length != 0) {
                        if (password.length < 7) {
                            message.textContent = "At least 8 characters Password.";
                            message.style.color = "#ff0000";
                            return false;
                        } else {
                            message.textContent = "";
                            return true;
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
                message.textContent = "Enter your phone number.";
                message.style.color = "#ff0000";
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="center">
        <h1>Login</h1>
        <form action="" method="POST">

            <div class="textfield">
                <input type="number" id="phone" name="phone" required />
                <span>Phone</span>
            </div>
            <div class="textfield">
                <input type="password" id="pass" name="pass" required />
                <span>Password</span>
            </div>
            <div class="from_txt">
                <p id="message" style="color:red"><?php echo $error ?></p>
            </div>

            <input type="Submit" name="submit" value="Login" onclick="return checklogin()" />
            <div class="from_txt">Not a member? <a href="signup.php">Signup</a></div>
            <div class="back_to_home"><a href="index.php">BACK TO HOME</a></div>
        </form>
    </div>
</body>

</html>