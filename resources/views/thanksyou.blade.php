<x-guest-layout>
 <div class="mt-12">
     <!-- Session Status -->
     <x-auth-session-status class="mx-4 mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mx-4 mb-4" :errors="$errors" />
 </div>
<div class="max-w-6xl mx-auto bg-gray-800 py-14 px-4">
    <h2 class="text-3xl font-extrabold tracking-widest text-gray-900 sm:text-4xl py-12">
      <span class="block text-indigo-200 text-center mb-6">Thanks you!</span>
      <span class="block text-indigo-200 text-center mb-6">Please check your email to see invoices</span>
    </h2>
    <div class="flex justify-center items-center">
       <a class="inline-block text-gray-500 bg-white hover:bg-gray-100 border-0 py-1 px-5 focus:outline-none rounded text-lg" href="{{route('shop.index')}}">View more products</a>
    </div>
    <div class="w-full border-b-2 border-gray-100 mt-12 shadow-lg "></div>
  <x-blog />
</div>
</x-guest-layout>
