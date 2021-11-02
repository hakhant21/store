  <div class="max-w-6xl mx-auto grid lg:grid-cols-2 md:gap-6 justify-center items-center">
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="{{route('checkout.store')}}" method="POST" id="payment-form">
        @csrf
        <div class="overflow-hidden">
          <div class="px-4 py-5 bg-white mx-10 lg:mx-0 rounded">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                @if(auth()->user())
                <input type="email" id="email" name="email" value="{{auth()->user()->email}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly>
                @else
                  <input type="email" id="email" name="email" placeholder="Your Email" value="{{ old('email') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                @endif
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="address" class="block text-sm font-medium text-gray-700">Street address</label>
                <input type="text" id="address" name="address" placeholder="Your address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <input  type="text" id="city" name="city" placeholder="Your city"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="state" class="block text-sm font-medium text-gray-700">State / Province</label>
                <input type="text" id="state" name="state" placeholder="Your state"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="postalcode" class="block text-sm font-medium text-gray-700">ZIP / Postal</label>
                <input  type="text" id="postalcode" name="postalcode" placeholder="Your zipcode" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
              </div>
              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="postalcode" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="number" id="phone" name="phone" placeholder="Your phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required >
              </div>
              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label for="name_on_card" class="block text-sm font-medium text-gray-700">Name on card</label>
                  <input type="text" id="name_on_card" name="name" placeholder="Name on card" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"  required>
              </div>
              <div class="col-span-6 sm:col-span-3 lg:col-span-2 mt-6 border-gray-300">
                <div id="card-element" class="border-gray-300">
                    <!--Stripe.js injects the Card Element-->
                    <p id="card-error" role="alert"></p>
                    <p class="result-message hidden"></p>
                 </div>
              </div>
                <div class="col-span-6 sm:col-span-3 lg:col-span-2 mt-5 border-gray-300">
                   <button type="submit" id="completed-order">
                      <div class="spinner hidden" id="spinner"></div>
                      <span id="button-text">Pay now</span>
                   </button>
               </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

 
