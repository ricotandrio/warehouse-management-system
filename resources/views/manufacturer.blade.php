@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")

  <main class="relative w-full">
    <section class="flex h-56 w-full items-center overflow-hidden object-cover">
      <img src="{{ asset("/storage/default/manufacturer_cover.png") }}" alt="manufacturer_cover" class="w-full" />
    </section>

    <section class="relative -top-14 px-10">
      <div class="flex flex-col items-center gap-10 sm:flex-row">
        <div class="w-36 overflow-hidden rounded-full bg-white p-2">
          <img src="{{ asset("/storage/" . $manufacturer->profile_image) }}" alt="manufacturer_image" />
        </div>
        <h1 class="text-2xl font-bold sm:mt-3">
          {{ $manufacturer->name }}
        </h1>
      </div>

      <div class="mt-10">
        <h1 class="mt-10 text-xl font-semibold">List of Products</h1>
        <p class="mt-1 opacity-60">
          Last Update at:
          <strong>{{ $last_time }}</strong>
        </p>

        <p class="mt-5">This page show all available products from manufacturer.</p>
        @foreach ($products as $product)
          <li class="ml-5">
            <a
              href="{{ route("product.detail.page", ["product" => $product]) }}"
              class="hover:underline hover:decoration-black"
            >
              {{ $product->name }}
            </a>
          </li>
        @endforeach
      </div>
    </section>
  </main>
  @include("components.footer")
@endsection
