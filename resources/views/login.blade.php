<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset("css/app.css") }}" rel="stylesheet" />
    <title>Warehouse | Authentication</title>
  </head>
  <body class="mt-32 flex h-full w-full items-center justify-center border font-sans sm:mt-20">
    <main class="flex w-3/4 flex-col items-center justify-center border border-black sm:w-1/2">
      <section class="m-3 flex w-full items-center justify-center p-3 text-xl">
        <h1 class="text-2xl font-semibold">Login</h1>
      </section>

      <form action="/login" method="POST" class="mb-5 mt-5 w-full border p-5 sm:w-1/2">
        @csrf
        @if ($errors->any())
          <div class="mb-3 text-sm text-red-500">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="flex flex-col items-start justify-center">
          <input
            name="login_email"
            type="email"
            id="login"
            class="mt-1 w-full border p-1 px-2 text-sm"
            placeholder="email"
          />
        </div>

        <div class="mt-5 flex flex-col items-start justify-center">
          <input
            name="login_password"
            type="password"
            id="password"
            class="mt-1 w-full border p-1 px-2 text-sm"
            placeholder="password"
          />
        </div>

        <div class="mt-5 flex w-full items-center justify-center">
          <button
            type="submit"
            class="active:bg-grey-900 rounded-xl border-4 border-white bg-blue-500 px-10 py-3 text-sm font-medium text-white transition-all hover:bg-blue-700 focus:border-purple-200 focus:outline-none sm:px-16"
          >
            Login
          </button>
        </div>
      </form>

      <section class="m-3 flex w-full items-center justify-center p-3 text-xl">
        <h1 class="text-2xl font-semibold">Register</h1>
      </section>

      <form action="/register" method="POST" class="mb-5 mt-5 w-full border p-5 sm:w-1/2">
        @csrf
        @if ($errors->any())
          <div class="mb-3 text-sm text-red-500">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="flex flex-col items-start justify-center">
          <input
            name="register_name"
            type="name"
            id="login"
            class="mt-1 w-full border p-1 px-2 text-sm"
            placeholder="name"
          />
        </div>
        <div class="mt-5 flex flex-col items-start justify-center">
          <input
            name="register_email"
            type="email"
            id="login"
            class="mt-1 w-full border p-1 px-2 text-sm"
            placeholder="email"
          />
        </div>

        <div class="mt-5 flex flex-col items-start justify-center">
          <input
            name="register_password"
            type="password"
            id="password"
            class="mt-1 w-full border p-1 px-2 text-sm"
            placeholder="password"
          />
        </div>

        <div class="mt-5 flex w-full items-center justify-center">
          <button
            type="submit"
            class="active:bg-grey-900 rounded-xl border-4 border-white bg-blue-500 px-10 py-3 text-sm font-medium text-white transition-all hover:bg-blue-700 focus:border-purple-200 focus:outline-none sm:px-16"
          >
            Register
          </button>
        </div>
      </form>
    </main>
  </body>
  <script></script>
</html>
