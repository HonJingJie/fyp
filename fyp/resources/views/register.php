

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<?php
    require('db.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        
        $username = $_REQUEST['username'];
    
        if (empty($username)) {
            echo "data is empty";
        } else {
            echo $username;
        }
    }
    ?>
?>
    <form action="register.php" method="post">
        <label for="">Username</label><br>
        <input type="text" name="username"><br>
        <label for="">Email</label><br>
        <input type="text" name="email"><br>
        <label for="">Password</label><br>
        <input type="password" name="password"><br>
        <input type="submit" value="Register">

    </form>
    <?php
    
?>
</body>
</html>

