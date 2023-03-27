# Archius
## index.html
Simplement un inici de sessió molt bàsic que pasa amb el metode post les dades al archiu login.php

## login.php
Archiu php que rep els paràmetres del html i les pasa a la base de dades local per comprovar si l'usuari existeix, si existeix crea una sessió i redirigeix al archiu main.php

## register.html
Archiu html per registrar-se, pasa pel mètode post les dades a add_user.php

## add_user.php
Semblant al login.php, pero el que fa es registrar l'usuari només si no existeix ningun amb el mateix nom

## main.php
Es divideix en dues parts, la primera que extreu les dades de la sessió per conectarse a la base de dades i buscar els punts de l'usuari. I la segona que és un html que mostra el nom d'usuari, els punts equivalents i conté un recuadre amb quatre botons diferents. Al clicar el botó, envia diferents paràmetres a la funció restar_puntos amb el mètode GET, del archiu restar_puntos.php

## restar_puntos.php
És una funció que rep tres paràmetres pel mètode GET: user_id (nom d'usuari), points (punts que 'val' aquell 'producte'), url (enllaç al produce digital).
Simplement aquesta funció comprova que l'usari tingui els punts suficients per 'comprar' el producte, i si els té, redirigeix a l'usuari a l'enllaç del producte