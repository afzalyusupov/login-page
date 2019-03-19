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

<?php
require('connect.php');

if (isset($_POST['username']) && isset($_POST['password']))
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $age=$_POST['age'];
    $password=$_POST['password'];
    $password=md5($password);

    $query="INSERT INTO users (username, email, age, password) VALUES ('$username', '$email', '$age', '$password')";
    $result=mysqli_query($connection, $query);

    if ($result)
    {
        $smsg="Successfully registered";
    }

    else
    {
        $fmsg="Error";
    }
}

?>
    <div class="container">
        <form class="form-signin" method="POST">
            <br>
            <br>
            <h3 style="text-align: center;">Registration</h3>

            <?php if (isset($smsg)){ ?> <div class="alert alert-success" role="alert"><?php echo $smsg; ?></div> <?php } ?>
            <?php if (isset($fmsg)){ ?> <div class="alert alert-danger" role="alert"><?php echo $fmsg; ?></div> <?php } ?>

            <input type="text" name="username" class="form-control" placeholder="username" required><br>
            <input type="email" name="email" class="form-control" placeholder="email" required><br>
            <input type="number" name="age" class="form-control" placeholder="age" min="16" max="50" required><br>
            <input type="password" name="password" class="form-control" placeholder="password" required><br>
            <button class="btn btn-lg btn-danger btn-block" type="submit">Register</button>
            <a href="login.php" class="btn btn-lg btn-primary btn-block">Log in</a>
        </form>
    </div>
</body>
</html>