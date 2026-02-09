@php
    // Pages yang punya hero section dengan background gelap/merah
    $hasHero = request()->routeIs('home', 'about', 'services', 'products.*', 'portfolio', 'contact', 'order.create');
@endphp

<nav x-data="{ open: false, scrolled: false, hasHero: {{ $hasHero ? 'true' : 'false' }} }"
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
     class="fixed top-0 left-0 right-0 w-full z-50 transition-all duration-300"
     :class="(scrolled || !hasHero) ? 'py-2 px-4' : ''">

    <div class="transition-all duration-300"
         :class="(scrolled || !hasHero) ? 'max-w-7xl mx-auto bg-white rounded-2xl shadow-2xl px-6' : 'px-4 sm:px-6 lg:px-8'">
        <div class="flex justify-between items-center h-16 sm:h-20 lg:h-24">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-2 sm:space-x-3 flex-shrink-0">
                <img src="{{ asset('images/Logo.png') }}" alt="Novalindo Logo" class="h-12 sm:h-16 lg:h-20 w-auto rounded-lg object-contain">
                <div>
                    <span class="text-xl font-bold transition-colors duration-300"
                          :class="(scrolled || !hasHero) ? 'text-red-600' : 'text-white'">Novalindo</span>
                    <span class="hidden sm:block text-xs -mt-1 transition-colors duration-300"
                          :class="(scrolled || !hasHero) ? 'text-gray-500' : 'text-white/70'">Digital Printing & Offset</span>
                </div>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex items-center space-x-1">
                @php
                    $menuItems = [
                        ['route' => 'home', 'label' => 'Beranda', 'match' => 'home'],
                        ['route' => 'about', 'label' => 'Tentang', 'match' => 'about'],
                        ['route' => 'services', 'label' => 'Layanan', 'match' => 'services'],
                        ['route' => 'products.index', 'label' => 'Produk', 'match' => 'products.*'],
                        ['route' => 'portfolio', 'label' => 'Portofolio', 'match' => 'portfolio'],
                        ['route' => 'contact', 'label' => 'Kontak', 'match' => 'contact'],
                        ['route' => 'order.track', 'label' => 'Cek Pesanan', 'match' => 'order.track'],
                    ];
                @endphp

                @foreach($menuItems as $item)
                <a href="{{ route($item['route']) }}"
                   class="px-3 py-2 rounded-md text-sm font-medium transition-all duration-300"
                   :class="(scrolled || !hasHero)
                       ? '{{ request()->routeIs($item["match"]) ? "text-red-600 bg-red-50" : "text-gray-700 hover:text-red-600 hover:bg-red-50" }}'
                       : '{{ request()->routeIs($item["match"]) ? "text-white bg-white/20" : "text-white/90 hover:text-white hover:bg-white/10" }}'">
                    {{ $item['label'] }}
                </a>
                @endforeach

                <a href="{{ route('order.create') }}"
                   class="ml-2 px-5 py-2 text-sm font-semibold rounded-lg transition-all duration-300 shadow-md"
                   :class="(scrolled || !hasHero) ? 'bg-red-600 hover:bg-red-700 text-white' : 'bg-white text-red-600 hover:bg-red-50'">
                    Pesan Sekarang
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button @click="open = !open"
                    class="md:hidden p-2 rounded-md transition"
                    :class="(scrolled || !hasHero) ? 'text-gray-600 hover:text-red-600' : 'text-white hover:bg-white/10'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" x-transition class="md:hidden transition-all duration-300"
         :class="(scrolled || !hasHero) ? 'mx-4 bg-white rounded-b-2xl shadow-xl' : 'bg-red-800'">
        <div class="px-4 py-3 space-y-1">
            @foreach($menuItems as $item)
            <a href="{{ route($item['route']) }}"
               class="block px-3 py-2 rounded-md text-base font-medium transition-all duration-300"
               :class="(scrolled || !hasHero)
                   ? '{{ request()->routeIs($item["match"]) ? "text-red-600 bg-red-50" : "text-gray-700 hover:text-red-600 hover:bg-red-50" }}'
                   : '{{ request()->routeIs($item["match"]) ? "text-white bg-white/20" : "text-white/80 hover:text-white hover:bg-white/10" }}'">
                {{ $item['label'] }}
            </a>
            @endforeach
            <a href="{{ route('order.create') }}"
               class="block px-4 py-2 mt-2 text-center font-semibold rounded-lg transition-all duration-300"
               :class="(scrolled || !hasHero) ? 'bg-red-600 text-white hover:bg-red-700' : 'bg-white text-red-600 hover:bg-red-50'">
                Pesan Sekarang
            </a>
        </div>
    </div>
</nav>
