<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porudžbine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .action-icons {
            font-size: 1.5rem; 
            margin-right: 10px; 
        }
    .chart-container {
        width: 70%; /* Prilagodi širinu po potrebi */
        margin: auto; /* Centriraj grafikon */
        padding: 20px; /* Dodaj malo prostora oko grafikona */
    }

    </style>
</head>
<body>
    @include('home.navbar')
    <div class="container mt-5">
        <div class="row">
                <div class="col-md-16">
                <div class="chart-container">
                        <h2 class="chart-title">Pregled Porudžbina u Poslednjih 7 Dana</h2>
                    <canvas id="orderChart" class="order-chart" width="400px" height="400px"></canvas>
                </div>
                </div>
            <div class="col-md-12">
                <h2>Porudžbine</h2>
                <form action="" method="GET">
                    <div class="row mb-3">
                       
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="searchPhone" name="phone" placeholder="Pretraži po Telefonu" value="{{ isset($_GET['phone']) ? $_GET['phone'] : '' }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Pretraži</button>
                        </div>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Porudžbine</th>
                            <th>Korisnik</th>
                            <th>Adresa</th>
                            <th>Broj Telefona</th> 
                            <th>Ukupno</th>
                            <th>Datum</th>
                            <th>Napomena</th> 
                            <th>Prihvaćeno</th>
                            <th>Dostavljeno</th>
                            <th>Akcije</th>
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
                            <td>{{ $order->accepted ? "Da" : "Ne" }}</td>
                            <td>{{ $order->delivered ? "Da" : "Ne" }}</td>
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
                label: 'Broj Porudžbina',
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
