@extends("layouts.app")
@include("components.notification")

@section("content") 
  @include("components.navigation-bar")
  <form 
    action="{{ route('login.action') }}"
    method="POST"
    enctype="multipart/form-data"
    class="flex flex-col px-10 py-3 pt-5 sm:pt-3 pb-10"
  >
    @csrf
    <h1 class="text-3xl font-semibold mt-10">LOGIN</h1>
    <p class="mt-1 opacity-60">Log in with your username and password.</p>

    <label for="username" class="mt-6">USERNAME <span class="text-red-500">*</span></label>
    <input 
      type="text" 
      name="username" 
      id="username" 
      placeholder="Enter a valid username"
      required
      class="border p-3 border-black font-light mt-1" 
    />

    <label for="password" class="mt-6">PASSWORD  <span class="text-red-500">*</span></label>
    <input
      type="password"
      name="password"
      id="password"
      placeholder="Enter a valid password"
      required
      class="border p-3 border-black font-light mt-1"
    />

    <button
      type="submit"
      class="border p-3 bg-black text-white mt-10 font-medium hover:opacity-60"
    >
      LOG IN
    </button>

    <div class="w-full flex items-center justify-between mt-3">
      <p>Doesn't have an account yet ? 
        <a href="{{ route('register.page') }}" class="underline font-medium hover:opacity-60">Register Here</a>
      </p>
      <a href="" class="underline font-medium hover:opacity-60">FORGOT PASSWORD?</a>
    </div>
  </form>
@endsection