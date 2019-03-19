<?php
 session_start();
 require('connect.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>


<div class="container">
    <form class="form-signin" method="POST">
        <br>
        <br>
        <h3 style="text-align: center;">Login</h3>

        <input type="text" name="username" class="form-control" placeholder="username" required><br>
        <input type="password" name="password" class="form-control" placeholder="password" required><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
        <a href="index.php" class="btn btn-lg btn-danger btn-block">Register</a>

        <?php
       

        if (isset($_POST['username']) and isset($_POST['password']))
        {
            $username=$_POST['username'];
            $password=$_POST['password'];
            $password=md5($password);

            $query="SELECT * FROM users WHERE username='$username' and password='$password'";
            $result=mysqli_query($connection, $query) or die(mysqli_error($connection));
            $count=mysqli_num_rows($result);

            if ($count==1)
            {
                $_SESSION['username']=$username;
            }

            else
            {
                $fmsg="Error";
            }
        }

        if (isset($_SESSION['username']))
        {
            $username=$_SESSION['username'];
            echo "Hello " . $username . " ";
            echo "<br>";
            echo "<a href='logout.php' class='btn btn-lg btn-success'>Log out</a>";
        }

        ?>
    </form>
</div>

</body>
</html>