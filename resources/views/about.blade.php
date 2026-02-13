@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <section class="bg-gray-50 py-10 text-white relative overflow-hidden">
        <div class="max-w-6xl mx-auto px-4 relative z-10 text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4 text-[#8AB4E3] drop-shadow-m">Tentang FMI</h1>
            <p class="text-[#8AB4E3] w-full max-w-none md:max-w-4xl mx-auto px-6 text-[11px] sm:text-xs md:text-base leading-relaxed text-center drop-shadow-[0_1px_1px_rgba(0,0,0,0.1)]">
                Mengenal lebih dekat FMI FMIPA UNNES sebagai wadah dakwah dan pengembangan diri bagi mahasiswa.
            </p>
        </div>
    </section>

    <section class="bg-white shadow-inner overflow-hidden">
    <div class="py-16 max-w-6xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            
            {{-- Kolom Teks --}}
            {{-- Kita set order-1 agar di HP dia muncul pertama --}}
            <div class="order-1 text-center md:text-left">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Siapa Kami?</h2>
                <p class="text-gray-600 text-base md:text-[20px] leading-[1.8] mb-4 text-justify md:text-left font-sans">
                    Forum Mahasiswa Islam (FMI) Fakultas Matematika dan Ilmu
                    Pengetahuan Alam Universitas Negeri Semarang merupakan lembaga
                    kemahasiswaan tingkat fakultas yang menjadi salah satu lembaga dakwah
                    kampus sebagai tempat meningkatkan ruhiyah bagi seluruh mahasiswa
                    FMIPA. Forum Mahasiswa Islam (FMI) juga merupakan sarana yang baik
                    untuk belajar berorganisasi sebagai bekal menjalani hidup di lingkungan
                    masyarakat kelak.
                </p>
            </div>

            {{-- Kolom Logo --}}
            {{-- Kita set order-2 agar di HP dia turun ke bawah teks --}}
            <div class="order-2 flex justify-center items-center mt-12 md:mt-0">
                <div class="relative group">
                    {{-- Glow Effect --}}
                    <div class="absolute -inset-4 md:-inset-10 rounded-full blur-3xl group-hover:bg-blue-200/60 transition-colors duration-500"></div>
                    
                    {{-- Logo Presisi --}}
                    <img src="{{ asset('images/Logo FMI hitam.png') }}" 
                         alt="Logo FMI FMIPA UNNES" 
                         class="relative z-10 w-full max-w-[240px] md:max-w-[380px] h-auto drop-shadow-2xl transform transition-transform duration-700 group-hover:scale-105">
                </div>
            </div>

        </div>
    </div>
</section>

    <section class="bg-gray-50 py-16 shadow-inner">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 italic">Visi & Misi</h2>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">
                <div class="p-8 bg-blue-50 rounded-2xl border-l-8 border-blue-600">
                    <h3 class="text-2xl font-bold text-blue-800 mb-4">Visi</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Membangun ekosistem komunitas di FMIPA yang mendorong mahasiswa untuk tumbuh bersama, saling memberdayakan, dan menciptakan dampak nyata bagi diri sendiri serta lingkungan sekitar.
                    </p>
                </div>

                <div class="p-8 bg-slate-100 rounded-2xl border-l-8 border-slate-800">
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">Misi</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                            <span class="text-gray-700">Membangun ekosistem komunitas di FMIPA yang mendorong mahasiswa untuk tumbuh bersama, saling memberdayakan, dan menciptakan dampak nyata bagi diri sendiri serta lingkungan sekitar.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                            <span class="text-gray-700">Menjadi jembatan penghubung antara mahasiswa, mentor, dan berbagai sumber daya yang relevan.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                            <span class="text-gray-700">Menginisiasi program berbasis komunitas yang solutif dan berkelanjutan untuk menjawab tantangan generasi muda.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 shadow-inner">
    <div class="font-sans antialiased text-gray-900">
        <div class="max-w-7xl mx-auto px-6"> {{-- Saya ubah ke max-w-7xl supaya lebih luas untuk 4 kolom --}}
            <h1 class="text-3xl font-bold mb-12 text-center italic">Pengenalan Departmen</h1>
            
            {{-- Grid: Mobile (1), Tablet (2), PC (4) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($pengenalan_departments as $dept)
                    <div class="bg-white p-5 rounded-2xl shadow-xl border border-gray-100 hover:shadow-md transition-shadow duration-300 flex flex-col">
                        {{-- Menampilkan Gambar Departemen --}}
                        @if($dept->image)
                            <div class="overflow-hidden rounded-xl mb-4">
                                <img src="{{ asset('storage/' . $dept->image) }}" 
                                     alt="{{ $dept->name }}" 
                                     class="w-full h-40 object-cover hover:scale-105 transition-transform duration-500">
                            </div>
                        @endif

                        <h3 class="text-lg font-bold mb-2 text-gray-800 leading-tight">{{ $dept->name }}</h3>
                        <p class="text-gray-600 text-xs md:text-sm leading-relaxed text-justify">
                            {{ $dept->description }}
                        </p>
                    </div>
                @endforeach
            </div>

            @if($pengenalan_departments->isEmpty())
                <div class="py-20 text-center">
                    <p class="text-gray-500 italic">Data departemen belum tersedia.</p>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection