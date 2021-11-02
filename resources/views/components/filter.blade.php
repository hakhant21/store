@props(['categories' => $categories])
<div x-data="{ dropdownOpen: false }" class="relative lg:hidden">
  <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-full bg-white p-1  focus:outline-none">
    <svg class="h-4 w-4 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </button>

  <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

  <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-gray-800 rounded-md shadow-xl z-20">
  <h1 class="text-left font-bold text-lg ml-3 mb-2 underline text-gray-200">By Category</h1>
  @foreach($categories as $category)
      <ul>
          <li>
            <a class="block text-sm mb-2 py-2 px-4 text-gray-200 hover:text-indigo-300 transition delay-100"
              href="{{route('shop.index', ['category' => $category])}}">
              {{$category->name}}
            </a>
        </li>
      </ul>
  @endforeach
    <h1 class="text-left font-bold text-lg ml-3 mb-2 underline text-gray-200">By Price</h1>
    <ul>
      <li>
        <a href="{{route('shop.index', ['category' => request()->category, 'sort' => 'low_high'])}}"
          class="block text-sm mb-2 py-2 px-4 text-gray-200 hover:text-indigo-300 transition delay-100">
          Low-High
        </a>
      </li>
      <li>
           <a href="{{route('shop.index', ['category' => request()->category, 'sort' => 'high_low'])}}"
              class="block text-sm mb-2 py-2 px-4 text-gray-200 hover:text-indigo-300 transition delay-100">
              High-Low
           </a>
      </li>
    </ul>
  </div>
</div>
