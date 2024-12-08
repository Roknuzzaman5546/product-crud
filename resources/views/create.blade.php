<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>
    <label for="description">Description:</label>
    <textarea name="description"></textarea><br>
    <label for="price">Price:</label>
    <input type="number" name="price" step="0.01" required><br>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" required><br>
    <button type="submit">Create Product</button>
</form>
