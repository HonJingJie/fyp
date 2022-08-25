<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="/products/{{ $product->id }}" method="post">
        @csrf
        @method('PUT')
        <label>Name</label><br>
        <input type="text" name="name" value="{{ $product->name }}"><br>

        <label>Price</label><br>
        <input type="text" name="price" value="{{ $product->price }}"><br>

        <label>Category</label><br>
        <input type="text" name="category" value="{{ $product->category }}"><br>

        <label>Description</label><br>
        <input type="text" name="description" value="{{ $product->description }}"><br>

        <button type="submit">
            Submit
        </button>
    </form>
    <a href="/products"><button>Back</button></a>
</body>
</html>