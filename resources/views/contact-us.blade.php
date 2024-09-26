@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")
  <main class="flex flex-col px-10 py-3 pb-10 pt-5 sm:pt-3">
    <h1 class="mt-10 text-3xl font-semibold">Contact Us</h1>
    <p class="mt-1 opacity-60">
      Last update date:
      <strong>September 26, 2024</strong>
    </p>

    <p class="mt-5 mb-10">
      If you have any questions or concerns about our services, please feel free to contact us using the information below:
    </p>

    <h2 class="mb-1 mt-3 text-xl font-medium">Email</h2>
    <p>
      <a href="mailto:" class="underline hover:opacity-60">
        help@warehouse.id 
      </a>
    </p>

    <h2 class="mb-1 mt-3 text-xl font-medium">Phone</h2>
    <p>
      <a href="tel:" class="underline hover:opacity-60">
        +1 (123) 456-7890
      </a>
    </p>

    <h2 class="mb-1 mt-3 text-xl font-medium">Address</h2>
    <p>
      1234 Main Street, Suite 200
      <br />
      New York, NY 10001

      <br />
      United States
    </p>
    
  </main>
@endsection
