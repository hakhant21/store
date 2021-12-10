  <div class="max-w-6xl mx-auto grid lg:grid-cols-2 md:gap-6 justify-center items-center">
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="{{route('tctpCheckout.store')}}" method="POST" id="2c2p-form">
        @csrf
        <div class="overflow-hidden py-12">
          <div class="px-4 py-5 bg-white mx-10 lg:mx-0 rounded">
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
          <div class="mt-4 -mx-1">
              <x-button type="submit">Pay with MPU</x-button>
          </div>
        </div>
      </form>
    </div>
  </div>

 
