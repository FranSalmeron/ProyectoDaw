#! /bin/webSocket.php
<?php

require dirname(__DIR__).'/vendor/autoload.php';

use Ratchet\Server\IoServer;
use App\WebSocket\ChatServer;

$kernel = new \App\Kernel('dev', true);
$kernel->boot();

$container = $kernel->getContainer();

$server = IoServer::factory(
    new ChatServer(
        $container->get('doctrine')->getManager(),
        $container->get(App\Repository\UserRepository::class),
        $container->get(App\Repository\ChatRepository::class)
    ),
    8081
);

$server->run();
