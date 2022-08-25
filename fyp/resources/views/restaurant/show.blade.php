<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Approval</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($restaurants as $restaurant)
            <tr>
                <td>{{ $restaurant->id }}</td>
                <td>{{ $restaurant->name }}</td>
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
                    <button type="submit">Approve</button>
                </form>
                </td>
                <td>
                    <form action="/admin/{{ $restaurant->id }}/delete" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit">Reject</button>
                </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/admin"><button>Back</button></a>
</body>
</html>