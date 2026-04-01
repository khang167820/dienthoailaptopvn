@extends('layouts.app')

@section('breadcrumbs')
    <a href="/" wire:navigate class="hover:text-[#d70018] transition-colors">Trang chủ</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <a href="/{{ $category->slug }}" wire:navigate class="hover:text-[#d70018] transition-colors">{{ $category->name }}</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <a href="/{{ $category->slug }}/{{ $brand->slug }}" wire:navigate class="hover:text-[#d70018] transition-colors">{{ $brand->name }}</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <span class="text-gray-800 font-medium">{{ $deviceModel->name }}</span>
@endsection

@section('schema')
{!! json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
@endsection

@section('content')
{{-- Device Model Hero --}}
<section class="page-hero py-10 md:py-14">
    <div class="container mx-auto px-4 relative z-10">
        <h1 class="text-3xl md:text-4xl font-black text-white mb-2">Bảng Giá Sửa Chữa {{ $deviceModel->name }}</h1>
        <p class="text-gray-300 text-sm md:text-base flex items-center gap-3 flex-wrap">
            <span>📅 Cập nhật mới nhất tháng {{ date('m/Y') }}</span>
            <span class="w-1 h-1 bg-gray-500 rounded-full"></span>
            <span>🛡️ Bảo hành dài hạn</span>
            <span class="w-1 h-1 bg-gray-500 rounded-full"></span>
            <span>⚡ Sửa lấy liền</span>
        </p>
    </div>
</section>

<section class="py-10 bg-gray-50">
    <div class="container mx-auto px-4">
        {{-- Bảng giá --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full table-brand">
                    <thead>
                        <tr class="text-white">
                            <th class="text-left px-6 py-4 font-semibold">Dịch vụ</th>
                            <th class="text-right px-6 py-4 font-semibold">Giá gốc</th>
                            <th class="text-right px-6 py-4 font-semibold">Giá KM</th>
                            <th class="text-center px-6 py-4 font-semibold">Bảo hành</th>
                            <th class="text-center px-6 py-4 font-semibold"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($repairs as $repair)
                            <tr class="border-b border-gray-50">
                                <td class="px-6 py-4">
                                    <a href="/{{ $repair->slug }}" wire:navigate class="font-semibold text-gray-900 hover:text-[#d70018] transition-colors">
                                        {{ $repair->serviceType->name }}
                                    </a>
                                    @if($repair->short_description)
                                        <p class="text-xs text-gray-400 mt-1">{{ $repair->short_description }}</p>
                                    @endif
                                </td>
                                <td class="text-right px-6 py-4 text-gray-400 line-through text-sm">
                                    @if($repair->sale_price && $repair->price != $repair->sale_price)
                                        {{ number_format($repair->price, 0, ',', '.') }}đ
                                    @endif
                                </td>
                                <td class="text-right px-6 py-4">
                                    <span class="font-bold text-lg text-[#d70018]">{{ $repair->display_price }}</span>
                                    @if($repair->discount_percent)
                                        <span class="ml-1.5 text-xs bg-red-50 text-[#d70018] px-2 py-0.5 rounded-full font-bold border border-red-100">-{{ $repair->discount_percent }}%</span>
                                    @endif
                                </td>
                                <td class="text-center px-6 py-4 text-sm text-gray-600">
                                    🛡️ {{ $repair->warranty ?? 'Liên hệ' }}
                                </td>
                                <td class="text-center px-6 py-4">
                                    <a href="tel:0777333763" class="inline-flex items-center gap-1.5 bg-[#d70018] text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-red-700 hover:shadow-lg hover:scale-105 transition-all duration-300 shadow-sm">
                                        📞 Gọi
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if($repairs->isEmpty())
            <div class="text-center py-16 text-gray-400">
                <p class="text-5xl mb-4">📋</p>
                <p class="text-lg font-medium">Đang cập nhật bảng giá cho {{ $deviceModel->name }}</p>
            </div>
        @endif
    </div>
</section>
@endsection
