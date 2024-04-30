<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .action-icons {
            font-size: 1.5rem;
            margin-right: 10px; 
        }
        .product-image {
            max-width: 150px; 
            height: 80px;
            cursor: pointer; 
        }
    </style>
</head>
<body>
    @include('home.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="chart-container">
                    <h2 class="chart-title">Products Created In Last 7 days</h2>
                    <canvas id="productChart1" class="product-chart"></canvas>
                </div>
            </div>
            <div class="col-md-12">
                <h2>Products</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Available</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td><a href="/product/{{ $product->id }}"><img src="{{ asset('uploads/' . $product->image) }}" alt="Product Image" class="product-image"></a></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->size }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->available == 1 ? "Yes" : 'No' }}</td>
                            <td>
                                <a href="/admin/edit-product/{{$product->id}}" class="fas fa-pencil-alt text-primary action-icons"></a>
                                <a href="/admin/delete-product/{{$product->id}}" class="fas fa-times text-danger action-icons"></a>
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
        function drawLineChart(canvasId, labels, data) {
            var ctx = document.getElementById(canvasId).getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Products Created',
                        data: data,
                        borderColor: 'black',
                        backgroundColor: 'white',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 2,
                            callback: function(value, index, values) {
                                if (Number.isInteger(value)) {
                                    return value;
                                }
                            }
                        }
                    }
                }
            });
        }

        var lastSevenDays = @json($dates);
        var lastSevenCounts = @json($counts);

        drawLineChart('productChart1', lastSevenDays, lastSevenCounts);
    </script>
</body>
</html>
