<div>
    <div x-data="{ show: false }" @open-price-popup.window="show = true" @keydown.escape.window="show = false">
        {{-- Modal Overlay --}}
        <div x-show="show" x-transition.opacity class="fixed inset-0 z-[100] bg-black/60 backdrop-blur-sm flex items-center justify-center p-2 sm:p-4" style="display: none;">
            {{-- Modal Content --}}
            <div x-show="show" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
                @click.away="show = false"
                class="bg-white w-full h-full sm:h-[85vh] sm:max-w-[1000px] rounded-xl sm:rounded-2xl shadow-2xl flex flex-col overflow-hidden relative">
                
                {{-- Solid Red Header --}}
                <div class="px-6 py-4 bg-[#d70018] flex items-center justify-between shrink-0 z-20 relative">
                    <h3 class="text-xl font-bold text-white tracking-tight">Bảng giá sửa điện thoại</h3>
                    <button @click="show = false" class="text-white bg-white/20 hover:bg-white/30 transition-colors p-1.5 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                {{-- Search & Filters --}}
                <div class="px-6 py-5 shrink-0 bg-white border-b border-gray-100 z-10 relative">
                    <div class="flex flex-col md:flex-row gap-3">
                        {{-- Search Input --}}
                        <div class="flex-1">
                            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Tính dòng máy..." 
                                class="w-full h-[42px] px-4 text-gray-700 bg-white border-2 border-gray-200 focus:border-[#d70018] rounded-xl focus:ring-0 transition-colors text-sm font-medium placeholder-gray-400">
                        </div>

                        {{-- Device Model Filter --}}
                        <div class="w-full md:w-[200px]">
                            <select wire:model.live="deviceFilter" class="w-full h-[42px] px-4 text-gray-700 bg-white border-2 border-gray-200 focus:border-[#d70018] rounded-xl focus:ring-0 transition-colors text-sm font-medium appearance-none cursor-pointer" style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%236b7280%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right .7rem top 50%; background-size: .65rem auto;">
                                <option value="">Tất cả dòng máy</option>
                                @foreach($deviceModels as $model)
                                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        {{-- Service Type Filter --}}
                        <div class="w-full md:w-[200px]">
                            <select wire:model.live="serviceFilter" class="w-full h-[42px] px-4 text-gray-700 bg-white border-2 border-gray-200 focus:border-[#d70018] rounded-xl focus:ring-0 transition-colors text-sm font-medium appearance-none cursor-pointer" style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%236b7280%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right .7rem top 50%; background-size: .65rem auto;">
                                <option value="">Tất cả dịch vụ</option>
                                @foreach($serviceTypes as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    {{-- Clear Filters button --}}
                    @if(!empty($this->search) || !empty($this->deviceFilter) || !empty($this->serviceFilter))
                        <div class="mt-3">
                            <button wire:click="resetFilters" class="inline-flex items-center justify-center px-4 py-[7px] border-2 border-gray-200 text-gray-600 rounded-xl hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 font-medium text-sm transition-colors">
                                Xóa bộ lọc
                            </button>
                        </div>
                    @else
                        <div class="mt-3">
                            <button class="inline-flex items-center justify-center px-4 py-[7px] border-2 border-gray-200 text-gray-400 rounded-xl bg-gray-50 cursor-not-allowed font-medium text-sm transition-colors" disabled>
                                Xóa bộ lọc
                            </button>
                        </div>
                    @endif
                </div>

                {{-- Table (Scrollable Area) --}}
                <div class="flex-1 overflow-y-auto relative bg-white px-6 pb-2 pt-0 [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-gray-300 [&::-webkit-scrollbar-thumb]:rounded-full">
                    <div wire:loading.delay class="absolute inset-0 bg-white/70 backdrop-blur-sm z-[105] flex items-center justify-center">
                        <div class="w-8 h-8 rounded-full border-[3px] border-gray-200 border-t-[#d70018] animate-spin"></div>
                    </div>

                    @if($repairs->isEmpty())
                        <div class="text-center py-12 m-auto bg-white">
                            <h4 class="text-gray-500 font-medium">Không tìm thấy báo giá phù hợp!</h4>
                        </div>
                    @else
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-white sticky top-0 z-10 border-b-2 border-gray-100">
                                <tr>
                                    <th class="px-2 py-4 font-bold text-gray-600 text-sm w-[20%]">Dòng máy</th>
                                    <th class="px-2 py-4 font-bold text-gray-600 text-sm w-[35%]">Dịch vụ</th>
                                    <th class="px-2 py-4 font-bold text-gray-600 text-sm w-[20%]">Giá</th>
                                    <th class="px-2 py-4 font-bold text-gray-600 text-sm w-[15%] text-left">Thời gian</th>
                                    <th class="px-2 py-4 font-bold text-gray-600 text-sm w-[10%] text-left">Bảo hành</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($repairs as $repair)
                                    <tr class="hover:bg-gray-50/50 transition-colors" wire:key="repair-{{ $repair->id }}">
                                        
                                        {{-- Cột Dòng Máy --}}
                                        <td class="px-2 py-4 align-middle text-sm font-bold text-gray-600">
                                            {{ $repair->deviceModel->name ?? 'N/A' }}
                                        </td>

                                        {{-- Cột Dịch Vụ --}}
                                        <td class="px-2 py-4 align-middle">
                                            <div class="text-sm font-medium text-gray-600 leading-tight">
                                                {{ $repair->serviceType->name ?? 'N/A' }}
                                            </div>
                                        </td>

                                        {{-- Cột Giá --}}
                                        <td class="px-2 py-4 align-middle">
                                            @if($repair->sale_price && $repair->price != $repair->sale_price)
                                                <div class="font-bold text-[#d70018] text-sm">
                                                    {{ number_format($repair->sale_price, 0, ',', '.') }} đ
                                                    <span class="text-gray-400 font-normal">/</span>
                                                    <span class="line-through">{{ number_format($repair->price, 0, ',', '.') }} đ</span>
                                                </div>
                                            @else
                                                <div class="font-bold text-[#d70018] text-sm">
                                                    {{ number_format($repair->price, 0, ',', '.') }} đ
                                                </div>
                                            @endif
                                        </td>
                                        
                                        {{-- Cột Thời Gian --}}
                                        <td class="px-2 py-4 align-middle text-sm text-gray-500 whitespace-pre-line leading-snug">
                                            {!! $repair->repair_time ? str_replace(' ', '<br>', $repair->repair_time) : "30-60\nphút" !!}
                                        </td>
                                        
                                        {{-- Cột Bảo Hành --}}
                                        <td class="px-2 py-4 align-middle text-sm text-gray-500 whitespace-pre-line leading-snug">
                                            {!! $repair->warranty ? str_replace(' ', '<br>', $repair->warranty) : "3-6\ntháng" !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

                {{-- Footer Area --}}
                <div class="px-6 py-4 bg-white border-t border-gray-100 shrink-0 flex items-center justify-between sm:flex-row flex-col gap-4">
                    <div class="text-xs text-gray-500 italic flex-1 w-full sm:text-left text-center">
                        * Giá mang tính tham khảo, có thể thay đổi theo tình trạng máy
                    </div>
                    <a href="tel:0777333763" class="inline-flex w-full sm:w-auto items-center justify-center bg-[#bd1e24] hover:bg-[#a01a1f] text-white px-6 py-2.5 rounded-lg font-bold transition-colors shadow-sm">
                        Đặt lịch ngay
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
