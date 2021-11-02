<x-guest-layout>
<div class="text-gray-600 body-font">
  <nav class="px-6 lg:px-0">
    <ol class="list-reset py-4 pl-4 rounded flex bg-grey-800 text-grey">
      <li class="px-2">
        <a href="{{route('landing-page')}}" class="no-underline text-gray-200">Home</a>
      </li>
    </ol>
  </nav>
  @include('_partials.hero')
  <div class="flex flex-col py-6 text-center w-full mb-6 px-2 overflow-hidden px-3">
     <div class="py-6">
           <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-200">Laravel Shopping Cart</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-300">
              Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep.
            </p>
     </div>
  </div>
    <div class="max-w-6xl px-5 py-12 mx-auto">
      <div class="lg:grid lg:grid-cols-3 md:flex md:flex-wrap md:justify-center items-center grid-cols-1 lg:gap-4">
          @foreach($products as $product)
                <x-products.product :product="$product" />
          @endforeach
      </div>
    </div>
   <div class="flex justify-center items-center mt-12 mb-4">
      <a class="inline-flex text-gray-500 bg-white hover:bg-gray-100 border-0 py-1 px-6 focus:outline-none rounded text-lg" href="{{route('shop.index')}}">View more products</a>
   </div>
</div>
</x-guest-layout>
