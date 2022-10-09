<?php

include_once 'header.php';

if (isset($_POST['submit'])) {
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email='From:'.$_POST['email'];
    $sub=$_POST['sub'];
    $msg=$phone.$_POST['msg'];
    $to = "example@mail.com";

// $to = "somebody@example.com";
// $subject = "My subject";
// $txt = "Hello world!";
// $headers = "From: webmaster@example.com" . "\r\n" .
// "CC: somebodyelse@example.com";
// echo $msg;
// echo $email;

mail($to,$sub,$msg,$email);



}

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
<div class="center2">
        <h1>Contact</h1>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="textfield">
                <div class="labe">Name: </div>
                <input type="text"  name="name"  required />
            </div>
            <div class="textfield">
                <div class="labe">Phone:</div>
                <input type="number"  name="phone"  required />
            </div>
            <div class="textfield">
                <div class="labe">Email:</div>
                <input type="mail"  name="email"  required />
            </div>
            <div class="textfield">
                <div class="labe">Subject:</div>
                <input type="text"  name="sub"  required />
            </div>
            
            <div class="textfield">
            <textarea name="msg" id=""  rows="10" style="max-width: 100%;"></textarea>
            </div>
            <input style="width: 200px ;" type="Submit" name="submit" value="Send mail"/>

        </form>
    </div>
</body>
</html>

<?php

include_once 'footer.php';

?>
