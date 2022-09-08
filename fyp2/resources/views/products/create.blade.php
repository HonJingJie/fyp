<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<h1 class="container">Add New Product</h1>
<div class="container">
<form action="/products" method="post" class="form-padding">
        @csrf
        <div class="input-container">
        <label class="lbl">Name : </label>
        <input type="text" name="name"><br>
        </div>

        <div class="input-container">
        <label class="lbl">Price : </label>
        <input type="text" name="price"><br>
        </div>

        <div class="input-container">
        <label class="lbl">Category : </label>
        <input type="text" name="category"><br>
        </div>

        <div class="input-container">
        <label class="lbl">Description : </label>
        <input type="text" name="description"><br>
        </div>

        <input type="submit" value="Submit" class="button-green">
    </form>
    <a href="/products"><button class="button-red">Back</button></a>
</div>
</body>
</html>