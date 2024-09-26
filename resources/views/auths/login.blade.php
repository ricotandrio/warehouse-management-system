@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")
  <form
    action="{{ route("login.action") }}"
    method="POST"
    enctype="multipart/form-data"
    class="flex flex-col px-10 py-3 pb-10 pt-5 sm:pt-3"
  >
    @csrf
    <h1 class="mt-10 text-3xl font-semibold">LOGIN</h1>
    <p class="mt-1 opacity-60">Log in with your username and password.</p>

    <label for="username" class="mt-6">
      USERNAME
      <span class="text-red-500">*</span>
    </label>
    <input
      type="text"
      name="username"
      id="username"
      placeholder="Enter a valid username"
      required
      class="mt-1 border border-black p-3 font-light"
    />

    <label for="password" class="mt-6">
      PASSWORD
      <span class="text-red-500">*</span>
    </label>
    <input
      type="password"
      name="password"
      id="password"
      placeholder="Enter a valid password"
      required
      class="mt-1 border border-black p-3 font-light"
    />

    <button type="submit" class="mt-10 border bg-black p-3 font-medium text-white hover:opacity-60">LOG IN</button>

    <div class="mt-3 flex w-full items-center justify-between">
      <p>
        Doesn't have an account yet ?
        <a href="{{ route("register.page") }}" class="font-medium underline hover:opacity-60">Register Here</a>
      </p>
      <a href="" class="font-medium underline hover:opacity-60">FORGOT PASSWORD?</a>
    </div>
  </form>
@endsection
