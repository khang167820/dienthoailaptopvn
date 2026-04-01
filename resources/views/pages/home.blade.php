@extends('layouts.app')

@section('content')
{{-- Hero Section Premium --}}
<section class="relative bg-gradient-to-br from-[#1a1a2e] via-[#16213e] to-[#0f3460] pt-8 pb-12 overflow-hidden">
    {{-- Decorative elements --}}
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width=%2260%22%20height=%2260%22%20xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath%20d=%22M30%200L60%2030L30%2060L0%2030Z%22%20fill=%22none%22%20stroke=%22rgba(255,255,255,0.02)%22%20stroke-width=%221%22/%3E%3C/svg%3E')] opacity-50"></div>
    <div class="absolute top-10 right-10 w-72 h-72 bg-[#d70018]/10 rounded-full blur-3xl animate-float pointer-events-none"></div>
    <div class="absolute bottom-10 left-10 w-56 h-56 bg-blue-500/10 rounded-full blur-3xl animate-float delay-200 pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row gap-5">
            {{-- Main Slider --}}
            <div class="w-full lg:w-[70%] bg-[url('/images/repair_banner.webp')] bg-cover bg-center rounded-2xl p-8 lg:p-10 text-white relative flex flex-col justify-center min-h-[320px] shadow-2xl overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/60 to-black/30 z-0"></div>
                <div class="relative z-10 w-full md:w-[85%]">
                    <span class="inline-flex items-center gap-1.5 bg-[#d70018] border border-red-400/30 text-white text-xs font-bold px-3.5 py-1.5 rounded-full mb-5 shadow-lg shadow-red-500/20 uppercase tracking-wide">
                        <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span>
                        Chuyên gia Kỹ thuật Phần mềm
                    </span>
                    <h1 class="text-3xl md:text-5xl font-black leading-[1.1] mb-5 drop-shadow-lg">
                        SỬA CHỮA THIẾT BỊ <br class="hidden md:block"/>CHUYÊN NGHIỆP
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-amber-400 mt-1">GIẢI PHÁP TỪ CHUYÊN GIA SỐ 1 VN</span>
                    </h1>
                    <p class="text-white/80 mb-7 font-medium text-sm md:text-base leading-relaxed max-w-xl">
                        Hơn 8 năm thực chiến phần cứng & nắm giữ hệ sinh thái phần mềm Unlock/Bypass lớn nhất. Chúng tôi không chỉ "thay thế linh kiện", chúng tôi cứu sống thiết bị của bạn.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="tel:0777333763" class="inline-flex items-center gap-2 bg-white text-[#d70018] px-7 py-3.5 rounded-xl font-bold uppercase text-sm hover:bg-yellow-400 hover:text-black hover:shadow-xl hover:scale-105 transition-all duration-300 shadow-lg">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            Báo giá lỗi ngay
                        </a>
                        <a href="https://thuetaikhoan.com.vn" target="_blank" class="inline-flex items-center gap-2 glass-dark text-white px-7 py-3.5 rounded-xl font-bold uppercase text-sm hover:bg-white/20 transition-all duration-300 shadow-lg">
                            Dành cho Thợ (Thuê Tool)
                        </a>
                    </div>
                </div>
                {{-- Trust Badges --}}
                <div class="hidden md:flex absolute bottom-5 right-5 gap-5 glass-dark rounded-xl px-5 py-3">
                     <div class="text-xs text-white text-center"><strong class="block text-yellow-400 text-xl font-black">1000+</strong> Thợ toàn quốc</div>
                     <div class="w-px h-12 bg-white/20"></div>
                     <div class="text-xs text-white text-center"><strong class="block text-yellow-400 text-xl font-black">100%</strong> Xử lý từ xa</div>
                     <div class="w-px h-12 bg-white/20"></div>
                     <div class="text-xs text-white text-center"><strong class="block text-yellow-400 text-xl font-black">8+</strong> Năm kinh nghiệm</div>
                </div>
            </div>

            {{-- 2 Side Banners --}}
            <div class="hidden lg:flex w-[30%] flex-col gap-5">
                <div class="flex-1 bg-gradient-to-br from-[#1a1a2e] to-[#0f3460] rounded-2xl p-6 text-white relative overflow-hidden flex items-center shadow-xl group border border-white/5 card-hover">
                    <div class="absolute -right-4 -bottom-4 text-8xl opacity-10 group-hover:scale-110 transition-transform duration-500">💻</div>
                    <div class="absolute top-0 right-0 w-24 h-24 bg-[#d70018]/10 rounded-full blur-2xl"></div>
                    <div class="relative z-10 w-full">
                        <p class="text-yellow-400 font-bold mb-1.5 text-sm">Hệ Sinh Thái GSM</p>
                        <h3 class="font-black text-xl mb-2 text-white leading-tight">Xóa iCloud, MDM, Knox</h3>
                        <p class="text-xs text-gray-400 leading-relaxed">Mở khóa từ xa qua TeamViewer / UltraViewer</p>
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-2xl p-6 border-2 border-[#d70018]/20 text-[#d70018] relative overflow-hidden flex items-center shadow-xl group hover:border-[#d70018] transition-all duration-300 card-hover">
                    <div class="absolute -right-4 -bottom-4 text-8xl opacity-5 group-hover:scale-110 transition-transform duration-500">🚗</div>
                    <div class="relative z-10">
                        <p class="text-gray-500 text-sm font-semibold mb-1.5">Giải Pháp Ô Tô</p>
                        <h3 class="font-black text-xl mb-2 text-[#d70018]">Vietmap Live Pro</h3>
                        <p class="text-xs font-medium text-gray-500">Cài đặt & Gia hạn bản quyền VIP</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Problem Statement / Core Message --}}
