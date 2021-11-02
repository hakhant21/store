<ul class="pt-6 lg:pt-0 list-reset lg:flex justify-end flex-1 items-center">
@foreach($items as $menu_item)
    <li class="mr-3">
        <a class="inline-block text-gray-100 no-underline hover:text-indigo-300 hover:text-underline py-2 px-4 trasition delay-100" href="{{ $menu_item->link() }}">
            {{ $menu_item->title }}
        </a>
    </li>
@endforeach
  @guest
      <li class="mr-3">
          <a href="{{ route('login') }}" class="inline-block text-gray-100 no-underline hover:text-indigo-300 hover:text-underline py-2 px-4 trasition delay-100">Login</a>
      </li>
      <li class="mr-3">
          <a href="{{ route('register') }}" class="inline-block text-gray-100 no-underline hover:text-indigo-300 hover:text-underline py-2 px-4 trasition delay-100">Register</a>
      </li>
  @endguest
  @auth
      <li class="mr-3">
        <a class="inline-block text-gray-100 no-underline hover:text-indigo-300 hover:text-underline py-2 px-4 trasition delay-100" href="{{route('users.edit')}}">My Account</a>
      </li>
      <li class="mr-3" >
         <form action="{{route('logout')}}" class="inline" method="POST">
             @csrf
             <button type="submit" class="inline-block text-gray-100 no-underline hover:text-indigo-300 hover:text-underline py-2 px-4 trasition delay-100">Logout</button>
         </form>
      </li>
  @endauth
 <li class="mr-3">
      <a class="inline-block text-gray-100 no-underline hover:text-indigo-300 hover:text-underline py-2 px-4 trasition delay-100" href="{{ route('cart.index') }}">
          Cart
         @if(Cart::instance('default')->count() > 0)
              <span class="px-1 mr-2 text-xs leading-none text-center text-indigo-100 bg-yellow-600 rounded-full mx-1 hover:text-indigo-300">
                  {{ Cart::instance('default')->count()}}
              </span>
          @endif
      </a>
  </li>
</ul>
