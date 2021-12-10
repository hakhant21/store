
      
      @foreach($items as $menu_item)
          <li class="mr-2">
              @if($menu_item->title === 'Cart')
                   @if(Cart::instance('default')->count() > 0)
                        <a class="flex justify-start items-center text-gray-100 no-underline hover:text-indigo-300 hover:text-underline trasition delay-100 lg:pl-0 pl-4" href="{{ $menu_item->link() }}">
                          Cart
                           <span class="w-5 h-5 py-1 text-xs text-center bg-indigo-600 rounded-full mx-1 hover:text-indigo-300">
                              {{ Cart::instance('default')->count()}}  
                           </span>
                         </a>    
                    @endif
              @else 
                <a class="inline-block text-gray-100 no-underline hover:text-indigo-300 hover:text-underline py-2 px-4 trasition delay-100" href="{{ $menu_item->link() }}">
                    {{ $menu_item->title}}       
                 </a> 
              @endif
          </li>
      @endforeach

       

