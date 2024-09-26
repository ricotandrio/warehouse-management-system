@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")
  <form
    action="{{ route("register.action") }}"
    method="POST"
    enctype="multipart/form-data"
    class="flex flex-col px-10 py-3 pb-10 pt-5 sm:pt-3"
  >
    @csrf
    <h1 class="mt-10 text-3xl font-semibold">REGISTER</h1>
    <p class="mt-1 opacity-60">
      By creating an account, you agree to our
      <a href="{{ route("privacy-policy.page") }}" class="underline hover:opacity-60">privacy policy</a>
      and
      <a href="{{ route("terms-and-conditions.page") }}" class="underline hover:opacity-60">term of use</a>
      .
    </p>

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

    <label for="confirm_password" class="mt-6">
      CONFIRM PASSWORD
      <span class="text-red-500">*</span>
    </label>
    <input
      type="password"
      name="confirm_password"
      id="confirm_password"
      placeholder="Confirm Password"
      required
      class="mt-1 border border-black p-3 font-light"
    />

    <button type="submit" class="mt-10 border bg-black p-3 font-medium text-white hover:opacity-60">REGISTER</button>

    <div class="mt-3 flex w-full items-center justify-between">
      <p>
        Already have an account ?
        <a href="{{ route("login.page") }}" class="font-medium underline hover:opacity-60">Login Here</a>
      </p>
      <p>
        Need an EDITOR role ?
        <a href="" class="font-medium underline hover:opacity-60">Request Here</a>
      </p>
    </div>
  </form>
@endsection
