
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering System</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Food Ordering System</h1>
        <h3>Welcome, {{ Session::get('customer') }}</h3>
        <a href="/customer/logout"><button class="button-red small">Log Out</button></a><br>
        <br>
        <br>
    </div>

    <div class="container longer-width">
        <form action="/store/home" method="post">
            @csrf
            <div class="input-container">
                <label class="lbl">Search for Restaurant : </label>
                <input type="text" name="owner">
                <button type="submit" class="button-green small">Search</button>
            </div>
        </form>

        <br>

        <table class="r-view-padding">
            <thead>
                <tr>
                    <th>Restaurant Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($restaurants as $restaurant)
                <tr>
                    <td>{{ $restaurant->restaurant_name }}</td>
                    <td>
                        <a href="/store/view/{{ $restaurant->owner_name }}"><button class="button-green small btn-margin">Enter</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>