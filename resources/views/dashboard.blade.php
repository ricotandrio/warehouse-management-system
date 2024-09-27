@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")
  <section class="flex flex-col items-center justify-center bg-black py-3">
    <div class="py-2">
      <a
        href="{{ route("dashboard.admin.page") }}"
        class="leading-2 peer block text-center text-xs font-medium text-white"
      >
        Admin Dashboard
      </a>
      <div class="h-0.5 w-0 transform bg-white duration-75 ease-linear peer-hover:w-full"></div>
    </div>
  </section>
  <main class="flex w-full flex-col items-center justify-start">
    <section class="mt-8 flex w-full justify-between px-10">
      {{-- this should be filter bar --}}
      <h1>Filter</h1>
      <h1>Price</h1>
    </section>

    @if (count($products) === 0)
      <section class="mt-16 flex flex-col items-center justify-center">
        <p class="mt-3">There are no products available at the moment.</p>
      </section>
    @else
      <section class="mt-16 grid w-full grid-cols-1 gap-4 px-2 sm:grid-cols-4 sm:px-5 md:px-10">
        @foreach ($products as $product)
          <div class="relative mb-10 flex flex-col">
            <a
              href="{{ route("view.product.detail.page", ["product_id" => $product->id]) }}"
              class="flex aspect-square w-full cursor-pointer items-center justify-center overflow-hidden"
            >
              <img
                src="{{ asset("/storage/" . $product->image) }}"
                alt="{{ $product->name }}"
                class="h-full w-full border object-cover"
              />
            </a>
            <div class="">
              <div class="h-28">
                @if ($product->stock_quantity < 10)
                  <h1 class="mt-3 text-sm font-medium text-red-500 opacity-80">
                    Stock available: {{ $product->stock_quantity }}
                  </h1>
                @elseif ($product->stock_quantity < 20)
                  <h1 class="mt-3 text-sm font-medium text-yellow-500 opacity-80">
                    Stock available: {{ $product->stock_quantity }}
                  </h1>
                @else
                  <h1 class="mt-3 text-sm opacity-80">Stock available: {{ $product->stock_quantity }}</h1>
                @endif
                <h1 class="line-clamp-2 text-2xl font-medium">{{ $product->name }}</h1>
              </div>
              <h1 class="mt-10 text-xl">IDR {{ number_format($product->price, 0, ",", ".") }}</h1>
            </div>
          </div>
        @endforeach
      </section>
    @endif
  </main>

  @include("components.footer")
@endsection