<section class="py-14 bg-white relative" id="van-de-khach-hang">
    <div class="absolute inset-0 bg-gradient-to-b from-gray-50/50 to-transparent h-32"></div>
    <div class="container mx-auto px-4 max-w-4xl text-center relative z-10">
        <div class="inline-flex items-center gap-2 bg-red-50 text-[#d70018] px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide mb-5">
            <span class="w-1.5 h-1.5 bg-[#d70018] rounded-full"></span>
            Vấn đề phổ biến
        </div>
        <h2 class="text-2xl md:text-4xl font-black text-gray-900 mb-5 leading-tight">MÁY MẤT NGUỒN, DÍNH ICLOUD, MDM HAY RƠI VỠ? <br class="hidden md:block"/><span class="text-[#d70018]">ĐỪNG VỘI BỎ ĐI!</span></h2>
        <p class="text-gray-600 leading-relaxed text-sm md:text-base font-medium max-w-2xl mx-auto">
            Cho dù là lỗi phần cứng phức tạp (chạm chập main, gãy test point) hay mắc kẹt tột độ ở phần mềm (Knox Guard, iCloud, Brick), đội ngũ <strong class="text-gray-900">Điện Thoại Laptop VN</strong> (Chuyên gia Khang & Thanhtaj) đều có giải pháp. Nhờ việc trực tiếp thao tác và phân phối các loại tool mạnh nhất thế giới, bạn sẽ tiết kiệm thời gian lẫn chi phí.
        </p>
    </div>
</section>

{{-- Chọn thiết bị / Hãng --}}
<section class="py-12 bg-gray-50 border-t border-gray-100" id="thiet-bi">
    <div class="container mx-auto px-4">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight section-title">Sửa Chữa Phần Cứng Theo Hãng</h2>
            </div>
        </div>

        <div class="grid grid-cols-4 sm:grid-cols-6 lg:grid-cols-8 gap-3 md:gap-4">
            @foreach($brands as $brand)
                <a href="/sua-dien-thoai/{{ $brand->slug }}" wire:navigate
                   class="group flex flex-col items-center gap-2.5 p-4 bg-white rounded-xl border border-gray-200 hover:border-[#d70018] transition-all duration-300 card-hover">
                    @if($brand->logo)
                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="w-10 h-10 object-contain group-hover:scale-110 transition-transform duration-300" loading="lazy">
                    @else
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-50 to-pink-50 flex items-center justify-center text-[#d70018] font-bold text-lg group-hover:from-red-100 group-hover:to-pink-100 transition-colors">
                            {{ substr($brand->name, 0, 1) }}
                        </div>
                    @endif
                    <span class="text-xs font-semibold text-gray-600 group-hover:text-[#d70018] transition-colors text-center w-full truncate">{{ $brand->name }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Danh mục dịch vụ B2B & B2C Core --}}
