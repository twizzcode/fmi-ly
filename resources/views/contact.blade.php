@extends('layouts.app')

@section('title', 'Hubungi Kami')

{{-- FontAwesome CDN --}}
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endpush

@section('content')
    {{-- Backup link jika @push tidak aktif --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <section class="bg-gray-50 py-10 text-white text-center">
        <h1 class="text-2xl md:text-4xl font-bold mb-4 text-[#8AB4E3] drop-shadow-m">Hubungi Kami</h1>
        <p class="text-[#8AB4E3] max-w-2xl mx-auto px-6 text-sm md:text-base leading-relaxed drop-shadow-[0_1px_1px_rgba(0,0,0,0.1)]">Punya pertanyaan atau ingin berkolaborasi? Jangan ragu untuk menyapa kami!</p>
    </section>

    <section class="bg-white shadow-inner">
        <div class="py-10 md:py-16 max-w-6xl mx-auto px-16">
        
        <div class="grid md:grid-cols-2 gap-8 md:gap-12 items-start">
            
            {{-- BAGIAN INFORMASI KONTAK (Pindah ke bawah di HP) --}}
            <div class="order-2 md:order-1">
                {{-- Judul: text-xl di HP, md:text-2xl di Desktop --}}
                {{-- Judul: text-lg (kecil di HP), md:text-2xl (kembali besar saat layar lebar) --}}
                <h2 class="text-lg md:text-2xl font-bold text-gray-800 mb-6 transition-all">Informasi Kontak</h2>
                <div class="space-y-6">
                    @foreach($contact_infos as $info)
                    <div class="flex items-start">
                        {{-- Box Icon Responsif: w-10 di HP, w-12 di Desktop --}}
                        <div class="bg-blue-100 p-2 md:p-3 rounded-lg text-blue-600 mr-4 w-10 h-10 md:w-12 md:h-12 flex items-center justify-center flex-shrink-0">
                            @if(str_contains($info->icon, 'heroicon'))
                                <x-icon name="{{ $info->icon }}" class="w-5 h-5 md:w-6 h-6" />
                            @else
                                <i class="{{ $info->icon }} text-lg md:text-xl"></i>
                            @endif
                        </div>
                        <div>
                            {{-- Label: text-sm di HP, md:text-lg di Desktop --}}
                            <h3 class="font-bold text-gray-800 text-sm md:text-lg leading-tight">{{ $info->type }}</h3>
                            {{-- Value: text-xs di HP, md:text-base di Desktop --}}
                            <p class="text-gray-600 whitespace-pre-line text-xs md:text-base mt-1">{{ $info->value }}</p>
                        </div>
                    </div>
                    @endforeach

                    @if($contact_infos->isEmpty())
                        <p class="text-gray-400 italic text-sm">Informasi kontak belum tersedia.</p>
                    @endif
                </div>
            </div>

            {{-- BAGIAN FORM KIRIM PESAN (Naik ke atas di HP) --}}
            <div class="order-1 md:order-2 bg-white p-6 md:p-8 rounded-2xl shadow-lg border border-gray-100">
                <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h2>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center text-sm md:text-base">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs md:text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 text-sm md:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div>
                        <label class="block text-xs md:text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 text-sm md:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="email@contoh.com" required>
                    </div>
                    <div>
                        <label class="block text-xs md:text-sm font-medium text-gray-700 mb-1">Pesan</label>
                        <textarea name="message" rows="4" class="w-full px-4 py-2 text-sm md:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="Apa yang ingin Anda sampaikan?" required>{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white text-sm md:text-base font-bold py-3 rounded-lg hover:bg-blue-700 transition flex items-center justify-center">
                        Kirim Sekarang <i class="fas fa-paper-plane ml-2"></i>
                    </button>
                </form>
            </div>

        </div>
        </div>
    </section>
@endsection