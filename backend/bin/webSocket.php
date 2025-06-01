#! no en uso ni funcional
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
    8081,
    '0.0.0.0' 
);

echo "✅ WebSocket iniciado correctamente en el puerto 8081\n";

$server->run();
