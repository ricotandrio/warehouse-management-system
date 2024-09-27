@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")
  
  <section class="px-10 sm:pt-5 pt-8"> 
    
    <h1 class="text-3xl font-semibold">CREATE TRANSACTION</h1>
    <p>Fill in the form below to create a new transaction.</p>

    <form onsubmit="handleAddProduct(e)" class="mt-5 flex flex-row items-start justify-between">
      <div class="flex flex-col w-[78%]">
        <label for="search-input">PRODUCT NAME <span class="text-red-500">*</span></label>
        <input id="search-input" class="mt-1 border py-3 border-black font-normal block w-full px-4 text-gray-800" type="text" placeholder="Search items" autocomplete="off">
        <select id="search-results" class="font-light border border-black w-full bg-white p-3 mt-1">
          @foreach ($products as $product)
            <option value="{{ $product->id }}" class="block">{{ $product->name }}</option>
          @endforeach
        </select>
      </div>
  
      <div class="flex flex-col w-[20%]">
        <label for="quantity">QUANTITY <span class="text-red-500">*</span></label>
        <input type="number" id="quantity" min="0" class="mt-1 border border-black p-3 font-light">
        
        <button type="submit" class="mt-1 py-3 bg-black text-white hover:opacity-60">
          ADD PRODUCT
        </button>
      </div>
    </form>

    <div>
      <h1>Products List</h1>
      <ul id="products-display" class="border border-black min-h-24 mt-1 p-3">
        <li></li>
      </ul>
    </div>
  
  </section>
  
  <form action="{{ route("create.transaction.action") }}" method="POST" class="flex flex-col px-10 pb-3">
    @csrf
    <label for="type" class="mt-5">
      TYPE
      <span class="text-red-500">*</span>
    </label>
    <select name="type" id="type" required class="mt-1 border border-black p-3 font-light">
      <option value="IN" selected>IN</option>
      <option value="OUT">OUT</option>
    </select>

    <label for="description" class="mt-6">DESCRIPTION</label>
    <textarea
      name="description"
      id="description"
      cols="30"
      rows="3"
      placeholder="Enter a valid transaction description or leave blank"
      class="mt-1 resize-none border border-black p-3 font-light"
    ></textarea>

    <button type="submit" class="mt-14 mb-32 border bg-black p-3 font-medium text-white">SUBMIT</button>
  </form>
  <script>
    const addProductButton = document.getElementById('add-product-button');

    const dropdownButton = document.getElementById('dropdown-button');
    const dropdownMenu = document.getElementById('search-results');
    const searchInput = document.getElementById('search-input');
    
    const productsDisplay = document.getElementById('products-display');

    searchInput.addEventListener('input', () => {
      const searchTerm = searchInput.value.toLowerCase();
      const items = dropdownMenu.querySelectorAll('option');
    
      items.forEach((item) => {
        const text = item.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });

    let transactionProducts = [];

    function handleAddProduct(e) {
      e.preventDefault();

      const productId = dropdownMenu.value;
      const productName = dropdownMenu.options[dropdownMenu.selectedIndex].text;

      const quantity = document.getElementById('quantity').value;

      const product = {
        id: productId,
        name: productName,
        quantity,
      };

      transactionProducts.push(product);

      renderProducts();
    }

    function renderProducts() {
      productsDisplay.innerHTML = '';

      transactionProducts.forEach((product) => {
        const productElement = document.createElement('li');
        productElement.textContent = `${product.name} - ${product.quantity}`;

        productsDisplay.appendChild(productElement);
      });
    }

  </script>
@endsection
