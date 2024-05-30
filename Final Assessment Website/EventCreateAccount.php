<?php 
    error_reporting(0);
    $connection=mysqli_connect("localhost","root","Arwen*6542","sql_workbench");
    if(!$connection)
        die("could not connect".mysqli_connect_error());

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if ($_POST['password']==$_POST['confirm']){
            $fname=$connection->real_escape_string($_POST['fname']);
            $lname=$connection->real_escape_string($_POST['lname']);
            $email=$connection->real_escape_string($_POST['email']);
            $phone=$connection->real_escape_string($_POST['phone']);
            $password=$connection->real_escape_string($_POST['password']);

            $sql = "INSERT INTO account(email, first_name, last_name, phone_number, password_)" 
            . "VALUES ('$email','$fname','$lname','$phone','$password')";
            if($connection->query($sql) === true){
                header("location: http://localhost/Final%20Assessment%20Website/EventLogin.php");
                $message = "Account created successfully!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                exit;
            }
            else{
                $message = "User could not be added into the database, please try again!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
    }
    mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Simply Eventful Create Account</title>
        <link rel="stylesheet" type="text/css" href="SimplyEventful.css">
        <link href='https://fonts.googleapis.com/css?family=Italiana' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Italianno' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    </head>
    <body>
        <div class="login">
            <img src="SimplyEventfulLogo.png">
            <form class="login2" action="EventCreateAccount.php" method="post">
                <label for="fname">First Name</label><br>
                <input type="text" id="fname" name="fname" required><br>
                <label for="lname">Last Name</label><br>
                <input type="text" id="lname" name="lname" required><br>
                <label for="email">Email Address</label><br>
                <input type="text" id="email" name="email" required><br>
                <label for="phone">Phone Number</label><br>
                <input type="text" id="phone" name="phone" required><br>
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" required><br>
                <label for="confirm">Confirm Password</label><br>
                <input type="password" id="confirm" name="confirm" required onkeyup="validate_password()"><br>
                <div class="checkbox">
                    <input type="checkbox" id="subscribe" name="subscribe">
                    <label for="subscribe"> Want to Subscribe to Monthly Newsletters? </label><br>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="permission" name="permission">
                    <label for="permission"> Do we have permission to contact you using the<br>Email Address and Phone Number provided for<br>your events? </label><br>
                </div>
                <button id="submit" name="submit">Create an Account</button>
            </form>
        </div>
    </body>
</html>