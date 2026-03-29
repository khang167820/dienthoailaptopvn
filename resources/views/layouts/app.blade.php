<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}

    {{-- Schema JSON-LD --}}
    @hasSection('schema')
        <script type="application/ld+json">
            @yield('schema')
        </script>
    @endif

    {{-- LocalBusiness Schema (Mọi trang) --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "LocalBusiness",
        "name": "Điện Thoại Laptop VN",
        "url": "{{ url('/') }}",
        "telephone": "+84-xxx-xxx-xxx",
        "address": {
            "@@type": "PostalAddress",
            "addressLocality": "TP. Hồ Chí Minh",
            "addressCountry": "VN"
        },
        "openingHours": "Mo-Su 08:00-21:00",
        "priceRange": "$$"
    }
    </script>

    {{-- Speculation Rules API (Preload khi hover) --}}
    <script type="speculationrules">
    {
        "prerender": [{
            "where": { "href_matches": "/*" },
            "eagerness": "moderate"
        }]
    }
    </script>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900">
    {{-- Top Bar --}}
    <div class="bg-gradient-to-r from-blue-700 to-blue-900 text-white text-sm">
        <div class="container mx-auto px-4 py-2 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <span>📞 Hotline: <a href="tel:0xxxxxxxxx" class="font-semibold hover:text-yellow-300 transition">0xxx.xxx.xxx</a></span>
                <span class="hidden sm:inline">📍 Địa chỉ: xxx, Quận x, TP.HCM</span>
            </div>
            <div class="flex items-center gap-3">
                <span>⏰ 08:00 - 21:00 (Cả CN)</span>
            </div>
        </div>
    </div>

    {{-- Header / Navigation --}}
    <header class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-4">
            <nav class="flex items-center justify-between h-16">
                {{-- Logo --}}
                <a href="/" wire:navigate class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-xl flex items-center justify-center text-white font-extrabold text-lg shadow-lg">
                        DL
                    </div>
                    <div>
                        <div class="font-bold text-lg text-gray-800 leading-tight">Điện Thoại Laptop</div>
                        <div class="text-[10px] text-gray-400 leading-tight tracking-wider uppercase">Sửa chữa uy tín</div>
                    </div>
                </a>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex items-center gap-1">
                    <a href="/" wire:navigate class="px-4 py-2 rounded-lg text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">Trang chủ</a>
                    @foreach(\App\Models\Category::active()->orderBy('sort_order')->limit(5)->get() as $cat)
                        <a href="/{{ $cat->slug }}" wire:navigate class="px-4 py-2 rounded-lg text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">{{ $cat->name }}</a>
                    @endforeach
                    <a href="/blog" wire:navigate class="px-4 py-2 rounded-lg text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">Blog</a>
                </div>

                {{-- CTA Button --}}
                <a href="tel:0xxxxxxxxx" class="hidden md:flex items-center gap-2 bg-gradient-to-r from-orange-500 to-red-500 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:shadow-lg hover:scale-105 transition-all duration-200">
                    📞 Gọi ngay
                </a>

                {{-- Mobile Menu Toggle --}}
                <button id="menu-toggle" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </nav>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden md:hidden border-t bg-white pb-4">
            <div class="container mx-auto px-4 pt-2 space-y-1">
                <a href="/" wire:navigate class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Trang chủ</a>
                @foreach(\App\Models\Category::active()->orderBy('sort_order')->limit(5)->get() as $cat)
                    <a href="/{{ $cat->slug }}" wire:navigate class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition">{{ $cat->name }}</a>
                @endforeach
                <a href="/blog" wire:navigate class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Blog</a>
                <a href="tel:0xxxxxxxxx" class="block text-center bg-gradient-to-r from-orange-500 to-red-500 text-white px-4 py-3 rounded-xl font-semibold mt-2">📞 Gọi ngay</a>
            </div>
        </div>
    </header>

    {{-- Breadcrumbs --}}
    @hasSection('breadcrumbs')
        <div class="bg-gray-100 border-b">
            <div class="container mx-auto px-4 py-3">
                <nav class="text-sm text-gray-500" aria-label="Breadcrumb">
                    @yield('breadcrumbs')
                </nav>
            </div>
        </div>
    @endif

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-gray-300 mt-16">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                {{-- About --}}
                <div class="md:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center text-white font-extrabold text-lg">DL</div>
                        <span class="font-bold text-xl text-white">Điện Thoại Laptop VN</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-4">Chuyên sửa chữa điện thoại, laptop chính hãng. Cam kết linh kiện zin 100%, bảo hành dài hạn, sửa lấy liền trong ngày.</p>
                    <div class="space-y-2 text-sm">
                        <p>📞 Hotline: <a href="tel:0xxxxxxxxx" class="text-blue-400 hover:underline">0xxx.xxx.xxx</a></p>
                        <p>📍 Địa chỉ: xxx, Quận x, TP.HCM</p>
                        <p>⏰ Giờ mở cửa: 08:00 - 21:00 (Cả Chủ Nhật)</p>
                    </div>
                </div>

                {{-- Dịch vụ phổ biến --}}
                <div>
                    <h3 class="text-white font-bold mb-4">Dịch vụ phổ biến</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" wire:navigate class="hover:text-blue-400 transition">Thay màn hình iPhone</a></li>
                        <li><a href="#" wire:navigate class="hover:text-blue-400 transition">Thay pin iPhone</a></li>
                        <li><a href="#" wire:navigate class="hover:text-blue-400 transition">Sửa Face ID</a></li>
                        <li><a href="#" wire:navigate class="hover:text-blue-400 transition">Thay màn hình Samsung</a></li>
                        <li><a href="#" wire:navigate class="hover:text-blue-400 transition">Sửa laptop</a></li>
                    </ul>
                </div>

                {{-- Chính sách --}}
                <div>
                    <h3 class="text-white font-bold mb-4">Chính sách</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-blue-400 transition">Chính sách bảo hành</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Quy trình sửa chữa</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Câu hỏi thường gặp</a></li>
                        <li><a href="/blog" wire:navigate class="hover:text-blue-400 transition">Blog thủ thuật</a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="border-t border-gray-700">
            <div class="container mx-auto px-4 py-4 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} Điện Thoại Laptop VN. All rights reserved.
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
