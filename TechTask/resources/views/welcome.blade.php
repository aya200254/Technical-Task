<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .container {
            margin-top: 50px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* space between the cards */
        }
        .card {
            flex: 1 1 calc(33.333% - 20px); /* Each card takes up about a third of the container width, minus the gap */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            box-sizing: border-box; /* Ensure padding and border are included in the width */
        }
        .card img {
            max-width: 100%;
            border-radius: 10px;
        }
        .card-title {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        .card-price {
            font-size: 1.2em;
            color: green;
            margin-bottom: 10px;
        }
        .card-quantity {
            font-size: 1.1em;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        @foreach ($products as $product)
            <div class="card">
                <h2 class="card-title">{{ $product->name }}</h2>
                <img src="https://via.placeholder.com/400x300" alt="{{ $product->name }}">
                <p class="card-price"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                <p class="card-quantity"><strong>Quantity:</strong> {{ $product->quantity }}</p>
                <p><strong>Category ID:</strong> {{ $product->category_id ?? 'Not Assigned' }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>
