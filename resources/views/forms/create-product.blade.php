@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")
  <form
    action="{{ route("create.product.action") }}"
    method="POST"
    enctype="multipart/form-data"
    class="flex flex-col px-10 py-3 pt-5 sm:pt-8"
  >
    @csrf
    <h1 class="text-3xl font-semibold">CREATE PRODUCT</h1>
    <p>Fill in the form below to create a new product.</p>

    <label for="name" class="mt-6">
      NAME
      <span class="text-red-500">*</span>
    </label>
    <input
      type="text"
      name="name"
      id="name"
      placeholder="Enter a valid product name"
      required
      class="mt-1 border border-black p-3 font-light"
    />

    <label for="sku" class="mt-6">
      SKU
      <span class="text-red-500">*</span>
    </label>
    <input
      type="text"
      name="sku"
      id="sku"
      placeholder="Enter a valid SKU"
      required
      class="mt-1 border border-black p-3 font-light"
    />

    <label for="description" class="mt-6">DESCRIPTION</label>
    <textarea
      name="description"
      id="description"
      cols="30"
      rows="3"
      placeholder="Enter a valid product description or leave blank"
      class="mt-1 resize-none border border-black p-3 font-light"
    ></textarea>

    <label for="price" class="mt-6">
      PRICE
      <span class="text-red-500">*</span>
    </label>
    <input
      type="number"
      name="price"
      id="price"
      placeholder="Enter a valid product price"
      required
      class="mt-1 border border-black p-3 font-light"
      min="0"
    />

    <label for="stock_quantity" class="mt-6">
      STOCK QUANTITY
      <span class="text-red-500">*</span>
    </label>
    <input
      type="number"
      name="stock_quantity"
      id="stock_quantity"
      placeholder="Stock Quantity"
      required
      class="mt-1 border border-black p-3 font-light"
    />

    <label class="mt-6">
      PRODUCT MANUFACTURER
      <span class="text-red-500">*</span>
    </label>
    <select name="manufacturer_id" id="manufacturer_id" class="mt-1 border border-black p-3 font-light">
      <option value="">Select a manufacturer</option>
      @foreach ($manufacturers as $manufacturer)
        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
      @endforeach
    </select>

    <label class="mt-6">
      PRODUCT CATEGORY
      <span class="text-red-500">*</span>
    </label>
    <select name="category_id" id="category_id" class="mt-1 border border-black p-3 font-light">
      <option value="">Select a category</option>
      @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>

    <label for="image" class="mt-6">PRODUCT IMAGE</label>
    <input type="file" name="image" id="image" class="mt-1 border border-black p-3 font-light" />

    <button type="submit" class="mt-8 border bg-black p-3 font-medium text-white">SUBMIT</button>
  </form>
@endsection
