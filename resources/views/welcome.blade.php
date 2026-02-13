{{-- Menggunakan kerangka dari layouts/app.blade.php --}}
@extends('layouts.app')

{{-- Mengisi judul halaman --}}
@section('title', 'Galeri Kegiatan')

{{-- Mengisi konten utama --}}
@section('content')
    {{-- Header Section --}}
    <header class="bg-gray-50 py-10 text-center border-b border-gray-100">
    <h1 class="text-3xl md:text-4xl font-bold mb-4 text-[#8AB4E3] drop-shadow-m">
        Galeri Kegiatan
    </h1>
    <p class="text-[#8AB4E3] max-w-2xl mx-auto px-6 text-sm md:text-base leading-relaxed drop-shadow-[0_1px_1px_rgba(0,0,0,0.1)]">
        Dokumentasi perjalanan FMI FMIPA UNNES dalam berbagai kegiatan.
    </p>
</header>

    {{-- Gallery Grid Section --}}
    <div class="bg-white shadow-inner">
    <div class="max-w-6xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($galleries as $item)
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border group flex flex-col h-full">
                    {{-- Gambar dengan Efek Hover --}}
                    <div class="overflow-hidden relative">
                        <img src="{{ asset('storage/' . $item->image) }}" 
                             class="w-full aspect-video object-cover transform group-hover:scale-110 transition duration-500"
                             alt="{{ $item->title }}">
                        {{-- Overlay Tipis saat Hover --}}
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition duration-500"></div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col">
                        {{-- Judul Kegiatan --}}
                        <h2 class="font-bold text-xl text-gray-800 line-clamp-2">{{ $item->title }}</h2>
                        
                        {{-- Deskripsi Kegiatan (Kolom 'content' yang baru dibuat) --}}
                        @if($item->content)
                            <p class="mt-3 text-gray-600 text-sm leading-relaxed mb-4">
                                {{ Str::limit($item->content, 120) }}
                            </p>
                        @else
                            <p class="mt-3 text-gray-400 text-sm italic mb-4">Tidak ada deskripsi kegiatan.</p>
                        @endif

                        {{-- Tombol GDrive (Kolom 'description') --}}
                        @if($item->description)
                            <div class="mt-auto"> {{-- Menjaga tombol tetap di bawah kartu --}}
                                <a href="{{ $item->description }}" target="_blank" 
                                   class="inline-flex items-center justify-center w-full px-4 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-lg hover:bg-blue-700 hover:shadow-lg transition duration-300">
                                    <i class="fab fa-google-drive mr-2"></i>
                                    Buka Folder Dokumentasi
                                </a>
                            </div>
                        @endif

                        {{-- Footer: Tanggal Kegiatan --}}
                        <div class="mt-4 pt-4 border-t border-gray-100 flex items-center text-gray-400 text-xs font-medium">
                            <i class="far fa-calendar-alt mr-2"></i>
                            @if($item->date_of_event)
                                {{ \Carbon\Carbon::parse($item->date_of_event)->translatedFormat('d F Y') }}
                            @else
                                {{ $item->created_at->translatedFormat('d F Y') }}
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Jika data kosong --}}
        @if($galleries->isEmpty())
            <div class="text-center py-20">
                <div class="text-gray-300 text-6xl mb-4">
                    <i class="fas fa-image"></i>
                </div>
                <p class="text-gray-500 text-lg">Belum ada dokumentasi kegiatan saat ini.</p>
            </div>
        @endif
    </div>
@endsection