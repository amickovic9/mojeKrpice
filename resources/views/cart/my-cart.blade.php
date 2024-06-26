<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja Korpa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .total-wrapper {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .product-image {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>

@include('home.navbar')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Moja Korpa</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Proizvod</th>
                        <th>Cena</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td class="text-right">
                            <img src="{{ asset('uploads/' . $product->image) }}" class="product-image" alt="Slika Proizvoda">
                        </td>
                        <td class="text-right">
                            <a href="/product/{{ $product->id }}" class="btn btn-outline-dark">Prikaži Proizvod</a>
                        </td>
                        <td class="text-right">
                            <a href="/remove-from-cart/{{ $product->cart }}" class="btn btn-link text-danger"><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="total-wrapper">
                <strong>Ukupno: ${{ $total }}</strong>
            </div>
            @if($total>1)
            <div class="text-right mt-3">
                <form action="/make-order" method="post">
                    @csrf
                    <input type="hidden" name="total" value={{$total}}>
                    <button type="submit" class='btn btn-outline-dark'>Naruči</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.
