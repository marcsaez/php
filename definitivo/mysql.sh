#!/bin/bash
set -x

# Solicitar la contraseña de root
#read -sp 'Introduzca la contraseña de root: ' root_password

# Conectar a MySQL con la contraseña de root
#mysql -u root -p$root_password

# Conectar a MySQL y ver la salida detallada
sudo mysql -v << EOF

CREATE DATABASE project;
use project

CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  nombre_usuario VARCHAR(255) NOT NULL UNIQUE,
  contra VARCHAR(255) NOT NULL,
  correo VARCHAR(255) NOT NULL,
  puntos INT NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
);
ALTER TABLE users MODIFY COLUMN puntos INT(11) DEFAULT 1000;


CREATE USER 'marc' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON project.* TO marc;
FLUSH PRIVILEGES;
EOF

# Desactivar el modo de depuración
set +x