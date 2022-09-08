<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering System</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @foreach ($restaurant as $restaurant)
        <div class="container">
            <h1>{{ $restaurant->restaurant_name }}</h1>
            <a href="/store/return"><button class="button-red small mrgn-down">Return</button></a>
        </div>
    @endforeach
    <div class="container longer-width align table-padding-down">
        <h1>Product List</h1>
        <table class="table-margin">
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
                    <td><a href="add/{{ $product->id }}"><button class="button-green small btn-margin">Add (+1)</button></a></td>
                    <td><a href="remove/{{ $product->id }}"><button class="button-red small btn-margin">Remove (-1)</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <br><br>
    <div class="container">
        <h2>Order</h2>
        <table class="table-margin">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>

            <?php $total = 0 ?>

            @if(session('cart'))
                @foreach(session('cart') as $id => $details)

                    <?php $total += $details['price'] * $details['quantity'] ?> 

                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>${{ $details['price'] }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>${{ $details['price'] * $details['quantity'] }}</td>
                    </tr>
                @endforeach
            @endif

            </tbody>
            <tfoot>
                <tr></tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Total : ${{ $total }}</strong></td>
                </tr>
            </tfoot>
        </table>
        <a href="/store/place"><button class="button-green mrgn-up mrgn-down">Place Order</button></a>
    </div>
    
</body>
</html>