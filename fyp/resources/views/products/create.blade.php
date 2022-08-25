<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="/products" method="post">
        @csrf
        <label>Name</label><br>
        <input type="text" name="name"><br>

        <label>Price</label><br>
        <input type="text" name="price"><br>

        <label>Category</label><br>
        <input type="text" name="category"><br>

        <label>Description</label><br>
        <input type="text" name="description"><br>

        <input type="submit" value="Submit">
    </form>
    <a href="/products"><button>Back</button></a>
</body>
</html>