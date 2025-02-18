#!/usr/bin/env php
<?php

use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use App\Service\WebSocketServer;

require dirname(__DIR__) . '/vendor/autoload.php';

$server = IoServer::factory(
    new WsServer(
        new WebSocketServer()
    ),
    8009 // Puerto de WebSocket, puedes ajustarlo
);

echo "Servidor WebSocket en marcha...\n";
$server->run();
