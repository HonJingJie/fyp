<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/products/category" method="post">
        @csrf
        <label>Category Name</label><br>
        <input type="text" name="category"><br>
        <input type="submit" value="Submit">
    </form>
    <a href="/products"><button>Back</button></a>
</body>
</html>