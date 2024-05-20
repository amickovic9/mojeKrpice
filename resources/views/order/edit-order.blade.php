<!-- resources/views/order/edit-order.blade.php -->

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmeni porudžbinu</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('home.navbar')
    <div class="container">
        <h1>Izmeni porudžbinu</h1>
        <form action="/edit-order/{{$order->id}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$order->id}}">
            <div class="form-group">
                <label for="firstName">Ime</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $order->firstName }}">
            </div>
            <div class="form-group">
                <label for="lastName">Prezime</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $order->lastName }}">
            </div>
            <div class="form-group">
                <label for="phoneNumber">Broj telefona</label>
                <input type="text" class="form-control" id="phoneNumber" name="phone_number" value="{{ $order->phone_number }}">
            </div>
            <div class="form-group">
                <label for="address">Adresa</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $order->address }}">
            </div>
            <div class="form-group">
                <label for="note">Napomena</label>
                <textarea class="form-control" id="note" name="note">{{ $order->note }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ažuriraj porudžbinu</button>
        </form>
    </div>
</body>
</html>
