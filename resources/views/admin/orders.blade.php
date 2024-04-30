<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .action-icons {
            font-size: 1.5rem; 
            margin-right: 10px; 
        }
    .chart-container {
        width: 70%; /* Adjust the width as needed */
        margin: auto; /* Center the chart */
        padding: 20px; /* Add some padding around the chart */
    }

    </style>
</head>
<body>
    @include('home.navbar')
    <div class="container mt-5">
        <div class="row">
                <div class="col-md-16">
                <div class="chart-container">
                        <h2 class="chart-title">Orders Overview In Last 7 Days</h2>
                    <canvas id="orderChart" class="order-chart" width="400px" height="400px"></canvas>
                </div>
                </div>
            <div class="col-md-12">
                <h2>Orders</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User</th>
                            <th>Address</th>
                            <th>Phone Number</th> 
                            <th>Total</th>
                            <th>Date</th>
                            <th>Note</th> 
                            <th>Accepted</th>
                            <th>Delivered</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td><a href="/admin/edit-user/{{$order->user_id}}">{{ $order->customer->firstName }} {{ $order->customer->lastName }}</a></td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone_number }}</td> 
                            <td>{{ $order->product->price }}rsd</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->note }}</td> 
                            <td>{{ $order->accepted ? "Yes" : "No" }}</td>
                            <td>{{ $order->delivered ? "Yes" : "No" }}</td>
                            <td>
                                <a href="/admin/edit-order/{{$order->id}}" class="fas fa-pencil-alt text-primary action-icons"></a>
                                <a href="/admin/delete-order/{{$order->id}}" class="fas fa-times text-danger action-icons"></a>
                                <a href="/product/{{ $order->product_id }}" class="fas fa-eye text-success action-icons"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('orderChart').getContext('2d');
    var orderChart = new Chart(ctx, {
        type: 'pie', 
        data: {
            labels: {!! json_encode(array_keys($orderCounts)) !!},
            datasets: [{
                label: 'Number of Orders',
                data: {!! json_encode(array_values($orderCounts)) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>
