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
              {{ $edit === 'true' ? 'Edit' : 'Product' }} Details
            </p>
            <p>Detail information of Product</p>
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

          <form action="{{ 
              route("update.product", [
                "product" => $product
              ]) 
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
                  placeholder="Soda Drink"
                  {{ $edit === 'true' ? '' : 'readonly' }}
                  value="{{ $product["name"] }}"
                />
              </div>

              <div class="md:col-span-5">
                <label for="description">Description</label>
                <input
                  type="text"
                  name="description"
                  id="description"
                  class="mt-1 h-10 w-full rounded border bg-gray-50 px-4"
                  placeholder="A refreshing soda drink."
                  value="{{ $product["description"] }}"
                  {{ $edit === 'true' ? '' : 'readonly' }}
                />
              </div>

              <div class="md:col-span-3">
                <label for="price">Price in Rupiah</label>
                <input
                  type="number"
                  name="price"
                  id="price"
                  class="mt-1 h-10 w-full rounded border bg-gray-50 px-4"
                  placeholder="2000"
                  {{ $edit === 'true' ? '' : 'readonly' }}
                  value="{{ $product["price"] }}"
                />
              </div>

              <div class="md:col-span-2">
                <label for="image_url">Image Url (if exists)</label>
                <input
                  type="text"
                  name="image_url"
                  id="image_url"
                  class="mt-1 h-10 w-full rounded border bg-gray-50 px-4"
                  placeholder="https://image.cdn.com/soda.jpg"
                  value="{{ $product["image_url"] }}"
                  {{ $edit === 'true' ? '' : 'readonly' }}
                />
              </div>

              <div class="md:col-span-5">
                <label for="country">Manufacturer</label>
                <div class="mt-1 flex h-10 items-center rounded border border-gray-200 bg-gray-50">
                  <select
                    name="manufacturer_id"
                    id="manufacturer_id"
                    class="w-full appearance-none bg-transparent px-4 text-gray-800 outline-none"
                    {{ $edit === 'true' ? '' : 'disabled' }}
                  >
                    @if ($edit === "true")
                      <option value="{{ $manufacturer["id"] }}">{{ $manufacturer["name"] }}</option>
                      @foreach ($manufacturers as $manufacturer)
                        @if ($manufacturer["id"] === $product["manufacturer_id"])
                          @continue
                        @endif
                        <option value="{{ $manufacturer["id"] }}">{{ $manufacturer["name"] }}</option>
                      @endforeach
                    @else
                      <option value="{{ $manufacturer["id"] }}">{{ $manufacturer["name"] }}</option>
                    @endif
                   
                  </select>
                </div>
              </div>
            </div>

            <div class="w-full flex items-end justify-end gap-3 mt-10">
              @if ($edit === "true")
                <button
                  type="submit"
                  class="hover:decoration my-5 rounded-md bg-blue-500 px-5 py-3 text-white hover:underline hover:decoration-white"
                >
                  Edit Product
                </button>
              @endif
              <a href="{{ route('dashboard')}}" class="hover:decoration my-5 rounded-md bg-red-500 px-5 py-3 text-white hover:underline hover:decoration-white">
                Back
              </a>  
            </div>
          </form>
        </div>
      </div>
  </body>
</html>
