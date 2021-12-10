<x-guest-layout>
<nav class="flex justify-between px-3 items-center">
  <ol class="list-reset py-4 rounded flex text-grey">
    <li class="px-2">
      <a href="{{route('landing-page')}}" class="text-gray-400">Home</a>
    </li>
    <li>/</li>
    <li class="px-2"><span class="text-gray-200">Search</span></li>
  </ol>
  <div class="flex justify-around">
    <div class="mr-4">
      <form action="" class="inline">
          <label for="search" class="sr-only">Search</label>
          <input type="text" name="query" class="py-1 px-2 rounded-lg" value="{{ request()->input('query') }}" placeholder="Search">
      </form>
    </div>
  </div>
</nav>
<div class="text-center">
    <x-auth-session-status class="mx-4 mb-4" :status="session('status')" />
  <!-- Validation Errors -->
  <x-auth-validation-errors class="mx-4 mb-4" :errors="$errors" />
</div>
<div class="max-w-6xl mx-auto">
  {{-- Lists of products --}}
  <div class="lg:col-span-3 sm:col-span-2 col-span-4 mt-8 justify-center">
    <div class="grid lg:grid-cols-3 sm:grid-cols-1 sm:gap-2 lg:gap-3 px-4 ">
      @forelse($products as $product)
        <x-products.product :product="$product" />
      @empty
        <div class="flex items-center justify-center">
          <span class="text-center text-gray-200 text-lg">No product(s) found with {{ request()->input('query') }}</span>
        </div>
      @endforelse
    </div>
  </div>
</div>
<div class="mt-6 px-4">
  {{ $products->links() }}
</div>
</x-guest-layout>
