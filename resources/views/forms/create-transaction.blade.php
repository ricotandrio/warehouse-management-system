@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")

  <form action="{{ route("create.transaction.action") }}" method="POST" class="flex flex-col px-10 pb-3">
    @csrf

    <div class="mt-5 flex w-full flex-col sm:flex-row sm:items-end sm:justify-between sm:gap-5">
      <div class="w-full sm:w-[80%]">
        <label for="product#1">
          PRODUCT 1
          <span class="text-red-500">*</span>
        </label>
        <select
          name="product#1"
          id="product#1"
          class="mt-1 w-full border border-black bg-white p-3 font-light"
          required
        >
          <option value=""></option>
          @foreach ($products as $product)
            <option value="{{ $product->id }}" class="block">{{ $product->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="flex flex-row justify-between sm:gap-5">
        <div class="flex flex-col">
          <label for="quantity#1" class="mt-3 flex flex-row">
            QUANTITY
            <span class="ml-1 text-red-500">*</span>
          </label>
          <input
            name="quantity#1"
            type="number"
            id="quantity#1"
            min="0"
            class="mt-1 border border-black p-3 font-light"
            required
          />
        </div>
        <div class="flex items-end">
          <button
            type="button"
            name="add"
            id="add"
            class="aspect-square w-12 cursor-pointer bg-black p-3 hover:opacity-60"
          >
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <title></title>
                <g id="Complete">
                  <g data-name="add" id="add-2">
                    <g>
                      <line
                        fill="none"
                        stroke="#ffffff"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        x1="12"
                        x2="12"
                        y1="19"
                        y2="5"
                      ></line>
                      <line
                        fill="none"
                        stroke="#ffffff"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        x1="5"
                        x2="19"
                        y1="12"
                        y2="12"
                      ></line>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </button>
        </div>
      </div>
    </div>

    <div id="productsInput"></div>

    <label for="type" class="mt-5">
      TYPE
      <span class="text-red-500">*</span>
    </label>
    <select name="type" id="type" class="mt-1 border border-black p-3 font-light" required>
      <option value="IN" selected>IN</option>
      <option value="OUT">OUT</option>
    </select>

    <label for="description" class="mt-6">DESCRIPTION</label>
    <textarea
      name="description"
      id="description"
      cols="30"
      rows="3"
      placeholder="Enter a valid transaction description or leave blank"
      class="mt-1 resize-none border border-black p-3 font-light"
    ></textarea>

    <button type="submit" class="mb-32 mt-14 border bg-black p-3 font-medium text-white">SUBMIT</button>
  </form>
  <script>
    var counter = 1;

    document.getElementById("add").addEventListener("click", function() {
      counter++;
      var newInputProduct = `
        <div id="productContainer#${counter}" class="mt-5 flex flex-col sm:flex-row w-full sm:items-end sm:justify-between sm:gap-5">
          <div class="w-full sm:w-[80%]">
            <label for="product#${counter}">
              PRODUCT ${counter}
              <span class="text-red-500">*</span>
            </label>
            <select name="product#${counter}" id="product#${counter}" class="font-light border border-black w-full bg-white p-3 mt-1" required>
              <option value=""></option>
              @foreach ($products as $product)
                <option value="{{ $product->id }}" class="block">{{ $product->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="flex flex-row justify-between sm:gap-5">
            <div class="flex flex-col">
              <label for="quantity#${counter}" class="flex flex-row mt-3">QUANTITY <span class="ml-1 text-red-500">*</span></label>
              <input name="quantity#${counter}" type="number" id="quantity#${counter}" min="0" class="mt-1 border border-black p-3 font-light" required>
            </div>
            <div class="flex items-end">
              <button onClick="handleRemoveProduct(${counter})" type="button" class="w-12 bg-red-500 aspect-square p-3 hover:opacity-60 cursor-pointer">
                <svg fill="#ffffff" viewBox="0 0 200 200" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><path d="M114,100l49-49a9.9,9.9,0,0,0-14-14L100,86,51,37A9.9,9.9,0,0,0,37,51l49,49L37,149a9.9,9.9,0,0,0,14,14l49-49,49,49a9.9,9.9,0,0,0,14-14Z"></path></g></svg>
              </button>
            </div>
          </div>
        </div>`;

      document.getElementById("productsInput").insertAdjacentHTML("beforeend", newInputProduct);
    });

    function handleRemoveProduct(child_number) {
      document.getElementById(`productContainer#${child_number}`).remove();
    }
  </script>
@endsection
