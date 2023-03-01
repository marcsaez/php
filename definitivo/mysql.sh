#!/bin/bash
set -x

# Solicitar la contraseña de root
#read -sp 'Introduzca la contraseña de root: ' root_password

# Conectar a MySQL con la contraseña de root
#mysql -u root -p$root_password

# Conectar a MySQL y ver la salida detallada
sudo mysql -v << EOF

# Crear usuario
CREATE DATABASE php;
use php

CREATE TABLE datess (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL,
  correu_electronic VARCHAR(255) NOT NULL,
  url VARCHAR(255),
  data VARCHAR(255),
  temps VARCHAR(255),
  data_i_hora VARCHAR(255),
  mes VARCHAR(255),
  setmana VARCHAR(255),
  numero VARCHAR(255),
  telefon VARCHAR(255),
  paraula_de_recerca VARCHAR(255),
  color VARCHAR(255)
);
CREATE USER 'marc' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON php.* TO marc;
FLUSH PRIVILEGES;
EOF

# Desactivar el modo de depuración
set +x