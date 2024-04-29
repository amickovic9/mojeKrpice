<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
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
        }
        .centered-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 800px;
        }
    </style>
</head>
<body>
    @include('home.navbar')
    <div class="centered-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="chart-container">
                        <h2 class="chart-title">Products Created In Last 7 days</h2>
                        <canvas id="productChart1" class="product-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="chart-container">
                        <h2 class="chart-title">Orders Overview</h2>
                        <canvas id="orderChart" class="order-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Funkcija za crtanje pie chart-a
        function drawPieChart(canvasId, labels, data) {
            var ctx = document.getElementById(canvasId).getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });
        }

        // Funkcija za crtanje line chart-a
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

        // Podaci za chartove
        var orderLabels = @json(array_keys($orderCounts));
        var orderCounts = @json(array_values($orderCounts));
        var lastSevenDays = @json($dates);
        var lastSevenCounts = @json($counts);

        // Pozivanje funkcija za crtanje chartova
        drawPieChart('orderChart', orderLabels, orderCounts);
        drawLineChart('productChart1', lastSevenDays, lastSevenCounts);
    </script>

</body>
</html>
