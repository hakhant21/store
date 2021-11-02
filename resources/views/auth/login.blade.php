<x-guest-layout>
<div class="min-w-screen bg-gray-800 flex items-center justify-center px-5 py-12">
    <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
        <div class="md:flex w-full">
            <x-login-svg />
            <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                <div class="text-center mb-10">
                    <h1 class="font-bold text-3xl text-gray-900">Login</h1>
                    <p>Enter your information to login</p>
                </div>
                <div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                    <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
               <form method="POST" action="{{ route('login') }}" class="inline">
                @csrf
                <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Email</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"></div>
                                <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"  placeholder="Enter your email" required autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-12">
                            <label for="" class="text-xs font-semibold px-1">Password</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"></div>
                                <input class="w-full -ml-10 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" id="password" type="password" name="password"required autocomplete="current-password">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <label for="remember_me" class="inline-flex items-center ml-4 pr-4">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="text-sm text-gray-600 pl-2"> {{ __('Remember me') }}</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                    <div class="flex -mx-3 mt-4">
                        <div class="w-1/2 px-3 mb-5">
                            <x-button>LOGIN</x-button>
                        </div>
                         <div class="w-1/2 px-3 mb-5">
                            <a href="{{route('guestCheckout.index')}}" class='cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>Checkout as Guest</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-guest-layout>




