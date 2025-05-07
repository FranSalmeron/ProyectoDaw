<?php
// src/Service/CloudinaryService.php
namespace App\Service;

use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;

class CloudinaryService
{
    private Cloudinary $cloudinary;

    public function __construct(string $cloudName, string $apiKey, string $apiSecret)
    {
        Configuration::instance([
            'cloud' => [
                'cloud_name' => $cloudName,
                'api_key' => $apiKey,
                'api_secret' => $apiSecret,
            ],
            'url' => [
                'secure' => true
            ]
        ]);

        $this->cloudinary = new Cloudinary();
    }

    public function uploadImage($filePath): string
    {
        $response = $this->cloudinary->uploadApi()->upload($filePath);
        return $response['secure_url'];
    }
}
