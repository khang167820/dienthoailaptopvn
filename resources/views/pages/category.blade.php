@extends('layouts.app')

@section('breadcrumbs')
    <a href="/" wire:navigate class="hover:text-blue-600">Trang chủ</a>
    <span class="mx-2">/</span>
    <span class="text-gray-800 font-medium">{{ $category->name }}</span>
@endsection

@section('content')
<section class="py-10">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-2">{{ $category->name }}</h1>
        <p class="text-gray-500 mb-8">{{ $category->description ?: 'Chọn thương hiệu thiết bị bạn cần sửa chữa' }}</p>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">
            @foreach($brands as $brand)
                <a href="/{{ $category->slug }}/{{ $brand->slug }}" wire:navigate
                   class="group flex flex-col items-center gap-3 p-6 rounded-2xl border-2 border-gray-100 hover:border-blue-500 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 bg-white">
                    @if($brand->logo)
                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="w-16 h-16 object-contain group-hover:scale-110 transition-transform" loading="lazy">
                    @else
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center text-blue-600 font-bold text-2xl">
                            {{ substr($brand->name, 0, 1) }}
                        </div>
                    @endif
                    <span class="text-sm font-semibold text-gray-700 group-hover:text-blue-600 transition-colors">{{ $brand->name }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
