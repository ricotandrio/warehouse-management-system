@extends("layouts.app")
@include("components.notification")

@section("content")
  <form 
    action="/form/action/create-product" 
    method="POST" 
    enctype="multipart/form-data"
    class="flex flex-col pt-5 sm:pt-3"
  >
    @csrf
    <h1 class="text-3xl">CREATE PRODUCT</h1>
    <p>Fill in the form below to create a new product.</p>

    <label for="name" class="mt-6">NAME <span class="text-red-500">*</span></label>
    <input 
      type="text" 
      name="name" 
      id="name" 
      placeholder="Enter a valid product name"
      required
      class="border p-3 border-black font-light mt-1" 
    />
    
    <label for="sku" class="mt-6">SKU <span class="text-red-500">*</span></label>
    <input 
      type="text" 
      name="sku" 
      id="sku" 
      placeholder="Enter a valid SKU"
      required
      class="border p-3 border-black font-light mt-1"
    />
    
    <label for="description" class="mt-6">DESCRIPTION</label>
    <textarea 
      name="description" 
      id="description" 
      cols="30" 
      rows="3" 
      placeholder="Enter a valid product description or leave blank"
      class="border p-3 border-black font-light mt-1 resize-none"
    ></textarea>
    
    <label for="price" class="mt-6">PRICE <span class="text-red-500">*</span></label>
    <input 
      type="number" 
      name="price" 
      id="price" 
      placeholder="Enter a valid product price"
      required
      class="border p-3 border-black font-light mt-1"
    />

    <label for="stock_quantity" class="mt-6">STOCK QUANTITY <span class="text-red-500">*</span></label>
    <input 
      type="number" 
      name="stock_quantity" 
      id="stock_quantity" 
      placeholder="Stock Quantity"
      required
      class="border p-3 border-black font-light mt-1"
    />

    <label class="mt-6">PRODUCT MANUFACTURER <span class="text-red-500">*</span></label>
    <select 
      name="manufacturer_id" 
      id="manufacturer_id" 
      class="border p-3 border-black font-light mt-1"
    >
      <option value="">Select a manufacturer</option>
      @foreach ($manufacturers as $manufacturer)
        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
      @endforeach
    </select>

    <label class="mt-6">PRODUCT CATEGORY <span class="text-red-500">*</span></label>
    <select 
      name="category_id" 
      id="category_id" 
      class="border p-3 border-black font-light mt-1"
    >
      <option value="">Select a category</option>
      @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
    
    <label for="image" class="mt-6">PRODUCT IMAGE</label>
    <input 
      type="file" 
      name="image" 
      id="image" 
      class="border p-3 border-black font-light mt-1"
    />

    <button
      type="submit"
      class="border p-3 bg-black text-white mt-8 font-medium"
    >
      SUBMIT
    </button>

  </form>
@endsection