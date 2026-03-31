@extends('layouts.app')

@section('content')
{{-- Hero Section Premium (Dienthoaivui Layout Style) --}}
<section class="bg-gray-50 pt-6 pb-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-4">
            {{-- Main Slider (Placeholder) --}}
            <div class="w-full lg:w-[70%] bg-gradient-to-r from-[#d70018] to-red-600 rounded-2xl p-8 text-white relative flex flex-col justify-center min-h-[300px] shadow-lg overflow-hidden group">
                <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] mix-blend-overlay"></div>
                <div class="relative z-10 w-full md:w-3/4">
                    <span class="inline-block bg-yellow-400 text-red-900 text-xs font-bold px-3 py-1 rounded-full mb-4 shadow-sm uppercase tracking-wide">Khuyến mãi tháng {{ date('n') }}</span>
                    <h1 class="text-3xl md:text-5xl font-black leading-tight mb-4 drop-shadow-md">
                        SỬA CHỮA THIẾT BỊ <br/>
                        <span class="text-yellow-400">CHUYÊN NGHIỆP</span>
                    </h1>
                    <p class="text-white/90 mb-6 font-medium">Bảo hành tới 12 tháng. Thay pin, màn hình lấy liền sau 15 phút.</p>
                    <a href="#bang-gia" class="inline-block bg-white text-[#d70018] px-8 py-3 rounded-xl font-bold uppercase text-sm hover:bg-yellow-400 hover:text-black hover:shadow-xl transition-all duration-300">
                        Xem bảng giá ngay
                    </a>
                </div>
            </div>

            {{-- 2 Side Banners --}}
            <div class="hidden lg:flex w-[30%] flex-col gap-4">
                <div class="flex-1 bg-gradient-to-br from-gray-800 to-black rounded-2xl p-6 text-white relative overflow-hidden flex items-center shadow-md group border border-gray-200">
                    <div class="absolute -right-4 -bottom-4 text-8xl opacity-10 group-hover:scale-110 transition-transform">🔋</div>
                    <div class="relative z-10">
                        <p class="text-yellow-400 font-bold mb-1">Thay Pin iPhone</p>
                        <h3 class="font-black text-xl mb-2 text-white">Chính Hãng 100%</h3>
                        <p class="text-sm text-gray-400">BH 1 đổi 1 12 Tháng</p>
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-2xl p-6 border-2 border-[#d70018] text-[#d70018] relative overflow-hidden flex items-center shadow-md group">
                    <div class="absolute -right-4 -bottom-4 text-8xl opacity-5 group-hover:scale-110 transition-transform">📱</div>
                    <div class="relative z-10">
                        <p class="text-gray-500 text-sm font-semibold mb-1">Dịch Vụ Ép Kính</p>
                        <h3 class="font-black text-xl mb-2 text-[#d70018]">Giảm Giá 20%</h3>
                        <p class="text-sm font-medium">Click lấy mã ngay</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Chọn thiết bị / Hãng --}}
<section class="py-12 bg-white" id="thiet-bi">
    <div class="container mx-auto px-4">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Sửa Theo Hãng</h2>
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

{{-- Danh mục dịch vụ --}}
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Các Dịch Vụ Nổi Bật</h2>
                <div class="w-16 h-1 bg-[#d70018] mt-2 rounded-full"></div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($categories as $category)
                <a href="/{{ $category->slug }}" wire:navigate
                   class="group bg-white rounded-xl p-5 border border-gray-200 hover:border-[#d70018] hover:shadow-xl transition-all duration-300 flex items-center gap-4 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-16 h-16 bg-red-50 rounded-bl-full -z-10 group-hover:scale-150 transition-transform"></div>
                    <div class="w-14 h-14 bg-gray-50 group-hover:bg-[#d70018] rounded-full flex items-center justify-center text-2xl flex-shrink-0 transition-colors shadow-sm">
                        <span class="group-hover:scale-110 transition-transform">{{ $category->icon ?? '🔧' }}</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 group-hover:text-[#d70018] transition-colors">{{ $category->name }}</h3>
                        <p class="text-xs text-gray-500 mt-1 line-clamp-2">{{ $category->description ?: 'Bảo hành tận tâm, chuyên nghiệp' }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Bảng giá nổi bật --}}
@if($featuredRepairs->count())
<section class="py-12 bg-white" id="bang-gia">
    <div class="container mx-auto px-4">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Giá Sửa Chữa Tốt Nhất</h2>
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

{{-- Quy trình sửa chữa --}}
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight text-center mb-10">Quy Trình Hoạt Động Của DL</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 relative">
            {{-- Đường nối gạch đứt (chỉ hiện trên Desktop) --}}
            <div class="hidden md:block absolute top-[40px] left-[12%] right-[12%] h-0.5 border-t-2 border-dashed border-red-200 -z-0"></div>

            @php
                $steps = [
                    ['icon' => '1', 'title' => 'Tiếp nhận báo giá', 'desc' => 'Chuẩn đoán lỗi, báo giá minh bạch miễn phí'],
                    ['icon' => '2', 'title' => 'Đồng ý sửa chữa', 'desc' => 'Khách chốt giá & phương án giải quyết'],
                    ['icon' => '3', 'title' => 'Kỹ thuật xử lý', 'desc' => 'Xem trực tiếp quy trình sửa chữa'],
                    ['icon' => '4', 'title' => 'Bàn giao bảo hành', 'desc' => 'Dán tem & hậu mãi tận tình'],
                ];
            @endphp
            @foreach($steps as $index => $step)
                <div class="relative text-center z-10">
                    <div class="w-16 h-16 md:w-20 md:h-20 mx-auto bg-white rounded-full shadow-md flex items-center justify-center text-xl md:text-2xl font-black text-[#d70018] mb-4 border-4 border-red-50">
                        {{ $step['icon'] }}
                    </div>
                    <h3 class="font-bold text-gray-800 text-sm md:text-base mb-1">{{ $step['title'] }}</h3>
                    <p class="text-xs text-gray-500">{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Blog --}}
@if($latestPosts->count())
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Thủ Thuật Công Nghệ</h2>
                <div class="w-16 h-1 bg-[#d70018] mt-2 rounded-full"></div>
            </div>
            <a href="/blog" wire:navigate class="text-sm font-semibold text-[#d70018] hover:underline hidden sm:block">Xem tất cả →</a>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($latestPosts as $post)
                <a href="/blog/{{ $post->slug }}" wire:navigate class="group">
                    <div class="bg-white rounded-xl border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 flex flex-col h-full">
                        <div class="aspect-[16/9] w-full bg-gray-100 overflow-hidden">
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-3xl">📝</div>
                            @endif
                        </div>
                        <div class="p-3 flex-1 flex flex-col">
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

{{-- CTA --}}
<section class="py-12 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-red-600 to-[#d70018]"></div>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay"></div>
    <div class="container mx-auto px-4 text-center relative z-10">
        <h2 class="text-2xl md:text-3xl font-black text-white uppercase tracking-tight mb-3">Tư Vấn Bắt Bệnh Miễn Phí</h2>
        <p class="text-white/80 mb-6 text-sm font-medium">Hoàn tiền 100% nếu không hài lòng về dịch vụ!</p>
        <a href="tel:0xxxxxxxxx" class="inline-flex items-center gap-2 bg-yellow-400 text-black px-8 py-4 rounded-xl text-lg md:text-xl font-black hover:bg-white hover:text-[#d70018] transition-all duration-300 shadow-xl hover:scale-105">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            0xxx.xxx.xxx
        </a>
    </div>
</section>
@endsection
