
<x-guest-layout>
<div class="text-gray-600 body-font">
    <nav class="container mx-auto">
        <ol class="list-reset py-4 pl-4 rounded flex bg-grey-800 text-grey">
            <li class="px-2">
                <a href="{{route('landing-page')}}" class="text-gray-400">Home</a>
            </li>
            <li>/</li>
            <li class="px-2">
                <a href="{{route('shop.index')}}" class="text-gray-400">Shop</a>
            </li>
            <li>/</li>
            <li class="px-2">
                <a href="{{route('shop.show', $product)}}" class="text-gray-200">{{$product->slug}}</a>
            </li>
        </ol>
    </nav>
    <!-- Breadcrumbs -->
    <div class="container px-5 py-14 mx-auto">
        <div class="lg:w-full mx-auto flex flex-wrap">
            <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ productImage($product->image) }}" id="current"/>
            <div class='lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0 py-6'>
                <h2 class='text-3xl title-font text-indigo-200 tracking-widest mb-2'>{{ $product->name }}</h2>
                <h1 class="text-gray-200 text-2xl title-font font-medium mb-2">{{ presentPrice($product->price) }}</h1>
                <span class="leading-relaxed text-gray-300 text-xs">{{$product->details}}</span>
                <p class="leading-relaxed text-gray-400 text-lg mt-2">{{ $product->description }}</p>
                <div class="flex mt-4">
                    <form action="{{route('cart.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <button type="submit" class="inline-flex text-gray-700 bg-gray-100 border-0 py-1 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Add To Cart</button>
                    </form>
                </div>
            </div>
             @if($product->images)
                <div class="grid grid-cols-4 lg:grid-cols-6 gap-2 py-2 justify-center">
                     @foreach(json_decode($product->images, true) as $image)
                         <div class="overflow-hidden rounded cursor-pointer image-list">
                             <img src="{{  productImage($image)  }}" class="w-20 h-16 object-fit object-center rounded">
                         </div>
                     @endforeach
                 </div>
            @endif
        </div>
    </div>

    <!-- Might also Like -->
     <div class="max-w-6xl px-5 py-24 mx-auto">
       <h1 class="text-start text-2xl text-gray-200 mb-12 tracking-widest font-bold">You might also like...</h1>
         <div class="lg:grid lg:grid-cols-3 md:flex md:flex-wrap md:justify-center items-center grid-cols-1 lg:gap-3">
            @foreach($mightAlsoLike as $product)
                   <x-products.product :product="$product" />
            @endforeach
        </div>
    </div>
</div>

<script>
 const current = document.querySelector('#current');
 const images = document.querySelectorAll('.image-list img');
 const opacity = 0.4;

 images.forEach(image => image.addEventListener('click', changeImage));

 function changeImage(e) {
    // reset opacity
    images.forEach(image => (image.style.opacity = 1));
    // change current image to src of clicked image
    current.src = e.target.src;
    // Add fade in class
    current.classList.add('fade-in');
    // remove fade-in class after seconds
    setTimeout(() => current.classList.remove('fade-in'), 500);
    // change opacity to opacity variables
    e.target.style.opacity = opacity;
 }
</script>
</x-guest-layout>
