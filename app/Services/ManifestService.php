<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class ManifestService
{
    public function generateManifest()
    {
        $manifest = [
            'name' => config('app.name'),
            'short_name' => config('app.name'),
            'start_url' => '/',
            'display' => 'standalone',
            'background_color' => '#ffffff',
            'theme_color' => '#000000',
            'icons' => [
                [
                    'src' => '/images/fontLogin.png',
                    'sizes' => '192x192',
                    'type' => 'image/png'
                ],
                [
                    'src' => '/images/fontLogin.png',
                    'sizes' => '512x512',
                    'type' => 'image/png'
                ]
            ]
        ];

        $jsonManifest = json_encode($manifest, JSON_PRETTY_PRINT);
        File::put(public_path('manifest.json'), $jsonManifest);
    }
}
