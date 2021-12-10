<x-guest-layout>
<nav class="flex justify-between px-3 items-center">
  <ol class="list-reset py-4 rounded flex text-grey">
    <li class="px-2">
      <a href="{{route('landing-page')}}" class="text-gray-400">Home</a>
    </li>
    <li>/</li>
    <li class="px-2"><a href="{{route('shop.index')}}" class="text-gray-200">Shop</a></li>
  </ol>
  <div class="flex justify-around">
    <div class="mr-4">
      <form action="{{route('search')}}" class="inline">

          <input type="text" name="query" value="{{ request()->input('query') }}" class="py-1 px-2 rounded-lg" placeholder="Search">
      </form>
    </div>
    <div class="mt-2 mb-2">
      <x-filter :categories="$categories" />
    </div>
  </div>
</nav>
<div class="grid grid-cols-4 gap-4">
  <div class="col-span-1">
    <div class="flex flex-col lg:block md:pb-0 md:overflow-y-auto hidden py-12">
      <h1 class="px-4 text-lg font-bold text-gray-300 mb-2">Category</h1>
      @foreach($categories as $category)
      <ul>
        <li>
          <a class="block text-sm mb-2 py-2 px-6 text-gray-400 hover:text-indigo-300 transition delay-100"
            href="{{route('shop.index', ['category' => $category])}}">
            {{$category->name}}
          </a>
        </li>
      </ul>
      @endforeach
      <h1 class="px-4 text-lg font-bold text-gray-300 mt-4">Price</h1>
      <ul class="my-4">
        <li>
          <a href="{{route('shop.index', ['category' => request()->category, 'sort' => 'low_high'])}}"
            class="block text-sm mb-2 py-2 px-6 text-gray-400 hover:text-indigo-300 transition delay-100">
            Low-High
          </a>
        </li>
        <li>
          <a href="{{route('shop.index', ['category' => request()->category, 'sort' => 'high_low'])}}"
            class="block text-sm mb-2 py-2 px-6 text-gray-400 hover:text-indigo-300 transition delay-100">
            High-Low
          </a>
        </li>
      </ul>
    </div>
  </div>
  {{-- Lists of products --}}
  <div class="lg:col-span-3 sm:col-span-2 col-span-4 mt-8 justify-center">
    <div class="grid lg:grid-cols-3 sm:grid-cols-1 sm:gap-2 lg:gap-3 px-4 ">
      @foreach($products as $product)
        <x-products.product :product="$product" />
      @endforeach
    </div>
  </div>
</div>
<div class="mt-6 px-4">
  {{ $products->links() }}
</div>


</x-guest-layout>
