@extends('layouts.app')

@section('title', 'Novalindo Digital Printing & Offset - Solusi, Inovasi, Kreasi')

@section('content')

{{-- Hero Section (merah dari ujung atas sampai bawah hero) --}}
<section class="relative bg-linear-to-br from-red-600 via-red-700 to-red-900 text-white overflow-hidden -mt-16 pt-16">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-6">
                Percetakan <span class="text-yellow-300">Novalindo</span>
                <br>Digital Printing & Offset
            </h1>
            <p class="text-xl md:text-2xl font-light text-red-100 mb-4 italic">
                "Solusi, Inovasi, Kreasi"
            </p>
            <p class="text-lg text-red-100 mb-8 max-w-2xl">
                Menyediakan layanan percetakan lengkap berkualitas tinggi. Dari digital printing, cetak offset, hingga print outdoor & indoor untuk kebutuhan bisnis dan personal Anda.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('order.create') }}"
                   class="inline-flex items-center justify-center px-8 py-3 bg-white text-red-600 font-bold rounded-lg hover:bg-yellow-300 hover:text-red-700 transition shadow-lg text-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                    </svg>
                    Pesan Sekarang
                </a>
                <a href="{{ route('products.index') }}"
                   class="inline-flex items-center justify-center px-8 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-red-600 transition text-lg">
                    Lihat Produk
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Services Section --}}
<section class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Layanan <span class="text-red-600">Kami</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Kami menyediakan berbagai layanan percetakan lengkap dengan mesin-mesin berkualitas tinggi</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $service)
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                @if($service->image)
                <div class="h-48 overflow-hidden">
                    <img src="{{ Storage::url($service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                @else
                <div class="h-48 bg-linear-to-br from-red-100 to-red-50 flex items-center justify-center">
                    <svg class="w-16 h-16 text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $service->name }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($service->description, 120) }}</p>
                    @if($service->machines)
                    <p class="text-xs text-red-600 font-medium">
                        <span class="inline-block bg-red-50 px-2 py-1 rounded">🖨️ {{ Str::limit($service->machines, 80) }}</span>
                    </p>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-8 text-gray-500">
                <p>Layanan akan segera ditampilkan.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('services') }}" class="inline-flex items-center text-red-600 hover:text-red-700 font-semibold transition">
                Lihat Semua Layanan
                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

{{-- Product Categories --}}
<section class="py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Kategori <span class="text-red-600">Produk</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Beragam pilihan produk percetakan untuk berbagai kebutuhan Anda</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($categories as $category)
            <a href="{{ route('products.category', $category->slug) }}"
               class="group relative bg-white border-2 border-gray-100 hover:border-red-500 rounded-xl p-6 text-center transition-all duration-300 hover:shadow-lg">
                @if($category->image)
                <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="w-16 h-16 mx-auto mb-3 object-contain">
                @else
                <div class="w-16 h-16 mx-auto mb-3 bg-red-50 rounded-full flex items-center justify-center group-hover:bg-red-100 transition">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                @endif
                <h3 class="font-semibold text-gray-900 group-hover:text-red-600 transition">{{ $category->name }}</h3>
                <p class="text-xs text-gray-500 mt-1">{{ $category->products_count }} produk</p>
            </a>
            @empty
            <div class="col-span-full text-center py-8 text-gray-500">
                <p>Kategori produk akan segera ditampilkan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- Featured Products --}}
<section class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Produk <span class="text-red-600">Unggulan</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Produk terbaik kami yang paling diminati pelanggan</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
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
                    <p class="text-sm text-gray-500 mb-3">{{ Str::limit($product->description, 60) }}</p>
                    <div class="flex items-center justify-between">
                        @if($product->price > 0)
                        <span class="text-red-600 font-bold">{{ $product->formatted_price }}</span>
                        @else
                        <span class="text-gray-500 text-sm italic">Hubungi kami</span>
                        @endif
                        <a href="{{ route('order.create', ['product' => $product->id]) }}"
                           class="text-sm bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 transition">
                            Pesan
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-8 text-gray-500">
                <p>Produk akan segera ditampilkan.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition shadow">
                Lihat Semua Produk
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

{{-- Why Choose Us --}}
<section class="py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Mengapa Memilih <span class="text-red-600">Novalindo?</span></h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Kualitas Terjamin</h3>
                <p class="text-gray-600 text-sm">Menggunakan mesin percetakan berkualitas tinggi dan bahan baku terbaik</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Tepat Waktu</h3>
                <p class="text-gray-600 text-sm">Komitmen pengerjaan sesuai deadline yang disepakati</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Harga Bersaing</h3>
                <p class="text-gray-600 text-sm">Menawarkan harga kompetitif tanpa mengorbankan kualitas</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Tim Profesional</h3>
                <p class="text-gray-600 text-sm">Didukung oleh tim berpengalaman dalam dunia percetakan</p>
            </div>
        </div>
    </div>
</section>

{{-- Testimonials --}}
@if($testimonials->count() > 0)
<section class="py-16 lg:py-20 bg-red-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Apa Kata <span class="text-yellow-300">Mereka?</span></h2>
            <p class="text-red-100 max-w-2xl mx-auto">Testimoni dari pelanggan setia kami</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($testimonials as $testimonial)
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    @if($testimonial->image)
                    <img src="{{ Storage::url($testimonial->image) }}" alt="{{ $testimonial->name }}" class="w-12 h-12 rounded-full object-cover mr-3">
                    @else
                    <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center mr-3">
                        <span class="text-red-600 font-bold text-lg">{{ substr($testimonial->name, 0, 1) }}</span>
                    </div>
                    @endif
                    <div>
                        <h4 class="font-bold text-gray-900">{{ $testimonial->name }}</h4>
                        @if($testimonial->company)
                        <p class="text-sm text-gray-500">{{ $testimonial->company }}</p>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    @for($i = 1; $i <= 5; $i++)
                    <span class="{{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                    @endfor
                </div>
                <p class="text-gray-600 text-sm italic">"{{ $testimonial->content }}"</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA Section --}}
<section class="py-16 lg:py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Siap untuk <span class="text-red-600">Memesan?</span></h2>
        <p class="text-gray-600 mb-8 text-lg">Hubungi kami sekarang atau langsung buat pesanan online. Kami siap membantu kebutuhan percetakan Anda!</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('order.create') }}"
               class="inline-flex items-center justify-center px-8 py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition shadow-lg text-lg">
                Buat Pesanan Online
            </a>
            <a href="https://wa.me/{{ App\Models\CompanySetting::get('wa_resmi', '6281234567890') }}"
               target="_blank"
               class="inline-flex items-center justify-center px-8 py-3 border-2 border-green-500 text-green-600 font-bold rounded-lg hover:bg-green-500 hover:text-white transition text-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                Chat WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection
