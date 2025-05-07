<?php
// src/Service/CloudinaryService.php
namespace App\Service;

use Cloudinary\Cloudinary;
use Cloudinary\Api\Upload\UploadApi;

class CloudinaryService
{
    private Cloudinary $cloudinary;

    public function __construct(array $config)
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => $config['cloud_name'],
                'api_key'    => $config['api_key'],
                'api_secret' => $config['api_secret'],
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
