<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $product->name }}" required><br>
    <label for="description">Description:</label>
    <textarea name="description">{{ $product->description }}</textarea><br>
    <label for="price">Price:</label>
    <input type="number" name="price" step="0.01" value="{{ $product->price }}" required><br>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" value="{{ $product->quantity }}" required><br>
    <button type="submit">Update Product</button>
</form>
