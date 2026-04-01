@extends('layouts.app')

@section('breadcrumbs')
    <a href="/" wire:navigate class="hover:text-[#d70018] transition-colors">Trang chủ</a>
    <span class="mx-1.5 text-gray-400">/</span>
    @if($repair->deviceModel && $repair->deviceModel->brand)
        <a href="/{{ $repair->deviceModel->category->slug ?? 'sua-dien-thoai' }}/{{ $repair->deviceModel->brand->slug }}" wire:navigate class="hover:text-[#d70018] transition-colors">{{ $repair->deviceModel->brand->name }}</a>
        <span class="mx-1.5 text-gray-400">/</span>
    @endif
    <span class="text-gray-800 font-medium">{{ $repair->serviceType->name }} {{ $repair->deviceModel->name }}</span>
@endsection

@section('schema')
{!! json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
@endsection

@section('content')
<article class="py-10 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Nội dung chính --}}
            <div class="lg:col-span-2">
                <h1 class="text-3xl md:text-4xl font-extrabold mb-5 text-gray-900 leading-tight">
                    {{ $repair->serviceType->name }} {{ $repair->deviceModel->name }}
                </h1>

                {{-- Thẻ giá nổi bật --}}
                <div class="bg-gradient-to-r from-[#1a1a2e] to-[#0f3460] rounded-2xl p-6 md:p-8 mb-8 relative overflow-hidden shadow-xl">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-[#d70018]/10 rounded-full blur-2xl pointer-events-none"></div>
                    <div class="flex flex-wrap items-center gap-6 relative z-10">
                        <div>
                            <span class="text-sm text-gray-400 block mb-1">Giá dịch vụ</span>
                            <div class="flex items-baseline gap-3">
                                <span class="text-4xl font-black text-white">{{ $repair->display_price }}</span>
                                @if($repair->sale_price && $repair->price != $repair->sale_price)
                                    <span class="text-lg text-gray-500 line-through">{{ number_format($repair->price, 0, ',', '.') }}đ</span>
                                    <span class="bg-[#d70018] text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg shadow-red-500/20">-{{ $repair->discount_percent }}%</span>
                                @endif
                            </div>
                        </div>
                        <div class="flex gap-4 text-sm text-gray-300">
                            @if($repair->warranty)
                                <span class="flex items-center gap-1.5 bg-white/5 px-3 py-1.5 rounded-lg border border-white/10">🛡️ BH: {{ $repair->warranty }}</span>
                            @endif
                            @if($repair->repair_time)
                                <span class="flex items-center gap-1.5 bg-white/5 px-3 py-1.5 rounded-lg border border-white/10">⏱️ {{ $repair->repair_time }}</span>
                            @endif
                        </div>
                        <a href="tel:0777333763" class="ml-auto bg-[#d70018] text-white px-8 py-3.5 rounded-xl font-bold hover:bg-red-700 hover:shadow-xl hover:scale-105 transition-all duration-300 shadow-lg shadow-red-500/30 animate-pulse-glow">
                            📞 Gọi báo giá
                        </a>
                    </div>
                </div>

                {{-- Nội dung bài viết SEO --}}
                @if($repair->content)
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8 shadow-sm">
                        <div class="prose prose-lg max-w-none prose-headings:text-gray-900">
                            {!! $repair->content !!}
                        </div>
                    </div>
                @endif

                {{-- FAQ Section --}}
                @if($repair->faq && count($repair->faq) > 0)
                    <div class="mt-10">
                        <h2 class="text-2xl font-black mb-6 text-gray-900 flex items-center gap-2">
                            <span class="w-1 h-7 bg-[#d70018] rounded-full"></span>
                            Câu Hỏi Thường Gặp
                        </h2>
                        <div class="space-y-3">
                            @foreach($repair->faq as $item)
                                <details class="group bg-white border border-gray-200 rounded-xl overflow-hidden hover:border-[#d70018]/30 transition-colors">
                                    <summary class="flex items-center justify-between cursor-pointer px-6 py-4 font-semibold text-gray-900 hover:bg-red-50/50 transition-colors">
                                        <span>{{ $item['question'] ?? '' }}</span>
                                        <svg class="w-5 h-5 text-gray-400 group-open:rotate-180 transition-transform duration-300 shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </summary>
                                    <div class="px-6 pb-4 text-gray-600 leading-relaxed border-t border-gray-100 pt-3">
                                        {{ $item['answer'] ?? '' }}
                                    </div>
                                </details>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <aside class="lg:col-span-1">
                {{-- Liên hệ --}}
                <div class="bg-white rounded-2xl border border-gray-200 shadow-lg p-6 mb-6 sticky top-24">
                    <h3 class="font-black text-lg mb-5 text-center text-gray-900">📞 Liên Hệ Ngay</h3>
                    <a href="tel:0777333763" class="flex items-center justify-center gap-2 w-full bg-[#d70018] text-white text-center py-4 rounded-xl font-bold text-lg hover:bg-red-700 hover:shadow-xl hover:scale-105 transition-all duration-300 mb-3 shadow-lg shadow-red-500/20">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        0777.333.763
                    </a>
                    <a href="https://zalo.me/g/qncjky686" target="_blank" class="flex items-center justify-center gap-2 w-full bg-gradient-to-r from-[#1a1a2e] to-[#0f3460] text-white text-center py-3.5 rounded-xl font-semibold hover:shadow-lg transition-all mb-3">
                        💬 Chat Zalo
                    </a>
                    <p class="text-center text-sm text-gray-400 mt-3">⏰ Mở cửa: 08:00 - 21:00 (Cả CN)</p>

                    {{-- Trust badges --}}
                    <div class="mt-5 pt-5 border-t border-gray-100 grid grid-cols-3 gap-2 text-center">
                        <div class="p-2">
                            <div class="text-lg">🛡️</div>
                            <p class="text-[10px] text-gray-500 font-bold mt-1">Bảo hành</p>
                        </div>
                        <div class="p-2">
                            <div class="text-lg">⚡</div>
                            <p class="text-[10px] text-gray-500 font-bold mt-1">Lấy liền</p>
                        </div>
                        <div class="p-2">
                            <div class="text-lg">💯</div>
                            <p class="text-[10px] text-gray-500 font-bold mt-1">Chính hãng</p>
                        </div>
                    </div>
                </div>

                {{-- Dịch vụ liên quan --}}
                @if($relatedRepairs->count())
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                        <h3 class="font-bold text-lg mb-4 text-gray-900 flex items-center gap-2">
                            <span class="w-1 h-5 bg-[#d70018] rounded-full"></span>
                            Dịch vụ khác cho {{ $repair->deviceModel->name }}
                        </h3>
                        <ul class="space-y-2">
                            @foreach($relatedRepairs as $related)
                                <li>
                                    <a href="/{{ $related->slug }}" wire:navigate class="flex items-center justify-between py-2.5 px-3 rounded-xl hover:bg-red-50 hover:text-[#d70018] transition-all group">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-[#d70018]">{{ $related->serviceType->name }}</span>
                                        <span class="text-sm font-bold text-[#d70018]">{{ $related->display_price }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </aside>
        </div>
    </div>
</article>
@endsection
