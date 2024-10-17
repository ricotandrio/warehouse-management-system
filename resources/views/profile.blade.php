@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")

  <main class="w-full">
    <section class="grid grid-cols-1 px-10 sm:grid-cols-2">
      <div class="flex aspect-square items-start justify-center overflow-hidden">
        <img
          src="{{ asset("/storage/" . $user->profile_image) }}"
          alt="{{ $user->username }}"
          class="mt-10 h-1/2 w-1/2 object-cover"
        />
      </div>
      <form
        action="{{ route("user.profile.update.action", ["user_id" => $user->id]) }}"
        method="POST"
        class="flex flex-col p-10"
      >
        @csrf
        @method("PUT")

        <h1 class="text-3xl font-semibold">PROFILE PAGE</h1>
        <p class="text-xs font-medium">ID: {{ $user->id }}</p>

        <label for="username" class="mt-8">USERNAME</label>
        <input
          type="text"
          name="username"
          id="username"
          disabled
          value="{{ $user->username }}"
          class="mt-1 cursor-not-allowed border border-black p-3 font-light"
        />

        <label for="role" class="mt-6">ROLE</label>
        @if (auth()->user()->role === "ADMIN" && $user->id !== auth()->user()->id)
          <select name="role" id="role" class="mt-1 border border-black p-3 font-light" required>
            @foreach (["ADMIN", "VIEWER", "EDITOR"] as $role)
              <option value="{{ $role }}" {{ $user->role === $role ? "selected" : "" }}>
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
            class="mt-1 cursor-not-allowed border border-black p-3 font-light"
          />
        @endif

        <p class="mt-8 text-right text-xs font-medium opacity-60">
          Created at:
          <span>{{ $user->created_at }}</span>
        </p>
        <p class="text-right text-xs font-medium opacity-60">
          Updated at:
          <span>{{ $user->updated_at }}</span>
        </p>

        @if (auth()->user()->role === "ADMIN" && $user->id !== auth()->user()->id)
          <div class="mt-5 flex flex-row">
            <input type="checkbox" name="confirmation" id="confirmation" value="true" required />
            <label for="confirmation" class="ml-2">
              I confirm that I,
              <b><i>{{ auth()->user()->username }}</i></b>
              , want to update this user.
            </label>
          </div>
          <button type="submit" class="mt-5 w-full bg-black px-5 py-3 text-center text-white hover:opacity-60">
            UPDATE
          </button>
        @endif
      </form>
    </section>
  </main>
  @include("components.footer")
@endsection
