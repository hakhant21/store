<div class="lg:flex sm:inline-flex justify-between pt-6 mt-6 border-t">
  <div class="lg:flex sm:inline-flex justify-center items-center">
    <img src="{{ productImage($item->model->image) }}" width="70" class="rounded-full ml-3">
    <div class="flex flex-col py-6 ml-3 mb-2">
      <span class="text-md font-bold w-auto text-gray-200 mb-2">{{$item->model->name}}</span>
      <small class="text-gray-200 text-sm font-semibold">{{$item->model->details}}</small>
      <p class="text-gray-300 text-xs font-thin mt-2">{{$item->model->description}}</p>
      <div class="flex text-sm divide-x mt-2">
        <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="flex items-center px-2 py-1 pl-0 space-x-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current">
          <path d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z"></path>
          <rect width="32" height="200" x="168" y="216"></rect>
          <rect width="32" height="200" x="240" y="216"></rect>
          <rect width="32" height="200" x="312" y="216"></rect>
        <path d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z"></path>
      </svg>
      <span>Remove</span>
      </button>
    </form>
  </div>
</div>
</div>
</div>
