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
      <div class="p-3">
        <img
          src="{{ asset("/storage/icon/super_menu.svg") }}"
          alt="super_menu_icon"
          id="utility-menu-open"
          class="h-6 w-6 cursor-pointer hover:opacity-60"
        />
        
      </div>
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

      @if ((count($products) === 0 && $selected === "products") || (count($manufacturers) === 0 && $selected === "manufacturers") || (count($categories) === 0 && $selected === "categories"))
        <div class="mt-10 flex items-center justify-center">
          <h1>There's no view available.</h1>
        </div>
      @else
        <div class="flex flex-col overflow-hidden border">
          <div class="-my-2 -ml-4 overflow-x-auto sm:-ml-6 lg:-ml-8">
            <div class="inline-block min-w-full py-2 align-middle md:pl-6 lg:pl-8">
              <div class="overflow-hidden">
                @if ($selected === "categories")
                  @include("admins.category-table")
                @elseif ($selected === "manufacturers")
                  @include("admins.manufacturer-table")
                @else
                  @include("admins.product-table")
                @endif
              </div>
            </div>
          </div>
        </div>
      @endif
    </section>

    <section
      id="utility-menu"
      class="fixed top-0 -z-10 h-screen w-full overflow-y-scroll bg-black bg-opacity-50 opacity-0 duration-100 ease-linear"
    >
      <div class="absolute left-0 min-h-screen w-[30%] bg-white p-10">
        <div class="flex w-full flex-row items-center justify-start border-b-2 border-black pb-5">
          <div id="utility-menu-close" class="inline-flex cursor-pointer hover:opacity-60">
            <svg
              width="24"
              height="24"
              xmlns="http://www.w3.org/2000/svg"
              width="800px"
              height="800px"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M20.7457 3.32851C20.3552 2.93798 19.722 2.93798 19.3315 3.32851L12.0371 10.6229L4.74275 3.32851C4.35223 2.93798 3.71906 2.93798 3.32854 3.32851C2.93801 3.71903 2.93801 4.3522 3.32854 4.74272L10.6229 12.0371L3.32856 19.3314C2.93803 19.722 2.93803 20.3551 3.32856 20.7457C3.71908 21.1362 4.35225 21.1362 4.74277 20.7457L12.0371 13.4513L19.3315 20.7457C19.722 21.1362 20.3552 21.1362 20.7457 20.7457C21.1362 20.3551 21.1362 19.722 20.7457 19.3315L13.4513 12.0371L20.7457 4.74272C21.1362 4.3522 21.1362 3.71903 20.7457 3.32851Z"
                fill="#0F0F0F"
              />
            </svg>
            <h1 class="ml-2 mt-0.5 text-sm">CLOSE</h1>
          </div>
        </div>
        <h1 class="mt-5 text-xl font-medium text-gray-800">Warehouse</h1>
        <ul class="mt-10 flex flex-col gap-4">
          <li class="flex flex-row gap-3 hover:opacity-60">
            <svg
              width="24"
              height="24"
              viewBox="0 0 512 512"
              version="1.1"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              fill="#000000"
            >
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <title>product</title>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="icon" fill="#000000" transform="translate(64.000000, 34.346667)">
                    <path
                      d="M192,7.10542736e-15 L384,110.851252 L384,332.553755 L192,443.405007 L1.42108547e-14,332.553755 L1.42108547e-14,110.851252 L192,7.10542736e-15 Z M127.999,206.918 L128,357.189 L170.666667,381.824 L170.666667,231.552 L127.999,206.918 Z M42.6666667,157.653333 L42.6666667,307.920144 L85.333,332.555 L85.333,182.286 L42.6666667,157.653333 Z M275.991,97.759 L150.413,170.595 L192,194.605531 L317.866667,121.936377 L275.991,97.759 Z M192,49.267223 L66.1333333,121.936377 L107.795,145.989 L233.374,73.154 L192,49.267223 Z"
                      id="Combined-Shape"
                    ></path>
                  </g>
                </g>
              </g>
            </svg>
            <a href="{{ route("create.product.page") }}">Create Product</a>
          </li>
          <li class="flex flex-row gap-3 hover:opacity-60">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path
                  d="M2.92444 4.12856C2.98896 2.93485 3.9757 2 5.17116 2H6.32894C7.52439 2 8.51114 2.93485 8.57566 4.12856L9.4135 19.6286C9.48315 20.917 8.45714 22 7.16678 22H4.33332C3.04296 22 2.01695 20.917 2.0866 19.6286L2.92444 4.12856Z"
                  fill="#212121"
                ></path>
                <path
                  d="M9.51184 22C10.1114 21.3751 10.4626 20.5125 10.4119 19.5746L9.85566 9.28385L14.5218 5.42222C14.7456 5.23698 15.0563 5.19768 15.3192 5.32137C15.5821 5.44506 15.75 5.70947 15.75 6.00002V10.2404L20.7306 5.45898C20.9474 5.25083 21.2675 5.19223 21.544 5.31007C21.8205 5.42792 22 5.69946 22 6.00002V19.75C22 20.9927 20.9926 22 19.75 22H9.51184ZM13 20.5H18V16C18 15.4477 17.5523 15 17 15H14C13.4477 15 13 15.4477 13 16V20.5Z"
                  fill="#212121"
                ></path>
              </g>
            </svg>
            <a href="{{ route("create.manufacturer.page") }}">Create Manufacturer</a>
          </li>
          <li class="flex flex-row gap-3 hover:opacity-60">
            <svg
              width="24"
              height="24"
              fill="#000000"
              viewBox="0 0 64 64"
              version="1.1"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              xml:space="preserve"
              xmlns:serif="http://www.serif.com/"
              style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2"
            >
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <rect id="Icons" x="-384" y="-320" width="1280" height="800" style="fill: none"></rect>
                <g id="Icons1" serif:id="Icons">
                  <g id="Strike"></g>
                  <g id="H1"></g>
                  <g id="H2"></g>
                  <g id="H3"></g>
                  <g id="list-ul"></g>
                  <g id="hamburger-1"></g>
                  <g id="hamburger-2"></g>
                  <g id="list-ol"></g>
                  <g id="list-task"></g>
                  <g id="trash"></g>
                  <g id="vertical-menu"></g>
                  <g id="horizontal-menu"></g>
                  <g id="sidebar-2"></g>
                  <g id="Pen"></g>
                  <g id="Pen1" serif:id="Pen"></g>
                  <g id="clock"></g>
                  <g id="external-link"></g>
                  <g id="hr"></g>
                  <g id="info"></g>
                  <g id="warning"></g>
                  <g id="plus-circle"></g>
                  <g id="minus-circle"></g>
                  <g id="vue"></g>
                  <g id="cog"></g>
                  <g id="logo"></g>
                  <g id="radio-check"></g>
                  <g id="eye-slash"></g>
                  <g id="eye"></g>
                  <g id="toggle-off"></g>
                  <g id="shredder"></g>
                  <g>
                    <path
                      d="M9.89,30.496c-1.14,1.122 -1.784,2.653 -1.791,4.252c-0.006,1.599 0.627,3.135 1.758,4.266c3.028,3.028 7.071,7.071 10.081,10.082c2.327,2.326 6.093,2.349 8.448,0.051c5.91,-5.768 16.235,-15.846 19.334,-18.871c0.578,-0.564 0.905,-1.338 0.905,-2.146c0,-4.228 0,-17.607 0,-17.607l-17.22,0c-0.788,0 -1.544,0.309 -2.105,0.862c-3.065,3.018 -13.447,13.239 -19.41,19.111Zm34.735,-15.973l0,11.945c0,0.811 -0.329,1.587 -0.91,2.152c-3.069,2.981 -13.093,12.718 -17.485,16.984c-1.161,1.127 -3.012,1.114 -4.157,-0.031c-2.387,-2.386 -6.296,-6.296 -8.709,-8.709c-0.562,-0.562 -0.876,-1.325 -0.872,-2.12c0.003,-0.795 0.324,-1.555 0.892,-2.112c4.455,-4.373 14.545,-14.278 17.573,-17.25c0.561,-0.551 1.316,-0.859 2.102,-0.859c3.202,0 11.566,0 11.566,0Zm-7.907,2.462c-1.751,0.015 -3.45,1.017 -4.266,2.553c-0.708,1.331 -0.75,2.987 -0.118,4.356c0.836,1.812 2.851,3.021 4.882,2.809c2.042,-0.212 3.899,-1.835 4.304,-3.896c0.296,-1.503 -0.162,-3.136 -1.213,-4.251c-0.899,-0.953 -2.18,-1.548 -3.495,-1.57c-0.031,-0.001 -0.062,-0.001 -0.094,-0.001Zm0.008,2.519c1.105,0.007 2.142,0.849 2.343,1.961c0.069,0.384 0.043,0.786 -0.09,1.154c-0.393,1.079 -1.62,1.811 -2.764,1.536c-1.139,-0.274 -1.997,-1.489 -1.802,-2.67c0.177,-1.069 1.146,-1.963 2.27,-1.981c0.014,0 0.029,0 0.043,0Z"
                    ></path>
                    <path
                      d="M48.625,13.137l0,4.001l3.362,0l0,11.945c0,0.811 -0.328,1.587 -0.909,2.152c-3.069,2.981 -13.093,12.717 -17.485,16.983c-1.161,1.128 -3.013,1.114 -4.157,-0.03l-0.034,-0.034l-1.016,0.993c-0.663,0.646 -1.437,1.109 -2.259,1.389l1.174,1.174c2.327,2.327 6.093,2.35 8.447,0.051c5.91,-5.768 16.235,-15.845 19.335,-18.87c0.578,-0.565 0.904,-1.339 0.904,-2.147c0,-4.227 0,-17.607 0,-17.607l-7.362,0Z"
                    ></path>
                  </g>
                  <g id="spinner--loading--dots-" serif:id="spinner [loading, dots]"></g>
                  <g id="react"></g>
                  <g id="check-selected"></g>
                  <g id="turn-off"></g>
                  <g id="code-block"></g>
                  <g id="user"></g>
                  <g id="coffee-bean"></g>
                  <g id="coffee-beans"><g id="coffee-bean1" serif:id="coffee-bean"></g></g>
                  <g id="coffee-bean-filled"></g>
                  <g id="coffee-beans-filled"><g id="coffee-bean2" serif:id="coffee-bean"></g></g>
                  <g id="clipboard"></g>
                  <g id="clipboard-paste"></g>
                  <g id="clipboard-copy"></g>
                  <g id="Layer1"></g>
                </g>
              </g>
            </svg>
            <a href="{{ route("create.product-category.page") }}">Create Category</a>
          </li>
          <li class="flex flex-row gap-3 hover:opacity-60">
            <svg
              width="24"
              height="24"
              fill="#000000"
              height="200px"
              width="200px"
              version="1.1"
              id="Filled_Icons"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              x="0px"
              y="0px"
              viewBox="0 0 24 24"
              enable-background="new 0 0 24 24"
              xml:space="preserve"
            >
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <g id="Transaction-Filled">
                  <path d="M14,11V8H1V4h13V1l7,5L14,11z M3,18l7,5v-3h13v-4H10v-3L3,18z"></path>
                </g>
              </g>
            </svg>
            <a href="{{ route("create.transaction.page") }}">Create Transaction</a>
          </li>
        </ul>
      </div>
    </section>
  </main>

  <script>
    const utilityMenuOpen = document.getElementById('utility-menu-open');
    const utilityMenuClose = document.getElementById('utility-menu-close');
    const utilityMenu = document.getElementById('utility-menu');

    utilityMenuOpen.addEventListener('click', () => {
      utilityMenu.style.opacity = '100%';
      utilityMenu.style.zIndex = '1000';
    });

    utilityMenuClose.addEventListener('click', () => {
      utilityMenu.style.opacity = '0%';
      utilityMenu.style.zIndex = '-1';
    });

    utilityMenu.addEventListener('click', () => {
      utilityMenu.style.opacity = '0%';
      utilityMenu.style.zIndex = '-1';
    });

    utilityMenu.children[0].addEventListener('click', (event) => {
      event.stopPropagation();
    });
  </script>
@endsection
