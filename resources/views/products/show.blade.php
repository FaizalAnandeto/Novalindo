@extends('layouts.app')

@section('title', $product->name . ' - Novalindo')

@section('content')

<section class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumb --}}
        <nav class="mb-8 text-sm">
            <ol class="flex items-center space-x-2 text-gray-500">
                <li><a href="{{ route('home') }}" class="hover:text-red-600 transition">Beranda</a></li>
                <li>/</li>
                <li><a href="{{ route('products.index') }}" class="hover:text-red-600 transition">Produk</a></li>
                @if($product->category)
                <li>/</li>
                <li><a href="{{ route('products.category', $product->category->slug) }}" class="hover:text-red-600 transition">{{ $product->category->name }}</a></li>
                @endif
                <li>/</li>
                <li class="text-gray-900 font-medium">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            {{-- Product Image --}}
            <div>
                @if($product->image)
                <div class="bg-white rounded-xl overflow-hidden shadow-md">
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover">
                </div>
                @else
                <div class="bg-linear-to-br from-red-50 to-gray-50 rounded-xl h-96 flex items-center justify-center shadow-md">
                    <svg class="w-24 h-24 text-red-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                @endif
            </div>

            {{-- Product Info --}}
            <div>
                @if($product->category)
                <span class="inline-block text-sm text-red-600 font-medium bg-red-50 px-3 py-1 rounded-full mb-3">{{ $product->category->name }}</span>
                @endif
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>

                @if($product->price > 0)
                <div class="mb-6">
                    <span class="text-3xl font-bold text-red-600">{{ $product->formatted_price }}</span>
                    <span class="text-gray-500 text-lg ml-1">/ {{ $product->unit }}</span>
                </div>
                @else
                <div class="mb-6">
                    <span class="text-lg text-gray-500 italic">Harga hubungi kami</span>
                </div>
                @endif

                @if($product->description)
                <div class="mb-6">
                    <h3 class="font-semibold text-gray-900 mb-2">Deskripsi</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                </div>
                @endif

                @if($product->min_order > 1)
                <div class="mb-4 flex items-center text-sm text-gray-600">
                    <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Minimal order: <strong class="ml-1">{{ $product->min_order }} {{ $product->unit }}</strong>
                </div>
                @endif

                @if($product->specifications && count($product->specifications) > 0)
                <div class="mb-6">
                    <h3 class="font-semibold text-gray-900 mb-2">Spesifikasi</h3>
                    <div class="bg-gray-50 rounded-lg overflow-hidden">
                        <table class="w-full text-sm">
                            @foreach($product->specifications as $key => $value)
                            <tr class="border-b border-gray-200 last:border-0">
                                <td class="px-4 py-2 font-medium text-gray-700 bg-gray-100 w-1/3">{{ $key }}</td>
                                <td class="px-4 py-2 text-gray-600">{{ $value }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                @endif

                <div class="flex flex-col sm:flex-row gap-4 mt-8">
                    <a href="{{ route('order.create', ['product' => $product->id]) }}"
                       class="inline-flex items-center justify-center px-8 py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition shadow text-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                        </svg>
                        Pesan Produk Ini
                    </a>
                    <a href="https://wa.me/{{ App\Models\CompanySetting::get('wa_cs', '6281234567890') }}?text=Halo, saya tertarik dengan produk {{ $product->name }}"
                       target="_blank"
                       class="inline-flex items-center justify-center px-8 py-3 border-2 border-green-500 text-green-600 font-bold rounded-lg hover:bg-green-500 hover:text-white transition">
                        Chat via WhatsApp
                    </a>
                </div>
            </div>
        </div>

        {{-- Related Products --}}
        @if($relatedProducts->count() > 0)
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Produk <span class="text-red-600">Terkait</span></h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                <a href="{{ route('products.show', $related->slug) }}" class="bg-white rounded-xl shadow-md hover:shadow-xl transition overflow-hidden group">
                    @if($related->image)
                    <div class="h-40 overflow-hidden">
                        <img src="{{ Storage::url($related->image) }}" alt="{{ $related->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>
                    @else
                    <div class="h-40 bg-red-50 flex items-center justify-center">
                        <svg class="w-10 h-10 text-red-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    @endif
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 group-hover:text-red-600 transition">{{ $related->name }}</h3>
                        @if($related->price > 0)
                        <p class="text-red-600 font-semibold mt-1">{{ $related->formatted_price }}</p>
                        @endif
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
