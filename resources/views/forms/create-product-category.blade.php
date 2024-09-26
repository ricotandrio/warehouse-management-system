@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")
  <form
    action="{{ route("create.product-category.action") }}"
    method="POST"
    class="flex flex-col px-10 py-3 pt-5 sm:pt-8"
  >
    @csrf
    <h1 class="text-3xl font-semibold">CREATE PRODUCT CATEGORY</h1>
    <p>Fill in the form below to create a new product category.</p>

    <label for="name" class="mt-6">
      NAME
      <span class="text-red-500">*</span>
    </label>
    <input
      type="text"
      name="name"
      id="name"
      placeholder="Enter a valid product category name"
      required
      class="mt-1 border border-black p-3 font-light"
    />

    <label for="description" class="mt-6">DESCRIPTION</label>
    <textarea
      name="description"
      id="description"
      cols="30"
      rows="3"
      r
      placeholder="Enter a valid product category description or leave blank"
      class="mt-1 resize-none border border-black p-3 font-light"
    ></textarea>

    <button type="submit" class="mt-8 border bg-black p-3 font-medium text-white">SUBMIT</button>
  </form>
@endsection
