<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Applications</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<h1 class="container">Restaurant Applications</h1>
    <table class="container table-padding longer-width">
        <thead>
            <tr>
                <th>Restaurant Name</th>
                <th>Owner Name</th>
                <th>Email</th>
                <th>Registered At</th>
                <th>Approved At</th>
                <th>Approval</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($restaurants as $restaurant)
            <tr>
                <td>{{ $restaurant->restaurant_name }}</td>
                <td>{{ $restaurant->owner_name }}</td>
                <td>{{ $restaurant->email }}</td>
                <td>{{ $restaurant->created_at }}</td>
                <td>{{ $restaurant->updated_at }}</td>
                <td><?php
                    if ($restaurant->approved == 1) {
                        echo "True";
                    }
                    else {
                        echo "False";
                    }
                ?></td>
                <td>
                    <form action="/admin/{{ $restaurant->id }}" method="POST">
                    @csrf
                    <button type="submit" class="button-green small">Approve</button>
                </form>
                </td>
                <td>
                    <form action="/admin/{{ $restaurant->id }}/delete" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="button-red small">Reject</button>
                </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="container short-width">
        <a href="/admin"><button class="button-red mrgn-up mrgn-down">Back</button></a>
    </div>
</body>
</html>