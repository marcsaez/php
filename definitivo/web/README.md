# M9 UF1
# 1.1 Identifica el programari necessari per al seu funcionament. 1.2 Identifica les diferents tecnologies emprades.
* AWS (Cloud) amb EC2 (Màquines virtuals per instal·lar el programari)
* Apache (servidor web)
* Html i css
* Php i llibreries necesaries
* MYSQL (base de dades)
* Terraform (codi per llençar la infraestructura(EC2, Apache, Grups de seguretat per controlar qui pot entrar,...))

# 1.8 IDE
![](https://i.imgur.com/cSfoVj7.png)

He utilitzat Visual Studio Code amb un plugin que es diu Live Server, que t'aixeca un servidor web localment per poder veure el codi que portes fet
![](https://i.imgur.com/fgmp9cG.png)
![](https://i.imgur.com/zrg5waD.png)

# 1.9 Documenta els procediments realitzats
1. Crear l'inici de sessió fent primer una [base de dades](https://github.com/marcsaez/php/blob/main/definitivo/mysql.sh) i després fer la part del FrontEnd (index.html) i la part del BackEnd (login.php)
2. Després vaig crear una altre part per registrar-se i no haber de crear el usuaris manualment amb mysql, frontend (register.html) i backend (add_user.php)
3. Els dos son formularis que fan servir el métode POST per enviar les dades al php i que el php fagi la seva funció, pero simplement son formularis
4. Després vaig crear la pàgina com a tal, que simplement crea una SESSIO per l'usuari que es logui, cada usuari comença amb 1000 punts, llavors pot obtenir qualsevol producte
5. Al clickar al producte s'envia la informació de la sessió a restar_puntos.php i redirigeix al producte digital

# 2.6 Utilitza formularis per introduir informació
El html recolleix les dades introduides per l'usuari i les pasa a un php que fa una comprovació a una Base de Dades
![](https://i.imgur.com/2bem3v7.png)

![](https://i.imgur.com/3hXWGoJ.png)

# 2.8 Identifica i assegura els usuaris que accedeixen al document web. 2.9 Verifica l’aïllament de l’entorn específic de cada usuari
Això ho faig amb SESSION:
![](https://i.imgur.com/s9AZ0Zl.png)
Iniciem la SESSIO
![](https://i.imgur.com/U9KW763.png)

# 3.1 Identifica els sistemes gestors de bases de dades més utilitzats en entorns web.
MySQL és el més utilitzat, encara que existeixen altres com MariaDB, PostreSQL, OracleDB i altres que no son SQL (influxDB entre d'altres)

# 3.7 Comprova el funcionament i el rendiment del sistema.
Ens registrem:
![](https://i.imgur.com/Ldc2lpZ.png)
Iniciem sessió:
![](https://i.imgur.com/POfNUVR.png)
Pàgina principal amb el nom d'usuari i els punts:
![](https://i.imgur.com/MbTmKqy.png)
Resta punts:
![](https://i.imgur.com/NUzkhf3.png)


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

## Altres archius
Imatges fetes servir a la web