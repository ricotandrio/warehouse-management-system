<table class="min-w-full divide-y divide-gray-200 border">
  <thead class="bg-gray-50 text-black">
    <tr>
      <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal rtl:text-right">Name</th>

      <th scope="col" class="px-12 py-3.5 text-left text-sm font-normal rtl:text-right">Created At</th>

      <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal rtl:text-right">Updated At</th>

      <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal rtl:text-right">Action</th>
    </tr>
  </thead>
  <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
    @foreach ($categories as $category)
      <tr>
        <td class="whitespace-nowrap px-4 py-4 text-sm font-medium">
          <div>
            <h2 class="text-sm font-medium text-black">
              {{ $category->name }}
            </h2>
            <div class="w-[50vw]">
              <h2 class="truncate text-ellipsis font-medium text-gray-500">
                {{ $category->description ?? "No description" }}
              </h2>
            </div>
          </div>
        </td>
        <td class="whitespace-nowrap px-12 py-4 text-sm font-medium">
          <div class="inline gap-x-2 py-1 text-sm font-normal">
            {{ $category->created_at }}
          </div>
        </td>

        <td class="whitespace-nowrap px-4 py-4 text-sm">
          <div class="mr-5">
            <p class="line-clamp-1">
              {{ $category->updated_at ?? "Never been updated" }}
            </p>
          </div>
        </td>
        <td class="mt-4 flex h-10 w-[50vw] flex-row items-center justify-start pr-8 text-sm">
          <a
            href="{{ route("product-category.product.page", ["product_category" => $category]) }}"
            class="flex h-full flex-row items-center justify-center bg-gray-500 py-2 pl-4 pr-8 text-white hover:opacity-60"
          >
            <img class="ml-3 mr-2 h-5 w-5" src="{{ asset("/storage/icon/eyes.svg") }}" alt="eyes_icon" />
            VIEW
          </a>
          <a
            href="/404"
            class="ml-4 flex h-full flex-row items-center justify-center bg-blue-500 py-2 pl-4 pr-8 text-white hover:opacity-60"
          >
            <img class="ml-3 mr-2 h-5 w-5" src="{{ asset("/storage/icon/pencil.svg") }}" alt="eyes_icon" />

            EDIT
          </a>
          <div class="ml-4 h-full">
            <form
              action="{{ route("delete.product-category.action", ["product_category" => $category]) }}"
              method="POST"
              class="inline"
            >
              @csrf
              @method("DELETE")
              <button
                onclick="handleDelete()"
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
  function handleDelete() {
    var result = confirm('Are you sure you want to delete this product?');

    if (!result) {
      event.preventDefault();
    }
  }
</script>
