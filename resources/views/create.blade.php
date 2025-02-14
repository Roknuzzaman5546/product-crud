<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-50 to-indigo-100 min-h-screen">

    <div class="flex justify-between items-center px-10 mt-5">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
        <a href="{{ url('/dashboard') }}">
            <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded shadow-md">
                Back All product
            </button>
        </a>
    </div>

    <div class=" bg-white shadow-lg rounded-lg overflow-hidden max-w-2xl mx-auto mt-3">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white p-6 text-center">
            <h1 class="text-3xl font-bold">Create a New Product</h1>
            <p class="text-sm mt-2">Fill in the details below to add a new product to your catalog.</p>
        </div>

        <!-- Form -->
        <div class="p-8">
            <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="">
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3 text-gray-700"
                        placeholder="Enter product name" required>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description"
                        class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3 text-gray-700"
                        rows="4" placeholder="Enter product description"></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" id="price" name="price"
                            class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3 text-gray-700"
                            step="0.01" placeholder="Enter product price" required>
                    </div>
                    <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                        <input type="number" id="quantity" name="quantity"
                            class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3 text-gray-700"
                            placeholder="Enter product quantity" required>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                    Create Product
                </button>
            </form>
        </div>
    </div>
</body>

</html>