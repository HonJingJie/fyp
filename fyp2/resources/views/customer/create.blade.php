<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1 class="container">Customer Registration</h1>
    <div class="container">
        <form action="/customer" method="post" class="form-padding">
            @csrf
            <div class="input-container">
            <label class="lbl">Username : </label>
            <input type="text" name="username"><br>
            </div>

            <div class="input-container">
            <label class="lbl">Email Address : </label>
            <input type="text" name="email"><br>
            </div>

            <div class="input-container">
            <label class="lbl">Password : </label>
            <input type="password" name="password"><br>
            </div>

            <div class="input-container">
            <label class="lbl">Delivery Address : </label>
            <input type="text" name="address"><br>
            </div>
            
            <input type="submit" value="Submit" class="button-green">
        </form>
        <a href="/"><button class="button-red">Back</button></a>
    </div>
</body>
</html>