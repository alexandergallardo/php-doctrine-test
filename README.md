# php-doctrine-test - Alexander Gallardo

## Como inicializar el proyecto
- git clone https://github.com/alexandergallardo/php-doctrine-test.git
- cd php-doctrine-test/
- make init
- make doctrine ( Ejecutar este comando si make init muestra error al instalar doctrine/orm o phpunit)
- go to http://localhost:8181/  (8181 es el puerto mapeado de la máquina host al puerto 80 del contenedor Apache)

## Makefile Comandos
- build: Construye la imagen del servicio PHP definida en docker-compose.yml
- up: Inicia los contenedores definidos en docker-compose.yml en modo detached (-d).
- down: Detiene y elimina los contenedores, redes y volúmenes definidos en docker-compose.yml. 
- exec: Ejecuta un comando (bash en este caso) dentro del contenedor PHP. 
- logs: Muestra los logs del contenedor PHP. 
- restart: Reinicia el contenedor PHP. 
- clean: Detiene y elimina los contenedores, redes y volúmenes. Luego, ejecuta docker system prune para eliminar imágenes, contenedores, redes y volúmenes no utilizados. 
- composer: Ejecuta composer install dentro del contenedor PHP. 
- doctrine: Ejecuta composer require para instalar Doctrine ORM y Doctrine Migrations dentro del contenedor PHP. 
- init: Ejecuta los comandos build, up, composer y doctrine en secuencia. Esto inicializa el entorno de desarrollo, construye las imágenes, inicia los contenedores e instala las dependencias de Composer y Doctrine.