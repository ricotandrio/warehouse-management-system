@extends("layouts.app")
@include("components.notification")

@section("content")
	@include("components.navigation-bar")
	
	<main class="w-full">
		<section class="px-10 grid grid-cols-1 sm:grid-cols-2">
			<div class="border aspect-square overflow-hidden">
        <img src="{{ auth()->user()->profile_image }}" alt="{{ auth()->user()->username }}" class="w-full h-full object-cover rounded-full">
      </div>
      <div
        class="p-10 border flex flex-col"
      >
      <h1 class="text-3xl font-semibold">PROFILE PAGE</h1>
      <p class="font-medium text-xs">ID: {{ auth()->user()->id }}</p>

        <label for="username" class="mt-8">
          USERNAME
        </label>
        <input
          type="text"
          name="username"
          id="username"
          disabled
          value="{{ auth()->user()->username }}"
          class="mt-1 border cursor-not-allowed border-black p-3 font-light"
        />

        <label for="role" class="mt-6">
          ROLE
        </label>
        <input
          type="text"
          name="role"
          id="role"
          disabled
          value="{{ auth()->user()->role }}"
          class="mt-1 border cursor-not-allowed border-black p-3 font-light"
        />

        <p class="mt-8 font-medium text-xs opacity-60 text-right">Created at: <span>{{ auth()->user()->created_at }}</span></p>
        <p class="font-medium text-xs opacity-60 text-right">Updated at: <span>{{ auth()->user()->updated_at }}</span></p>
      </div>

		</section>
	</main>
@endsection