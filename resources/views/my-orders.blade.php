<x-app-layout>
<nav class="flex justify-between px-3 items-center py-4">
    <ol class="list-reset py-4 rounded flex text-grey">
        <li class="px-2">
            <a href="{{route('users.edit')}}" class="text-gray-400">Dashboard</a>
        </li>
        <li>/</li>
        <li class="px-2"><a href="{{route('orders.index')}}" class="text-gray-200">My Orders</a></li>
    </ol>
    {{-- Mobile Drop Down --}}
    <div x-data="{ dropdownOpen: false }" class="relative lg:hidden">
        <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-full bg-white p-1  focus:outline-none">
        <svg class="h-4 w-4 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
        </button>
        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
        <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-gray-800 rounded-md shadow-xl z-20">
            <h1 class="text-left font-bold text-lg ml-3 mb-2 underline text-gray-200">Dashboard</h1>
            <ul>
                <li>
                    <a href="{{route('users.edit')}}"
                        class="block text-sm mb-2 py-2 px-4 text-gray-200 hover:text-indigo-300 transition delay-100">
                        My Profile
                    </a>
                </li>
                <li>
                    <a href="{{route('orders.index')}}"
                        class="block text-sm mb-2 py-2 px-4 text-gray-200 hover:text-indigo-300 transition delay-100">
                        My Orders
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="grid grid-cols-4 gap-16 py-12">
  <div class="col-span-1">
    <div class="flex flex-col lg:block md:pb-0 md:overflow-y-auto hidden py-6">
      <h1 class="px-4 text-lg font-bold text-gray-300 mt-4">Dashboard</h1>
      <ul class="my-4">
        <li>
          <a href="{{route('users.edit')}}"
            class="block text-sm mb-2 py-2 px-6 text-gray-400 hover:text-indigo-300 transition delay-100">
            My Profile
          </a>
        </li>
        <li>
          <a href="{{route('orders.index')}}"
            class="block text-sm mb-2 py-2 px-6 text-gray-400 hover:text-indigo-300 transition delay-100">
            My Orders
          </a>
        </li>
      </ul>
    </div>
  </div>
    <main class="lg:col-span-3 sm:col-span-2 col-span-4 justify-center px-12">
    <div class="max-w-xl">
      <h1 class="text-3xl font-extrabold tracking-tight text-gray-100">Your Orders</h1>
      <p class="mt-2 text-sm text-gray-200">Check the status of recent orders, manage returns, and discover similar products.</p>
    </div>
     @foreach($orders as $order)
    <div class="mt-12 space-y-16 sm:mt-16">
      <section aria-labelledby="4376-heading">
          <div class="space-y-1 md:flex md:items-baseline md:space-y-0 md:space-x-4">
            <h2 id="4376-heading" class="text-lg font-medium text-gray-200 md:flex-shrink-0">
             Orders ID - {{ $order->id }}
            </h2>
            <div class="space-y-5 md:flex-1 md:min-w-0 sm:flex sm:items-baseline sm:justify-between sm:space-y-0">
              <p class="text-sm font-medium text-gray-200">
                Orderd on {!! date('d / M / y', strtotime($order->created_at)) !!}
              </p>
            </div>
          </div>

          <div class="mt-6 -mb-6 flow-root border-t border-gray-200 divide-y divide-gray-200">
              @foreach($order->products as $product)
                <div class="py-6 sm:flex">
                    <div class="flex space-x-4 sm:min-w-0 sm:flex-1 sm:space-x-6 lg:space-x-8">
                      <img src="{{ productImage($product->image) }}" alt="Brass puzzle in the shape of a jack with overlapping rounded posts." class="flex-none w-20 h-20 rounded-md object-center object-cover sm:w-48 sm:h-48">
                      <div class="pt-1.5 min-w-0 flex-1 sm:pt-0">
                        <h3 class="text-sm font-medium text-gray-300">
                          <a href="{{ route('shop.show', $product) }}">{{$product->name}}</a>
                        </h3>
                        <p class="text-sm text-gray-300 truncate">
                          <span>{{ $product->details }}</span>
                        </p>
                        <p class="mt-1 font-medium text-gray-200">{{ presentPrice($product->price) }} </p>
                      </div>
                    </div>
                  <div class="mt-6 space-y-4 sm:mt-0 sm:ml-6 sm:flex-none sm:w-40">
                    <a href="{{route('shop.index')}}" class="w-full flex items-center justify-center bg-white py-2 px-2.5 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-indigo-500 hover:text-indigo-200 transition delay-100 focus:outline-none sm:w-full sm:flex-grow-0">
                      Shop similar
                    </a>
                    <div class="flex text-sm font-medium">
                      <div class="border-l border-gray-200 ml-4 pl-4 sm:ml-6 sm:pl-6">
                        <a href="{{route('orders.show', $order)}}" class="text-indigo-200 hover:text-indigo-500 transition delay-100">Order details</a>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
            <!-- More products... -->
          </div>
        </section>


      <!-- More orders... -->
    </div>
    @endforeach
    </main>
</div>
</x-app-layout>
