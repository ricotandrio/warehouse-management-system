@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")
  <section class="flex flex-col items-center justify-center bg-black py-3">
    <div class="py-2">
      <a
        href="{{ route("dashboard.viewer.page") }}"
        class="leading-2 peer block text-center text-xs font-medium text-white"
      >
        Guest Dashboard
      </a>
      <div class="h-0.5 w-0 transform bg-white duration-75 ease-linear peer-hover:w-full"></div>
    </div>
  </section>
  <main class="lex relative w-full flex-col items-center justify-start">
    <section class="mt-5 w-full px-7">
      <div id="utility-menu-button" class="cursor-pointer p-3 hover:opacity-60">
        <svg width="24" height="24" fill="#000000" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
          <g id="SVGRepo_iconCarrier">
            <path
              d="M0 0h4v4H0V0zm0 6h4v4H0V6zm0 6h4v4H0v-4zM6 0h4v4H6V0zm0 6h4v4H6V6zm0 6h4v4H6v-4zm6-12h4v4h-4V0zm0 6h4v4h-4V6zm0 6h4v4h-4v-4z"
              fill-rule="evenodd"
            ></path>
          </g>
        </svg>
      </div>
    </section>
    <section
      id="utility-menu"
      class="absolute left-10 top-8 mt-8 flex-col border bg-white py-5 pr-20 pt-8 opacity-0 duration-200"
    >
      @foreach ([
          [
            "name" => "Create Product",
            "route" => "create.product.page"
          ],
          [
            "name" => "Create Manufacturer",
            "route" => "create.manufacturer.page"
          ],
          [
            "name" => "Create Product Category",
            "route" => "create.product-category.page"
          ],
          [
            "name" => "Update User",
            "route" => "create.product-category.page"
          ]
        ]
        as $item)
        <div class="group mb-3 ml-4 flex flex-row">
          <svg
            class="opacity-0 duration-300 ease-linear group-hover:opacity-100"
            width="24"
            height="24"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
          >
            <path
              d="M10 16L14 12L10 8"
              stroke="#200E32"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
          <a href="{{ route($item["route"]) }}" class="">
            {{ $item["name"] }}
          </a>
        </div>
      @endforeach
    </section>

    <section class="mt-10 flex w-full justify-between px-10">
      {{-- this should be filter bar --}}
      <h1>Filter</h1>
      <h1>Price</h1>
    </section>

    <section class="mt-16 w-full px-5 pb-10 sm:px-10">
      <div class="mt mb-5">
        @foreach (["products", "manufacturers", "categories"] as $type)
          @if ($selected == $type)
            <a
              href=""
              class="mr-1 cursor-not-allowed border-2 border-black bg-black px-2 py-1 text-sm font-medium text-white"
            >
              {{ ucfirst($type) }}
            </a>
          @else
            <a
              href="{{ route("dashboard.admin.page", array_merge(request()->query(), ["selected" => $type])) }}"
              class="mr-1 border-2 border-black px-2 py-1 text-sm font-medium hover:opacity-60"
            >
              {{ ucfirst($type) }}
            </a>
          @endif
        @endforeach
      </div>

      @if (count($products) === 0)
        <div class="flex items-center justify-center mt-10">
          <h1>There's no product available.</h1>
        </div>
      @else
        <div class="flex flex-col overflow-hidden border">
          <div class="-my-2 -ml-4 overflow-x-auto sm:-ml-6 lg:-ml-8">
            <div class="inline-block min-w-full py-2 align-middle md:pl-6 lg:pl-8">
              <div class="overflow-hidden">
                  <table class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-50 text-black">
                      <tr>
                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal rtl:text-right">
                          <a href="" class="flex items-center gap-x-3 focus:outline-none">
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

                        <th scope="col" class="px-12 py-3.5 text-left text-sm font-normal rtl:text-right">Price</th>

                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal rtl:text-right">Description</th>

                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-normal rtl:text-right">Action</th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                      
                      @foreach ($products as $product)
                        <tr>
                          <td class="whitespace-nowrap px-4 py-4 text-sm font-medium">
                            <div>
                              <a
                                href="{{ route("view.product.detail.page", ["product_id" => $product->id]) }}"
                                class="font-medium text-black hover:decoration cursor-pointer text-sm hover:decoration-black hover:underline"
                              >
                                {{ $product->name }}
                              </a>
                              <h2 class="font-medium text-gray-500 ">
                                {{ $product->name }}
                              </h2>
                            </div>
                          </td>
                          <td class="whitespace-nowrap px-12 py-4 text-sm font-medium">
                            <div class="inline gap-x-2 py-1 text-sm font-normal dark:bg-gray-800">
                              IDR {{ $product->price }}
                            </div>
                          </td>

                          <td class="whitespace-nowrap px-4 py-4 text-sm">
                            <div>
                              <p class="line-clamp-1 text-gray-500">
                                {{ $product->name }}
                              </p>
                            </div>
                          </td>
                          <td class="mt-4 flex flex-row items-center justify-start text-sm">
                            <a
                              href=""
                              class="flex flex-row items-center justify-center bg-blue-500 py-2 pl-4 pr-5 text-white"
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
                                  class="flex flex-row items-center justify-center bg-red-500 py-2 pl-4 pr-5 text-white"
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
              </div>
            </div>
          </div>
        </div>
      @endif
    </section>
  </main>

  <script>
    const utilityMenuButton = document.getElementById('utility-menu-button');
    const utilityMenu = document.getElementById('utility-menu');

    var isUtilityMenuOpen = false;

    utilityMenuButton.addEventListener('click', () => {
      if (isUtilityMenuOpen) {
        utilityMenu.style.opacity = '0';
      } else {
        utilityMenu.style.opacity = '1';
      }
      isUtilityMenuOpen = !isUtilityMenuOpen;
    });
  </script>
@endsection
