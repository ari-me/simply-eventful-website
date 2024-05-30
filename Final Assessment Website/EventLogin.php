<?php
    error_reporting(0);    
    $connection=mysqli_connect("localhost","root","Arwen*6542","sql_workbench");
    if(!$connection)
        die("could not connect".mysqli_connect_error());
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];   
        $password = $_POST['password2'];
        $query = "select * from account where email='$email'";
        $stmt = mysqli_query($connection,$query);
        while($row=mysqli_fetch_array($stmt,MYSQLI_ASSOC)){
            echo $row['email']." ".$row['password_'];
            if ($row["email"]==$email){
                if($row["password_"]==$password){
                    $message = "You have successfully logged in!";
                    echo "<script type='text/javascript'>
                    alert('$message');
                    window.location.href = 'EventHome.html';
                    </script>";
                    exit;
                }
                else{
                    $message = "Your passsword is wrong!";
                    echo "<script type='text/javascript'>
                    alert('$message');
                    window.location.href = 'http://localhost/Final%20Assessment%20Website/EventLogin.php';
                    </script>";
                }
            }
            else{
                $message = "This email is not in our database, please try again.";
                echo "<script type='text/javascript'>
                alert('$message');
                window.location.href = 'http://localhost/Final%20Assessment%20Website/EventLogin.php';
                </script>";
            }
        }
            mysqli_free_result($stmt);
            mysqli_close($connection);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Simply Eventful Login</title>
        <link rel="stylesheet" type="text/css" href="SimplyEventful.css">
        <link href='https://fonts.googleapis.com/css?family=Italiana' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Italianno' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    </head>
    <body>
        <form class="login" action="EventLogin.php" method="post">>
            <img src="SimplyEventfulLogo.png">
            <input type="text" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password2" name="password2" placeholder="Password" required>
            <div class="checkbox">
                <input type="checkbox" id="showPass" name="showPass" onclick="ShowPassword()">
                <label for="showPass">Show Password</label>
            </div>
            <a href="EventLogin.php"><button id="signup" name="signup">SIGN UP</button></a>
            <a href="EventHome.html "><p>Forgot your password?</p></a>
            <hr>
            <a href="EventCreateAccount.php"><p class="account">Don't have an account?</p></a>
        </form>
        <script> 
            //Show password visibility in Login page
            function ShowPassword() {
            var x = document.getElementById("password2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            }
        </script>
    </body>
</html>
