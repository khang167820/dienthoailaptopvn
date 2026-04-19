@extends('layouts.app')

@section('content')
{{-- ╔═══════════════════════════════════════════════════════╗
    ║  HERO SECTION — CINEMATIC PREMIUM                      ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="relative bg-gradient-to-br from-[#0a0a1a] via-[#1a1a2e] to-[#0f3460] pt-8 pb-14 overflow-hidden noise-overlay">
    {{-- Particle field --}}
    <div class="particle-field">
        <span style="top:10%;left:5%;animation-duration:7s"></span>
        <span style="top:25%;left:15%;animation-duration:9s;animation-delay:1s"></span>
        <span style="top:60%;left:25%;animation-duration:6s;animation-delay:0.5s"></span>
        <span style="top:15%;left:40%;animation-duration:11s;animation-delay:2s"></span>
        <span style="top:70%;left:55%;animation-duration:8s;animation-delay:1.5s"></span>
        <span style="top:30%;left:65%;animation-duration:10s;animation-delay:0.8s"></span>
        <span style="top:80%;left:75%;animation-duration:7s;animation-delay:2.5s"></span>
        <span style="top:45%;left:85%;animation-duration:9s;animation-delay:0.3s"></span>
        <span style="top:20%;left:90%;animation-duration:12s;animation-delay:1.8s"></span>
        <span style="top:55%;left:10%;animation-duration:8s;animation-delay:3s"></span>
        <span style="top:35%;left:50%;animation-duration:6s;animation-delay:2.2s"></span>
        <span style="top:75%;left:35%;animation-duration:10s;animation-delay:0.7s"></span>
    </div>

    {{-- Decorative glows --}}
    <div class="absolute top-10 right-10 w-96 h-96 bg-[#d70018]/10 rounded-full blur-3xl animate-float pointer-events-none"></div>
    <div class="absolute bottom-10 left-10 w-72 h-72 bg-blue-500/8 rounded-full blur-3xl animate-float delay-200 pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-gradient-radial from-purple-500/5 to-transparent rounded-full blur-3xl pointer-events-none"></div>

    {{-- SVG grid pattern --}}
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width=%2260%22%20height=%2260%22%20xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath%20d=%22M30%200L60%2030L30%2060L0%2030Z%22%20fill=%22none%22%20stroke=%22rgba(255,255,255,0.02)%22%20stroke-width=%221%22/%3E%3C/svg%3E')] opacity-60"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row gap-5">
            {{-- Main Hero Banner --}}
            <div class="w-full lg:w-[70%] bg-[url('/images/repair_banner_new.png')] bg-cover bg-center rounded-2xl p-8 lg:p-12 text-white relative flex flex-col justify-center min-h-[360px] shadow-2xl overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/65 to-black/25 z-0"></div>

                <div class="relative z-10 w-full md:w-[85%]">
                    <span class="inline-flex items-center gap-2 bg-gradient-to-r from-[#d70018] to-[#ff2d4a] text-white text-xs font-bold px-4 py-2 rounded-full mb-6 shadow-lg shadow-red-500/30 uppercase tracking-widest">
                        <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                        Chuyên gia Kỹ thuật Phần mềm
                    </span>

                    <h1 class="text-3xl md:text-5xl font-black leading-[1.08] mb-5 drop-shadow-lg">
                        SỬA CHỮA THIẾT BỊ <br class="hidden md:block"/>CHUYÊN NGHIỆP
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-amber-400 to-orange-400 mt-2 typing-cursor" id="hero-tagline">GIẢI PHÁP TỪ CHUYÊN GIA SỐ 1 VN</span>
                    </h1>

                    <p class="text-white/80 mb-8 font-medium text-sm md:text-base leading-relaxed max-w-xl">
                        Hơn 8 năm thực chiến phần cứng & nắm giữ hệ sinh thái phần mềm Unlock/Bypass lớn nhất. Chúng tôi không chỉ "thay thế linh kiện", chúng tôi <strong class="text-white">cứu sống thiết bị</strong> của bạn.
                    </p>

                    <div class="flex flex-wrap gap-3">
                        <a href="tel:0777333763" class="btn-3d inline-flex items-center gap-2.5 bg-white text-[#d70018] px-7 py-3.5 rounded-xl font-bold uppercase text-sm shadow-lg hover:bg-yellow-400 hover:text-black transition-colors duration-300">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            Báo giá lỗi ngay
                        </a>
                        <a href="https://thuetaikhoan.com.vn" target="_blank" class="btn-3d inline-flex items-center gap-2.5 glass-dark text-white px-7 py-3.5 rounded-xl font-bold uppercase text-sm transition-colors duration-300 hover:bg-white/20">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            Dành cho Thợ (Thuê Tool)
                        </a>
                    </div>
                </div>

                {{-- Trust Badges (Animated Counters) --}}
                <div class="hidden md:flex absolute bottom-5 right-5 glass-dark rounded-2xl px-6 py-4 gap-6">
                    <div class="text-center">
                        <strong class="block text-yellow-400 text-2xl font-black counter-value" data-target="1000">0</strong>
                        <span class="text-[11px] text-white/80 font-medium">Thợ toàn quốc</span>
                    </div>
                    <div class="w-px bg-white/15"></div>
                    <div class="text-center">
                        <strong class="block text-yellow-400 text-2xl font-black counter-value" data-target="100">0</strong>
                        <span class="text-[11px] text-white/80 font-medium">% Xử lý từ xa</span>
                    </div>
                    <div class="w-px bg-white/15"></div>
                    <div class="text-center">
                        <strong class="block text-yellow-400 text-2xl font-black counter-value" data-target="8">0</strong>
                        <span class="text-[11px] text-white/80 font-medium">Năm kinh nghiệm</span>
                    </div>
                </div>
            </div>

            {{-- 2 Side Banners (with gradient border animation) --}}
            <div class="hidden lg:flex w-[30%] flex-col gap-5">
                <div class="flex-1 glass-card-dark rounded-2xl p-6 text-white relative overflow-hidden flex items-center group">
                    <div class="absolute -right-4 -bottom-4 text-8xl opacity-10 group-hover:scale-125 group-hover:rotate-12 transition-all duration-700">💻</div>
                    <div class="absolute top-0 right-0 w-32 h-32 bg-[#d70018]/8 rounded-full blur-2xl"></div>
                    <div class="relative z-10 w-full">
                        <span class="inline-flex items-center gap-1.5 bg-yellow-400/15 text-yellow-400 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider mb-3">
                            <span class="w-1.5 h-1.5 bg-yellow-400 rounded-full animate-pulse"></span> Hệ Sinh Thái GSM
                        </span>
                        <h3 class="font-black text-xl mb-2 text-white leading-tight">Xóa iCloud, MDM, Knox</h3>
                        <p class="text-xs text-gray-400 leading-relaxed">Mở khóa từ xa qua TeamViewer / UltraViewer</p>
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-2xl p-6 border-2 border-[#d70018]/15 text-[#d70018] relative overflow-hidden flex items-center group hover:border-[#d70018] transition-all duration-500 card-premium">
                    <div class="absolute -right-4 -bottom-4 text-8xl opacity-5 group-hover:scale-125 group-hover:-rotate-12 transition-all duration-700">🚗</div>
                    <div class="relative z-10">
                        <span class="inline-flex items-center gap-1.5 bg-red-50 text-[#d70018] px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider mb-3">
                            🔥 Hot Service
                        </span>
                        <h3 class="font-black text-xl mb-2 text-[#d70018]">Vietmap Live Pro</h3>
                        <p class="text-xs font-medium text-gray-500">Cài đặt & Gia hạn bản quyền VIP</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  STATS COUNTER BAR — NEW                               ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="relative bg-gradient-to-r from-[#1a1a2e] via-[#0f3460] to-[#1a1a2e] py-0 overflow-hidden" id="stats-bar">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-white/10" id="stats-counter">
            <div class="stat-card py-6 md:py-8">
                <div class="flex justify-center mb-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-[#d70018] to-[#ff4757] rounded-xl flex items-center justify-center shadow-lg shadow-red-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    </div>
                </div>
                <span class="block text-3xl md:text-4xl font-black text-white counter-value" data-target="5000" data-suffix="+">0</span>
                <span class="text-xs md:text-sm text-gray-400 font-medium mt-1 block">Thiết bị đã sửa</span>
            </div>
            <div class="stat-card py-6 md:py-8">
                <div class="flex justify-center mb-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg shadow-green-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
                <span class="block text-3xl md:text-4xl font-black text-white counter-value" data-target="98" data-suffix="%">0</span>
                <span class="text-xs md:text-sm text-gray-400 font-medium mt-1 block">Khách hàng hài lòng</span>
            </div>
            <div class="stat-card py-6 md:py-8">
                <div class="flex justify-center mb-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
                <span class="block text-3xl md:text-4xl font-black text-white counter-value" data-target="8" data-suffix=" Năm">0</span>
                <span class="text-xs md:text-sm text-gray-400 font-medium mt-1 block">Kinh nghiệm thực chiến</span>
            </div>
            <div class="stat-card py-6 md:py-8">
                <div class="flex justify-center mb-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg shadow-orange-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                </div>
                <span class="block text-3xl md:text-4xl font-black text-white counter-value" data-target="20" data-suffix="+">0</span>
                <span class="text-xs md:text-sm text-gray-400 font-medium mt-1 block">Tool phần mềm chính hãng</span>
            </div>
        </div>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  QUICK SERVICE NAVIGATION — Category Buttons           ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-14 md:py-20 bg-gradient-to-b from-white via-gray-50/50 to-white relative overflow-hidden" id="danh-muc-dich-vu">
    {{-- Decorative blobs --}}
    <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-red-50/40 rounded-full blur-3xl pointer-events-none -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-1/4 w-[400px] h-[400px] bg-blue-50/30 rounded-full blur-3xl pointer-events-none translate-y-1/2"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-radial from-amber-50/20 to-transparent rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        {{-- Section Header --}}
        <div class="text-center mb-12 reveal">
            <div class="inline-flex items-center gap-2 bg-gradient-to-r from-red-50 to-pink-50 text-[#d70018] px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-widest mb-5 border border-red-100/50">
                <span class="relative flex h-2.5 w-2.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#d70018] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-[#d70018]"></span>
                </span>
                Dịch vụ theo danh mục
            </div>
            <h2 class="text-3xl md:text-4xl font-black text-gray-900 uppercase tracking-tight mb-3">Bạn Cần Sửa Chữa Gì?</h2>
            <p class="text-gray-500 text-sm md:text-base mt-2 max-w-xl mx-auto leading-relaxed">Chọn danh mục phù hợp để xem bảng giá chi tiết và đặt lịch sửa chữa ngay hôm nay</p>
        </div>

        {{-- Service Category Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 md:gap-6 stagger-children reveal">

            {{-- 1. Sửa Điện Thoại --}}
            <a href="/sua-dien-thoai" wire:navigate id="btn-sua-dien-thoai"
               class="service-card-tilt group relative rounded-2xl overflow-hidden min-h-[300px] md:min-h-[360px] flex flex-col justify-end cursor-pointer shadow-lg hover:shadow-2xl transition-all duration-500">
                {{-- Background Image --}}
                <img src="/images/category_phone_repair.png" alt="Sửa Điện Thoại" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                {{-- Gradient Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/50 to-black/10 group-hover:from-[#d70018]/95 group-hover:via-[#d70018]/40 transition-all duration-500"></div>
                {{-- Shimmer sweep on hover --}}
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full" style="transition: transform 0.8s ease, opacity 0.3s ease;"></div>
                {{-- Floating Icon with pulse ring --}}
                <div class="absolute top-5 right-5 icon-with-pulse">
                    <div class="w-14 h-14 bg-white/15 backdrop-blur-md rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-12 group-hover:bg-white/25 transition-all duration-500 border border-white/20 shadow-lg">
                        📱
                    </div>
                </div>
                {{-- Badge --}}
                <div class="absolute top-5 left-5">
                    <span class="inline-flex items-center gap-1.5 bg-gradient-to-r from-emerald-500 to-green-600 text-white text-[9px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-md animate-pulse-glow">
                        <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
                        Phổ biến nhất
                    </span>
                </div>
                {{-- Content --}}
                <div class="relative z-10 p-6">
                    {{-- Mini stats --}}
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-flex items-center gap-1 text-[10px] text-white/70 font-medium bg-white/10 px-2 py-1 rounded-md backdrop-blur-sm">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            500+ máy/tháng
                        </span>
                        <span class="inline-flex items-center gap-1 text-[10px] text-yellow-300/90 font-medium bg-white/10 px-2 py-1 rounded-md backdrop-blur-sm">
                            ⚡ Từ 150k
                        </span>
                    </div>
                    <h3 class="text-xl md:text-2xl font-black text-white mb-2 drop-shadow-md group-hover:text-yellow-300 transition-colors duration-300">Sửa Điện Thoại</h3>
                    <p class="text-white/80 text-xs md:text-sm leading-relaxed mb-4 line-clamp-2">iPhone, Samsung, Xiaomi, Oppo... Thay màn hình, pin, sửa main, unlock phần mềm</p>
                    <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-sm text-white px-5 py-2.5 rounded-full text-xs font-bold group-hover:bg-white group-hover:text-[#d70018] transition-all duration-300 border border-white/20 group-hover:shadow-lg">
                        Xem bảng giá
                        <svg class="w-4 h-4 group-hover:translate-x-1.5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            </a>

            {{-- 2. Sửa Laptop --}}
            <a href="/sua-laptop" wire:navigate id="btn-sua-laptop"
               class="service-card-tilt group relative rounded-2xl overflow-hidden min-h-[300px] md:min-h-[360px] flex flex-col justify-end cursor-pointer shadow-lg hover:shadow-2xl transition-all duration-500">
                {{-- Background Image --}}
                <img src="/images/category_laptop_repair.png" alt="Sửa Laptop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                {{-- Gradient Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/50 to-black/10 group-hover:from-blue-700/95 group-hover:via-blue-600/40 transition-all duration-500"></div>
                {{-- Shimmer sweep --}}
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full" style="transition: transform 0.8s ease, opacity 0.3s ease;"></div>
                {{-- Floating Icon --}}
                <div class="absolute top-5 right-5 icon-with-pulse">
                    <div class="w-14 h-14 bg-white/15 backdrop-blur-md rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-12 group-hover:bg-white/25 transition-all duration-500 border border-white/20 shadow-lg">
                        💻
                    </div>
                </div>
                {{-- Badge --}}
                <div class="absolute top-5 left-5">
                    <span class="inline-flex items-center gap-1.5 bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-[9px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-md">
                        <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
                        Chuyên sâu
                    </span>
                </div>
                {{-- Content --}}
                <div class="relative z-10 p-6">
                    {{-- Mini stats --}}
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-flex items-center gap-1 text-[10px] text-white/70 font-medium bg-white/10 px-2 py-1 rounded-md backdrop-blur-sm">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            200+ máy/tháng
                        </span>
                        <span class="inline-flex items-center gap-1 text-[10px] text-blue-300/90 font-medium bg-white/10 px-2 py-1 rounded-md backdrop-blur-sm">
                            ⚡ Từ 250k
                        </span>
                    </div>
                    <h3 class="text-xl md:text-2xl font-black text-white mb-2 drop-shadow-md group-hover:text-blue-300 transition-colors duration-300">Sửa Laptop</h3>
                    <p class="text-white/80 text-xs md:text-sm leading-relaxed mb-4 line-clamp-2">MacBook, Dell, HP, Asus... Vệ sinh, thay keo tản nhiệt, sửa main, nâng cấp SSD/RAM</p>
                    <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-sm text-white px-5 py-2.5 rounded-full text-xs font-bold group-hover:bg-white group-hover:text-blue-600 transition-all duration-300 border border-white/20 group-hover:shadow-lg">
                        Xem bảng giá
                        <svg class="w-4 h-4 group-hover:translate-x-1.5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            </a>

            {{-- 3. Sửa Tablet --}}
            <a href="/sua-tablet" wire:navigate id="btn-sua-tablet"
               class="service-card-tilt group relative rounded-2xl overflow-hidden min-h-[300px] md:min-h-[360px] flex flex-col justify-end cursor-pointer shadow-lg hover:shadow-2xl transition-all duration-500">
                {{-- Background Image --}}
                <img src="/images/category_tablet_repair.png" alt="Sửa Tablet" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                {{-- Gradient Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/50 to-black/10 group-hover:from-amber-700/95 group-hover:via-amber-600/40 transition-all duration-500"></div>
                {{-- Shimmer sweep --}}
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full" style="transition: transform 0.8s ease, opacity 0.3s ease;"></div>
                {{-- Floating Icon --}}
                <div class="absolute top-5 right-5 icon-with-pulse">
                    <div class="w-14 h-14 bg-white/15 backdrop-blur-md rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-12 group-hover:bg-white/25 transition-all duration-500 border border-white/20 shadow-lg">
                        📟
                    </div>
                </div>
                {{-- Badge --}}
                <div class="absolute top-5 left-5">
                    <span class="inline-flex items-center gap-1.5 bg-gradient-to-r from-amber-500 to-orange-600 text-white text-[9px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-md">
                        <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
                        iPad chuyên sâu
                    </span>
                </div>
                {{-- Content --}}
                <div class="relative z-10 p-6">
                    {{-- Mini stats --}}
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-flex items-center gap-1 text-[10px] text-white/70 font-medium bg-white/10 px-2 py-1 rounded-md backdrop-blur-sm">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            100+ máy/tháng
                        </span>
                        <span class="inline-flex items-center gap-1 text-[10px] text-amber-300/90 font-medium bg-white/10 px-2 py-1 rounded-md backdrop-blur-sm">
                            ⚡ Từ 200k
                        </span>
                    </div>
                    <h3 class="text-xl md:text-2xl font-black text-white mb-2 drop-shadow-md group-hover:text-amber-300 transition-colors duration-300">Sửa Tablet</h3>
                    <p class="text-white/80 text-xs md:text-sm leading-relaxed mb-4 line-clamp-2">iPad, Samsung Tab, Huawei... Thay kính, màn hình, pin, sửa lỗi phần mềm chuyên sâu</p>
                    <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-sm text-white px-5 py-2.5 rounded-full text-xs font-bold group-hover:bg-white group-hover:text-amber-600 transition-all duration-300 border border-white/20 group-hover:shadow-lg">
                        Xem bảng giá
                        <svg class="w-4 h-4 group-hover:translate-x-1.5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            </a>

            {{-- 4. Thủ Thuật --}}
            <a href="/blog" wire:navigate id="btn-thu-thuat"
               class="service-card-tilt group relative rounded-2xl overflow-hidden min-h-[300px] md:min-h-[360px] flex flex-col justify-end cursor-pointer shadow-lg hover:shadow-2xl transition-all duration-500">
                {{-- Background Image --}}
                <img src="/images/category_tips_tricks.png" alt="Thủ Thuật" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                {{-- Gradient Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/50 to-black/10 group-hover:from-purple-700/95 group-hover:via-purple-600/40 transition-all duration-500"></div>
                {{-- Shimmer sweep --}}
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full" style="transition: transform 0.8s ease, opacity 0.3s ease;"></div>
                {{-- Floating Icon --}}
                <div class="absolute top-5 right-5 icon-with-pulse">
                    <div class="w-14 h-14 bg-white/15 backdrop-blur-md rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-12 group-hover:bg-white/25 transition-all duration-500 border border-white/20 shadow-lg">
                        💡
                    </div>
                </div>
                {{-- Badge --}}
                <div class="absolute top-5 left-5">
                    <span class="inline-flex items-center gap-1.5 bg-gradient-to-r from-purple-500 to-indigo-600 text-white text-[9px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-md animate-pulse-glow">
                        <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
                        Miễn phí
                    </span>
                </div>
                {{-- Content --}}
                <div class="relative z-10 p-6">
                    {{-- Mini stats --}}
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-flex items-center gap-1 text-[10px] text-white/70 font-medium bg-white/10 px-2 py-1 rounded-md backdrop-blur-sm">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            50+ bài viết
                        </span>
                        <span class="inline-flex items-center gap-1 text-[10px] text-purple-300/90 font-medium bg-white/10 px-2 py-1 rounded-md backdrop-blur-sm">
                            🔥 Cập nhật liên tục
                        </span>
                    </div>
                    <h3 class="text-xl md:text-2xl font-black text-white mb-2 drop-shadow-md group-hover:text-purple-300 transition-colors duration-300">Thủ Thuật & Blog</h3>
                    <p class="text-white/80 text-xs md:text-sm leading-relaxed mb-4 line-clamp-2">Hướng dẫn tự sửa, test point, unlock, bypass và các mẹo kỹ thuật từ chuyên gia</p>
                    <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-sm text-white px-5 py-2.5 rounded-full text-xs font-bold group-hover:bg-white group-hover:text-purple-600 transition-all duration-300 border border-white/20 group-hover:shadow-lg">
                        Khám phá ngay
                        <svg class="w-4 h-4 group-hover:translate-x-1.5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            </a>
        </div>

        {{-- Quick Action Buttons Row --}}
        <div class="mt-10 flex flex-wrap justify-center gap-3 reveal">
            <a href="tel:0777333763" class="inline-flex items-center gap-2 bg-gradient-to-r from-[#d70018] to-[#ff2d4a] text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-red-500/20 hover:shadow-xl hover:scale-[1.02] transition-all duration-300 btn-3d">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                Gọi Báo Giá Ngay
            </a>
            <a href="https://zalo.me/0777333763" target="_blank" class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-blue-500/20 hover:shadow-xl hover:scale-[1.02] transition-all duration-300 btn-3d">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.568 8.16c-.169-.398-.476-.634-.896-.634-.31 0-.581.126-.819.378l-3.856 4.1-1.459-1.459c-.259-.259-.577-.389-.954-.389-.378 0-.716.143-.993.42-.278.278-.416.607-.416.985 0 .378.137.704.416.975l2.396 2.396c.252.252.577.378.975.378.412 0 .763-.152 1.025-.457l4.84-5.152c.219-.232.328-.504.328-.816 0-.344-.195-.631-.586-.725z"/></svg>
                Chat Zalo Tư Vấn
            </a>
            <button x-data @click="$dispatch('open-price-popup')" class="inline-flex items-center gap-2 bg-white text-gray-700 border-2 border-gray-200 hover:border-[#d70018] hover:text-[#d70018] px-6 py-3 rounded-xl font-bold text-sm shadow-sm hover:shadow-lg hover:scale-[1.02] transition-all duration-300">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                Tra Cứu Bảng Giá
            </button>
        </div>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  VẤN ĐỀ PHỔ BIẾN — Problem Statement                 ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-16 bg-white relative" id="van-de-khach-hang">
    <div class="absolute inset-0 bg-gradient-to-b from-gray-50/80 to-transparent h-40"></div>
    <div class="container mx-auto px-4 max-w-4xl text-center relative z-10 reveal">
        <div class="inline-flex items-center gap-2 bg-red-50 text-[#d70018] px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest mb-6">
            <span class="w-2 h-2 bg-[#d70018] rounded-full animate-pulse"></span>
            Vấn đề phổ biến
        </div>
        <h2 class="text-2xl md:text-4xl font-black text-gray-900 mb-6 leading-tight">MÁY MẤT NGUỒN, DÍNH ICLOUD, MDM HAY RƠI VỠ? <br class="hidden md:block"/><span class="text-transparent bg-clip-text bg-gradient-to-r from-[#d70018] to-[#ff4757]">ĐỪNG VỘI BỎ ĐI!</span></h2>
        <p class="text-gray-600 leading-relaxed text-sm md:text-base font-medium max-w-2xl mx-auto">
            Cho dù là lỗi phần cứng phức tạp (chạm chập main, gãy test point) hay mắc kẹt tột độ ở phần mềm (Knox Guard, iCloud, Brick), đội ngũ <strong class="text-gray-900">Điện Thoại Laptop VN</strong> (Chuyên gia Khang & Thanhtaj) đều có giải pháp. Nhờ việc trực tiếp thao tác và phân phối các loại tool mạnh nhất thế giới, bạn sẽ tiết kiệm thời gian lẫn chi phí.
        </p>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  BRAND MARQUEE — Infinite Auto-Scroll                  ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-10 bg-gray-50 border-t border-gray-100" id="thiet-bi">
    <div class="container mx-auto px-4">
        <div class="flex items-end justify-between mb-8 reveal">
            <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight section-title">Sửa Chữa Phần Cứng Theo Hãng</h2>
        </div>

        {{-- Marquee auto-scroll --}}
        <div class="marquee-container py-2">
            <div class="marquee-track">
                @foreach($brands as $brand)
                    <a href="/sua-dien-thoai/{{ $brand->slug }}" wire:navigate
                       class="group flex flex-col items-center gap-2.5 px-5 py-4 bg-white rounded-xl border border-gray-200 hover:border-[#d70018] transition-all duration-300 min-w-[110px] card-premium">
                        @if($brand->logo)
                            <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="w-10 h-10 object-contain grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-300" loading="lazy">
                        @else
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-50 to-pink-50 flex items-center justify-center text-[#d70018] font-bold text-lg group-hover:from-red-100 group-hover:to-pink-100 transition-colors">
                                {{ substr($brand->name, 0, 1) }}
                            </div>
                        @endif
                        <span class="text-xs font-semibold text-gray-600 group-hover:text-[#d70018] transition-colors text-center whitespace-nowrap">{{ $brand->name }}</span>
                    </a>
                @endforeach
                {{-- Duplicate for seamless loop --}}
                @foreach($brands as $brand)
                    <a href="/sua-dien-thoai/{{ $brand->slug }}" wire:navigate
                       class="group flex flex-col items-center gap-2.5 px-5 py-4 bg-white rounded-xl border border-gray-200 hover:border-[#d70018] transition-all duration-300 min-w-[110px] card-premium" aria-hidden="true">
                        @if($brand->logo)
                            <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="w-10 h-10 object-contain grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-300" loading="lazy">
                        @else
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-50 to-pink-50 flex items-center justify-center text-[#d70018] font-bold text-lg">
                                {{ substr($brand->name, 0, 1) }}
                            </div>
                        @endif
                        <span class="text-xs font-semibold text-gray-600 group-hover:text-[#d70018] transition-colors text-center whitespace-nowrap">{{ $brand->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  DỊCH VỤ MŨI NHỌN — Redesigned Service Cards          ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-16 bg-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-red-50/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex items-end justify-between mb-12 reveal">
            <div>
                <div class="inline-flex items-center gap-2 bg-red-50 text-[#d70018] px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-3">
                    <span class="w-1.5 h-1.5 bg-[#d70018] rounded-full"></span>
                    Dịch vụ chính
                </div>
                <h2 class="text-2xl md:text-3xl font-black text-gray-900 uppercase tracking-tight">Dịch Vụ Mũi Nhọn Của Chúng Tôi</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 stagger-children reveal">
            {{-- Card 1: Sửa Phần Cứng --}}
            <div class="glass-card rounded-2xl relative overflow-hidden group">
                <div class="absolute top-4 right-4 z-20">
                    <span class="bg-gradient-to-r from-emerald-500 to-green-600 text-white text-[9px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider shadow-md">Phổ biến</span>
                </div>
                <div class="h-44 w-full overflow-hidden relative">
                    <img src="/images/service_hardware.png" alt="Sửa phần cứng iPhone" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-white via-white/30 to-transparent"></div>
                </div>
                <div class="p-6 pt-4">
                    <h3 class="font-bold text-gray-900 mb-3 text-lg">Sửa Phần Cứng Lấy Liền</h3>
                    <p class="text-sm text-gray-600 leading-relaxed mb-4">Thay màn hình, thay pin chính hãng, ép kính. Khám đúng bệnh, khách hàng quan sát trực tiếp. Báo giá minh bạch không phát sinh.</p>
                    <div class="flex items-center gap-2 text-[#d70018] text-sm font-bold group-hover:gap-3 transition-all">
                        Tìm hiểu <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            </div>

            {{-- Card 2: Unlock --}}
            <div class="glass-card rounded-2xl relative overflow-hidden group">
                <div class="h-44 w-full overflow-hidden relative">
                    <img src="/images/service_unlock.png" alt="Unlock iPhone iCloud Bypass" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-white via-white/30 to-transparent"></div>
                </div>
                <div class="p-6 pt-4">
                    <h3 class="font-bold text-gray-900 mb-3 text-lg">Unlock, Fix Khóa Từ Xa</h3>
                    <p class="text-sm text-gray-600 leading-relaxed mb-4">Xóa iCloud, dọn FRP, Knox Guard, MDM, Repair Boot cho mọi dòng Apple, Samsung, Xiaomi. Giải cứu thiết bị bị Brick.</p>
                    <div class="flex items-center gap-2 text-blue-600 text-sm font-bold group-hover:gap-3 transition-all">
                        Tìm hiểu <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            </div>

            {{-- Card 3: Hệ Sinh Thái (Dark/Premium) --}}
            <div class="glass-card-dark rounded-2xl relative overflow-hidden group">
                <div class="absolute top-4 right-4 z-20">
                    <span class="bg-gradient-to-r from-yellow-400 to-amber-500 text-black text-[9px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider shadow-md animate-pulse-glow">B2B</span>
                </div>
                <div class="h-44 w-full overflow-hidden relative">
                    <img src="/images/service_tools.png" alt="Hệ sinh thái Tool GSM" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1a1a2e] via-[#1a1a2e]/40 to-transparent"></div>
                </div>
                <div class="p-6 pt-4">
                    <h3 class="font-bold text-white mb-3 text-lg">Hệ Sinh Thái Thuê Tool</h3>
                    <p class="text-sm text-gray-400 leading-relaxed mb-4">Giải pháp B2B số 1 Việt Nam cho thợ. Hệ thống web thuê Box, Tool bản quyền tự động 24/7.</p>
                    <a href="https://thuetaikhoan.com.vn" target="_blank" class="flex items-center gap-2 text-yellow-400 text-sm font-bold group-hover:gap-3 transition-all">
                        Khám phá ngay <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            {{-- Card 4: Vietmap --}}
            <div class="bg-white rounded-2xl border-2 border-[#d70018]/15 relative overflow-hidden group card-premium hover:border-[#d70018] transition-all duration-500">
                <div class="h-44 w-full overflow-hidden relative">
                    <img src="/images/service_vietmap.png" alt="Vietmap Live Pro GPS ô tô" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-white via-white/30 to-transparent"></div>
                </div>
                <div class="p-6 pt-4">
                    <h3 class="font-bold text-[#d70018] mb-3 text-lg">Dịch Vụ Ô Tô Việt Map</h3>
                    <p class="text-sm text-gray-600 leading-relaxed mb-4">Đại lý cung cấp bản quyền Vietmap Live Pro chính hãng, gia hạn phần mềm cảnh báo giao thông.</p>
                    <div class="flex items-center gap-2 text-[#d70018] text-sm font-bold group-hover:gap-3 transition-all">
                        Tìm hiểu <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  BẢNG GIÁ NỔI BẬT — Premium Pricing Grid              ║
    ╚═══════════════════════════════════════════════════════╝ --}}
@if($featuredRepairs->count())
<section class="py-16 bg-gray-50 border-t border-gray-100 relative" id="bang-gia">
    <div class="absolute top-0 left-0 w-[300px] h-[300px] bg-red-50/30 rounded-full blur-3xl pointer-events-none"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-12 reveal">
            <div>
                <div class="inline-flex items-center gap-2 bg-red-50 text-[#d70018] px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-3">
                    <span class="w-1.5 h-1.5 bg-[#d70018] rounded-full"></span>
                    Bảng giá ưu đãi
                </div>
                <h2 class="text-2xl md:text-3xl font-black text-gray-900 uppercase tracking-tight">Giá Sửa Chữa Tham Khảo</h2>
            </div>
            <button x-data @click="$dispatch('open-price-popup')" class="btn-3d inline-flex items-center justify-center gap-2 bg-gradient-to-r from-[#d70018] to-[#ff2d4a] text-white px-7 py-3.5 rounded-xl font-bold text-sm shadow-lg shadow-red-500/25 hover:shadow-xl transition-all">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                Tra Cứu Bảng Giá Nhanh
            </button>
        </div>

        {{-- Service image mapping by slug keywords --}}
        @php
            $serviceImageMap = [
                'thay-man' => '/images/services/thay-man.png',
                'ep-kinh' => '/images/services/ep-kinh.png',
                'ep-cam-ung' => '/images/services/ep-cam-ung.png',
                'ep-co-cap' => '/images/services/ep-co-cap.png',
                'thay-pin' => '/images/services/thay-pin.png',
                'thay-lung' => '/images/services/thay-lung.png',
                'thay-vo' => '/images/services/thay-vo.png',
                'sua-face' => '/images/services/sua-face.png',
                'sua-pan' => '/images/services/sua-main.png',
                'cam-truoc' => '/images/services/camera.png',
                'cam-sau' => '/images/services/camera.png',
                'kinh-cam' => '/images/services/camera.png',
                'lens' => '/images/services/camera.png',
                've-sinh' => '/images/services/camera.png',
                'loa' => '/images/services/loa-sac.png',
                'duoi-sac' => '/images/services/loa-sac.png',
                'fix-soc' => '/images/services/thay-man.png',
                'fix-man' => '/images/services/thay-man.png',
            ];

            $getServiceImage = function($slug) use ($serviceImageMap) {
                foreach ($serviceImageMap as $key => $image) {
                    if (str_contains($slug, $key)) return $image;
                }
                return '/images/services/default.png';
            };
        @endphp

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 stagger-children reveal">
            @foreach($featuredRepairs as $index => $repair)
                @php
                    $serviceSlug = $repair->serviceType->slug ?? '';
                    $serviceImg = $getServiceImage($serviceSlug);
                @endphp
                <a href="/{{ $repair->slug }}" wire:navigate
                   class="group bg-white rounded-2xl border border-gray-200 hover:border-[#d70018] transition-all duration-400 relative overflow-hidden flex flex-col h-full card-premium">

                    {{-- Product Image --}}
                    <div class="relative h-36 md:h-40 overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                        <img src="{{ $serviceImg }}" alt="{{ $repair->serviceType->name ?? '' }}"
                             class="w-full h-full object-contain p-3 group-hover:scale-110 transition-transform duration-500"
                             loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-transparent opacity-60"></div>

                        @if($repair->discount_percent)
                            <div class="absolute top-2.5 left-2.5 z-10">
                                <span class="bg-gradient-to-r from-[#d70018] to-[#ff4757] text-white text-[10px] font-bold px-2.5 py-1 rounded-lg shadow-lg shadow-red-500/25 animate-pulse-glow">
                                    -{{ $repair->discount_percent }}%
                                </span>
                            </div>
                        @endif

                        @if($index === 0)
                            <div class="absolute top-2.5 right-2.5 z-10">
                                <span class="bg-gradient-to-r from-amber-400 to-orange-500 text-black text-[9px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider shadow-md">
                                    🔥 Bán chạy
                                </span>
                            </div>
                        @endif
                    </div>

                    {{-- Content --}}
                    <div class="p-4 md:p-5 flex flex-col flex-1">
                        <div class="mb-2">
                            <span class="text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest bg-gray-50 px-2 py-0.5 rounded-md">{{ $repair->serviceType->name ?? '' }}</span>
                        </div>
                        <h3 class="font-bold text-xs md:text-sm text-gray-900 group-hover:text-[#d70018] transition-colors mb-3 line-clamp-2 flex-1 leading-snug">
                            {{ $repair->serviceType->name ?? '' }} {{ $repair->deviceModel->name ?? '' }}
                        </h3>

                        <div class="pt-3 border-t border-gray-100 mt-auto">
                            <div class="flex items-end justify-between gap-2">
                                <div class="flex flex-col">
                                    <span class="text-base md:text-lg font-black text-[#d70018]">{{ $repair->display_price }}</span>
                                    @if($repair->sale_price && $repair->price != $repair->sale_price)
                                        <span class="text-[10px] text-gray-400 line-through">{{ number_format($repair->price, 0, ',', '.') }}đ</span>
                                    @endif
                                </div>
                                <span class="flex items-center justify-center w-7 h-7 bg-red-50 rounded-full group-hover:bg-[#d70018] transition-colors shrink-0">
                                    <svg class="w-3.5 h-3.5 text-[#d70018] group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  TESTIMONIALS — Customer Reviews                       ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-16 bg-white relative overflow-hidden">
    <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-yellow-50/50 rounded-full blur-3xl translate-y-1/2 translate-x-1/4 pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12 reveal">
            <div class="inline-flex items-center gap-2 bg-amber-50 text-amber-600 px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest mb-4">
                <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                Khách hàng nói gì
            </div>
            <h2 class="text-2xl md:text-3xl font-black text-gray-900 uppercase tracking-tight">Đánh Giá Từ Khách Hàng Thực Tế</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 stagger-children reveal">
            {{-- Testimonial 1 --}}
            <div class="testimonial-card">
                <div class="testimonial-stars">
                    @for($i = 0; $i < 5; $i++)
                        <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-sm text-gray-600 leading-relaxed mb-5">"Mang iPhone 13 Pro bị mất nguồn hoàn toàn, tưởng phải thay mainboard. Anh Khang kiểm tra chỉ 10 phút, phát hiện lỗi IC nguồn, sửa xong trong 1h. <strong class="text-gray-900">Tiết kiệm 4 triệu</strong> so với báo giá nơi khác!"</p>
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-full bg-gradient-to-br from-[#d70018] to-[#ff6b6b] flex items-center justify-center text-white font-bold text-sm shadow-md">HM</div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">Hữu Minh</p>
                        <p class="text-xs text-gray-500">Thợ sửa — Đồng Nai</p>
                    </div>
                </div>
            </div>

            {{-- Testimonial 2 --}}
            <div class="testimonial-card">
                <div class="testimonial-stars">
                    @for($i = 0; $i < 5; $i++)
                        <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-sm text-gray-600 leading-relaxed mb-5">"Thuê UnlockTool trên thuetaikhoan.com.vn quá tiện. Mua xong nhận tài khoản tự động không cần chờ. Đã dùng để bypass FRP hơn 200 máy Samsung. <strong class="text-gray-900">Service ổn định, support nhanh.</strong>"</p>
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold text-sm shadow-md">TT</div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">Trung Tín</p>
                        <p class="text-xs text-gray-500">Kỹ thuật viên — TP.HCM</p>
                    </div>
                </div>
            </div>

            {{-- Testimonial 3 --}}
            <div class="testimonial-card">
                <div class="testimonial-stars">
                    @for($i = 0; $i < 5; $i++)
                        <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-sm text-gray-600 leading-relaxed mb-5">"Mang Galaxy S24 Ultra vỡ nát màn hình, anh em sửa rất chuyên nghiệp. Ép kính đẹp như mới, bảo hành 6 tháng. <strong class="text-gray-900">Giá cả hợp lý</strong>, không phát sinh thêm. Sẽ mang khách tới ủng hộ."</p>
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-full bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center text-white font-bold text-sm shadow-md">NL</div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">Ngọc Linh</p>
                        <p class="text-xs text-gray-500">Khách hàng — Bình Dương</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  E-E-A-T SECTION — Visual Overhaul                     ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-16 bg-gradient-to-b from-gray-50 to-white border-t border-gray-100 relative overflow-hidden">
    <div class="absolute top-20 left-0 w-[300px] h-[300px] bg-blue-50/50 rounded-full blur-3xl pointer-events-none"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-14 reveal">
            <div class="inline-flex items-center gap-2 bg-red-50 text-[#d70018] px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest mb-4">
                <span class="w-2 h-2 bg-[#d70018] rounded-full"></span>
                Uy tín & Chất lượng
            </div>
            <h2 class="text-2xl md:text-3xl font-black text-gray-900 uppercase tracking-tight">Tại Sao Khách Hàng & Các Thợ Khác Chọn Chúng Tôi?</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 stagger-children reveal">
            {{-- E-E-A-T Card 1 --}}
            <div class="group flex gap-5 bg-white rounded-2xl p-6 lg:p-8 border border-gray-100 hover:border-[#d70018]/30 transition-all duration-400 card-premium">
                <div class="shrink-0">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#d70018] to-[#ff4757] rounded-2xl flex items-center justify-center text-white shadow-xl shadow-red-500/15 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-2 text-lg">Lõi Kỹ Thuật Chuyên Sâu</h3>
                    <p class="text-sm text-gray-600 leading-relaxed mb-3">Tự biên soạn sơ đồ Test Point EDL 9008 cho hàng trăm mã máy, am hiểu tận gốc rễ bảng mạch.</p>
                    <ul class="space-y-1.5 text-xs text-gray-500">
                        <li class="flex items-center gap-2"><span class="w-1 h-1 bg-[#d70018] rounded-full"></span> Test Point cho Samsung, Xiaomi, Oppo...</li>
                        <li class="flex items-center gap-2"><span class="w-1 h-1 bg-[#d70018] rounded-full"></span> Sơ đồ riêng, không copy từ internet</li>
                    </ul>
                </div>
            </div>

            {{-- E-E-A-T Card 2 --}}
            <div class="group flex gap-5 bg-white rounded-2xl p-6 lg:p-8 border border-gray-100 hover:border-[#d70018]/30 transition-all duration-400 card-premium">
                <div class="shrink-0">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-blue-500/15 group-hover:scale-110 group-hover:-rotate-6 transition-all duration-500">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-2 text-lg">Công Nghệ Mở Khóa Đỉnh Cao</h3>
                    <p class="text-sm text-gray-600 leading-relaxed mb-3">Quản lý hệ sinh thái cho thuê Tool (UnlockTool, DFT Pro, Cheetah...). Đầy đủ đồ chơi phần mềm nhất.</p>
                    <ul class="space-y-1.5 text-xs text-gray-500">
                        <li class="flex items-center gap-2"><span class="w-1 h-1 bg-blue-500 rounded-full"></span> Bypass iCloud mọi phiên bản iOS</li>
                        <li class="flex items-center gap-2"><span class="w-1 h-1 bg-blue-500 rounded-full"></span> Knox Guard & MDM removal 100%</li>
                    </ul>
                </div>
            </div>

            {{-- E-E-A-T Card 3 --}}
            <div class="group flex gap-5 bg-white rounded-2xl p-6 lg:p-8 border border-gray-100 hover:border-[#d70018]/30 transition-all duration-400 card-premium">
                <div class="shrink-0">
                    <div class="w-16 h-16 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-amber-500/15 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-2 text-lg">Thay Thế Không Sửa Mò</h3>
                    <p class="text-sm text-gray-600 leading-relaxed mb-3">8 năm kinh nghiệm giúp chuẩn đoán đúng bệnh trong tíc tắc, xử lý triệt để, không lãng phí ví tiền.</p>
                    <ul class="space-y-1.5 text-xs text-gray-500">
                        <li class="flex items-center gap-2"><span class="w-1 h-1 bg-amber-500 rounded-full"></span> Đúng bệnh từ lần khám đầu tiên</li>
                        <li class="flex items-center gap-2"><span class="w-1 h-1 bg-amber-500 rounded-full"></span> Bảo hành minh bạch, rõ ràng</li>
                    </ul>
                </div>
            </div>

            {{-- E-E-A-T Card 4 --}}
            <div class="group flex gap-5 bg-white rounded-2xl p-6 lg:p-8 border border-gray-100 hover:border-[#d70018]/30 transition-all duration-400 card-premium">
                <div class="shrink-0">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-green-600 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-emerald-500/15 group-hover:scale-110 group-hover:-rotate-6 transition-all duration-500">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-2 text-lg">Cộng Đồng Vững Mạnh</h3>
                    <p class="text-sm text-gray-600 leading-relaxed mb-3">Hỗ trợ cộng đồng Zalo lớn mạnh. Cung cấp giải pháp cho thợ (B2B) và bảo hành uy tín cho người dùng (B2C).</p>
                    <ul class="space-y-1.5 text-xs text-gray-500">
                        <li class="flex items-center gap-2"><span class="w-1 h-1 bg-emerald-500 rounded-full"></span> Zalo Group hỗ trợ 24/7</li>
                        <li class="flex items-center gap-2"><span class="w-1 h-1 bg-emerald-500 rounded-full"></span> Cầu nối B2B - B2C đáng tin cậy</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Expert Badge --}}
        <div class="mt-10 flex justify-center reveal">
            <div class="inline-flex items-center gap-4 bg-gradient-to-r from-gray-50 to-white rounded-2xl px-8 py-5 border border-gray-100 shadow-sm">
                <div class="w-14 h-14 rounded-full bg-gradient-to-br from-[#d70018] to-[#ff4757] flex items-center justify-center text-white font-bold text-lg shadow-lg shadow-red-500/20">K</div>
                <div>
                    <p class="font-bold text-gray-900">Khang & Thanhtaj</p>
                    <p class="text-xs text-gray-500">Kỹ thuật viên trưởng · 8+ năm kinh nghiệm</p>
                    <p class="text-xs text-[#d70018] font-semibold mt-0.5">Founder Thuetaikhoan Ecosystem</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  BLOG — Magazine Layout                                ║
    ╚═══════════════════════════════════════════════════════╝ --}}
@if($latestPosts->count())
<section class="py-16 bg-white border-t border-gray-100">
    <div class="container mx-auto px-4">
        <div class="flex items-end justify-between mb-12 reveal">
            <div>
                <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-600 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-3">
                    <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                    Kiến thức mới
                </div>
                <h2 class="text-2xl md:text-3xl font-black text-gray-900 uppercase tracking-tight">Chia Sẻ Kiến Thức Tới Cộng Đồng</h2>
            </div>
            <a href="/blog" wire:navigate class="text-sm font-bold text-[#d70018] hover:text-red-700 transition-colors hidden sm:inline-flex items-center gap-1 hover:gap-2">
                Xem tất cả <span>→</span>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 reveal">
            {{-- Featured Post (Large) --}}
            @if($latestPosts->first())
                @php $featured = $latestPosts->first(); @endphp
                <a href="/blog/{{ $featured->slug }}" wire:navigate class="block group blog-featured rounded-2xl overflow-hidden shadow-lg">
                    @if($featured->thumbnail)
                        <img src="{{ asset('storage/' . $featured->thumbnail) }}" alt="{{ $featured->title }}" loading="lazy">
                    @else
                        <div class="absolute inset-0 bg-gradient-to-br from-[#1a1a2e] to-[#0f3460]"></div>
                    @endif
                    <div class="blog-featured-overlay"></div>
                    <div class="blog-featured-content">
                        <span class="inline-block bg-[#d70018] text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-3">Nổi bật</span>
                        <h3 class="font-black text-xl md:text-2xl text-white mb-2 leading-tight line-clamp-2 group-hover:text-yellow-300 transition-colors">{{ $featured->title }}</h3>
                        <p class="text-sm text-white/70 line-clamp-2">{{ $featured->excerpt }}</p>
                    </div>
                </a>
            @endif

            {{-- Side Posts (Smaller) --}}
            <div class="flex flex-col gap-4">
                @foreach($latestPosts->skip(1) as $post)
                    <a href="/blog/{{ $post->slug }}" wire:navigate class="group flex gap-4 bg-gray-50 rounded-xl overflow-hidden hover:bg-white hover:shadow-lg transition-all duration-300 border border-transparent hover:border-gray-200 card-premium">
                        <div class="w-[130px] md:w-[160px] shrink-0 aspect-[4/3] bg-gray-100 overflow-hidden relative">
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-2xl bg-gradient-to-br from-red-50 to-gray-100">🗂️</div>
                            @endif
                        </div>
                        <div class="py-3 pr-4 flex flex-col justify-center">
                            <h3 class="font-bold text-sm text-gray-900 group-hover:text-[#d70018] transition-colors line-clamp-2 mb-1.5">{{ $post->title }}</h3>
                            <p class="text-xs text-gray-500 line-clamp-2">{{ $post->excerpt }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  CTA — Animated Gradient                               ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-[#1a1a2e] via-[#d70018] to-[#0f3460] animate-gradient-shift"></div>

    {{-- Floating decorative shapes --}}
    <div class="floating-shape floating-shape--1 w-40 h-40 bg-white top-10 left-[10%]"></div>
    <div class="floating-shape floating-shape--2 w-24 h-24 bg-yellow-400 bottom-10 right-[15%]"></div>
    <div class="floating-shape floating-shape--3 w-32 h-32 bg-white top-1/2 right-[30%]"></div>

    {{-- Dot pattern --}}
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width=%2240%22%20height=%2240%22%20xmlns=%22http://www.w3.org/2000/svg%22%3E%3Ccircle%20cx=%2220%22%20cy=%2220%22%20r=%221%22%20fill=%22rgba(255,255,255,0.06)%22/%3E%3C/svg%3E')]"></div>

    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="inline-flex items-center gap-2 bg-white/10 text-white px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest mb-6 backdrop-blur-sm border border-white/15">
            <span class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></span>
            Liên hệ ngay hôm nay
        </div>

        <h2 class="text-3xl md:text-5xl font-black text-white uppercase tracking-tight mb-5 drop-shadow-lg">Tư Vấn Bắt Bệnh <br class="hidden md:block"/>Từ Kỹ Thuật Viên Trưởng</h2>
        <p class="text-white/80 mb-5 text-sm md:text-base font-medium max-w-xl mx-auto">Báo đúng giá - Chữa đúng bệnh. Đảm bảo uy tín thương hiệu Thuetaikhoan.</p>

        {{-- Social proof --}}
        <div class="mb-8 inline-flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-full px-5 py-2 border border-white/10">
            <div class="flex -space-x-2">
                <div class="w-7 h-7 rounded-full bg-gradient-to-br from-yellow-300 to-amber-500 border-2 border-white/30 flex items-center justify-center text-[9px] font-bold">A</div>
                <div class="w-7 h-7 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 border-2 border-white/30 flex items-center justify-center text-[9px] font-bold text-white">B</div>
                <div class="w-7 h-7 rounded-full bg-gradient-to-br from-emerald-400 to-green-500 border-2 border-white/30 flex items-center justify-center text-[9px] font-bold text-white">C</div>
            </div>
            <span class="text-white/90 text-xs font-semibold">500+ khách hàng tin tưởng tháng này</span>
        </div>

        <div class="flex justify-center gap-4 flex-wrap">
            <a href="tel:0777333763" class="btn-3d inline-flex items-center gap-3 bg-yellow-400 text-black px-9 py-4.5 rounded-xl text-lg font-black shadow-xl shadow-yellow-400/30 hover:bg-white hover:text-[#d70018] transition-colors duration-300">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                Tư vấn CSKH: 0777.333.763
            </a>
            <a href="tel:0934660219" class="btn-3d inline-flex items-center gap-3 glass-dark text-white px-9 py-4.5 rounded-xl text-lg font-black shadow-xl hover:bg-white hover:text-[#d70018] transition-colors duration-300">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                Hỗ trợ Kỹ thuật: 0934.660.219
            </a>
        </div>
    </div>
</section>

{{-- Bảng Giá Nhanh Livewire Component (Modal) --}}
@livewire('price-list-popup')

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  SCROLL ANIMATION + COUNTER JAVASCRIPT                 ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Reveal observer is now handled globally in layout

    // ── Counter Animation ──
    const counters = document.querySelectorAll('.counter-value[data-target]');
    let counterStarted = false;

    function animateCounters() {
        if (counterStarted) return;
        counterStarted = true;
        counters.forEach(counter => {
            const target = parseInt(counter.dataset.target);
            const suffix = counter.dataset.suffix || '';
            const duration = 2000;
            const startTime = performance.now();

            function updateCount(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                // Ease out cubic
                const eased = 1 - Math.pow(1 - progress, 3);
                const current = Math.round(eased * target);
                counter.textContent = current.toLocaleString() + suffix;

                if (progress < 1) {
                    requestAnimationFrame(updateCount);
                } else {
                    counter.textContent = target.toLocaleString() + suffix;
                    counter.classList.add('counted');
                }
            }
            requestAnimationFrame(updateCount);
        });
    }

    // Trigger counters when stats section is visible
    const statsSection = document.getElementById('stats-counter');
    if (statsSection) {
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });
        counterObserver.observe(statsSection);
    }

    // Also animate hero counters separately
    const heroCounters = document.querySelectorAll('.glass-dark .counter-value[data-target]');
    if (heroCounters.length) {
        setTimeout(() => {
            heroCounters.forEach(counter => {
                const target = parseInt(counter.dataset.target);
                const suffix = counter.dataset.suffix || '';
                const duration = 1500;
                const startTime = performance.now();
                function updateHeroCount(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    counter.textContent = Math.round(eased * target).toLocaleString() + suffix;
                    if (progress < 1) requestAnimationFrame(updateHeroCount);
                    else counter.textContent = target.toLocaleString() + suffix;
                }
                requestAnimationFrame(updateHeroCount);
            });
        }, 500);
    }

    // ── 3D Tilt Effect for Service Cards ──
    const tiltCards = document.querySelectorAll('.service-card-tilt');
    tiltCards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const rotateX = (y - centerY) / centerY * -6;
            const rotateY = (x - centerX) / centerX * 6;
            card.style.transform = `perspective(800px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(800px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
            card.style.transition = 'transform 0.5s cubic-bezier(0.22, 1, 0.36, 1)';
        });

        card.addEventListener('mouseenter', () => {
            card.style.transition = 'transform 0.15s ease-out';
        });
    });

    // ── Smooth shimmer sweep effect ──
    const shimmerEls = document.querySelectorAll('.service-card-tilt [style*="transition: transform 0.8s"]');
    tiltCards.forEach(card => {
        const shimmer = card.querySelector('[style*="transition: transform 0.8s"]');
        if (shimmer) {
            card.addEventListener('mouseenter', () => {
                shimmer.style.transform = 'translateX(200%)';
                shimmer.style.opacity = '1';
                setTimeout(() => {
                    shimmer.style.transition = 'none';
                    shimmer.style.transform = 'translateX(-100%)';
                    shimmer.style.opacity = '0';
                    setTimeout(() => {
                        shimmer.style.transition = 'transform 0.8s ease, opacity 0.3s ease';
                    }, 50);
                }, 800);
            });
        }
    });
});
</script>

@endsection
