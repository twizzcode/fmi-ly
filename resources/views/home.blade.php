@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet">

<div class="font-sans antialiased text-gray-900 overflow-x-hidden">

    {{-- Hero Section --}}
    <div class="relative h-[500px] md:h-[600px] flex items-center justify-center text-center text-white overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/foto bersama.jpg') }}" alt="FMI FMIPA UNNES" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-gray-50 via-transparent to-transparent"></div>
        </div>
        
        <div class="relative z-10 max-w-5xl px-8" x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)">
            <h2 class="text-xl md:text-2xl font-medium mb-2 tracking-wide transform transition-all duration-700 ease-out" :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
                Selamat Datang di
            </h2>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 leading-tight transform transition-all duration-1000 delay-300 ease-out" :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
                Forum Mahasiswa Islam
            </h1>
            <p class="text-lg md:text-2xl font-semibold opacity-90 transform transition-all duration-1000 delay-500 ease-out" :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
                Fakultas Matematika dan Ilmu Pengetahuan Alam <br>
                Universitas Negeri Semarang
            </p>
        </div>
    </div>

    {{-- Section Layanan & Informasi --}}
    <div class="bg-gray-50 py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8 justify-center items-stretch">
                @foreach($semua_link as $item)
                    <div class="group bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col max-w-[320px] w-full mx-auto">
                        <div class="flex-grow">
                            <h3 class="text-xl font-bold text-gray-800 leading-tight mb-4 tracking-tight">
                                {!! nl2br(e($item->judul)) !!}
                            </h3>
                            <p class="text-gray-500 text-[14px] leading-relaxed mb-6 font-normal">
                                {{ $item->keterangan }}
                            </p>
                        </div>
                        <div class="mt-auto">
                            <div class="w-full h-[1px] bg-blue-100 group-hover:bg-blue-400 transition-colors duration-500 mb-5"></div>
                            <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between group-hover:text-blue-600 transition-colors">
                                <span class="font-bold text-gray-800 group-hover:text-blue-600 text-[15px]">
                                    {{ str_contains(strtolower($item->judul), 'pendataan') ? 'Isi Pendataan' : 'Isi Formulir' }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-6 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Section Apasih FMI Itu? --}}
    <section class="bg-white py-12 md:py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-10 md:gap-16">
                <div class="w-full md:w-3/5 text-center md:text-left">
                    <h2 class="text-2xl md:text-4xl font-bold text-gray-900 mb-4 md:mb-8 tracking-tight">
                        Apasih FMI Itu?
                    </h2>
                    <p class="text-gray-600 text-base md:text-[19px] leading-relaxed md:leading-[1.8] mb-8 md:mb-10 text-justify md:text-left font-normal opacity-90">
                        Forum Mahasiswa Islam (FMI) Fakultas Matematika dan Ilmu Pengetahuan Alam Universitas Negeri Semarang merupakan lembaga kemahasiswaan tingkat fakultas yang menjadi salah satu lembaga dakwah kampus sebagai tempat meningkatkan ruhiyah bagi seluruh mahasiswa FMIPA UNNES.
                    </p>
                    <a href="{{ route('about') }}" class="inline-flex items-center px-8 md:px-10 py-3.5 bg-[#a3b3cc] hover:bg-[#8fa2bd] text-white font-bold rounded-xl transition-all duration-300 shadow-sm hover:shadow-lg group text-sm tracking-wide">
                        Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-3 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
                <div class="w-full md:w-2/5 flex justify-center mt-8 md:mt-0">
                    <div class="relative">
                        <div class="absolute -inset-6 md:-inset-10 bg-blue-50/50 rounded-full blur-2xl md:blur-3xl -z-10"></div>
                        <img src="{{ asset('images/Logo FMI hitam.png') }}" alt="Logo FMI FMIPA UNNES" class="w-full max-w-[250px] md:max-w-[340px] h-auto drop-shadow-2xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION STRUKTUR ORGANISASI (MONTSERRAT STYLE) --}}
    <section class="bg-gray-50 py-20 md:py-10 border-t border-gray-100 font-['Montserrat']">
        <div class="max-w-7xl mx-auto px-6">
            {{-- Header Section --}}
            <div class="text-center mb-8 md:mb-10">
                <h2 class="text-lg sm:text-xl md:text-3xl font-bold text-gray-800 tracking-normal">
                    Departmen 
                </h2>
            </div>

            {{-- Grid Kartu Departemen --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
                @foreach($departments as $dept)
                <div class="group relative flex flex-col bg-white rounded-[2.5rem] shadow-xl border border-gray-50 overflow-hidden hover:shadow-[0_20px_60px_rgba(0,0,0,0.08)] hover:-translate-y-3 transition-all duration-700">
                    
                    {{-- Container Foto --}}
                    <div class="relative w-full aspect-[4/3] overflow-hidden p-4 pb-0">
                        <img src="{{ asset('storage/' . $dept->image) }}" 
                             alt="{{ $dept->name }}" 
                             class="w-full h-full object-cover rounded-[1.8rem] transition-transform duration-1000 group-hover:scale-110">
                        
                        {{-- Overlay Gradient --}}
                        <div class="absolute inset-4 bg-gradient-to-t from-black-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 rounded-[1.8rem]"></div>
                    </div>
                    
                    {{-- Detail Teks --}}
                    <div class="p-8 pt-6 flex flex-col items-center justify-center">
                        <span class="text-blue-600 text-[10px] font-[750] tracking-[0.3em] uppercase mb-2 opacity-60">
                            Departmen
                        </span>
                        <h3 class="text-[14px] md:text-[17px] font-[750] text-slate-800 tracking-tight text-center uppercase leading-snug">
                            {{ $dept->name }}
                        </h3>
                        
                        {{-- Aksen Garis --}}
                        <div class="mt-5 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                            <div class="w-8 h-1 bg-blue-600 rounded-full mx-auto"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection