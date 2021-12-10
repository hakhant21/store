<x-guest-layout>
<div class="text-gray-300 body-font">
<nav class="lg:container mb-4">
  <ol class="list-reset py-4 pl-2 rounded flex bg-grey-800 text-indigo-300">
    <li class="px-2">
      <a href="{{route('landing-page')}}" class="text-gray-400">Home</a>
    </li>
    <li>/</li>
    <li class="px-2 text-gray-200"><a href="{{route('checkout.index')}}">Checkout</a></li>
  </ol>
</nav>
<div class="text-center">
  <x-auth-session-status class="mx-4 mb-4" :status="session('status')" />
  <!-- Validation Errors -->
  <x-auth-validation-errors class="mx-4 mb-4" :errors="$errors" />
</div>

<div class="w-full lg:max-w-6xl mx-auto">
 <h2 class="text-xl font-semibold mt-6 ml-4">{{ Cart::count() }} item(s) in your cart </h2>
  {{-- Cart List Items Start Here --}}
   <div class="py-12 ">
      @foreach(Cart::content() as $item)
          @include('_partials.cart-lists')
          <div class="flex justify-end items-center px-2 py-2 border-b border-gray-100 mb-6">
              <p class="text-right text-lg text-indigo-200">Qty: {{$item->qty}}</p>
          </div>
      @endforeach
       <div class="space-y-1 text-right">
          <p class="mr-2 mb-2">
              <span class="font-semibold">Subtotal: {{  presentPrice(Cart::subtotal())  }}</span>
              <br />
              <span class="font-semibold">Tax: {{  presentPrice(Cart::tax()) }} </span>
              <br/>
              <span class="font-semibold">Total: {{ presentPrice( Cart::total() ) }}</span>
          </p>
          
       </div>
   </div>


     <div class="py-12">
       @include('_partials.stripe-form')
     </div>
      
   </div>
  
  </div>
   {{-- Customer Infomation And Address Form End --}}
 </div>
  <script src="https://js.stripe.com/v3/" type="text/javascript" ></script>
  <script src="{{asset('js/checkout.js')}}"></script>

  
  </x-guest-layout>
