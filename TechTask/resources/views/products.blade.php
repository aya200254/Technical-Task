@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>
    
    <!-- Display list of products -->
    <ul id="product-list">
        @foreach($products as $product)
            <li>{{ $product->name }} - ${{ $product->price }}</li>
        @endforeach
    </ul>

    <!-- Form to add a new product -->
    <h2>Add New Product</h2>
    <form id="add-product-form">
        @csrf
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#add-product-form').on('submit', function(e) {
            e.preventDefault();
            
            var name = $('#name').val();
            var price = $('#price').val();
            
            $.ajax({
                url: '{{ route('products.store') }}', // Adjust the route to match your routes setup
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    name: name,
                    price: price
                },
                success: function(response) {
                    $('#product-list').append('<li>' + response.name + ' - $' + response.price + '</li>');
                    $('#name').val('');
                    $('#price').val('');
                },
                error: function(response) {
                    alert('Error adding product.');
                }
            });
        });
    });
</script>
@endsection