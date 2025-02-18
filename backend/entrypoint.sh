#!/bin/sh
# Iniciar el servidor Symfony
symfony server:start --no-tls --port=8001 &

# Iniciar el servidor WebSocket
php /var/www/html/bin/startWebSocketServer.php
