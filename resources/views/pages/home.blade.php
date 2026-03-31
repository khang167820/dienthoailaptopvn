@extends('layouts.app')

@section('content')
{{-- Hero Section Premium (Dienthoaivui Layout Style) --}}
<section class="bg-gray-50 pt-6 pb-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-4">
            {{-- Main Slider --}}
            <div class="w-full lg:w-[70%] bg-[url('/images/repair_banner.webp')] bg-cover bg-center rounded-2xl p-8 text-white relative flex flex-col justify-center min-h-[300px] shadow-lg overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-r from-black/80 to-black/40 z-0"></div>
                <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] mix-blend-overlay z-0"></div>
                <div class="relative z-10 w-full md:w-[85%]">
                    <span class="inline-block bg-[#d70018] border border-red-500 text-white text-xs font-bold px-3 py-1 rounded-full mb-4 shadow-sm uppercase tracking-wide">Chuyên gia Kỹ thuật Phần mềm</span>
                    <h1 class="text-3xl md:text-5xl font-black leading-tight mb-4 drop-shadow-md">
                        SỬA CHỮA THIẾT BỊ CHUYÊN NGHIỆP <br/>
                        <span class="text-yellow-400">GIẢI PHÁP TỪ CHUYÊN GIA SỐ 1 VN</span>
                    </h1>
                    <p class="text-white/90 mb-6 font-medium text-sm md:text-base leading-relaxed">
                        Hơn 8 năm thực chiến phần cứng & nắm giữ hệ sinh thái phần mềm Unlock/Bypass lớn nhất. Chúng tôi không chỉ "thay thế linh kiện", chúng tôi cứu sống thiết bị của bạn.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="tel:0777333763" class="inline-block bg-white text-[#d70018] px-6 py-3 rounded-xl font-bold uppercase text-sm hover:bg-yellow-400 hover:text-black hover:shadow-xl transition-all duration-300">
                            Báo giá lỗi ngay
                        </a>
                        <a href="https://thuetaikhoan.com.vn" target="_blank" class="inline-block bg-black/20 backdrop-blur-sm border border-white/30 text-white px-6 py-3 rounded-xl font-bold uppercase text-sm hover:bg-white/20 transition-all duration-300">
                            Dành cho Thợ (Thuê Tool tự động)
                        </a>
                    </div>
                </div>
                {{-- Trust Badges within Slider --}}
                <div class="hidden md:flex absolute bottom-4 right-4 gap-4 bg-black/20 backdrop-blur-md rounded-xl p-3 border border-white/20">
                     <div class="text-xs text-white text-center"><strong class="block text-yellow-400 text-lg">1000+</strong> Thợ toàn quốc</div>
                     <div class="w-px h-10 bg-white/30"></div>
                     <div class="text-xs text-white text-center"><strong class="block text-yellow-400 text-lg">100%</strong> Xử lý từ xa</div>
                </div>
            </div>

            {{-- 2 Side Banners --}}
            <div class="hidden lg:flex w-[30%] flex-col gap-4">
                <div class="flex-1 bg-gradient-to-br from-gray-800 to-black rounded-2xl p-6 text-white relative overflow-hidden flex items-center shadow-md group border border-gray-200">
                    <div class="absolute -right-4 -bottom-4 text-8xl opacity-10 group-hover:scale-110 transition-transform">💻</div>
                    <div class="relative z-10 w-full">
                        <p class="text-yellow-400 font-bold mb-1">Hệ Sinh Thái GSM</p>
                        <h3 class="font-black text-lg mb-2 text-white">Xóa iCloud, MDM, Knox</h3>
                        <p class="text-xs text-gray-400">Mở khóa từ xa qua TeamViewer / UltraViewer</p>
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-2xl p-6 border-2 border-[#d70018] text-[#d70018] relative overflow-hidden flex items-center shadow-md group hover:bg-red-50 transition-colors">
                    <div class="absolute -right-4 -bottom-4 text-8xl opacity-5 group-hover:scale-110 transition-transform">🚗</div>
                    <div class="relative z-10">
                        <p class="text-gray-500 text-sm font-semibold mb-1">Giải Pháp Ô Tô</p>
                        <h3 class="font-black text-xl mb-2 text-[#d70018]">Vietmap Live Pro</h3>
                        <p class="text-xs font-medium text-gray-600">Cài đặt & Gia hạn bản quyền VIP</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Problem Statement / Core Message --}}
