@extends("layouts.app")
@include("components.notification")

@section("content")
  <form 
    action="{{ route('create.manufacturer.action') }}"
    method="POST"
    enctype="multipart/form-data"
    class="flex flex-col px-5 py-3 pt-5 sm:pt-3"
  >
    @csrf
    <h1 class="text-3xl">CREATE MANUFACTURER</h1>
    <p>Fill in the form below to create a new manufacturer.</p>
    
    <label for="name" class="mt-6">NAME <span class="text-red-500">*</span></label>
    <input 
      type="text" 
      name="name" 
      id="name" 
      placeholder="Enter a valid manufacturer name"
      required
      class="border p-3 border-black font-light mt-1" 
    />

    <label for="email" class="mt-6">EMAIL</label>
    <input
      type="email"
      name="email"
      id="email"
      placeholder="Enter a valid email address"
      class="border p-3 border-black font-light mt-1"
    />

    <label for="phone" class="mt-6">PHONE</label>
    <input
      type="text"
      name="phone"
      id="phone"
      placeholder="Enter a valid phone number"
      class="border p-3 border-black font-light mt-1"
    />

    <label for="website_link" class="mt-6">WEBSITE LINK</label>
    <input
      type="text"
      name="website_link"
      id="website_link"
      placeholder="Enter a valid website link"
      class="border p-3 border-black font-light mt-1"
    />

    <label for="description" class="mt-6">DESCRIPTION</label>
    <textarea 
      name="description" 
      id="description" 
      cols="30" 
      rows="3" 
      placeholder="Enter a valid manufacturer description or leave blank"
      class="border p-3 border-black font-light mt-1 resize-none"
    ></textarea>

    <label for="image" class="mt-6">MANUFACTURER PROFILE IMAGE</label>
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