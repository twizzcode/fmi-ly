@extends('layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <section class="py-16 max-w-7xl mx-auto px-4 bg-gray-50">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-[#8AB4E3] drop-shadow-sm uppercase tracking-tight">
                {{ $title }}
            </h2>
            <p class="text-[#8AB4E3] w-full max-w-none md:max-w-4xl mx-auto px-6 text-[11px] sm:text-xs md:text-base leading-relaxed text-center drop-shadow-[0_1px_1px_rgba(0,0,0,0.1)]">
                Mengenal lebih dekat para penggerak di setiap departemen.
            </p>
        </div>

        @foreach($departements as $dept)
            <div class="mb-20">
                <div class="flex items-center mb-10">
                    <div class="flex-grow h-px bg-gray-200"></div>
                    <h3 class="px-6 text-2xl font-bold text-gray-800 uppercase tracking-widest text-center">
                        {{ $dept->department_name }}
                    </h3>
                    <div class="flex-grow h-px bg-gray-200"></div>
                </div>

                <div class="flex overflow-x-auto pb-8 gap-6 snap-x snap-mandatory scrollbar-hide px-2">
                    @foreach($dept->members as $member)
                        <div class="snap-center min-w-[280px] md:min-w-[320px] group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden text-center p-6">
                            
                            <div class="relative inline-block mb-4">
                                <div class="w-32 h-32 rounded-full ring-4 ring-blue-50 ring-offset-2 overflow-hidden mx-auto transition-transform duration-300 group-hover:scale-105 shadow-md">
                                    <img src="{{ asset('storage/' . $member['photo']) }}" 
                                         alt="{{ $member['name'] }}" 
                                         class="w-full h-full object-cover">
                                </div>
                            </div>

                            <h4 class="text-lg font-bold text-gray-800 leading-tight mb-1">{{ $member['name'] }}</h4>
                            
                            <p class="text-blue-600 font-bold text-sm mb-2 tracking-wide uppercase">
                                {{ $member['position'] }}
                            </p>
                            
                            <div class="space-y-1">
                                <p class="text-gray-500 text-xs italic">{{ $member['prodi'] ?? '-' }}</p>
                                
                                @if(!empty($member['phone']))
                                    <div class="mt-4 pt-4 border-t border-gray-50">
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $member['phone']) }}" 
                                           target="_blank"
                                           class="inline-flex items-center text-green-600 hover:text-green-700 font-medium text-xs transition-colors">
                                            <i class="fab fa-whatsapp mr-1.5 text-sm"></i>
                                            Hubungi via WhatsApp
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </section>
@endsection