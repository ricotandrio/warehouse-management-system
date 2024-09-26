@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")
  <main class="flex flex-col px-10 py-3 pb-10 pt-5 sm:pt-3">
    <h1 class="mt-10 text-3xl font-semibold">Product Categories</h1>
    <p class="mt-1 opacity-60">
      Last Update at:
      <strong>September 26, 2024</strong>
    </p>

    <p class="mt-5">
      This page show all available product categories.      
    </p>

    <ul class="list-disc">
      @foreach ($product_categories as $product_category)
        <li class="ml-5">
          <a 
            href="{{ route('product-category.product.page', ['category_id' => $product_category->id]) }}" 
            class="hover:underline hover:decoration-black"
          >
            {{ $product_category->name }}
          </a>
        </li>
      @endforeach
    </ul>
  </main>
@endsection
