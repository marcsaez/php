#!/bin/bash

# Definir los paquetes a instalar
packages=("apache2" "mysql-server" "php" "libapache2-mod-php" "php-mysql")

# Actualizar la lista de paquetes
#sudo apt-get update

# Bucle para intentar instalar cada paquete individualmente
for package in "${packages[@]}"
do
    echo "Intentando instalar el paquete $package..."
    while ! sudo apt-get -y install $package
    do
        echo "La instalación de $package falló. Intentando de nuevo..."
        sleep 1
    done
done