<?php
// src/Service/CloudinaryService.php
namespace App\Service;

use Cloudinary\Cloudinary;

class CloudinaryService
{
    private Cloudinary $cloudinary;

    public function __construct(string $cloudinaryCloudName, string $cloudinaryApiKey, string $cloudinaryApiSecret)
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => $cloudinaryCloudName,
                'api_key'    => $cloudinaryApiKey,
                'api_secret' => $cloudinaryApiSecret,
            ],
            'url' => ['secure' => true],
        ]);
    }

    public function uploadImage(string $filePath): string
    {
        $response = $this->cloudinary->uploadApi()->upload($filePath);
        return $response['secure_url'] ?? '';
    }
}
