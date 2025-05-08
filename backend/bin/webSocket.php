#! /bin/webSocket.php
<?php

require dirname(__DIR__).'/vendor/autoload.php';

use Ratchet\Server\IoServer;
use App\WebSocket\ChatServer;

$kernel = new \App\Kernel('dev', true);
$kernel->boot();

$container = $kernel->getContainer();

$entityManager = $container->get('doctrine')->getManager();

$server = IoServer::factory(
    new ChatServer(
        $entityManager,
        $entityManager->getRepository(App\Entity\User::class),
        $entityManager->getRepository(App\Entity\Chat::class)
    ),
    8081
);


$server->run();
