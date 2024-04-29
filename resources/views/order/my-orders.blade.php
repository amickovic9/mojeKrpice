<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .action-icons {
            font-size: 1.2rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    @include('home.navbar')
    

    <div class="container">
        <h1 class="my-4">My Orders</h1>
       <p>Note: Orders can be edited only while in processing.</p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Note</th>
                        <th>Accepted</th>
                        <th>Delivered</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td><a href="/product/{{$order->id}}">{{ $order->product->name}}</a></td>
                        <td>{{ $order->firstName }}</td>
                        <td>{{ $order->lastName }}</td>
                        <td>{{ $order->phone_number }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->note }}</td>
                        <td>{{ is_null($order->accepted) ? 'Processing' : ($order->accepted ? 'Yes' : 'No') }}</td>
                        <td>{{ $order->delivered ? 'Yes' : 'No' }}</td>
                        <td>
                            @if (is_null($order->accepted))
                                <a href="/edit-order/{{$order->id}}" class="fas fa-pencil-alt text-primary mr-2 action-icons"></a>
                                <a href="/delete-order/{{$order->id}}" class="fas fa-times text-danger action-icons"></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
