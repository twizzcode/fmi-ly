<?php

return [

    // 1. UBAH INI: Pastikan default-nya adalah 'public'
    'default' => env('FILESYSTEM_DISK', 'public'),

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        'public' => [
            'driver' => 'local',
            // Simpan langsung ke folder public agar tidak perlu storage:link
            'root' => public_path('storage'), 
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            // ... (biarkan saja bagian s3)
        ],

    ],

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];