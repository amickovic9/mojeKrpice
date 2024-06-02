<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moji Proizvodi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .slika-proizvoda {
            width: 50px;
            height: auto;
        }
        .ikonice-akcija {
            font-size: 1.2rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    @include('home.navbar')
    <div class="container">
        <h1 class="my-4">Moji Proizvodi</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Slika</th>
                        <th>Naziv</th>
                        <th>Opis</th>
                        <th>Cena</th>
                        <th>Dostupno</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td><img src="{{ asset('uploads/' . $product->image) }}" class="slika-proizvoda" alt="{{ $product->name }}"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->available ? 'Da' : 'Ne' }}</td>
                        <td>
                            <a href="/edit-product/{{$product->id}}" class="fas fa-pencil-alt text-primary mr-2 ikonice-akcija"></a>
                            <a href="/delete-product/{{$product->id}}" class="fas fa-times text-danger ikonice-akcija"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <h2 class="my-4">Narudžbine</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Proizvod</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Telefon</th>
                        <th>Adresa</th>
                        <th>Napomena</th>
                        <th>Prihvaćeno</th>
                        <th>Dostavljeno</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->product->name }}</td> 
                        <td>{{ $order->firstName }}</td>
                        <td>{{ $order->lastName }}</td>
                        <td>{{ $order->phone_number }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->note }}</td>
                        <form id="" action="/update-order/{{$order->id}}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value ="{{$order->product_id}}">
                            <td>
                                <select class="form-control" name="accepted">
                                    <option value="" {{ is_null($order->accepted) ? 'selected' : '' }}>Nije odabrano</option>
                                    <option value="1" {{ $order->accepted === 1 ? 'selected' : '' }}>Da</option>
                                    <option value="0" {{ $order->accepted === 0 ? 'selected' : '' }}>Ne</option>
                                </select>
                            </td>

                            <td>
                                <select class="form-control" name="delivered">
                                    <option value="1" {{ $order->delivered ? 'selected' : '' }}>Da</option>
                                    <option value="0" {{ !$order->delivered ? 'selected' : '' }}>Ne</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm">Ažuriraj</button>
                            </td>
                        </form>
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
