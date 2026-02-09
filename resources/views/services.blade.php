@extends('layouts.app')

@section('title', 'Layanan - Novalindo Digital Printing & Offset')

@section('content')

{{-- Hero --}}
<section class="bg-linear-to-r from-red-600 to-red-800 text-white pt-28 pb-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Layanan Kami</h1>
        <p class="text-red-100 text-lg max-w-2xl">Berbagai layanan percetakan lengkap untuk kebutuhan Anda</p>
    </div>
</section>

{{-- Services List --}}
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($services as $service)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="md:flex">
                    @if($service->image)
                    <div class="md:w-1/3 h-48 md:h-auto overflow-hidden">
                        <img src="{{ Storage::url($service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                    </div>
                    @endif
                    <div class="p-6 {{ $service->image ? 'md:w-2/3' : '' }}">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $service->name }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $service->description }}</p>
                        @if($service->machines)
                        <div class="bg-red-50 rounded-lg p-3">
                            <p class="text-xs text-red-600 font-semibold mb-1">Mesin yang digunakan:</p>
                            <p class="text-sm text-gray-700">{{ $service->machines }}</p>
                        </div>
                        @endif
                        <a href="{{ route('order.create') }}" class="inline-flex items-center mt-4 text-red-600 hover:text-red-700 font-semibold text-sm transition">
                            Pesan Layanan Ini
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                </svg>
                <p class="text-gray-500">Layanan akan segera ditampilkan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16 bg-red-600">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Butuh Layanan Percetakan?</h2>
        <p class="text-red-100 mb-8">Konsultasikan kebutuhan Anda dengan tim kami secara gratis!</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('order.create') }}" class="px-8 py-3 bg-white text-red-600 font-bold rounded-lg hover:bg-yellow-300 transition shadow-lg">
                Pesan Online
            </a>
            <a href="https://wa.me/{{ App\Models\CompanySetting::get('wa_resmi', '6281234567890') }}" target="_blank"
               class="px-8 py-3 border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-red-600 transition">
                Chat WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection
