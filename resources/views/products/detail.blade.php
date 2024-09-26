@extends("layouts.app")
@include("components.notification")

@section("content")
	@include("components.navigation-bar")
	
	<main class="w-full">
		<section class="px-10 grid grid-cols-1 sm:grid-cols-2">
			<div class= overflow-hidden">
				<img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full">
			</div>
			<div class="pb-10 sm:p-10">
				<div class="flex justify-between items-center opacity-60 font-medium">
					<h2>SKU: {{ $product->sku }}</h2>
					<a href="" class="cursor-pointer underline decoration-transparent hover:decoration-black">{{ $category->name}}</a>
				</div>
				@if ($product->stock_quantity < 10)
					<h2 class="opacity-60 mt-10 font-medium text-red-500">Stock available: {{ $product->stock_quantity }}</h2>
				@elseif ($product->stock_quantity < 20)
					<h2 class="opacity-60 mt-10 font-medium text-yellow-500">Stock available: {{ $product->stock_quantity }}</h2>
				@else
					<h2 class="opacity-60 mt-10 font-medium">Stock available: {{ $product->stock_quantity }}</h2>
				@endif
				<h1 class="text-3xl font-medium">{{ $product->name }}</h1>
				<h1 class="text-xl">IDR {{ $product->price }}</h1>
				<p class="mt-16 text-justify">
					{{ $product->description }}
				</p>

				<div class="w-full">
					<a href="{{ route('update-stock.page', ['product_id' => $product->id]) }}" class="text-center text-white block px-10 py-5 bg-black mt-10 w-full hover:opacity-60">
						UPDATE STOCK
					</a>
				</div>
				
				<ul class="mt-12">
					<li class="mt-3"><a href="" class="underline decoration-transparent hover:decoration-black">Manufacturer details</a></li>
					<li class="mt-3"><a href="" class="underline decoration-transparent hover:decoration-black">Transaction history</a></li>
				</ul>
			</div>	

		</section>
	</main>
@endsection