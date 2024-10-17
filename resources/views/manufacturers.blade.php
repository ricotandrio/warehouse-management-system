@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")
  <main class="flex flex-col px-10 py-3 pb-10 pt-5 sm:pt-3">
    <h1 class="mt-10 text-3xl font-semibold">Manufacturers</h1>
    <p class="mt-1 opacity-60">
      Last Update at:
      <strong>{{ $last_time }}</strong>
    </p>

    <p class="mt-5">This page show all available manfuacturers.</p>

    <ul class="list-disc">
      @foreach ($manufacturers as $manufacturer)
        <li class="ml-5">
          <a
            href="{{ route("manufacturer.product.page", ["manufacturer" => $manufacturer]) }}"
            class="hover:underline hover:decoration-black"
          >
            {{ $manufacturer->name }}
          </a>
        </li>
      @endforeach
    </ul>
  </main>
  @include("components.footer")
@endsection
