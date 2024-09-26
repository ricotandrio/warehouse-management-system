@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")
  <section class="py-3 bg-black flex flex-col items-center justify-center">
    <div class="py-2">
      <a 
        href="{{ route('dashboard.admin.page') }}"
        class="peer text-white font-medium text-center block leading-2 text-xs"
      >
        Admin Dashboard
      </a>
      <div class="h-0.5 bg-white w-0 peer-hover:w-full duration-75 ease-linear transform"></div>
    </div>
  </section>
  <main class="flex flex-col items-center justify-start border w-full">

    <section class="mt-8 w-full px-10 flex justify-between">
      {{-- this should be filter bar --}}
      <h1>Filter</h1>
      <h1>Price</h1>
    </section>
    <section class="grid grid-cols-1 px-2 sm:grid-cols-4 gap-4 border w-full sm:px-5 md:px-10 mt-16">
      @foreach ($products as $product)
        <div class="relative flex flex-col mb-10">
          <a
            href="{{ route('view.product.detail.page', ['product_id' => $product->id]) }}" 
            class="cursor-pointer w-full aspect-3/4 overflow-hidden items-center justify-center flex"
          >
            <img 
              src="https://images.unsplash.com/photo-1541643600914-78b084683601?q=80&w=1904&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
              alt=""
              class="w-full h-full"
            >
          </a>
          <div class="">
            <div class="h-28">
              @if ($product->stock_quantity < 10)
                <h1 class="text-sm opacity-80 mt-3 font-medium text-red-500">Stock available: {{ $product->stock_quantity }}</h1>
              @elseif ($product->stock_quantity < 20)
                <h1 class="text-sm opacity-80 mt-3 font-medium text-yellow-500">Stock available: {{ $product->stock_quantity }}</h1>
              @else
                <h1 class="text-sm opacity-80 mt-3">Stock available: {{ $product->stock_quantity }}</h1>
              @endif
              <h1 class="text-2xl font-medium line-clamp-2">{{ $product->name }}</h1>
            </div>
            <h1 class="text-xl mt-10">IDR {{ $product->price }}</h1>
          </div>
        </div>
      @endforeach
    </section>
  </main>
@endsection