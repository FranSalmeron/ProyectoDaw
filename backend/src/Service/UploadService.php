<?php
// src/Service/UploadService.php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadService
{
    private string $uploadDirectory;

    // Inyectar el parámetro upload_dir a través del constructor
    public function __construct(string $uploadDirectory)
    {
        $this->uploadDirectory = $uploadDirectory;
    }

    // Función para subir un archivo
    public function upload(UploadedFile $file): string
    {
        // Verificar si el directorio de subida existe, y si no, crearlo
        if (!file_exists($this->uploadDirectory)) {
            mkdir($this->uploadDirectory, 0777, true);  // Crea el directorio y sus subdirectorios si no existen
        }

        $filename = uniqid() . '.' . $file->guessExtension();

        try {
            // Mover el archivo al directorio de subida
            $file->move($this->uploadDirectory, $filename);
        } catch (\Exception $exception) {
            throw new \RuntimeException('Error al guardar el archivo: ' . $exception->getMessage());
        }

        return $filename;
    }
}
