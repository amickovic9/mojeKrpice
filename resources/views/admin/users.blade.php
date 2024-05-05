<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .action-icons {
            font-size: 1.5rem;
            margin-right: 10px;
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
    </style>
</head>
<body>
    @include('home.navbar')
    <div class="container mt-5">
        
        <div class="row">
            <div class="col-md-12">
                <div class="chart-container">
                    <h2 class="chart-title">Users Overview</h2>
                    <canvas id="userChart" class="user-chart"></canvas>
                </div>
            </div>
            <div class="col-md-9">
                <h2>Users</h2>
                <div class="row mb-3">
                    <form action="" method="get">
                        <div class="col-md-6">
                            <!-- Dodavanje vrednosti pretrage u input polja -->
                            <input type="text" class="form-control" name="username" placeholder="Search by Username" value="{{ isset($_GET['username']) ? $_GET['username'] : '' }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="email" placeholder="Search by Email" value="{{ isset($_GET['email']) ? $_GET['email'] : '' }}">
                        </div>
                        <button type="submit">Search</button>
                    </form>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Admin</th>
                            <th>Date of Registration</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->firstName }} {{ $user->lastName }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->admin?"Yes":"No" }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href="/admin/edit-user/{{$user->id}}" class="fas fa-pencil-alt text-primary action-icons"></a>
                                <a href="/admin/delete-user/{{$user->id}}" class="fas fa-times text-danger action-icons"></a>
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
                        label: 'Users Created',
                        data: data,
                        borderColor: 'blue', 
                        backgroundColor: 'lightblue', 
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

        var userLabels = @json($userDates); 
        var userCounts = @json($userCounts); 

        drawLineChart('userChart', userLabels, userCounts);
    </script>
</body>
</html>
