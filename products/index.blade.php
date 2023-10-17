<x-app-layout>
    <div class="container px-12 py-8 mx-auto">
        <h3 class="text-2xl font-bold text-gray-900">Latest Products</h3>
        <div class="h-1 bg-gray-800 w-48"></div>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products as $product)
            <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-md shadow-md">
                <div class="group relative">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7 group-hover:opacity-75">
                <a href="detail/{{$product['id']}}">
                <img src="{{ url($product->image) }}" alt="" class="w-full max-h-auto">
                <div class="flex items-end justify-end w-full bg-cover">
                </a>
                    </div>
                </div>
                </div>
                <div class="px-5 py-3">
                    <div class="flex items-center justify-between mb-5">
                        <a href="detail/{{$product['id']}}">
                        <h1 class="text-gray-700 uppercase">{{ $product->name }}</h1>
                        </a>
                    </div>
                        <span class="mt-2 text-gray-500 font-semibold">฿{{ $product->price }}.-</span>
                    
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-end">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-1.5 text-white text-sm bg-blue-900 rounded">Add To Cart</button>
                    </form>
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>