@extends('layouts.app')

@section('breadcrumbs')
    <a href="/" wire:navigate class="hover:text-blue-600">Trang chủ</a>
    <span class="mx-2">/</span>
    <a href="/{{ $category->slug }}" wire:navigate class="hover:text-blue-600">{{ $category->name }}</a>
    <span class="mx-2">/</span>
    <span class="text-gray-800 font-medium">{{ $brand->name }}</span>
@endsection

@section('content')
<section class="py-10">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-2">Sửa chữa {{ $brand->name }}</h1>
        <p class="text-gray-500 mb-8">Chọn dòng máy {{ $brand->name }} bạn cần sửa chữa</p>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
            @foreach($deviceModels as $model)
                <a href="/{{ $category->slug }}/{{ $brand->slug }}/{{ $model->slug }}" wire:navigate
                   class="group bg-white rounded-2xl border border-gray-100 hover:border-blue-300 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">
                    @if($model->image)
                        <img src="{{ asset('storage/' . $model->image) }}" alt="{{ $model->name }}" class="w-full h-40 object-contain p-4 group-hover:scale-105 transition-transform" loading="lazy">
                    @else
                        <div class="w-full h-40 bg-gradient-to-br from-gray-50 to-blue-50 flex items-center justify-center text-5xl">📱</div>
                    @endif
                    <div class="p-4 border-t border-gray-50">
                        <h3 class="font-bold text-gray-800 group-hover:text-blue-600 transition-colors text-center">{{ $model->name }}</h3>
                    </div>
                </a>
            @endforeach
        </div>

        @if($deviceModels->isEmpty())
            <div class="text-center py-16 text-gray-400">
                <p class="text-5xl mb-4">🔍</p>
                <p class="text-lg">Đang cập nhật danh sách dòng máy {{ $brand->name }}</p>
            </div>
        @endif
    </div>
</section>
@endsection
