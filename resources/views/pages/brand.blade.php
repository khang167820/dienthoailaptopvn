@extends('layouts.app')

@section('breadcrumbs')
    <a href="/" wire:navigate class="hover:text-[#d70018] transition-colors">Trang chủ</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <a href="/{{ $category->slug }}" wire:navigate class="hover:text-[#d70018] transition-colors">{{ $category->name }}</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <span class="text-gray-800 font-medium">{{ $brand->name }}</span>
@endsection

@section('content')
{{-- Brand Hero --}}
<section class="page-hero py-10 md:py-14">
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex items-center gap-4 mb-3">
            @if($brand->logo)
                <div class="w-14 h-14 bg-white rounded-xl p-2 shadow-lg">
                    <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="w-full h-full object-contain">
                </div>
            @endif
            <div>
                <h1 class="text-3xl md:text-4xl font-black text-white">Sửa chữa {{ $brand->name }}</h1>
                <p class="text-gray-300 text-sm md:text-base">Chọn dòng máy {{ $brand->name }} bạn cần sửa chữa</p>
            </div>
        </div>
    </div>
</section>

<section class="py-10 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
            @foreach($deviceModels as $model)
                <a href="/{{ $category->slug }}/{{ $brand->slug }}/{{ $model->slug }}" wire:navigate
                   class="group bg-white rounded-2xl border border-gray-200 hover:border-[#d70018] shadow-sm transition-all duration-300 overflow-hidden card-hover">
                    @if($model->image)
                        <div class="overflow-hidden">
                            <img src="{{ asset('storage/' . $model->image) }}" alt="{{ $model->name }}" class="w-full h-40 object-contain p-4 group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        </div>
                    @else
                        <div class="w-full h-40 bg-gradient-to-br from-red-50 to-gray-50 flex items-center justify-center text-5xl">📱</div>
                    @endif
                    <div class="p-4 border-t border-gray-100">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#d70018] transition-colors text-center">{{ $model->name }}</h3>
                    </div>
                </a>
            @endforeach
        </div>

        @if($deviceModels->isEmpty())
            <div class="text-center py-16 text-gray-400">
                <p class="text-5xl mb-4">🔍</p>
                <p class="text-lg font-medium">Đang cập nhật danh sách dòng máy {{ $brand->name }}</p>
            </div>
        @endif
    </div>
</section>
@endsection
