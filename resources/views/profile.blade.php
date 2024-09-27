@extends("layouts.app")
@include("components.notification")

@section("content")
	@include("components.navigation-bar")
	
	<main class="w-full">
		<section class="px-10 grid grid-cols-1 sm:grid-cols-2">
			<div class="aspect-square overflow-hidden flex items-start justify-center">
        <img src="{{ $user->profile_image }}" alt="{{ $user->username }}" class="mt-10 w-1/2 h-1/2 object-cover">
      </div>
      <form
        action="{{ route('user.profile.update.action', ['user_id' => $user->id]) }}"
        method="POST"
        class="p-10 flex flex-col"
      >
        @csrf
        @method("PUT")

        <h1 class="text-3xl font-semibold">PROFILE PAGE</h1>
        <p class="font-medium text-xs">ID: {{ $user->id }}</p>

        <label for="username" class="mt-8">
          USERNAME
        </label>
        <input
          type="text"
          name="username"
          id="username"
          disabled
          value="{{ $user->username }}"
          class="mt-1 border cursor-not-allowed border-black p-3 font-light"
        />

        <label for="role" class="mt-6">
          ROLE
        </label>
        @if (auth()->user()->role === "ADMIN")
          <select name="role" id="role" class="mt-1 border border-black p-3 font-light" required>
            @foreach (['ADMIN', 'VIEWER', 'EDITOR'] as $role)
              <option value="{{ $role }}" {{ $user->role === $role ? 'selected' : '' }}>
                {{ $role }}
              </option>
            @endforeach
          </select>
        @else
          <input
            type="text"
            name="role"
            id="role"
            disabled
            value="{{ $user->role }}"
            class="mt-1 border cursor-not-allowed border-black p-3 font-light"
          />
        @endif

        <p class="mt-8 font-medium text-xs opacity-60 text-right">Created at: <span>{{ $user->created_at }}</span></p>
        <p class="font-medium text-xs opacity-60 text-right">Updated at: <span>{{ $user->updated_at }}</span></p>
        
        <div class="flex flex-row mt-5">
          <input type="checkbox" name="confirmation" id="confirmation" value="true" required>
          <label for="confirmation" class="ml-2">
            I confirm that I, <b><i> {{ auth()->user()->username }} </i></b>, want to update this user.
          </label>
        </div>
        <button type="submit" class="w-full px-5 py-3 bg-black text-white text-center hover:opacity-60 mt-5">
          UPDATE
        </button>
      </form>

		</section>
	</main>
@endsection