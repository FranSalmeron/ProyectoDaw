<?php
// src/Controller/ChatController.php
namespace App\Controller;

use Gos\Bundle\WebSocketBundle\Router\WampRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ChatController
{
    #[Route('/chat', name: 'chat')]
    public function index(Request $request): Response
    {
        return new Response('¡Bienvenido al chat en tiempo real!');
    }
}
