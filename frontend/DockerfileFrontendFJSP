# Usa la imagen base de Node.js
FROM node:18-alpine

# Crear y establecer el directorio de trabajo
WORKDIR /app

# Copiar solo package.json y package-lock.json primero para aprovechar el cache de Docker
COPY ./package.json ./package-lock.json /app/

# Copiar el resto de los archivos de la aplicación
COPY . /app

# Instalar las dependencias de Node.js
RUN npm install

# Instalar netcat para la comprobación de red
RUN apk add --no-cache netcat-openbsd

# Exponer el puerto necesario
EXPOSE 3000
