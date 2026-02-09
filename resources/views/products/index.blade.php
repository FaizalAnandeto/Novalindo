@extends('layouts.app')

@section('title', ($selectedCategory ? $selectedCategory->name . ' - ' : '') . 'Produk - Novalindo')

@section('content')

{{-- Hero --}}
<section class="bg-linear-to-r from-red-600 to-red-800 text-white pt-28 pb-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">
            {{ $selectedCategory ? $selectedCategory->name : 'Katalog Produk' }}
        </h1>
        <p class="text-red-100 text-lg max-w-2xl">
            {{ $selectedCategory ? $selectedCategory->description : 'Temukan berbagai pilihan produk percetakan berkualitas' }}
        </p>
    </div>
</section>

<section class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            {{-- Sidebar Categories --}}
            <div class="lg:w-1/4">
                <div class="bg-white rounded-xl shadow-md p-6 sticky top-20">
                    <h3 class="font-bold text-gray-900 mb-4 text-lg">Kategori</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('products.index') }}"
                               class="flex items-center justify-between px-3 py-2 rounded-lg text-sm font-medium transition {{ !$selectedCategory ? 'bg-red-50 text-red-600' : 'text-gray-600 hover:bg-gray-50 hover:text-red-600' }}">
                                <span>Semua Produk</span>
                            </a>
                        </li>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('products.category', $category->slug) }}"
                               class="flex items-center justify-between px-3 py-2 rounded-lg text-sm font-medium transition {{ $selectedCategory && $selectedCategory->id === $category->id ? 'bg-red-50 text-red-600' : 'text-gray-600 hover:bg-gray-50 hover:text-red-600' }}">
                                <span>{{ $category->name }}</span>
                                <span class="text-xs bg-gray-100 text-gray-500 px-2 py-0.5 rounded-full">{{ $category->products_count }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Products Grid --}}
            <div class="lg:w-3/4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($products as $product)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        @if($product->image)
                        <div class="h-48 overflow-hidden">
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        @else
                        <div class="h-48 bg-linear-to-br from-red-50 to-gray-50 flex items-center justify-center">
                            <svg class="w-12 h-12 text-red-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        @endif
                        <div class="p-4">
                            <span class="text-xs text-red-600 font-medium bg-red-50 px-2 py-1 rounded">{{ $product->category->name ?? '' }}</span>
                            <h3 class="font-bold text-gray-900 mt-2 mb-1">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500 mb-3">{{ Str::limit($product->description, 80) }}</p>
                            <div class="flex items-center justify-between">
                                @if($product->price > 0)
                                <div>
                                    <span class="text-red-600 font-bold">{{ $product->formatted_price }}</span>
                                    <span class="text-xs text-gray-400">/{{ $product->unit }}</span>
                                </div>
                                @else
                                <span class="text-gray-500 text-sm italic">Hubungi kami</span>
                                @endif
                                <a href="{{ route('order.create', ['product' => $product->id]) }}"
                                   class="text-sm bg-red-600 text-white px-3 py-1.5 rounded-lg hover:bg-red-700 transition font-medium">
                                    Pesan
                                </a>
                            </div>
                            @if($product->min_order > 1)
                            <p class="text-xs text-gray-400 mt-2">Min. order: {{ $product->min_order }} {{ $product->unit }}</p>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                        <p class="text-gray-500">Belum ada produk untuk kategori ini.</p>
                    </div>
                    @endforelse
                </div>

                {{-- Pagination --}}
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
