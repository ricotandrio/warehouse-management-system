@extends("layouts.app")
@include("components.notification")

@section("content")
  <form 
    action="/form/action/create-product-category" 
    method="POST"
    class="flex flex-col pt-5 sm:pt-3"
  >
    @csrf
    <h1 class="text-3xl">CREATE PRODUCT CATEGORY</h1>
    <p>Fill in the form below to create a new product category.</p>
    
    <label for="name" class="mt-6">NAME <span class="text-red-500">*</span></label>
    <input 
      type="text" 
      name="name" 
      id="name" 
      placeholder="Enter a valid product category name"
      required
      class="border p-3 border-black font-light mt-1" 
    />

    <label for="description" class="mt-6">DESCRIPTION</label>
    <textarea 
      name="description" 
      id="description" 
      cols="30" 
      rows="3" 
      r
      placeholder="Enter a valid product category description or leave blank"
      class="border p-3 border-black font-light mt-1 resize-none"
    ></textarea>

    <button
      type="submit"
      class="border p-3 bg-black text-white mt-8 font-medium"
    >
      SUBMIT
    </button>

  </form>
@endsection