<section class="py-14 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex items-end justify-between mb-10">
            <div>
                <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight section-title">Dịch Vụ Mũi Nhọn Của Chúng Tôi</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="bg-white rounded-2xl p-6 border border-gray-200 hover:border-[#d70018] transition-all duration-300 relative overflow-hidden group card-hover">
                <div class="w-14 h-14 mb-5 bg-gradient-to-br from-red-50 to-pink-50 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-110 group-hover:shadow-lg transition-all duration-300">📱</div>
                <h3 class="font-bold text-gray-900 mb-2 text-lg">Sửa Phần Cứng Lấy Liền</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Thay màn hình, thay pin chính hãng, ép kính. Khám đúng bệnh, khách hàng quan sát trực tiếp. Báo giá minh bạch không phát sinh.</p>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-gray-200 hover:border-[#d70018] transition-all duration-300 relative overflow-hidden group card-hover">
                <div class="w-14 h-14 mb-5 bg-gradient-to-br from-red-50 to-pink-50 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-110 group-hover:shadow-lg transition-all duration-300">💻</div>
                <h3 class="font-bold text-gray-900 mb-2 text-lg">Unlock, Fix Khóa Từ Xa</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Xóa iCloud, dọn FRP, Knox Guard, MDM, Repair Boot cho mọi dòng Apple, Samsung, Xiaomi. Giải cứu thiết bị bị Brick chuyên nghiệp.</p>
            </div>
            <div class="bg-gradient-to-br from-[#1a1a2e] to-[#0f3460] rounded-2xl p-6 border border-white/5 hover:border-[#d70018]/50 transition-all duration-300 relative overflow-hidden group card-hover">
                <div class="absolute -right-6 -bottom-6 text-7xl opacity-10 group-hover:opacity-20 transition-opacity">⚙️</div>
                <div class="w-14 h-14 mb-5 bg-white/10 rounded-2xl flex items-center justify-center text-2xl text-yellow-400 group-hover:scale-110 group-hover:bg-white/15 transition-all duration-300">🌐</div>
                <h3 class="font-bold text-white mb-2 text-lg">Hệ Sinh Thái Thuê Tool</h3>
                <p class="text-sm text-gray-400 leading-relaxed">Giải pháp B2B số 1 Việt Nam cho thợ. Hệ thống web thuê Box, Tool bản quyền tự động 24/7. Trực thuộc Thuetaikhoan.com.vn.</p>
                <a href="https://thuetaikhoan.com.vn" target="_blank" class="text-yellow-400 text-sm font-bold mt-4 inline-flex items-center gap-1 hover:gap-2 transition-all">
                    Khám phá ngay <span>→</span>
                </a>
            </div>
            <div class="bg-white rounded-2xl p-6 border-2 border-[#d70018]/20 hover:border-[#d70018] transition-all duration-300 relative overflow-hidden group card-hover">
                 <div class="w-14 h-14 mb-5 bg-gradient-to-br from-red-50 to-orange-50 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-110 group-hover:shadow-lg transition-all duration-300">🚘</div>
                <h3 class="font-bold text-[#d70018] mb-2 text-lg">Dịch Vụ Ô Tô Việt Map</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Đại lý cung cấp bản quyền Vietmap Live Pro chính hãng, gia hạn phần mềm cảnh báo giao thông an toàn cho người sử dụng ô tô.</p>
            </div>
        </div>
    </div>
</section>

{{-- Bảng giá nổi bật --}}
@if($featuredRepairs->count())
<section class="py-14 bg-gray-50 border-t border-gray-100" id="bang-gia">
    <div class="container mx-auto px-4">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10">
            <div>
                <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight section-title">Giá Sửa Chữa Tham Khảo</h2>
            </div>
            <button x-data @click="$dispatch('open-price-popup')" class="inline-flex items-center justify-center gap-2 bg-[#d70018] text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-red-500/20 hover:bg-red-700 hover:-translate-y-0.5 hover:shadow-xl transition-all animate-pulse-glow">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                Tra Cứu Bảng Giá Nhanh
            </button>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5">
            @foreach($featuredRepairs as $repair)
                <a href="/{{ $repair->slug }}" wire:navigate
                   class="group bg-white rounded-2xl border border-gray-200 hover:border-[#d70018] transition-all duration-300 relative overflow-hidden flex flex-col h-full card-hover">
                    
                    @if($repair->discount_percent)
                        <div class="absolute top-3 left-3 z-10">
                            <span class="bg-[#d70018] text-white text-[10px] font-bold px-2.5 py-1 rounded-lg shadow-lg shadow-red-500/20">
                                GIẢM {{ $repair->discount_percent }}%
                            </span>
                        </div>
                    @endif

                    <div class="p-5 flex flex-col flex-1">
                        <div class="mt-3 mb-3">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wide bg-gray-50 px-2 py-1 rounded-md">{{ $repair->serviceType->name ?? '' }}</span>
                        </div>
                        <h3 class="font-bold text-sm md:text-base text-gray-900 group-hover:text-[#d70018] transition-colors mb-3 line-clamp-2 flex-1">
                            {{ $repair->serviceType->name ?? '' }} {{ $repair->deviceModel->name ?? '' }}
                        </h3>
                        
                        <div class="pt-3 border-t border-gray-100 mt-auto">
                            <div class="flex flex-col gap-1">
                                <span class="text-lg md:text-xl font-black text-[#d70018]">{{ $repair->display_price }}</span>
                                @if($repair->sale_price && $repair->price != $repair->sale_price)
                                    <span class="text-xs text-gray-400 line-through">{{ number_format($repair->price, 0, ',', '.') }}đ</span>
                                @else
                                    <span class="text-xs text-transparent">.</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- E-E-A-T Section (Tại sao tin tưởng) --}}
