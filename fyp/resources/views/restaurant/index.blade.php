<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registration</h1>
    <form action="" method="post">
        @csrf
        <label>Name</label><br>
        <input type="text" name="name"><br>
        <label>Email</label><br>
        <input type="text" name="email"><br>
        <input type="submit" value="Submit">
    </form>
    <a href="/"><button>Back</button></a>
</body>
</html>