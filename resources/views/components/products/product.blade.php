@props(['product'])
<div class="bg-white rounded-lg overflow-hidden my-4 lg:my-0">
    <div class="md:flex md:flex-shrink-0">
        <img src="{{ productImage($product->image) }}" class="h-48 w-full object-cover md:w-50" alt="e-commerce product image">
    </div>
    <div class="py-6 px-4">
        <h2 class="font-bold text-gray-600 text-lg leading-tight uppercase mb-2 hover:underline hover:cursor-pointer">
            <a href='{{route("shop.show", $product)}}' class="hover:text-indigo-400 transition delay-100">{{$product->name}}</a>
        </h2>
        <h4 class="text-xs font-semibold text-gray-600 tracking-widest">{{$product->details}}</h4>
        <p class="flex justify-between items-center mt-4">
            <span class="font-semibold tracking-wide text-yellow-900 text-lg">{{ presentPrice($product->price) }}</span>
            <a href="{{route('shop.show', $product)}}" class="inline-flex items-center px-2 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white text-center uppercase tracking-widest hover:bg-gray-600 active:bg-gray-900 focus:outline-none focus:border-gray-800 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Details</a>
        </p>
    </div>
</div>
