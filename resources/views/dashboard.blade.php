<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('All Product') }}
            </h2>
            <h2>Hey {{ $users->name  }}</h2>
            <a href="{{ route('products.create') }}">
                <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded shadow-md">
                    + Create Product
                </button>
            </a>
        </div>
    </x-slot>


    <div class="w-1/4 mx-auto mt-5 text-center">
        <h2 class="Text-xl font-bold my-2">Here i create select dropdown</h2>
        <select name="" id="country" class="js-example-basic-single w-60 h-7">
            <option value="">Dhaka</option>
            <option value="">Bagura</option>
            <option value="">Chittagong</option>
        </select>
    </div>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Stats Card 1 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-700">Total Products</h3>
                    <p class="text-3xl font-extrabold text-blue-600 mt-2">{{ $products->count() }}</p>
                </div>

                <!-- Stats Card 2 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-700">Total Price</h3>
                    <p class="text-3xl font-extrabold text-green-600 mt-2">
                        ${{ $products->sum('price') }}
                    </p>
                </div>
                <!-- Stats Card 3 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-700">Total Users</h3>
                    <p class="text-3xl font-extrabold text-indigo-600 mt-2">{{ $users->count() }}</p>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg mt-8 p-6">
                <h2 class="text-lg font-bold font-serif text-gray-800">All Products</h2>
                <table class="min-w-full mt-4 border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b text-left py-3 px-4">#</th>
                            <th class="border-b text-left py-3 px-4">Name</th>
                            <th class="border-b text-left py-3 px-4">Price</th>
                            <th class="border-b text-left py-3 px-4">Status</th>
                            <th class="border-b text-left py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="py-3 px-4">{{ $product->name }}</td>
                                <td class="py-3 px-4">${{ number_format($product->price, 2) }}</td>
                                <td class="py-3 px-4">
                                    <span
                                        class="{{ $product->quantity > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} px-2 py-1 text-sm rounded">
                                        {{ $product->quantity > 0 ? 'Available' : 'Out of Stock' }}
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <a href="{{ route('products.edit', $product) }}"
                                        class="text-blue-600 hover:underline">Edit</a> |
                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-3 px-4 text-gray-500">No products available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $products->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function () {
        // Initialize Select2
        $('.js-example-basic-single').select2();

        // Event listener for dropdown change
        $('#country').change(function () {
            // Get the selected option's text
            const selectedText = $(this).find(':selected').text();
            console.log("Selected country:", selectedText);
        });
    });
</script>

