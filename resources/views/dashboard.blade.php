<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="{{ asset("css/app.css") }}" rel="stylesheet" />
    <title>Warehouse | Dashboard</title>
  </head>
  <body class="font-sans">
    <div class="p-5">
      <nav class="mb-5 border-b-2 p-4">
        <h1 class="text-xl font-semibold">Warehouse | Dashboard</h1>
      </nav>

      <section class="flex w-full flex-row justify-between gap-5 p-3">
        <h2 class="decoration ml-1 cursor-not-allowed text-lg text-gray-800 underline dark:text-white">
          Welcome, {{ auth()->user()->name }}
        </h2>
        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="rounded-lg bg-red-500 px-5 py-2 text-sm text-white">Logout</button>
        </form>
      </section>

      <section class="container relative mx-auto px-4">
        <div class="sm:flex sm:items-center sm:justify-between">
          <div>
            <div class="flex items-center gap-x-3">
              <h2 class="text-lg font-medium text-gray-800 dark:text-white">Products</h2>

              <span
                class="rounded-full bg-blue-100 px-3 py-1 text-xs text-blue-600 dark:bg-gray-800 dark:text-blue-400"
              >
                {{ $products->total() ?? "N/A" }}
              </span>
            </div>
          </div>

          <div class="mt-4 flex items-center gap-x-3">
            <a
              href="{{
                $currentCreateProduct = route(
                  "dashboard",
                  array_merge(request()->all(), [
                    "createProduct" => "true",
                  ]),
                )
              }}"
              class="flex w-1/2 items-center justify-center gap-x-2 rounded-lg border bg-white px-5 py-2 text-sm text-gray-700 transition-colors duration-200 hover:bg-gray-100 sm:w-auto dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-800"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-5 w-5"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
              <span>Add Product</span>
            </a>

            <a
              href="{{
                $currentCreateProduct = route(
                  "create.manufacturer.page",
                )
              }}"
              class="flex w-1/2 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-blue-500 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 hover:bg-blue-600 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-500"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-5 w-5"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>

              <span>Add Manufacturer</span>
            </a>
          </div>
        </div>

        <form
          {{-- action="{{ route("search.dashboard") }}" --}}
          method="GET"
          class="mt-6 md:flex md:items-center md:justify-between"
        >
          <div class="relative mt-4 flex items-center md:mt-0">
            <span class="absolute">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="mx-3 h-5 w-5 text-gray-400 dark:text-gray-600"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                />
              </svg>
            </span>

            <input
              name="query"
              type="text"
              placeholder="Search"
              class="block w-full rounded-lg border border-gray-200 bg-white py-1.5 pl-11 pr-5 text-gray-700 placeholder-gray-400/70 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 md:w-80 rtl:pl-5 rtl:pr-11 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300"
            />
          </div>
        </form>

        @include("components.product-table", ["products" => $products, "view_source" => "dashboard"])

        <div class="mt-10" />
      </section>
    </div>

    @if ($createProduct === "true")
      @include("modals.create-product")
    @endif
  </body>
</html>
