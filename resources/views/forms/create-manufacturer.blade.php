@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")
  <form
    action="{{ route("create.manufacturer.action") }}"
    method="POST"
    enctype="multipart/form-data"
    class="flex flex-col px-10 py-3 pt-5 sm:pt-8"
  >
    @csrf
    <h1 class="text-3xl font-semibold">CREATE MANUFACTURER</h1>
    <p>Fill in the form below to create a new manufacturer.</p>

    <label for="name" class="mt-6">
      NAME
      <span class="text-red-500">*</span>
    </label>
    <input
      type="text"
      name="name"
      id="name"
      placeholder="Enter a valid manufacturer name"
      required
      class="mt-1 border border-black p-3 font-light"
    />

    <label for="email" class="mt-6">EMAIL</label>
    <input
      type="email"
      name="email"
      id="email"
      placeholder="Enter a valid email address"
      class="mt-1 border border-black p-3 font-light"
    />

    <label for="phone" class="mt-6">PHONE</label>
    <input
      type="text"
      name="phone"
      id="phone"
      placeholder="Enter a valid phone number"
      class="mt-1 border border-black p-3 font-light"
    />

    <label for="website_link" class="mt-6">WEBSITE LINK</label>
    <input
      type="text"
      name="website_link"
      id="website_link"
      placeholder="Enter a valid website link"
      class="mt-1 border border-black p-3 font-light"
    />

    <label for="description" class="mt-6">DESCRIPTION</label>
    <textarea
      name="description"
      id="description"
      cols="30"
      rows="3"
      placeholder="Enter a valid manufacturer description or leave blank"
      class="mt-1 resize-none border border-black p-3 font-light"
    ></textarea>

    <label for="image" class="mt-6">MANUFACTURER PROFILE IMAGE</label>
    <input type="file" name="image" id="image" class="mt-1 border border-black p-3 font-light" />

    <button type="submit" class="mt-8 border bg-black p-3 font-medium text-white">SUBMIT</button>
  </form>
@endsection