<section class="py-16 bg-white border-t border-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-red-50 text-[#d70018] px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide mb-4">
                <span class="w-1.5 h-1.5 bg-[#d70018] rounded-full"></span>
                Uy tín & Chất lượng
            </div>
            <h2 class="text-2xl md:text-3xl font-black text-gray-900 uppercase tracking-tight">Tại Sao Khách Hàng & Các Thợ Khác Chọn Chúng Tôi?</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 border border-gray-100 hover:border-[#d70018]/30 transition-all duration-300 group card-hover">
                <div class="w-12 h-12 mb-4 bg-gradient-to-br from-[#d70018] to-red-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-red-500/20 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Lõi Kỹ Thuật Chuyên Sâu</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Tự biên soạn sơ đồ Test Point EDL 9008 cho hàng trăm mã máy, am hiểu tận gốc rễ bảng mạch.</p>
            </div>
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 border border-gray-100 hover:border-[#d70018]/30 transition-all duration-300 group card-hover">
                <div class="w-12 h-12 mb-4 bg-gradient-to-br from-[#d70018] to-red-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-red-500/20 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Công Nghệ Mở Khóa Đỉnh Cao</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Quản lý hệ sinh thái cho thuê Tool (UnlockTool, DFT Pro, Cheetah...). Đầy đủ đồ chơi phần mềm nhất.</p>
            </div>
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 border border-gray-100 hover:border-[#d70018]/30 transition-all duration-300 group card-hover">
                <div class="w-12 h-12 mb-4 bg-gradient-to-br from-[#d70018] to-red-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-red-500/20 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Thay Thế Không Sửa Mò</h3>
                <p class="text-sm text-gray-600 leading-relaxed">8 năm kinh nghiệm giúp chuẩn đoán đúng bệnh trong tíc tắc, xử lý triệt để, không lãng phí ví tiền.</p>
            </div>
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 border border-gray-100 hover:border-[#d70018]/30 transition-all duration-300 group card-hover">
                <div class="w-12 h-12 mb-4 bg-gradient-to-br from-[#d70018] to-red-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-red-500/20 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Cộng Đồng Vững Mạnh</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Hỗ trợ cộng đồng Zalo lớn mạnh. Cung cấp giải pháp cho thợ (B2B) và bảo hành uy tín cho người dùng (B2C).</p>
            </div>
        </div>
    </div>
</section>

{{-- Blog / Kiến thức Test Point --}}
@if($latestPosts->count())
<section class="py-14 bg-gray-50 border-t border-gray-100">
    <div class="container mx-auto px-4">
        <div class="flex items-end justify-between mb-10">
            <div>
                <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight section-title">Chia Sẻ Kiến Thức Tới Cộng Đồng</h2>
            </div>
            <a href="/blog" wire:navigate class="text-sm font-bold text-[#d70018] hover:text-red-700 transition-colors hidden sm:inline-flex items-center gap-1 hover:gap-2">
                Xem tất cả <span>→</span>
            </a>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5">
            @foreach($latestPosts as $post)
                <a href="/blog/{{ $post->slug }}" wire:navigate class="group">
                    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 flex flex-col h-full hover:border-[#d70018]/30 card-hover">
                        <div class="aspect-[16/9] w-full bg-gray-100 overflow-hidden relative">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent group-hover:from-[#d70018]/10 transition-colors z-10"></div>
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-3xl bg-gradient-to-br from-red-50 to-gray-100">🗂️</div>
                            @endif
                        </div>
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="font-bold text-sm text-gray-900 group-hover:text-[#d70018] transition-colors line-clamp-2 mb-2">{{ $post->title }}</h3>
                            <p class="text-xs text-gray-500 line-clamp-2 mt-auto">{{ $post->excerpt }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA Độc Quyền --}}
<section class="py-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-[#1a1a2e] via-[#d70018] to-[#1a1a2e] animate-gradient-shift"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width=%2240%22%20height=%2240%22%20xmlns=%22http://www.w3.org/2000/svg%22%3E%3Ccircle%20cx=%2220%22%20cy=%2220%22%20r=%221%22%20fill=%22rgba(255,255,255,0.05)%22/%3E%3C/svg%3E')] "></div>
    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="inline-flex items-center gap-2 bg-white/10 text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide mb-5 backdrop-blur-sm border border-white/10">
            <span class="w-1.5 h-1.5 bg-yellow-400 rounded-full animate-pulse"></span>
            Liên hệ ngay
        </div>
        <h2 class="text-2xl md:text-4xl font-black text-white uppercase tracking-tight mb-4">Tư Vấn Bắt Bệnh Từ Kỹ Thuật Viên Trưởng</h2>
        <p class="text-white/80 mb-8 text-sm md:text-base font-medium max-w-xl mx-auto">Báo đúng giá - Chữa đúng bệnh. Đảm bảo uy tín thương hiệu Thuetaikhoan.</p>
        <div class="flex justify-center gap-4 flex-wrap">
            <a href="tel:0777333763" class="inline-flex items-center gap-2.5 bg-yellow-400 text-black px-8 py-4 rounded-xl text-lg font-black hover:bg-white hover:text-[#d70018] transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 animate-pulse-glow">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                Tư vấn CSKH: 0777.333.763
            </a>
            <a href="tel:0934660219" class="inline-flex items-center gap-2.5 glass-dark text-white px-8 py-4 rounded-xl text-lg font-black hover:bg-white hover:text-[#d70018] transition-all duration-300 shadow-xl">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                Hỗ trợ Kỹ thuật: 0934.660.219
            </a>
        </div>
    </div>
</section>

{{-- Bảng Giá Nhanh Livewire Component (Modal) --}}
@livewire('price-list-popup')

@endsection
