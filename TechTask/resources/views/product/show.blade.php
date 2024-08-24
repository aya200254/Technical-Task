<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .container {
            margin-top: 50px;
        }
        .card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card img {
            max-width: 100%;
            border-radius: 10px;
        }
        .card-title {
            font-size: 2em;
            margin-bottom: 20px;
        }
        .card-price {
            font-size: 1.5em;
            color: green;
            margin-bottom: 10px;
        }
        .card-quantity {
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        .back-link {
            display: block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1 class="card-title">{{ $product->name }}</h1>
            <img src="https://via.placeholder.com/400x300" alt="{{ $product->name }}">
            <p class="card-price"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p class="card-quantity"><strong>Quantity:</strong> {{ $product->quantity }}</p>
            <p><strong>Category ID:</strong> {{ $product->category_id ?? 'Not Assigned' }}</p>
            <a href="{{ url()->previous() }}" class="back-link">← Back to Products</a>
        </div>
    </div>
</body>
</html>
