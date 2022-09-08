<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering System</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1 class="container">Food Ordering System</h1>

    <div class="container">
        <h2>Customer Login/Register</h2>
        <a href="/customer/create"><button class="button-green">Register</button></a>
        <a href="/customer/login"><button class="button-green">Login</button></a>
    </div>

    <div class="container">
        <h2>Restaurant Login/Register</h2>
        <a href="/restaurant"><button class="button-green">Register</button></a>
        <a href="/restaurant/login"><button class="button-green">Login</button></a>
    </div>
    <br><br><br>
    <!-- <div class="container">
        <h2>Admin</h2>
        <a href="/admin"><button class="button-green">Enter</button></a>
    </div> -->
</body>
</html>

