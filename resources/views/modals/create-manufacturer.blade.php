<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="{{ asset("css/app.css") }}" rel="stylesheet" />
    <title>Warehouse | Dashboard</title>
  </head>

  <body>
      <div class="mb-6 rounded bg-white p-8">
        
        <div class="grid grid-cols-1 gap-4 gap-y-2 text-sm lg:grid-cols-3">
          <div class="text-gray-600">
            <p class="text-lg font-medium">
                Add new Manufacturer
            </p>
            <p>Create new manufacturer data.</p>
            @if ($errors->any())
              <div class="alert alert-danger text-red-500">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
          </div>

          <form  action="{{ 
              route("create.manufacturer") 
            }}"
            method="POST" class="lg:col-span-2"
          >
            @csrf
              <div class="md:col-span-5">
                <label for="name">Name</label>
                <input
                  type="text"
                  name="name"
                  id="name"
                  class="mt-1 h-10 w-full rounded border bg-gray-50 px-4"
                  placeholder="Mayora"
                />
              </div>

              <div class="md:col-span-5 mt-5">
                <label for="description">Description</label>
                <input
                  type="text"
                  name="description"
                  id="description"
                  class="mt-1 h-10 w-full rounded border bg-gray-50 px-4"
                  placeholder="Mayora  is an Indonesian multinational food and beverage."
                />
              </div>

            </div>

            <div class="w-full flex items-end justify-end gap-3 mt-10">
              <button
                type="submit"
                class="hover:decoration my-5 rounded-md bg-blue-500 px-5 py-3 text-white hover:underline hover:decoration-white"
              >
                Add Manufacturer
              </button>
              <a href="{{ route('dashboard')}}" class="hover:decoration my-5 rounded-md bg-red-500 px-5 py-3 text-white hover:underline hover:decoration-white">
                Back
              </a>  
            </div>
          </form>
        </div>
      </div>
  </body>
</html>
