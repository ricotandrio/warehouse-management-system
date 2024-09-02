<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="{{ asset("css/app.css") }}" rel="stylesheet" />
    <title>Warehouse | Manufacturer Profile</title>
  </head>
  <body>
    <div class="px-9 py-5">
      <div>
        <h2 class="text-xl font-medium opacity-80">Manufacturer Profile</h2>

        <h1 class="text-3xl font-bold">
          {{ $manufacturer["name"] }}
        </h1>

        <p class="text-sm">
          {{ $manufacturer["description"] }}
        </p>
        <ul class="mt-4 text-xs">
          <li>Created at : {{ $manufacturer["created_at"] }}</li>
          <li>Updated at : {{ $manufacturer["updated_at"] }}</li>
        </ul>
      </div>

      <div>
        @if (session("error"))
          <div class="alert alert-danger mt-5 text-red-500">
            {{ session("error") }}
          </div>
        @endif

        <form
          action="{{ route("delete.manufacturer", ["manufacturer" => $manufacturer]) }}"
          method="POST"
          style="display: inline"
        >
          @csrf
          @method("DELETE")
          <button
            id="confirm-delete-btn"
            type="submit"
            class="mt-3 shrink-0 gap-x-2 rounded-lg bg-red-500 px-3 py-1 tracking-wide text-white transition-colors duration-200 hover:bg-red-600 sm:w-auto dark:bg-red-600 dark:hover:bg-red-500"
          >
            Delete
          </button>
        </form>
      </div>
      <div class="mt-8">
        <div class="flex flex-row items-center justify-center">
          <h2 class="text-center text-xl">Manufacturer Products</h2>
          <span
            class="mx-3 rounded-full bg-blue-100 px-3 py-1 text-xs text-blue-600 dark:bg-gray-800 dark:text-blue-400"
          >
            {{ $products->total() ?? "N/A" }}
          </span>
        </div>
        @include("components.product-table", ["products" => $products, "view_source" => "manufacturer"])
      </div>
    </div>
  </body>
</html>
