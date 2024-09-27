@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")
  <form
    action="{{ route("update-stock.action", ["product_id" => $product->id]) }}"
    method="POST"
    class="flex flex-col px-10 py-3 pt-5 sm:pt-8"
  >
    @csrf
    @method("PUT")
    <h1 class="text-3xl font-semibold">UPDATE STOCK</h1>
    <p>Fill in the form below to create new transaction for {{ $product->name }}.</p>

    <label for="latest_stock_quantity" class="mt-6">
      New Stock Quantity
      <span class="text-red-500">*</span>
    </label>
    <input
      type="number"
      name="latest_stock_quantity"
      id="latest_stock_quantity"
      placeholder="Enter a valid stock quantity"
      required
      min="0"
      class="mt-1 border border-black p-3 font-light"
    />
    <div class="mt-5 flex flex-row">
      <input type="checkbox" name="confirmation" id="confirmation" value="true" required />
      <label for="confirmation" class="ml-2">
        I confirm that I,
        <b><i>{{ auth()->user()->username }}</i></b>
        , want to update this user.
      </label>
    </div>
    <div class="mb-5 mt-8 text-center font-medium">
      <p>Current Stock Quantity: {{ $product->stock_quantity }}</p>
    </div>
    <button type="submit" class="border bg-black p-3 font-medium text-white">SUBMIT</button>
  </form>
@endsection
