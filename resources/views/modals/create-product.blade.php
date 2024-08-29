<section
  class="fixed left-0 top-0 z-[999] flex h-svh w-full items-center justify-center bg-gray-400 bg-opacity-35 backdrop-blur-md"
>
  <div class="mb-6 h-[90%] w-[90%] rounded bg-white p-4 px-4 shadow-lg md:p-8">
    <a
      href="{{
        $currentCreateProduct = route(
          "dashboard",
          array_merge(request()->all(), [
            "createProduct" => "false",
          ]),
        )
      }}"
      class="mb-3 flex items-center justify-start rounded-full px-2 text-xl transition-opacity duration-300 hover:text-red-500"
    >
      x
    </a>
    <div class="grid grid-cols-1 gap-4 gap-y-2 text-sm lg:grid-cols-3">
      <div class="text-gray-600">
        <p class="text-lg font-medium">Product Details</p>
        <p>Please fill out all the fields.</p>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
      </div>

      <form action="{{ route("create.product") }}" method="POST" class="lg:col-span-2">
        @csrf
        <div class="grid grid-cols-1 gap-4 gap-y-2 text-sm md:grid-cols-5">
          <div class="md:col-span-5">
            <label for="name">Name</label>
            <input
              type="text"
              name="name"
              id="name"
              class="mt-1 h-10 w-full rounded border bg-gray-50 px-4"
              placeholder="Soda Drink"
            />
          </div>

          <div class="md:col-span-5">
            <label for="description">Description</label>
            <input
              type="text"
              name="description"
              id="description"
              class="mt-1 h-10 w-full rounded border bg-gray-50 px-4"
              placeholder="A refreshing soda drink."
            />
          </div>

          <div class="md:col-span-3">
            <label for="price">Price in Rupiah</label>
            <input
              type="text"
              name="price"
              id="price"
              class="mt-1 h-10 w-full rounded border bg-gray-50 px-4"
              placeholder="2000"
            />
          </div>

          <div class="md:col-span-2">
            <label for="image_url">Image Url (if exists)</label>
            <input
              type="text"
              name="image_url"
              id="image_url"
              class="mt-1 h-10 w-full rounded border bg-gray-50 px-4"
              placeholder="https://image.cdn.com/soda.jpg"
            />
          </div>

          <div class="md:col-span-5">
            <label for="country">Manufacturer</label>
            <div class="mt-1 flex h-10 items-center rounded border border-gray-200 bg-gray-50">
              <select
                name="manufacturer_id"
                id="manufacturer_id"
                class="w-full appearance-none bg-transparent px-4 text-gray-800 outline-none"
              >
                @foreach ($manufacturers as $manufacturer)
                  <option value="{{ $manufacturer["id"] }}">{{ $manufacturer["name"] }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <button
          type="submit"
          class="hover:decoration my-5 rounded-md bg-blue-500 px-5 py-3 text-white hover:underline hover:decoration-white"
        >
          SUBMIT
        </button>
      </form>
    </div>
  </div>
</section>
