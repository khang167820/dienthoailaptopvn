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

    {{-- Google Fonts (preload for speed) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    @php
        $menuCategories = \App\Models\Category::active()->orderBy('sort_order')->limit(5)->get(['id', 'name', 'slug']);
    @endphp
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900">
    {{-- Cảnh báo chạy sự kiện hoặc Promo (Optional, có thể bật tắt) --}}
    <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-black text-xs font-semibold py-1 text-center">
        🎉 Đặt trước dịch vụ hôm nay - Giảm ngay <span class="text-[#d70018] font-extrabold">200.000đ</span> - Click xem chi tiết!
    </div>

    {{-- Header / Navigation --}}
    <header class="sticky top-0 z-50 shadow-md">
        {{-- Main Header --}}
        <div class="bg-[#d70018] text-white transition-all duration-300">
            <div class="container px-4 mx-auto">
                <div class="flex items-center justify-between h-[68px] gap-4">
                    {{-- Logo --}}
                    <a href="/" wire:navigate class="flex items-center gap-2 shrink-0 group">
                        <div class="flex items-center justify-center w-[42px] h-[42px] font-black text-[#d70018] bg-white rounded-xl shadow-sm text-xl tracking-tighter group-hover:scale-105 transition-transform">
                            DL
                        </div>
                        <div class="hidden md:block text-white">
                            <div class="text-lg font-bold leading-tight tracking-wide">Điện Thoại Laptop</div>
                            <div class="text-[10px] leading-tight tracking-widest uppercase opacity-90">Hệ thống sửa chữa</div>
                        </div>
                    </a>

                    {{-- Search Bar --}}
                    <div class="flex-1 max-w-2xl px-2 lg:px-6">
                        <div class="relative group">
                            <input type="text" placeholder="Bạn cần sửa gì hôm nay? (vd: Thay pin iPhone 13...)" class="w-full h-[42px] pl-10 pr-4 text-sm text-gray-900 transition-all bg-white border-2 border-transparent shadow-inner outline-none rounded-xl focus:border-yellow-400 focus:ring-0 placeholder-gray-400">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-[#d70018]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Right Actions --}}
                    <div class="flex items-center gap-3 shrink-0">
                        <a href="tel:0xxxxxxxxx" class="items-center hidden gap-2 px-3 py-2 transition-colors rounded-xl lg:flex bg-white/15 hover:bg-white/25">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-white/20">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[11px] opacity-80 leading-none mb-0.5">Gọi tư vấn</span>
                                <span class="text-sm font-bold leading-none">0xxx.xxx</span>
                            </div>
                        </a>
                        <a href="#" class="items-center hidden gap-2 px-3 py-2 transition-colors rounded-xl md:flex bg-white/15 hover:bg-white/25">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-white/20">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[11px] opacity-80 leading-none mb-0.5">Tìm cửa hàng</span>
                                <span class="text-sm font-bold leading-none">Gần bạn</span>
                            </div>
                        </a>
                        
                        {{-- Mobile Menu Toggle --}}
                        <button id="menu-toggle" class="p-2 transition-colors rounded-lg md:hidden bg-white/10 hover:bg-white/20" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Desktop Navigation (Categories) --}}
        <div class="hidden bg-white border-b md:block border-gray-100 shadow-sm">
            <div class="container px-4 mx-auto">
                <nav class="flex items-center justify-center gap-8 py-2.5">
                    <a href="/" wire:navigate class="flex items-center gap-2 text-sm font-bold text-gray-800 transition-all hover:text-[#d70018] hover:-translate-y-0.5">
                        <span class="text-lg">📱</span> Trang chủ
                    </a>
                    @foreach($menuCategories as $cat)
                        <a href="/{{ $cat->slug }}" wire:navigate class="flex items-center gap-2 text-sm font-bold text-gray-800 transition-all hover:text-[#d70018] hover:-translate-y-0.5">
                            <span class="text-lg">{{ $cat->icon ?? '🔧' }}</span> {{ $cat->name }}
                        </a>
                    @endforeach
                    <a href="/blog" wire:navigate class="flex items-center gap-2 text-sm font-bold text-gray-800 transition-all hover:text-[#d70018] hover:-translate-y-0.5">
                        <span class="text-lg">💡</span> Thủ thuật
                    </a>
                </nav>
            </div>
        </div>

        {{-- Mobile Menu Dropdown --}}
        <div id="mobile-menu" class="hidden pb-4 bg-white border-t md:hidden shadow-lg absolute w-full left-0">
            <div class="container px-4 pt-2 mx-auto space-y-1">
                <a href="/" wire:navigate class="block px-4 py-3 font-medium text-gray-800 transition rounded-xl hover:bg-red-50 hover:text-[#d70018]">🏠 Trang chủ</a>
                @foreach($menuCategories as $cat)
                    <a href="/{{ $cat->slug }}" wire:navigate class="block px-4 py-3 font-medium text-gray-800 transition rounded-xl hover:bg-red-50 hover:text-[#d70018]">{{ $cat->icon ?? '🔧' }} {{ $cat->name }}</a>
                @endforeach
                <a href="/blog" wire:navigate class="block px-4 py-3 font-medium text-gray-800 transition rounded-xl hover:bg-red-50 hover:text-[#d70018]">💡 Thủ thuật & Tin tức</a>
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
    <footer class="bg-white border-t border-gray-200 mt-16 pt-12 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                {{-- About --}}
                <div class="md:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-12 h-12 bg-[#d70018] rounded-xl flex items-center justify-center text-white font-extrabold text-xl shadow-md">DL</div>
                        <div>
                            <span class="font-bold text-xl text-gray-800 tracking-tight">Điện Thoại Laptop VN</span>
                            <p class="text-[11px] uppercase tracking-wider text-gray-500 uppercase font-semibold">Hệ thống sửa chữa uy tín</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6 pr-4">Chuyên phân phối, sửa chữa điện thoại và laptop chính hãng. Chúng tôi cam kết sử dụng linh kiện zin 100%, bảo hành dài hạn với quy trình minh bạch.</p>
                    
                    <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100">
                        <p class="text-sm font-semibold text-gray-800 mb-2">Thông tin liên hệ</p>
                        <div class="space-y-3 text-sm text-gray-600">
                            <p class="flex items-center gap-2">📞 Tổng đài: <a href="tel:0xxxxxxxxx" class="text-[#d70018] font-bold hover:underline">0xxx.xxx.xxx</a></p>
                            <p class="flex items-start gap-2">📍 Địa chỉ: Tầng 1, Tòa nhà ABC, xxx Đường Y, Quận Z, TP.HCM</p>
                            <p class="flex items-center gap-2">⏰ Giờ phục vụ: 08:00 - 21:00 (Kể cả Chủ Nhật)</p>
                        </div>
                    </div>
                </div>

                {{-- Dịch vụ phổ biến --}}
                <div>
                    <h3 class="text-gray-800 font-extrabold uppercase text-sm tracking-wider mb-5">Dịch vụ sửa chữa</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" wire:navigate class="text-gray-600 hover:text-[#d70018] transition-colors flex items-center gap-2"><span>▸</span> Thay pin iPhone</a></li>
                        <li><a href="#" wire:navigate class="text-gray-600 hover:text-[#d70018] transition-colors flex items-center gap-2"><span>▸</span> Thay màn hình iPhone</a></li>
                        <li><a href="#" wire:navigate class="text-gray-600 hover:text-[#d70018] transition-colors flex items-center gap-2"><span>▸</span> Ép kính điện thoại</a></li>
                        <li><a href="#" wire:navigate class="text-gray-600 hover:text-[#d70018] transition-colors flex items-center gap-2"><span>▸</span> Sửa nguồn, Mainboard</a></li>
                        <li><a href="#" wire:navigate class="text-gray-600 hover:text-[#d70018] transition-colors flex items-center gap-2"><span>▸</span> Vệ sinh & Bảo dưỡng Laptop</a></li>
                    </ul>
                </div>

                {{-- Chính sách --}}
                <div>
                    <h3 class="text-gray-800 font-extrabold uppercase text-sm tracking-wider mb-5">Chính sách & Hỗ trợ</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-[#d70018] transition-colors flex items-center gap-2"><span>▸</span> Chính sách bảo hành</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-[#d70018] transition-colors flex items-center gap-2"><span>▸</span> Quy trình sửa chữa</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-[#d70018] transition-colors flex items-center gap-2"><span>▸</span> Chính sách đổi trả</a></li>
                        <li><a href="/blog" wire:navigate class="text-gray-600 hover:text-[#d70018] transition-colors flex items-center gap-2"><span>▸</span> Blog thủ thuật</a></li>
                    </ul>

                    {{-- Trust Badges --}}
                    <div class="mt-6 flex gap-3">
                        <img src="https://images.dmca.com/Badges/dmca-badge-w100-5x1-01.png?ID=xxxx" alt="DMCA" class="h-8 opacity-70 hover:opacity-100 transition-opacity">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Visa_Logo.png/640px-Visa_Logo.png" alt="Visa" class="h-8 object-contain opacity-70 hover:opacity-100 transition-opacity">
                    </div>
                </div>
            </div>

            {{-- Copyright --}}
            <div class="border-t border-gray-100 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
                <p>&copy; {{ date('Y') }} Công ty Cổ phần Thương mại Dịch vụ Điện Thoại Laptop VN.</p>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-[#d70018] transition">Điều khoản sử dụng</a>
                    <a href="#" class="hover:text-[#d70018] transition">Bảo mật thông tin</a>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
