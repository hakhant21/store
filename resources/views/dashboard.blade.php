<x-app-layout>
<nav class="flex justify-between px-3 items-center py-4">
  <ol class="list-reset py-4 rounded flex text-grey">
    <li class="px-2">
      <a href="{{route('users.index')}}" class="text-gray-400">Home</a>
    </li>
    <li>/</li>
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
      <h1 class="text-left font-bold text-lg ml-3 mb-2 underline text-gray-200">Users</h1>
      <ul>
        <li>
          <a href="#"
            class="block text-sm mb-2 py-2 px-4 text-gray-200 hover:text-indigo-300 transition delay-100">
            My Profile
          </a>
        </li>
        <li>
          <a href="#"
            class="block text-sm mb-2 py-2 px-4 text-gray-200 hover:text-indigo-300 transition delay-100">
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
  <div class="lg:col-span-3 sm:col-span-2 col-span-4 justify-center">
    <div class="grid lg:grid-cols-3 sm:grid-cols-1 sm:gap-2 lg:gap-3">
      <form action="{{route('users.update')}}" method="post">
        @method('patch')
        @csrf
        <h1 class="text-center text-2xl text-gray-100 uppercase font-bold my-6">Update Profile</h1>
        <div class="flex -mx-3">
          <div class="w-full px-3 mb-5">
            <label for="name" class="sr-only">Your fullname</label>
            <div class="flex">
              <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"></div>
              <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name', $user->name)}}" placeholder="Enter your name" required autofocus />
            </div>
          </div>
        </div>
        <div class="flex -mx-3">
          <div class="w-full px-3 mb-5">
            <label for="email" class="sr-only">Your email</label>
            <div class="flex">
              <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"></div>
              <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{old('email', $user->email)}}"  placeholder="Enter your email" required autofocus />
            </div>
          </div>
        </div>
        <div class="flex -mx-3">
          <div class="w-full px-3 mb-5">
            <label for="password" class="sr-only">Choose your password</label>
            <div class="flex">
              <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"></div>
              <x-input id="password" name="password" type="password" placeholder="Choose your password"/>
            </div>
            <p class="inline-block text-white text-sm mt-1 ">Leave the password blank if you want to use your current password!</p>
          </div>
        </div>
        <div class="flex -mx-3">
          <div class="w-full px-3 mb-5">
            <label for="password_confirmation" class="sr-only">Confirm your password</label>
            <div class="flex">
              <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"></div>
              <x-input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm your password" />
            </div>
          </div>
        </div>
        <div class="flex -mx-3 mt-4">
          <div class="w-full px-3 mb-5">
            <button class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Update Profile</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</x-app-layout>
