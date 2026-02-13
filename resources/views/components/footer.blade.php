<footer class="bg-[#9db2ce] text-white pt-8 pb-6"> <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8"> 
            {{-- Bagian Kiri: Sosmed --}}
            <div class="space-y-3">
                <h3 class="font-semibold uppercase tracking-widest text-xs mb-3 opacity-80">CONNECTED WITH US</h3>
                <div class="space-y-2">
                    <a href="https://www.instagram.com/fmiunnes" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 hover:opacity-80 transition">
                        <i class="fab fa-instagram text-xl"></i>
                        <span class="text-base">@fmiunnes</span>
                    </a>

                    <a href="https://www.tiktok.com/@fmiunnes" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 hover:opacity-80 transition">
                        <i class="fab fa-tiktok text-xl"></i>
                        <span class="text-base">@fmiunnes</span>
                    </a>

                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=fmipaunnesfmi@gmail.com" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 hover:opacity-80 transition">
                        <i class="far fa-envelope text-xl"></i>
                        <span class="text-base">fmipaunnesfmi@gmail.com</span>
                    </a>
                </div>
            </div>

            {{-- Bagian Kanan: Alamat & Logo --}}
            <div class="md:text-right space-y-3">
                <div class="flex items-center md:justify-end gap-3 mb-3">
                    <span class="font-bold text-lg tracking-tight">FMI FMIPA UNNES</span>
                    <img src="{{ asset('images/Logo FMI putih.png') }}" alt="Logo" class="h-8 w-auto"> </div>
                <div class="text-s leading-tight opacity-90"> <p>Mushola Baitul Alim FMIPA, Kampus Sekaran</p>
                    <p>Universitas Negeri Semarang, Gunungpati, Kota</p>
                    <p>Semarang, Jawa Tengah 50229</p>
                </div>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="mt-8 text-center border-t border-white/20 pt-4"> <p class="text-s font-medium tracking-wide opacity-70">
                © 2026 Departemen Hujanmed FMI UNNES. All rights reserved.
            </p>
        </div>
    </div>
</footer>