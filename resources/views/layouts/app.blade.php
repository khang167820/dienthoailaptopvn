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
        "telephone": "+84-777-333-763",
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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    @php
        $menuCategories = \App\Models\Category::active()->orderBy('sort_order')->limit(5)->get(['id', 'name', 'slug']);
    @endphp
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900">
    {{-- Promo Bar với Shimmer Animation --}}
    <div class="relative bg-gradient-to-r from-yellow-400 via-yellow-500 to-amber-500 text-black text-xs font-semibold py-2 text-center overflow-hidden">
        <div class="absolute inset-0 animate-shimmer pointer-events-none"></div>
        <div class="relative z-10 container mx-auto px-4 flex items-center justify-center gap-2">
            <span class="inline-block animate-bounce text-sm">🎉</span>
            <span>Đặt trước dịch vụ hôm nay - Giảm ngay <span class="text-[#d70018] font-extrabold">200.000đ</span></span>
            <a href="tel:0777333763" class="ml-2 bg-[#d70018] text-white px-3 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wide hover:bg-red-700 transition-colors">Liên hệ ngay</a>
        </div>
    </div>

    {{-- Header / Navigation --}}
    <header class="sticky top-0 z-50" x-data="{ scrolled: false }" @scroll.window="scrolled = window.scrollY > 50">
        {{-- Main Header --}}
        <div :class="scrolled ? 'shadow-xl bg-[#c00016]' : 'shadow-md bg-[#d70018]'" class="text-white transition-all duration-500">
            <div class="container px-4 mx-auto">
                <div class="flex items-center justify-between h-[68px] gap-4">
                    {{-- Logo --}}
                    <a href="/" wire:navigate class="flex items-center gap-2.5 shrink-0 group">
                        <div class="flex items-center justify-center w-[44px] h-[44px] font-black text-[#d70018] bg-white rounded-xl shadow-lg text-xl tracking-tighter group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                            DL
                        </div>
                        <div class="hidden md:block text-white">
                            <div class="text-lg font-extrabold leading-tight tracking-wide">Điện Thoại Laptop</div>
                            <div class="text-[10px] leading-tight tracking-widest uppercase opacity-80">Hệ thống sửa chữa uy tín</div>
                        </div>
                    </a>

                    {{-- Search Bar --}}
                    <div class="flex-1 max-w-2xl px-2 lg:px-6">
                        <div class="relative group">
                            <input type="text" placeholder="Bạn cần sửa gì hôm nay? (vd: Thay pin iPhone 13...)" class="w-full h-[42px] pl-11 pr-4 text-sm text-gray-900 transition-all bg-white/95 border-2 border-transparent shadow-inner outline-none rounded-xl focus:border-yellow-400 focus:bg-white focus:ring-0 placeholder-gray-400">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-[#d70018] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Right Actions --}}
                    <div class="flex items-center gap-3 shrink-0">
                        <a href="tel:0777333763" class="items-center hidden gap-2 px-3 py-2 transition-all rounded-xl lg:flex bg-white/15 hover:bg-white/25 hover:scale-105 duration-300">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-white/20">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[11px] opacity-80 leading-none mb-0.5">Gọi tư vấn (Mai Quyên)</span>
                                <span class="text-sm font-bold leading-none">0777.333.763</span>
                            </div>
                        </a>
                        <a href="tel:0934660219" class="items-center hidden gap-2 px-3 py-2 transition-all rounded-xl md:flex bg-white/15 hover:bg-white/25 hover:scale-105 duration-300">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-white/20">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[11px] opacity-80 leading-none mb-0.5">Kỹ thuật (Khang)</span>
                                <span class="text-sm font-bold leading-none">0934.660.219</span>
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
                    <a href="/" wire:navigate class="relative flex items-center gap-2 text-sm font-bold text-gray-800 transition-all hover:text-[#d70018] hover:-translate-y-0.5 group">
                        <span class="text-lg">📱</span> Trang chủ
                        <span class="absolute -bottom-2.5 left-0 w-0 h-0.5 bg-[#d70018] rounded-full transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    @foreach($menuCategories as $cat)
                        <a href="/{{ $cat->slug }}" wire:navigate class="relative flex items-center gap-2 text-sm font-bold text-gray-800 transition-all hover:text-[#d70018] hover:-translate-y-0.5 group">
                            <span class="text-lg">{{ $cat->icon ?? '🔧' }}</span> {{ $cat->name }}
                            <span class="absolute -bottom-2.5 left-0 w-0 h-0.5 bg-[#d70018] rounded-full transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    @endforeach
                    <a href="/blog" wire:navigate class="relative flex items-center gap-2 text-sm font-bold text-gray-800 transition-all hover:text-[#d70018] hover:-translate-y-0.5 group">
                        <span class="text-lg">💡</span> Thủ thuật
                        <span class="absolute -bottom-2.5 left-0 w-0 h-0.5 bg-[#d70018] rounded-full transition-all duration-300 group-hover:w-full"></span>
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
                <div class="pt-3 border-t border-gray-100 mt-2 space-y-2">
                    <a href="tel:0777333763" class="flex items-center gap-2 px-4 py-3 bg-red-50 text-[#d70018] rounded-xl font-bold text-sm">
                        📞 CSKH: 0777.333.763
                    </a>
                    <a href="tel:0934660219" class="flex items-center gap-2 px-4 py-3 bg-gray-50 text-gray-700 rounded-xl font-bold text-sm">
                        🔧 Kỹ thuật: 0934.660.219
                    </a>
                </div>
            </div>
        </div>
    </header>

    {{-- Breadcrumbs --}}
    @hasSection('breadcrumbs')
        <div class="bg-gray-100/80 border-b border-gray-200/50">
            <div class="container mx-auto px-4 py-3">
                <nav class="text-sm text-gray-500 flex items-center gap-1 flex-wrap" aria-label="Breadcrumb">
                    @yield('breadcrumbs')
                </nav>
            </div>
        </div>
    @endif

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer - Dark Premium Design --}}
    <footer class="wave-separator bg-[#1a1a2e] text-gray-300 mt-16 pt-16 pb-8 relative overflow-hidden">
        {{-- Decorative glow --}}
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#d70018]/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 right-1/4 w-64 h-64 bg-blue-500/5 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                {{-- About --}}
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-12 h-12 bg-[#d70018] rounded-xl flex items-center justify-center text-white font-extrabold text-xl shadow-lg shadow-red-500/20">DL</div>
                        <div>
                            <span class="font-extrabold text-xl text-white tracking-tight">Điện Thoại Laptop VN</span>
                            <p class="text-[11px] uppercase tracking-wider text-gray-500 font-semibold">Hệ thống sửa chữa uy tín</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6 pr-4 max-w-md">Hệ thống sửa chữa & cung cấp giải pháp phần mềm hàng đầu. Trực thuộc hệ sinh thái <a href="https://thuetaikhoan.com.vn" class="text-[#d70018] font-bold hover:text-red-400 transition-colors" target="_blank">Thuetaikhoan.com.vn</a>.</p>
                    
                    <div class="bg-white/5 p-5 rounded-2xl border border-white/10 backdrop-blur-sm">
                        <p class="text-sm font-semibold text-white mb-3 flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                            Đang hoạt động
                        </p>
                        <div class="space-y-2.5 text-sm text-gray-400">
                            <p class="flex items-center gap-2">📞 CSKH tư vấn: <a href="tel:0777333763" class="text-white font-bold hover:text-[#d70018] transition-colors">0777.333.763</a> <span class="text-gray-500">(Mai Quyên)</span></p>
                            <p class="flex items-center gap-2">🔧 Hỗ trợ kỹ thuật: <a href="tel:0934660219" class="text-white font-bold hover:text-[#d70018] transition-colors">0934.660.219</a> <span class="text-gray-500">(Khang/Thanhtaj)</span></p>
                            <p class="flex items-center gap-2">🌐 Cộng đồng Thợ: <a href="https://zalo.me/g/qncjky686" target="_blank" class="text-[#d70018] font-bold hover:text-red-400 transition-colors">Tham gia Zalo Group</a></p>
                            <p class="flex items-center gap-2">⏰ Giờ phục vụ: <span class="text-white font-medium">08:00 - 21:00</span> (Kể cả Chủ Nhật)</p>
                        </div>
                    </div>
                </div>

                {{-- Dịch vụ phổ biến --}}
                <div>
                    <h3 class="text-white font-extrabold uppercase text-sm tracking-wider mb-5 flex items-center gap-2">
                        <span class="w-1 h-5 bg-[#d70018] rounded-full"></span>
                        Dịch vụ sửa chữa
                    </h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" wire:navigate class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group"><span class="text-[#d70018] group-hover:translate-x-1 transition-transform">▸</span> Thay pin iPhone</a></li>
                        <li><a href="#" wire:navigate class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group"><span class="text-[#d70018] group-hover:translate-x-1 transition-transform">▸</span> Thay màn hình iPhone</a></li>
                        <li><a href="#" wire:navigate class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group"><span class="text-[#d70018] group-hover:translate-x-1 transition-transform">▸</span> Ép kính điện thoại</a></li>
                        <li><a href="#" wire:navigate class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group"><span class="text-[#d70018] group-hover:translate-x-1 transition-transform">▸</span> Sửa nguồn, Mainboard</a></li>
                        <li><a href="#" wire:navigate class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group"><span class="text-[#d70018] group-hover:translate-x-1 transition-transform">▸</span> Vệ sinh & Bảo dưỡng Laptop</a></li>
                    </ul>
                </div>

                {{-- Chính sách --}}
                <div>
                    <h3 class="text-white font-extrabold uppercase text-sm tracking-wider mb-5 flex items-center gap-2">
                        <span class="w-1 h-5 bg-[#d70018] rounded-full"></span>
                        Chính sách & Hỗ trợ
                    </h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group"><span class="text-[#d70018] group-hover:translate-x-1 transition-transform">▸</span> Chính sách bảo hành</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group"><span class="text-[#d70018] group-hover:translate-x-1 transition-transform">▸</span> Quy trình sửa chữa</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group"><span class="text-[#d70018] group-hover:translate-x-1 transition-transform">▸</span> Chính sách đổi trả</a></li>
                        <li><a href="/blog" wire:navigate class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group"><span class="text-[#d70018] group-hover:translate-x-1 transition-transform">▸</span> Blog thủ thuật</a></li>
                    </ul>

                    {{-- Trust Badges --}}
                    <div class="mt-6 flex gap-3">
                        <div class="px-3 py-1.5 bg-white/5 border border-white/10 rounded-lg text-[10px] font-bold text-gray-500 uppercase tracking-wider">SSL Secure</div>
                        <div class="px-3 py-1.5 bg-white/5 border border-white/10 rounded-lg text-[10px] font-bold text-gray-500 uppercase tracking-wider">DMCA</div>
                    </div>
                </div>
            </div>

            {{-- Copyright --}}
            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
                <p>&copy; {{ date('Y') }} Điện Thoại Laptop VN & Thuetaikhoan Ecosystem. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="https://thuetaikhoan.com.vn" target="_blank" class="hover:text-[#d70018] transition font-bold">Thuê Tool Tự Động</a>
                    <a href="https://www.facebook.com/people/Thuetaikhoannet/61586731454108/" target="_blank" class="hover:text-[#d70018] transition">Fanpage</a>
                    <a href="https://zalo.me/g/qncjky686" target="_blank" class="hover:text-[#d70018] transition">Zalo Group</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Back to Top Button --}}
    <button id="back-to-top" class="back-to-top" onclick="window.scrollTo({top:0,behavior:'smooth'})" aria-label="Về đầu trang">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"/></svg>
    </button>

    <script>
        // Back to top visibility
        window.addEventListener('scroll', function() {
            const btn = document.getElementById('back-to-top');
            if (btn) {
                btn.classList.toggle('visible', window.scrollY > 400);
            }
        });

        // ═══════════════════════════════════════════
        // SCROLL REVEAL OBSERVER — Robust version
        // Fixes: elements not appearing when scrolling
        // ═══════════════════════════════════════════
        function initRevealObserver() {
            const els = document.querySelectorAll('.reveal:not(.revealed), .stagger-children:not(.revealed)');
            if (!els.length) return;

            // 1. Immediately reveal elements already in or above the viewport
            //    (handles fast scroll, back-navigation, or already-scrolled pages)
            els.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight + 50) {
                    el.classList.add('revealed');
                }
            });

            // 2. Observe remaining hidden elements
            const remaining = document.querySelectorAll('.reveal:not(.revealed), .stagger-children:not(.revealed)');
            if (!remaining.length) return;

            const obs = new IntersectionObserver((entries) => {
                entries.forEach(e => {
                    if (e.isIntersecting) {
                        e.target.classList.add('revealed');
                        obs.unobserve(e.target);
                    }
                });
            }, { threshold: 0.01, rootMargin: '0px 0px -10px 0px' });

            remaining.forEach(el => obs.observe(el));

            // 3. Safety fallback: reveal all remaining elements after 3s
            //    Prevents permanent invisible content if observer fails
            setTimeout(() => {
                document.querySelectorAll('.reveal:not(.revealed), .stagger-children:not(.revealed)').forEach(el => {
                    el.classList.add('revealed');
                });
            }, 3000);
        }

        // Fire on initial page load
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initRevealObserver);
        } else {
            // DOM already loaded (e.g. deferred script)
            initRevealObserver();
        }

        // Fire on Livewire wire:navigate page transitions
        document.addEventListener('livewire:navigated', function() {
            // Small delay to let DOM render after Livewire swap
            setTimeout(initRevealObserver, 100);
        });
    </script>

    @livewireScripts
</body>
</html>
