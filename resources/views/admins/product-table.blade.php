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
        <td class="mt-4 flex flex-row items-center justify-start text-sm">
          <a
            href="{{ route("view.product.detail.page", ["product_id" => $product->id]) }}"
            class="flex flex-row items-center justify-center bg-gray-500 py-2 pl-4 pr-5 text-white hover:opacity-60"
          >
            <svg
              width="16"
              height="16"
              class="mr-2"
              viewBox="0 -4 20 20"
              version="1.1"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              fill="#000000"
            >
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <title>view_simple [#815]</title>
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Dribbble-Light-Preview" transform="translate(-260.000000, -4563.000000)" fill="#ffffff">
                    <g id="icons" transform="translate(56.000000, 160.000000)">
                      <path
                        d="M216,4409.00052 C216,4410.14768 215.105,4411.07682 214,4411.07682 C212.895,4411.07682 212,4410.14768 212,4409.00052 C212,4407.85336 212.895,4406.92421 214,4406.92421 C215.105,4406.92421 216,4407.85336 216,4409.00052 M214,4412.9237 C211.011,4412.9237 208.195,4411.44744 206.399,4409.00052 C208.195,4406.55359 211.011,4405.0763 214,4405.0763 C216.989,4405.0763 219.805,4406.55359 221.601,4409.00052 C219.805,4411.44744 216.989,4412.9237 214,4412.9237 M214,4403 C209.724,4403 205.999,4405.41682 204,4409.00052 C205.999,4412.58422 209.724,4415 214,4415 C218.276,4415 222.001,4412.58422 224,4409.00052 C222.001,4405.41682 218.276,4403 214,4403"
                        id="view_simple-[#815]"
                      ></path>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
            VIEW
          </a>
          <a
            href=""
            class="ml-4 flex flex-row items-center justify-center bg-blue-500 py-2 pl-4 pr-5 text-white hover:opacity-60"
          >
            <svg
              width="16"
              height="16"
              class="mr-2"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
              stroke="#ffffff"
            >
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M20.8477 1.87868C19.6761 0.707109 17.7766 0.707105 16.605 1.87868L2.44744 16.0363C2.02864 16.4551 1.74317 16.9885 1.62702 17.5692L1.03995 20.5046C0.760062 21.904 1.9939 23.1379 3.39334 22.858L6.32868 22.2709C6.90945 22.1548 7.44285 21.8693 7.86165 21.4505L22.0192 7.29289C23.1908 6.12132 23.1908 4.22183 22.0192 3.05025L20.8477 1.87868ZM18.0192 3.29289C18.4098 2.90237 19.0429 2.90237 19.4335 3.29289L20.605 4.46447C20.9956 4.85499 20.9956 5.48815 20.605 5.87868L17.9334 8.55027L15.3477 5.96448L18.0192 3.29289ZM13.9334 7.3787L3.86165 17.4505C3.72205 17.5901 3.6269 17.7679 3.58818 17.9615L3.00111 20.8968L5.93645 20.3097C6.13004 20.271 6.30784 20.1759 6.44744 20.0363L16.5192 9.96448L13.9334 7.3787Z"
                  fill="#ffffff"
                ></path>
              </g>
            </svg>
            EDIT
          </a>
          <div class="ml-4">
            <form
              action="{{ route("delete.product.action", ["product_id" => $product->id]) }}"
              method="POST"
              class="inline"
            >
              @csrf
              @method("DELETE")
              <button
                type="submit"
                class="flex flex-row items-center justify-center bg-red-500 py-2 pl-4 pr-5 text-white hover:opacity-60"
              >
                <svg
                  width="16"
                  height="16"
                  class="mr-2"
                  viewBox="0 0 1024 1024"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="#000000"
                >
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <path
                      fill="#ffffff"
                      d="M160 256H96a32 32 0 0 1 0-64h256V95.936a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V192h256a32 32 0 1 1 0 64h-64v672a32 32 0 0 1-32 32H192a32 32 0 0 1-32-32V256zm448-64v-64H416v64h192zM224 896h576V256H224v640zm192-128a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32zm192 0a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32z"
                    ></path>
                  </g>
                </svg>
                DELETE
              </button>
            </form>
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
