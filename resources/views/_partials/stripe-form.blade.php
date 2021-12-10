<div class="w-full lg:max-w-7xl mx-auto ">
  <div class="mx-4 py-4">
       <form action="{{route('checkout.store')}}" method="POST" id="payment-form">
        @csrf
          <div class="bg-white rounded-md py-6 px-5">
            <h3 class="text-left text-3xl text-gray-400 font-bold mb-6">Billing Address</h3>
              <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700">Fullname</label>
                    <input type="text" id="name" name="name" placeholder="Your name" class="py-2 px-4 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                  </div>
                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                  @if(auth()->user())
                    <input type="email" id="email" name="email" value="{{auth()->user()->email}}" class="py-2 px-4 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly>
                    @else
                      <input type="email" id="email" name="email" placeholder="Your Email" value="{{ old('email') }}" class="py-2 px-4 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    @endif
                </div>
                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <label for="address" class="block text-sm font-medium text-gray-700">Street address</label>
                  <input type="text" id="address" name="address" placeholder="Your address" class="py-2 px-4 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                  <input  type="text" id="city" name="city" placeholder="Your city"  class="py-2 px-4 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label for="state" class="block text-sm font-medium text-gray-700">State / Province</label>
                  <input type="text" id="state" name="state" placeholder="Your state"  class="py-2 px-4 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label for="postalcode" class="block text-sm font-medium text-gray-700">ZIP / Postal</label>
                  <input  type="text" id="postalcode" name="postalcode" placeholder="Your zipcode" class="py-2 px-4 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>
                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label for="postalcode" class="block text-sm font-medium text-gray-700">Phone Number</label>
                  <input type="number" id="phone" name="phone" placeholder="Your phone" class="py-2 px-4 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required >
                </div>
            </div>

              <div class="py-6">
                  <h3 class="text-left text-3xl text-gray-400 font-bold">Payment Information</h3>
              </div>
              
              <div class="grid lg:grid-cols-2 gap-2">
                <div class="w-full">
                    <label for="name_on_card" class="sr-only">Name on card</label>
                    <input type="text" id="name_on_card" name="name" placeholder="Name on card" class="py-2 px-4 -mx-1 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"  required>
                </div>
                <div class="mt-2">
                  <div id="card-element" class="px-4 py-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <!--Stripe.js injects the Card Element-->
                      <p id="card-error" role="alert"></p>
                      <p class="result-message hidden"></p>
                  </div>
                </div>
              <div class="mt-4 ml-3">
                <x-button>Pay now</x-button>
              </div>
              </div>
          </div>  <!-- end of bg-white -->  
      </form>
      </div>
  </div>

  

 
