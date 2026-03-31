<div>
    <div x-data="{ show: false }" @open-price-popup.window="show = true" @keydown.escape.window="show = false">
        {{-- Modal Overlay --}}
        <div x-show="show" x-transition.opacity class="fixed inset-0 z-[100] bg-gray-900/70 backdrop-blur-md flex items-center justify-center p-0 sm:p-4" style="display: none;">
            {{-- Modal Content --}}
            <div x-show="show" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
                @click.away="show = false"
                class="bg-[#f8f9fa] w-full h-full sm:h-[85vh] sm:max-w-6xl sm:rounded-3xl shadow-[0_20px_60px_-15px_rgba(0,0,0,0.5)] flex flex-col overflow-hidden relative border border-white/20">
                
                {{-- Decorative Gradient Blob inside modal --}}
                <div class="absolute top-0 left-0 w-full h-64 bg-gradient-to-br from-red-500/10 via-transparent to-transparent opacity-50 pointer-events-none"></div>

                {{-- Header (Premium Glassmorphism) --}}
                <div class="px-6 py-5 border-b border-gray-200/60 bg-white/80 backdrop-blur-xl flex items-center justify-between shrink-0 z-20 relative">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#d70018] to-red-600 flex items-center justify-center text-white shadow-lg shadow-red-500/30">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-xl sm:text-2xl font-black text-gray-900 tracking-tight uppercase">Bảng Giá Dịch Vụ</h3>
                            <p class="text-[11px] sm:text-xs text-gray-500 font-medium mt-0.5">Cập nhật theo thời gian thực. Đã bao gồm công thợ & bảo hành.</p>
                        </div>
                    </div>
                    <button @click="show = false" class="text-gray-400 hover:text-red-500 hover:bg-red-50 transition-all p-2.5 rounded-full">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                {{-- Search & Filters --}}
                <div class="p-6 shrink-0 bg-white shadow-sm z-10 relative">
                    <div class="flex flex-col md:flex-row gap-4">
                        {{-- Search Input --}}
                        <div class="relative flex-1 group">
                            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Gõ tên máy hoặc lỗi (VD: Thay màn iphone 15)..." 
                                class="w-full h-12 pl-12 pr-4 text-gray-900 bg-gray-50/50 border border-gray-200 rounded-2xl focus:bg-white focus:border-[#d70018] focus:ring-4 focus:ring-red-500/10 transition-all text-sm font-semibold placeholder-gray-400">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none group-focus-within:text-[#d70018] text-gray-400 transition-colors">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </div>
                        </div>

                        {{-- Device Model Filter --}}
                        <div class="w-full md:w-64 relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-500">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            </div>
                            <select wire:model.live="deviceFilter" class="w-full h-12 pl-10 pr-10 text-gray-800 bg-gray-50/50 border border-gray-200 rounded-2xl focus:bg-white focus:border-[#d70018] focus:ring-4 focus:ring-red-500/10 transition-all text-sm font-semibold appearance-none cursor-pointer">
                                <option value="">Tất cả thiết bị</option>
                                @foreach($deviceModels as $model)
                                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                        
                        {{-- Service Type Filter --}}
                        <div class="w-full md:w-64 relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-500">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <select wire:model.live="serviceFilter" class="w-full h-12 pl-10 pr-10 text-gray-800 bg-gray-50/50 border border-gray-200 rounded-2xl focus:bg-white focus:border-[#d70018] focus:ring-4 focus:ring-red-500/10 transition-all text-sm font-semibold appearance-none cursor-pointer">
                                <option value="">Tất cả dịch vụ</option>
                                @foreach($serviceTypes as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Table (Scrollable Area) --}}
                <div class="flex-1 overflow-y-auto relative bg-transparent px-2 sm:px-6 pb-6 pt-4 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-gray-300 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-gray-400 transition-colors">
                    <div wire:loading.delay class="absolute inset-0 bg-white/60 backdrop-blur-md z-[105] flex items-center justify-center rounded-2xl m-6">
                        <div class="flex flex-col items-center gap-3">
                            <div class="w-10 h-10 rounded-full border-4 border-gray-200 border-t-[#d70018] animate-spin shadow-lg"></div>
                            <span class="text-sm font-bold text-gray-600 animate-pulse">Đang trích xuất dữ liệu...</span>
                        </div>
                    </div>

                    @if($repairs->isEmpty())
                        <div class="flex flex-col items-center justify-center py-20 m-auto bg-white rounded-3xl border border-dashed border-gray-300 shadow-sm mx-0 sm:mx-6 mt-4">
                            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <h4 class="text-lg text-gray-800 font-bold mb-1">Không tìm thấy báo giá phù hợp!</h4>
                            <p class="text-sm text-gray-500 mb-6 text-center max-w-sm">Dịch vụ này có thể chưa được cập nhật trên hệ thống. Trò chuyện trực tiếp với KTV để nhận báo giá riêng.</p>
                            <a href="tel:0777333763" class="inline-flex items-center gap-2 bg-gradient-to-r from-[#d70018] to-red-600 text-white px-6 py-2.5 rounded-full font-bold shadow-lg shadow-red-500/30 hover:-translate-y-0.5 transition-transform">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M2.002 5.884L10 9.882l7.998-3.998A2 2 0 0016 4H4a2 2 0 00-1.998 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                                Hotline: 0777.333.763
                            </a>
                        </div>
                    @else
                        <div class="bg-white sm:rounded-3xl rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-gray-50/80 sticky top-0 z-10 backdrop-blur-xl border-b border-gray-200">
                                    <tr>
                                        <th class="px-5 py-4 font-bold text-gray-500 uppercase tracking-widest text-[10px]">Dòng máy</th>
                                        <th class="px-5 py-4 font-bold text-gray-500 uppercase tracking-widest text-[10px]">Tên Dịch Vụ</th>
                                        <th class="px-5 py-4 font-bold text-gray-500 uppercase tracking-widest text-[10px] text-right">Chi phí trọn gói</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100/80">
                                    @foreach($repairs as $repair)
                                        <tr class="hover:bg-[#fff9fa] group transition-colors duration-200" wire:key="repair-{{ $repair->id }}">
                                            
                                            {{-- Cột Dòng Máy (Device Model) dạng Badge --}}
                                            <td class="px-5 py-4 align-middle">
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-100 text-gray-800 text-xs font-bold border border-gray-200/60 group-hover:border-red-200 group-hover:bg-white transition-colors">
                                                    <svg class="w-3.5 h-3.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                                    {{ $repair->deviceModel->name ?? 'N/A' }}
                                                </span>
                                            </td>

                                            {{-- Cột Dịch Vụ (Service) --}}
                                            <td class="px-5 py-4 align-middle w-[45%]">
                                                <div class="flex flex-col">
                                                    <div class="font-extrabold text-gray-900 text-sm group-hover:text-[#d70018] transition-colors leading-tight">
                                                        {{ $repair->serviceType->name ?? 'N/A' }}
                                                    </div>
                                                    @if($repair->short_description)
                                                        <div class="text-[11px] text-gray-500 mt-1 line-clamp-2 leading-relaxed">
                                                            {{ $repair->short_description }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>

                                            {{-- Cột Giá & Nút Call (Price) --}}
                                            <td class="px-5 py-4 align-middle text-right">
                                                <div class="flex flex-col items-end justify-center gap-0.5">
                                                    <div class="flex items-center gap-2">
                                                        @if($repair->sale_price && $repair->price != $repair->sale_price)
                                                            <span class="px-1.5 py-0.5 rounded text-[9px] font-black bg-red-100 text-red-600 tracking-wider">SALE</span>
                                                        @endif
                                                        <span class="font-black text-[#d70018] sm:text-lg text-base">{{ $repair->display_price }}</span>
                                                    </div>
                                                    
                                                    @if($repair->sale_price && $repair->price != $repair->sale_price)
                                                        <span class="text-[11px] text-gray-400 font-medium line-through">Giá gốc: {{ number_format($repair->price, 0, ',', '.') }}đ</span>
                                                    @endif
                                                    
                                                    {{-- Nút Liên hệ xuất hiện khi hover trên màn lớn, hoặc luôn hiện trên màn nhỏ --}}
                                                    <a href="tel:0777333763" class="mt-2 sm:opacity-0 sm:-translate-y-2 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 inline-flex items-center gap-1.5 bg-gray-900 hover:bg-black text-white px-3 py-1.5 rounded-md text-[10px] font-bold uppercase tracking-wider">
                                                        <svg class="w-3 h-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                                                        Gọi Ngay
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Footer Badge --}}
                        <div class="py-6 flex justify-center items-center text-gray-400 text-[10px] font-bold uppercase tracking-widest flex-col gap-2">
                            <span class="block w-8 h-1 bg-gray-200 rounded-full"></span>
                            Đang hiển thị toàn bộ {{ $repairs->count() }} dịch vụ
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
