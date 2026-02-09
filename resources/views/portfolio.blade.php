@extends('layouts.app')

@section('title', 'Portofolio - Novalindo Digital Printing & Offset')

@section('content')

{{-- Hero --}}
<section class="bg-linear-to-r from-red-600 to-red-800 text-white pt-28 pb-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Portofolio</h1>
        <p class="text-red-100 text-lg max-w-2xl">Hasil karya dan proyek yang telah kami kerjakan untuk klien kami</p>
    </div>
</section>

{{-- Portfolio Grid --}}
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($portfolios as $portfolio)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 group">
                @if($portfolio->image)
                <div class="h-56 overflow-hidden">
                    <img src="{{ Storage::url($portfolio->image) }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                @else
                <div class="h-56 bg-linear-to-br from-red-100 to-red-50 flex items-center justify-center">
                    <svg class="w-16 h-16 text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $portfolio->title }}</h3>
                    @if($portfolio->client_name)
                    <p class="text-red-600 text-sm font-medium mb-2">{{ $portfolio->client_name }}</p>
                    @endif
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($portfolio->description, 150) }}</p>
                    <div class="flex items-center justify-between text-xs text-gray-400">
                        @if($portfolio->project_date)
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ $portfolio->project_date->format('d M Y') }}
                        </span>
                        @endif
                        @if($portfolio->location)
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            {{ $portfolio->location }}
                        </span>
                        @endif
                    </div>
                    @if($portfolio->testimonial)
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <p class="text-sm text-gray-500 italic">"{{ Str::limit($portfolio->testimonial, 100) }}"</p>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-gray-500 text-lg">Portofolio akan segera ditampilkan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
