@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")

  <main class="w-full">
    <section class="grid grid-cols-1 px-10 sm:grid-cols-2">
      <div class="overflow-hidden">
        <img src="{{ asset("/storage/" . $product->image) }}" alt="{{ $product->name }}" class="h-full w-full" />
      </div>
      <div class="pb-10 sm:p-10">
        <div class="flex items-center justify-between font-medium opacity-60">
          <h2>SKU: {{ $product->sku }}</h2>
          <a href="" class="cursor-pointer underline decoration-transparent hover:decoration-black">
            {{ $category->name }}
          </a>
        </div>

        @if ($product->stock_quantity < 10)
          <h2 class="mt-10 font-medium text-red-500 opacity-60">Stock available: {{ $product->stock_quantity }}</h2>
        @elseif ($product->stock_quantity < 20)
          <h2 class="mt-10 font-medium text-yellow-500 opacity-60">Stock available: {{ $product->stock_quantity }}</h2>
        @else
          <h2 class="mt-10 font-medium opacity-60">Stock available: {{ $product->stock_quantity }}</h2>
        @endif
        <h1 class="text-3xl font-medium">{{ $product->name }}</h1>
        <h1 class="text-xl">IDR {{ number_format($product->price, 0, ",", ".") }}</h1>
        <p class="mt-16 text-justify">
          {{ $product->description }}
        </p>

        <div class="w-full">
          <a
            href="{{ route("update-stock.page", ["product_id" => $product->id]) }}"
            class="mt-10 block w-full bg-black px-10 py-5 text-center text-white hover:opacity-60"
          >
            UPDATE STOCK
          </a>
        </div>

        <ul class="mt-12">
          <li class="mt-3">
            <a href="" class="underline decoration-transparent hover:decoration-black">Manufacturer details</a>
          </li>
          <li class="mt-3">
            <a href="" class="underline decoration-transparent hover:decoration-black">Transaction history</a>
          </li>
        </ul>
      </div>
    </section>
  </main>
@endsection