<section class="py-12 bg-white" id="van-de-khach-hang">
    <div class="container mx-auto px-4 max-w-4xl text-center">
        <h2 class="text-2xl md:text-3xl font-black text-[#d70018] mb-4">MÁY MẤT NGUỒN, DÍNH ICLOUD, MDM HAY RƠI VỠ? ĐỪNG VỘI BỎ ĐI!</h2>
        <p class="text-gray-600 leading-relaxed text-sm md:text-base font-medium">
            Cho dù là lỗi phần cứng phức tạp (chạm chập main, gãy test point) hay mắc kẹt tột độ ở phần mềm (Knox Guard, iCloud, Brick), đội ngũ <strong>Điện Thoại Laptop VN</strong> (Chuyên gia Khang & Thanhtaj) đều có giải pháp. Nhờ việc trực tiếp thao tác và phân phối các loại tool mạnh nhất thế giới (UnlockTool, Z3X, Chimera, UMT...), bạn sẽ tiết kiệm thời gian lẫn chi phí so với việc "qua tay" nhiều thợ khác.
        </p>
    </div>
</section>

{{-- Chọn thiết bị / Hãng --}}
<section class="py-10 bg-gray-50 border-t border-gray-100" id="thiet-bi">
    <div class="container mx-auto px-4">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Sửa Chữa Phần Cứng Theo Hãng</h2>
                <div class="w-16 h-1 bg-[#d70018] mt-2 rounded-full"></div>
            </div>
        </div>

        <div class="grid grid-cols-4 sm:grid-cols-6 lg:grid-cols-8 gap-3 md:gap-4">
            @foreach($brands as $brand)
                <a href="/sua-dien-thoai/{{ $brand->slug }}" wire:navigate
                   class="group flex flex-col items-center gap-2 p-3 bg-white rounded-xl border border-gray-200 hover:border-[#d70018] hover:shadow-[0_4px_12px_rgba(215,0,24,0.15)] transition-all duration-300">
                    @if($brand->logo)
                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="w-10 h-10 object-contain group-hover:scale-110 transition-transform duration-300" loading="lazy">
                    @else
                        <div class="w-12 h-12 rounded-full bg-gray-50 flex items-center justify-center text-gray-800 font-bold text-lg group-hover:bg-red-50 group-hover:text-[#d70018] transition-colors">
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
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Dịch Vụ Mũi Nhọn Của Chúng Tôi</h2>
                <div class="w-16 h-1 bg-[#d70018] mt-2 rounded-full"></div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-gray-50 rounded-xl p-5 border border-gray-200 hover:border-[#d70018] hover:shadow-xl transition-all duration-300 relative overflow-hidden group">
                <div class="w-12 h-12 mb-4 bg-white rounded-full flex items-center justify-center text-2xl shadow-sm text-[#d70018] group-hover:scale-110 transition-transform">📱</div>
                <h3 class="font-bold text-gray-800 mb-2">Sửa Phần Cứng Lấy Liền</h3>
                <p class="text-xs text-gray-600 leading-relaxed">Thay màn hình, thay pin chính hãng, ép kính. Khám đúng bệnh, khách hàng quan sát trực tiếp. Báo giá minh bạch không phát sinh.</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-5 border border-gray-200 hover:border-[#d70018] hover:shadow-xl transition-all duration-300 relative overflow-hidden group">
                <div class="w-12 h-12 mb-4 bg-white rounded-full flex items-center justify-center text-2xl shadow-sm text-[#d70018] group-hover:scale-110 transition-transform">💻</div>
                <h3 class="font-bold text-gray-800 mb-2">Unlock, Fix Khóa Từ Xa</h3>
                <p class="text-xs text-gray-600 leading-relaxed">Xóa iCloud, dọn FRP, Knox Guard, MDM, Repair Boot cho mọi dòng Apple, Samsung, Xiaomi. Giải cứu thiết bị bị Brick chuyên nghiệp.</p>
            </div>
            <div class="bg-gradient-to-br from-gray-900 to-black rounded-xl p-5 border border-gray-800 hover:border-[#d70018] hover:shadow-xl transition-all duration-300 relative overflow-hidden group">
                <div class="absolute -right-4 -bottom-4 text-6xl opacity-20">⚙️</div>
                <div class="w-12 h-12 mb-4 bg-white/10 rounded-full flex items-center justify-center text-2xl shadow-sm text-yellow-400 group-hover:scale-110 transition-transform">🌐</div>
                <h3 class="font-bold text-white mb-2">Hệ Sinh Thái Thuê Tool</h3>
                <p class="text-xs text-gray-400 leading-relaxed">Giải pháp B2B số 1 Việt Nam cho thợ. Hệ thống web thuê Box, Tool bản quyền tự động 24/7. Trực thuộc Thuetaikhoan.com.vn.</p>
                <a href="https://thuetaikhoan.com.vn" target="_blank" class="text-yellow-400 text-xs font-bold mt-4 inline-block hover:underline">Khám phá ngay →</a>
            </div>
            <div class="bg-white rounded-xl p-5 border-2 border-[#d70018]/30 hover:border-[#d70018] hover:shadow-xl transition-all duration-300 relative overflow-hidden group">
                 <div class="w-12 h-12 mb-4 bg-red-50 rounded-full flex items-center justify-center text-2xl shadow-sm text-[#d70018] group-hover:scale-110 transition-transform">🚘</div>
                <h3 class="font-bold text-gray-800 mb-2 text-[#d70018]">Dịch Vụ Ô Tô Việt Map</h3>
                <p class="text-xs text-gray-600 leading-relaxed">Đại lý cung cấp bản quyền Vietmap Live Pro chính hãng, gia hạn phần mềm cảnh báo giao thông an toàn cho người sử dụng ô tô.</p>
            </div>
        </div>
    </div>
</section>

{{-- Bảng giá nổi bật --}}
@if($featuredRepairs->count())
<section class="py-12 bg-gray-50" id="bang-gia">
    <div class="container mx-auto px-4">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Giá Sửa Chữa Tham Khảo</h2>
                <div class="w-16 h-1 bg-[#d70018] mt-2 rounded-full"></div>
            </div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($featuredRepairs as $repair)
                <a href="/{{ $repair->slug }}" wire:navigate
                   class="group bg-white rounded-xl border border-gray-200 hover:border-[#d70018] hover:shadow-[0_8px_16px_rgba(215,0,24,0.1)] transition-all duration-300 relative overflow-hidden flex flex-col h-full">
                    
                    @if($repair->discount_percent)
                        <div class="absolute top-2 left-2 z-10">
                            <span class="bg-[#d70018] text-white text-[10px] font-bold px-2 py-1 rounded-md shadow-sm">
                                GIẢM {{ $repair->discount_percent }}%
                            </span>
                        </div>
                    @endif

                    <div class="p-4 flex flex-col flex-1">
                        <div class="mt-4 mb-2">
                            <span class="text-[10px] font-bold text-gray-500 uppercase tracking-wide">{{ $repair->serviceType->name ?? '' }}</span>
                        </div>
                        <h3 class="font-bold text-sm md:text-base text-gray-800 group-hover:text-[#d70018] transition-colors mb-3 line-clamp-2 flex-1">
                            {{ $repair->serviceType->name ?? '' }} {{ $repair->deviceModel->name ?? '' }}
                        </h3>
                        
                        <div class="pt-3 border-t border-gray-100 mt-auto">
                            <div class="flex flex-col gap-1">
                                <span class="text-lg md:text-xl font-black text-[#d70018]">{{ $repair->display_price }}</span>
                                @if($repair->sale_price && $repair->price != $repair->sale_price)
                                    <span class="text-xs text-gray-400 line-through">{{ number_format($repair->price, 0, ',', '.') }}đ</span>
                                @else
                                    <span class="text-xs text-transparent">.</span> {{-- Spacer --}}
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
<section class="py-12 bg-white border-y border-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight text-center mb-10">Tại Sao Khách Hàng & Các Thợ Khác Chọn Chúng Tôi?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 text-[#d70018] font-bold">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    Lõi Kỹ Thuật Chuyên Sâu
                </div>
                <p class="text-sm text-gray-600 leading-relaxed">Chúng tôi tự biên soạn sơ đồ Test Point EDL 9008 cho hàng trăm mã máy Xiaomi, Samsung, am hiểu tận gốc rễ bảng mạch.</p>
            </div>
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 text-[#d70018] font-bold">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    Công Nghệ Mở Khóa Đỉnh Cao
                </div>
                <p class="text-sm text-gray-600 leading-relaxed">Quản lý hệ sinh thái cho thuê Tool (UnlockTool, DFT Pro, Cheetah...). Bạn không thể tìm được nơi nào đầy đủ đồ chơi phần mềm hơn.</p>
            </div>
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 text-[#d70018] font-bold">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    Thay Thế Không Sửa Mò
                </div>
                <p class="text-sm text-gray-600 leading-relaxed">Kinh nghiệm thực chiến 8 năm giúp chúng tôi chuẩn đoán đúng bệnh trong tíc tắc, xử lý triệt để, không lãng phí ví tiền của khách.</p>
            </div>
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 text-[#d70018] font-bold">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    Cộng Đồng Vững Mạnh
                </div>
                <p class="text-sm text-gray-600 leading-relaxed">Hỗ trợ cộng đồng Zalo lớn mạnh. Chúng tôi cung cấp giải pháp cho thợ (B2B) và bảo hành uy tín cho người dùng (B2C) toàn quốc.</p>
            </div>
        </div>
    </div>
</section>

{{-- Blog / Kiến thức Test Point --}}
@if($latestPosts->count())
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Chia Sẻ Kiến Thức Tới Cộng Đồng</h2>
                <div class="w-16 h-1 bg-[#d70018] mt-2 rounded-full"></div>
            </div>
            <a href="/blog" wire:navigate class="text-sm font-semibold text-[#d70018] hover:underline hidden sm:block">Xem tất cả bài viết →</a>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($latestPosts as $post)
                <a href="/blog/{{ $post->slug }}" wire:navigate class="group">
                    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 flex flex-col h-full hover:border-[#d70018]">
                        <div class="aspect-[16/9] w-full bg-gray-100 overflow-hidden relative">
                            <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors z-10"></div>
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-3xl">🗂️</div>
                            @endif
                        </div>
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="font-bold text-sm text-gray-800 group-hover:text-[#d70018] transition-colors line-clamp-2 mb-2">{{ $post->title }}</h3>
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
<section class="py-12 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-red-600 to-[#d70018]"></div>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay"></div>
    <div class="container mx-auto px-4 text-center relative z-10">
        <h2 class="text-2xl md:text-3xl font-black text-white uppercase tracking-tight mb-3">Tư Vấn Bắt Bệnh Từ Kỹ Thuật Viên Trưởng</h2>
        <p class="text-white/90 mb-6 text-sm md:text-base font-medium">Báo đúng giá - Chữa đúng bệnh. Đảm bảo uy tín thương hiệu Thuetaikhoan.</p>
        <div class="flex justify-center gap-4 flex-wrap">
            <a href="tel:0777333763" class="inline-flex items-center gap-2 bg-yellow-400 text-black px-8 py-4 rounded-xl text-lg font-black hover:bg-white hover:text-[#d70018] transition-all duration-300 shadow-xl hover:scale-105">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                Tư vấn CSKH: 0777.333.763
            </a>
            <a href="tel:0934660219" class="inline-flex items-center gap-2 bg-black/30 backdrop-blur-sm border-2 border-white/50 text-white px-8 py-4 rounded-xl text-lg font-black hover:bg-white hover:text-[#d70018] hover:border-white transition-all duration-300 shadow-xl">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                Hỗ trợ Kỹ thuật: 0934.660.219
            </a>
        </div>
    </div>
</section>
@endsection
