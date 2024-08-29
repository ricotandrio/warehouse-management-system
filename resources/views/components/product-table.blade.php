<div class="mt-6 flex flex-col">
  <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
      <div class="overflow-hidden border border-gray-200 md:rounded-lg dark:border-gray-700">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
          <thead class="bg-gray-50 dark:bg-gray-800">
            <tr>
              <th
                scope="col"
                class="px-4 py-3.5 text-left text-sm font-normal text-gray-500 rtl:text-right dark:text-gray-400"
              >
                <a
                  href="{{
                    route(
                      $view_source,
                      array_merge(request()->all(), [
                        "order" => request()->query("order", "asc") === "asc" ? "desc" : "asc",
                      ]),
                    )
                  }}"
                  class="flex items-center gap-x-3 focus:outline-none"
                >
                  <span>Name</span>

                  <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z"
                      fill="currentColor"
                      stroke="currentColor"
                      stroke-width="0.1"
                    />
                    <path
                      d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z"
                      fill="currentColor"
                      stroke="currentColor"
                      stroke-width="0.1"
                    />
                    <path
                      d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z"
                      fill="currentColor"
                      stroke="currentColor"
                      stroke-width="0.3"
                    />
                  </svg>
                </a>
              </th>

              <th
                scope="col"
                class="px-12 py-3.5 text-left text-sm font-normal text-gray-500 rtl:text-right dark:text-gray-400"
              >
                Price
              </th>

              <th
                scope="col"
                class="px-4 py-3.5 text-left text-sm font-normal text-gray-500 rtl:text-right dark:text-gray-400"
              >
                Description
              </th>

              <th
                scope="col"
                class="px-4 py-3.5 text-left text-sm font-normal text-gray-500 rtl:text-right dark:text-gray-400"
              >
                Action
              </th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
            @foreach ($products->items() as $product)
              <tr>
                <td class="whitespace-nowrap px-4 py-4 text-sm font-medium">
                  <div>
                    <h2 class="font-medium text-gray-800 dark:text-white">
                      {{ $product["name"] }}
                    </h2>
                    <a
                      href="{{
                        route("manufacturer", [
                          "manufacturer_id" => $product->manufacturer->id,
                        ])
                      }}"
                      class="hover:decoration cursor-pointer text-sm font-normal text-gray-600 transition-all duration-300 hover:text-blue-500 hover:underline dark:text-gray-400"
                    >
                      {{ $product->manufacturer->name }}
                    </a>
                  </div>
                </td>
                <td class="whitespace-nowrap px-12 py-4 text-sm font-medium">
                  <div class="inline gap-x-2 py-1 text-sm font-normal dark:bg-gray-800">
                    Rp. {{ $product["price"] }}
                  </div>
                </td>

                <td class="whitespace-nowrap px-4 py-4 text-sm">
                  <div>
                    <p class="text-gray-500 dark:text-gray-400">
                      {{ $product["description"] }}
                    </p>
                  </div>
                </td>
                <td class="flex flex-row whitespace-nowrap px-4 py-4 text-sm">
                  <a
                    class="mr-2 flex cursor-pointer items-center justify-center gap-x-2 rounded-lg border bg-white px-3 py-1 text-gray-700 transition-colors duration-200 hover:bg-gray-100 sm:w-auto dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-800"
                  >
                    Detail
                  </a>
                  <a
                    class="mr-2 flex shrink-0 cursor-pointer items-center justify-center gap-x-2 rounded-lg bg-blue-500 px-3 py-1 tracking-wide text-white transition-colors duration-200 hover:bg-blue-600 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-500"
                  >
                    Edit
                  </a>

                  <form
                    action="{{ route("delete.product", ["product_id" => $product->id]) }}"
                    method="POST"
                    style="display: inline"
                  >
                    @csrf
                    @method("DELETE")
                    <button
                      type="submit"
                      class="shrink-0 gap-x-2 rounded-lg bg-red-500 px-3 py-1 tracking-wide text-white transition-colors duration-200 hover:bg-red-600 sm:w-auto dark:bg-red-600 dark:hover:bg-red-500"
                    >
                      Delete
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="mt-6 sm:flex sm:items-center sm:justify-between">
  <div class="text-sm text-gray-500 dark:text-gray-400">
    Page
    <span class="font-medium text-gray-700 dark:text-gray-100">
      {{ $products->currentPage() }} of {{ $products->lastPage() }}
    </span>
  </div>

  <div class="mt-4 flex items-center gap-x-4 sm:mt-0">
    @if ($products->currentPage() == 1 && $products->lastPage() !== 1)
      @include("components.button-next")
    @elseif ($products->currentPage() == $products->lastPage() && $products->lastPage() !== 1)
      @include("components.button-previous")
    @elseif ($products->currentPage() > 1 && $products->currentPage() < $products->lastPage() && $products->lastPage() !== 1)
      @include("components.button-previous")
      @include("components.button-next")
    @endif
  </div>
</div>
