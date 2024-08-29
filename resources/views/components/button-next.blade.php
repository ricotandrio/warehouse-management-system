<a
  href="{{
    route(
      "dashboard",
      array_merge(request()->all(), [
        "page" => $products->currentPage() + 1,
      ]),
    );
  }}"
  class="flex w-1/2 cursor-pointer items-center justify-center gap-x-2 rounded-md border bg-white px-5 py-2 text-sm capitalize text-gray-700 transition-colors duration-200 hover:bg-gray-100 sm:w-auto dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-800"
>
  <span>Next</span>

  <svg
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 24 24"
    stroke-width="1.5"
    stroke="currentColor"
    class="h-5 w-5 rtl:-scale-x-100"
  >
    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
  </svg>
</a>
