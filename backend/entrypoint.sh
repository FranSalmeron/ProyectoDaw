#!/bin/bash
# Reemplaza el puerto en tiempo de ejecución
#!/bin/bash

# Usa el puerto que Railway define en tiempo de ejecución
PORT=${PORT:-8080}

# Reemplaza en los archivos de Apache
sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf
sed -i "s/80/${PORT}/g" /etc/apache2/sites-available/000-default.conf

# Inicia Apache en primer plano
exec apache2-foreground
