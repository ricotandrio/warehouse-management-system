<table class="min-w-full divide-y divide-gray-200 border">
  <thead class="bg-gray-50 text-black">
    <tr>
      <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal rtl:text-right">Name</th>

      <th scope="col" class="px-12 py-3.5 text-left text-sm font-normal rtl:text-right">Price</th>

      <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal rtl:text-right">Stock Quantity</th>

      <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal rtl:text-right">Action</th>
    </tr>
  </thead>
  <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
    @foreach ($products as $product)
      <tr>
        <td class="whitespace-nowrap px-4 py-4 text-sm font-medium">
          <div>
            <h2 class="text-sm font-medium text-black">
              {{ $product->name }}
            </h2>
            <h2 class="font-medium text-gray-500">
              {{ $product->manufacturer->name }}
            </h2>
          </div>
        </td>
        <td class="whitespace-nowrap px-12 py-4 text-sm font-medium">
          <div class="inline gap-x-2 py-1 text-sm font-normal dark:bg-gray-800">
            IDR {{ number_format($product->price, 0, ",", ".") }}
          </div>
        </td>

        <td class="whitespace-nowrap px-4 py-4 text-sm">
          <div>
            <p class="line-clamp-1 text-gray-500">
              {{ $product->stock_quantity }}
            </p>
          </div>
        </td>
        <td class="mt-4 flex h-10 flex-row items-center justify-start pr-8 text-sm">
          <a
            href="{{ route("view.product.detail.page", ["product_id" => $product->id]) }}"
            class="flex h-full flex-row items-center justify-center bg-gray-500 py-2 pl-4 pr-8 text-white hover:opacity-60"
          >
            <img class="ml-3 mr-2 h-5 w-5" src="{{ asset("/storage/icon/eyes.svg") }}" alt="eyes_icon" />
            VIEW
          </a>
          <a
            href=""
            class="ml-4 flex h-full flex-row items-center justify-center bg-blue-500 py-2 pl-4 pr-8 text-white hover:opacity-60"
          >
            <img class="ml-3 mr-2 h-5 w-5" src="{{ asset("/storage/icon/pencil.svg") }}" alt="eyes_icon" />

            EDIT
          </a>
          <div class="ml-4 h-full">
            <form
              action="{{ route("delete.product.action", ["product_id" => $product->id]) }}"
              method="POST"
              class="inline"
            >
              @csrf
              @method("DELETE")
              <button
                type="submit"
                class="flex h-full flex-row items-center justify-center bg-red-500 py-2 pl-4 pr-8 text-white hover:opacity-60"
              >
                <img class="ml-3 mr-2 h-5 w-5" src="{{ asset("/storage/icon/trash_bin.svg") }}" alt="eyes_icon" />

                DELETE
              </button>
            </form>
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<script>
  document.getElementById('delete_button').addEventListener('click', function () {
    var result = confirm('Are you sure you want to delete this product?');
    if (result) {
      document.getElementById('delete_form').submit();
    }
  });
</script>
