<?php
//src/WebSocket/ChatHub.php

namespace App\WebSocket;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class ChatHub implements MessageComponentInterface
{
    private $clients;
    private $logger;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        // Crear una instancia de Monolog
        $this->logger = new Logger('chatHub');
        // Configurar el handler para que los logs se escriban en un archivo
        $this->logger->pushHandler(new StreamHandler(__DIR__ . '/chat.log', Logger::DEBUG));
    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Log cuando se abre una conexión
        $this->logger->info("Conexión abierta: {$conn->resourceId}");
        $this->clients->attach($conn);
    }

    public function onClose(ConnectionInterface $conn)
    {
        // Log cuando se cierra una conexión
        $this->logger->info("Conexión cerrada: {$conn->resourceId}");
        $this->clients->detach($conn);
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        // Log cuando se recibe un mensaje
        $this->logger->info("Mensaje recibido: $msg");

        // Enviar mensaje a todos los clientes
        foreach ($this->clients as $client) {
            $client->send($msg);  // Enviar a todos los clientes, incluyendo el que envió el mensaje
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        // Log del error
        $this->logger->error("Error: {$e->getMessage()}");
        $conn->close();
    }
}
