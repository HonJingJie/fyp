<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<h1 class="container">Edit Existing Product</h1>
<div class="container">
<form action="/products/{{ $product->id }}" method="post" class="form-padding">
        @csrf
        @method('PUT')
        <div class="input-container">
        <label class="lbl">Name : </label>
        <input type="text" name="name" value="{{ $product->name }}"><br>
        </div>

        <div class="input-container">
        <label class="lbl">Price : </label>
        <input type="text" name="price" value="{{ $product->price }}"><br>
        </div>

        <div class="input-container">
        <label class="lbl">Category : </label>
        <input type="text" name="category" value="{{ $product->category }}"><br>
        </div>

        <div class="input-container">
        <label class="lbl">Description : </label>
        <input type="text" name="description" value="{{ $product->description }}"><br>
        </div>

        <button type="submit" class="button-green">
            Submit
        </button>
    </form>
    <a href="/products"><button class="button-red">Back</button></a>
</body>
</html>