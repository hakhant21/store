<x-app-layout>
<nav class="flex justify-between px-3 items-center py-6">
    <ol class="list-reset py-4 rounded flex text-gray-100">
        <li class="px-2">
            <a href="{{route('users.edit')}}" class="text-gray-300">Dashboard</a>
        </li>
        <li>/</li>
        <li class="px-2"><a href="{{route('users.edit')}}" class="text-gray-300">My Profile</a></li>
    </ol>
    {{-- Mobile Drop Down --}}
    <div x-data="{ dropdownOpen: false }" class="relative lg:hidden">
        <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-full bg-white p-1  focus:outline-none">
        <svg class="h-4 w-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
        </button>
        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
        <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-gray-800 rounded-md shadow-xl z-20">
            <h1 class="text-left font-bold text-lg ml-3 mb-2 underline text-gray-300">Dashboard</h1>
            <ul>
                <li>
                    <a href="{{route('users.edit')}}"
                        class="block text-sm mb-2 py-2 px-4 text-gray-300 hover:text-indigo-300 transition delay-100">
                        My Profile
                    </a>
                </li>
                <li>
                    <a href="{{route('orders.index')}}"
                        class="block text-sm mb-2 py-2 px-4 text-gray-300 hover:text-indigo-300 transition delay-100">
                        My Orders
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="text-center">
    <x-auth-session-status class="mx-4 mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mx-4 mb-4" :errors="$errors" />
</div>
<div class="grid grid-cols-4 gap-16">
    <div class="col-span-1">
        <div class="flex flex-col lg:block md:pb-0 md:overflow-y-auto hidden py-6">
            <h1 class="px-4 text-lg font-bold text-gray-300 mt-8">Dashboard</h1>
            <ul class="my-4">
                <li>
                    <a href="{{route('users.edit')}}"
                        class="block text-sm mb-2 py-2 px-6 text-gray-300 hover:text-indigo-300 transition delay-100">
                        My Profile
                    </a>
                </li>
                <li>
                    <a href="{{route('orders.index')}}"
                        class="block text-sm mb-2 py-2 px-6 text-gray-300 hover:text-indigo-300 transition delay-100">
                        My Orders
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <main class="lg:col-span-3 sm:col-span-2 col-span-4 justify-center px-8">
        <div class="bg-gray-800">
            <div class="max-w-6xl mx-auto px-4 py-6 sm:px-6 sm:py-24 lg:px-8">
                <div class="max-w-xl">
                    <h1 class="text-sm font-semibold uppercase tracking-wide text-indigo-600">Your order</h1>
                    <p class="mt-2 text-4xl font-extrabold tracking-tight sm:text-5xl text-gray-200">Items</p>
                    <p class="mt-2 text-base text-gray-300">Your order # {{ $order->id }} is processing and we'll notify you when it's ready to deliver.</p>
                </div>
                <div class="mt-10 border-t border-gray-200">
                @foreach($products as $product)
                    <div class="py-10 border-b border-gray-200 flex space-x-6">
                            <img src="{{ productImage($product->image) }}" alt="Glass bottle with black plastic pour top and mesh insert." class="flex-none w-20 h-20 object-center object-cover bg-gray-100 rounded-lg sm:w-40 sm:h-40">
                            <div class="flex-auto flex flex-col">
                                <div>
                                    <h4 class="font-medium text-gray-300">
                                    <a href="{{ route('shop.show', $product) }}">
                                        {{ $product->name }}
                                    </a>
                                    </h4>
                                    <p class="mt-2 text-sm text-gray-300">
                                        {{ $product->description }}
                                    </p>
                                </div>
                                <div class="mt-6 flex-1 flex items-end">
                                    <dl class="flex text-sm divide-x divide-gray-200 space-x-4 sm:space-x-6">
                                        <div class="flex">
                                            <dt class="font-medium text-gray-300"></dt>
                                            <dd class="ml-2 text-gray-300">
                                              Qty : {{ $product->pivot->quantity }}
                                            </dd>
                                        </div>
                                        <div class="pl-4 flex sm:pl-6">
                                            <dt class="font-medium text-gray-300">Price</dt>
                                            <dd class="ml-2 text-gray-300">
                                                 {{ presentPrice($product->price) }}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                    </div>
                    @endforeach
                    <div class="">
                        <h3 class="sr-only">Your information</h3>
                        <h4 class="sr-only">Addresses</h4>
                        <dl class="grid grid-cols-2 gap-x-6 text-sm py-10">
                            <div>
                                <dt class="font-medium text-gray-300">Billing address</dt>
                                <dd class="mt-2 text-gray-300">
                                <address class="not-italic">
                                    <span class="block">{{ $order->billing_address }}</span>
                                    <span class="block">{{ $order->billing_city }}</span>
                                    <span class="block">{{ $order->billing_state }}</span>
                                </address>
                                </dd>
                            </div>
                        </dl>
                        <h4 class="sr-only">Payment</h4>
                        <dl class="grid grid-cols-2 gap-x-6 border-t border-gray-200 text-sm py-10">
                            <div>
                                <dt class="font-medium text-gray-300">Payment method</dt>
                                <dd class="mt-2 text-gray-300">
                                    <p class="uppercase">{{ $order->payment_gateway }}</p>

                                </dd>
                            </div>
                        </dl>
                        <h3 class="sr-only">Summary</h3>
                        <dl class="space-y-6 border-t border-gray-200 text-sm pt-10">
                            <div class="flex justify-between">
                                <dt class="font-medium text-gray-300">Subtotal</dt>
                                <dd class="text-gray-300">{{ presentPrice($order->billing_subtotal)  }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="font-medium text-gray-300">Tax</dt>
                                <dd class="text-gray-300">{{ presentPrice($order->billing_tax)  }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="font-medium text-gray-300">Total</dt>
                                <dd class="text-gray-300">{{ presentPrice($order->billing_total) }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</x-app-layout>
