<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1 class="container">Login</h1>
    <div class="container">
        <form action="" method="post" class="form-padding">
            @csrf
            <div class="input-container">
            <label class="lbl">Email : </label>
            <input type="text" name="email"><br>
            </div>

            <div class="input-container">
            <label class="lbl">Password : </label>
            <input type="password" name="password"><br>
            </div>

            <input type="submit" value="Submit" class="button-green">
        </form>
        <a href="/"><button class="button-red">Back</button></a>
</div>
</body>
</html>