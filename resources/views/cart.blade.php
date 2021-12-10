<x-guest-layout>
<div class="text-gray-600 body-font">
    <nav class="container mx-auto">
        <ol class="list-reset py-4 pl-4 rounded flex bg-grey-light text-grey">
            <li class="px-1">
                <a href="{{route('landing-page')}}" class="text-gray-400">Home</a>
            </li>
            <li>/</li>
            <li class="px-1"><a href="{{route('cart.index')}}" class="text-gray-200">Shopping Cart</a></li>
        </ol>
    </nav>
    <div class="text-center">
        <x-auth-session-status class="mx-4 mb-4" :status="session('status')" />
      <!-- Validation Errors -->
      <x-auth-validation-errors class="mx-4 mb-4" :errors="$errors" />
    </div>
    <div class="max-w-6xl mx-auto py-6 px-5 text-gray-200">
        <!-- Session Status -->
    @if(Cart::count() > 0)
        <h2 class="text-xl font-semibold mt-6">{{ Cart::count() }} item(s) in your cart </h2>
        {{-- Cart List items Start Here --}}
        @foreach(Cart::content() as $item)
            @include('_partials.cart-lists')
             <div class="flex justify-end items-center px-2 py-4 border-b border-gray-100 mb-12">
                  <select  data-id="{{ $item->rowId }}" class="quantity w-15 py-1 rounded-lg  bg-gray-800 text-white mr-2">
                      @for($i = 1; $i < 5 * 1; $i++)
                      <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                      @endfor
                  </select>
                  <span class="text-xl font-medium text-gray-200">
                      {{ presentPrice($item->subtotal) }}
                  </span>
            </div>
        @endforeach
        {{-- Cart list items End Here  --}}

        <div class="space-y-1 text-right">
            <p class="ml-2 mb-2">
                <span class="font-semibold">Subtotal: {{ presentPrice(Cart::subtotal()) }}</span>
                <br />
                <span class="font-semibold">Tax: {{ presentPrice(Cart::tax()) }} </span>
                <br/>
            </p>
            <span class="font-semibold">Total: {{  presentPrice(Cart::total())  }}</span>
        </div>
        <div class="flex justify-between space-x-4 mt-6">
            <a class='inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150' href="{{route('shop.index')}}">Shopping</a>
            <div class="pl-4">
                <a href="{{route('checkout.index')}}" class='inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>Checkout</a>
            </div>
        </div>
@else
    <h3 class="text-md text-gray-200 text-center">No items in your cart</h3>
@endif
</div>
<div class="max-w-6xl mx-auto px-4 lg:mx-0">
     <h1 class="text-start text-2xl font-bold text-gray-200 mb-12 tracking-widest">You might also like...</h1>
    <div class="lg:grid lg:grid-cols-3 md:flex md:flex-col md:justify-center items-center grid-cols-1 lg:gap-3">
        @foreach($mightAlsoLike as $product)
              <x-products.product :product="$product" />
        @endforeach
    </div>
</div>

</div>
<script>
const classname = document.querySelectorAll('.quantity');

Array.from(classname).forEach(function(element){
  element.addEventListener('change', function(){
  const id = element.getAttribute('data-id')
  axios.patch(`/cart/${id}`, {
      quantity: this.value
  }).then(function(response){
    // console.log(response);
       window.location.href = '{{route('cart.index')}}'
    }).catch(function(error){
       window.location.href = '{{route('cart.index')}}'
    })
  })
})

</script>

</x-guest-layout>
