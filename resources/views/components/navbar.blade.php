<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<nav class="bg-white shadow-md sticky top-0 z-50" x-data="{ open: false, dropdown: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            
            <div class="flex items-center">
                <a href="/" class="flex items-center gap-3">
                    <img src="{{ asset('images/Logo FMI putih.png') }}" alt="Logo" class="h-9 w-auto filter brightness-0">
                    <span class="text-xl font-medium bold text-gray-800 tracking-tight">FMI FMIPA UNNES</span>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-4 font-medium text-gray-700">
                <a href="/" class="px-3 py-2 hover:text-blue-600 transition">Beranda</a>
                
                <div class="relative group" @mouseenter="dropdown = true" @mouseleave="dropdown = false">
                    <a href="/tentang-fmiunnes" class="flex items-center gap-1 px-3 py-2 hover:text-blue-600 transition">
                        <span>Tentang Kami</span>
                        <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300" :class="dropdown ? 'rotate-180' : ''"></i>
                    </a>
                    
                    <div x-show="dropdown" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         {{-- left-0 dan mt-0 untuk memastikan kotak lurus di bawah teks --}}
                         class="absolute left-0 mt-0 w-52 bg-white shadow-xl border border-gray-100 rounded-b-lg py-2 z-50"
                         style="display: none;">
                        
                        <a href="/tentang-fmiunnes" class="block px-5 py-2.5 text-sm hover:bg-blue-50 hover:text-blue-600 transition">
                            Tentang FMIUNNES
                        </a>
                        
                        <a href="/struktur" class="block px-5 py-2.5 text-sm hover:bg-blue-50 hover:text-blue-600 transition border-t border-gray-50">
                            Susunan Pengurus
                        </a>
                    </div>
                </div>

                <a href="/galeri" class="px-3 py-2 hover:text-blue-600 transition">Galeri</a>
                <a href="/kontak" class="px-3 py-2 hover:text-blue-600 transition">Kontak</a>
            </div>

            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="text-gray-700 p-2 focus:outline-none">
                    <i class="fa-solid" :class="open ? 'fa-xmark' : 'fa-bars'" style="font-size: 24px;"></i>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         style="display: none;" 
         class="md:hidden bg-white border-t border-gray-100 shadow-inner">
        <ul class="flex flex-col py-2 font-medium">
            <li><a href="/" class="block px-6 py-4 hover:bg-gray-50">Beranda</a></li>
            {{-- Link mobile diarahkan sesuai route baru --}}
            <li><a href="/tentang-fmiunnes" class="block px-10 py-3 text-sm hover:bg-gray-50 border-l-4 border-blue-500">Tentang FMIUNNES</a></li>
            <li><a href="/struktur-organisasi" class="block px-10 py-3 text-sm hover:bg-gray-50 border-l-4 border-blue-500">Struktur Organisasi</a></li>
            <li><a href="/galeri" class="block px-6 py-4 hover:bg-gray-50">Galeri</a></li>
            <li><a href="/kontak" class="block px-6 py-4 hover:bg-gray-50">Kontak</a></li>
        </ul>
    </div>
</nav>