<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\WebSocket\ChatHub;

require dirname(__DIR__) . '/vendor/autoload.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new ChatHub()
        )
    ),
    8081,
    '0.0.0.0' // Escuchar en todas las interfaces de red
);

echo "Servidor WebSocket iniciado en ws://0.0.0.0:8081\n";
$server->run();