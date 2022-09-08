<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1 class="container">Products List</h1>
    <table class="container table-padding">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Description</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->description }}</td>
                <td><a href="products/{{ $product->id }}/edit"><button class="button-green small">Edit</button></a></td>
                <td>
                    <form action="/products/{{ $product->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="button-red small mrgn-up">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="container">
        <a href="products/create"><button class="button-green">Add Product</button></a>
        <a href="/logout"><button class="button-red mrgn-up mrgn-down">Log Out</button></a>
    </div>
</body>
</html>