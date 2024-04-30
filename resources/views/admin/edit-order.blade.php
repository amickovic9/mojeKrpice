<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .action-icons {
            font-size: 1.5rem; /* Povećaj veličinu ikona */
            margin-right: 10px; /* Dodaj malo razmaka između ikona */
        }
    </style>
</head>
<body>
    @include('home.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Edit Order</h2>
                <form action="/admin/edit-order/{{$order->id}}" method="POST">
                    @csrf
                    @method('PUT')
                   
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$order->address}}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$order->phone_number}}">
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Note</label>
                        <textarea class="form-control" id="note" name="note" rows="3">{{$order->note}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="{{$order->customer->firstName}}">
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="{{$order->customer->lastName}}">
                    </div>
                    <div class="mb-3">
                        <label for="accepted" class="form-label">Accepted</label>
                        <select class="form-select" id="accepted" name="accepted">
                            <option value="1" {{$order->accepted ? 'selected' : ''}}>Yes</option>
                            <option value="0" {{$order->accepted ? '' : 'selected'}}>No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="delivered" class="form-label">Delivered</label>
                        <select class="form-select" id="delivered" name="delivered">
                            <option value="1" {{$order->delivered ? 'selected' : ''}}>Yes</option>
                            <option value="0" {{$order->delivered ? '' : 'selected'}}>No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
