<?php
namespace App\Service;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;


class WebSocketServer implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        echo "Nueva conexión! ({$conn->resourceId})\n";
        $this->clients->attach($conn);
    }

    public function onClose(ConnectionInterface $conn)
    {
        echo "Conexión cerrada ({$conn->resourceId})\n";
        $this->clients->detach($conn);
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        echo "Recibido mensaje: {$msg}\n";
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $client->send($msg);
            }
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }
}
