<x-guest-layout>
<div class="min-w-screen bg-gray-800 flex items-center justify-center px-5 py-12">
    <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
        <div class="md:flex w-full">
            <x-login-svg />
            <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                <div class="text-center mb-10">
                    <h1 class="font-bold text-3xl text-gray-900">Register</h1>
                    <p>Enter your information to register</p>
                </div>
                <div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                    <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
               <form method="POST" action="{{ route('register') }}" class="inline">
                @csrf
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="name" class="text-xs font-semibold px-1">Your fullname</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"></div>
                                 <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Enter your name" required autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="email" class="text-xs font-semibold px-1">Your email</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"></div>
                                 <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  placeholder="Enter your email" required autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="password" class="text-xs font-semibold px-1">Choose your password</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"></div>
                                <x-input id="password" name="password" type="password" required placeholder="Choose your password"/>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="password_confirmation" class="text-xs font-semibold px-1">Confirm your password</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"></div>
                                <x-input id="password_confirmation" name="password_confirmation" type="password" required placeholder="Confirm your password" />
                            </div>
                        </div>
                    </div>
                    <div class="flex mx-2">
                      <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                      </a>
                    </div>
                    <div class="flex -mx-3 mt-4">
                        <div class="w-full px-3 mb-5">
                            <x-button>REGISTER</x-button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

</x-guest-layout>
