<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porudžbine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
       .chart-container {
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .chart-title {
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: bold;
            color: #b22d64;
        }

        .form-control {
            margin-bottom: 10px;
        }
        
        .table th,
        .table td {
            vertical-align: middle;
        }
        .table th{ 
            width: 10px;
        }

        .action-icons {
        font-size: 1.5rem;
  
        color: #b22d64;
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .action-icons a {
        margin-right: 0px;
    }
        thead{ 
            background-color:#b22d64; 
            color:white;
        }
        .table th{
            color:white;
            padding:2px;
        }
        .order-chart {
            max-width: 100%; 
            max-height: 400px; 
        }
        .submit {
        border: none;
        outline: none;
        padding: 8px 30px;
        border-radius: 5px;
        color: #fff;
        font-size: 16px;
        transform: .8s ease;
        background-color: #b22d64;
    }

    .submit:hover {
        background-color: #512940;
        transition: .8s ease;
        transform: scale(1.05);
    }
     
    </style>
</head>
<body>
    @include('home.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="chart-container">
                    <h2 class="chart-title">Pregled Porudžbina u Poslednjih 7 Dana</h2>
                    <canvas id="orderChart" class="order-chart" ></canvas>
                </div>
            </div>
            <div class="col-md-12">
                <h2>Pretraga porudžbina</h2>
           <form action="" method="GET" class="col-md-12">
            <div class="row">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchPhone" name="phone" placeholder="Pretraži po Telefonu" value="{{ isset($_GET['phone']) ? $_GET['phone'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="submit">Pretraži</button>
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
