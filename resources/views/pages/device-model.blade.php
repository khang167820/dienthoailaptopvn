@extends('layouts.app')

@section('breadcrumbs')
    <a href="/" wire:navigate class="hover:text-blue-600">Trang chủ</a>
    <span class="mx-2">/</span>
    <a href="/{{ $category->slug }}" wire:navigate class="hover:text-blue-600">{{ $category->name }}</a>
    <span class="mx-2">/</span>
    <a href="/{{ $category->slug }}/{{ $brand->slug }}" wire:navigate class="hover:text-blue-600">{{ $brand->name }}</a>
    <span class="mx-2">/</span>
    <span class="text-gray-800 font-medium">{{ $deviceModel->name }}</span>
@endsection

@section('schema')
{!! json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
@endsection

@section('content')
<section class="py-10">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-2">Bảng Giá Sửa Chữa {{ $deviceModel->name }}</h1>
        <p class="text-gray-500 mb-8">Cập nhật mới nhất tháng {{ date('m/Y') }} • Bảo hành dài hạn • Sửa lấy liền</p>

        {{-- Bảng giá --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
                            <th class="text-left px-6 py-4 font-semibold">Dịch vụ</th>
                            <th class="text-right px-6 py-4 font-semibold">Giá gốc</th>
                            <th class="text-right px-6 py-4 font-semibold">Giá KM</th>
                            <th class="text-center px-6 py-4 font-semibold">Bảo hành</th>
                            <th class="text-center px-6 py-4 font-semibold"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($repairs as $repair)
                            <tr class="border-b border-gray-50 hover:bg-blue-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <a href="/{{ $repair->slug }}" wire:navigate class="font-semibold text-gray-800 hover:text-blue-600 transition-colors">
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
                                    <span class="font-bold text-lg text-red-500">{{ $repair->display_price }}</span>
                                    @if($repair->discount_percent)
                                        <span class="ml-1 text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded-full font-bold">-{{ $repair->discount_percent }}%</span>
                                    @endif
                                </td>
                                <td class="text-center px-6 py-4 text-sm text-gray-600">
                                    🛡️ {{ $repair->warranty ?? 'Liên hệ' }}
                                </td>
                                <td class="text-center px-6 py-4">
                                    <a href="tel:0xxxxxxxxx" class="inline-flex items-center gap-1 bg-gradient-to-r from-orange-500 to-red-500 text-white px-4 py-2 rounded-xl text-sm font-semibold hover:shadow-lg hover:scale-105 transition-all">
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
                <p class="text-lg">Đang cập nhật bảng giá cho {{ $deviceModel->name }}</p>
            </div>
        @endif
    </div>
</section>
@endsection
