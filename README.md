# BiblioApp


## Instalación

- Composer: https://getcomposer.org/

- Laravel: https://laravel.com/docs/6.x

- Git: https://git-scm.com/

- Php o un servidor con php (XAMP, ejemplo)

- Editor de texto

- NodeJS y NPM: https://nodejs.org/en/download/

## Uso del proyecto

En la consola y en la adireccion en la que se vaya a guardar el proyecto

`git clone https://github.com/alexo111z/BiblioApp.git`

Dentro del la carpeta del proyecto

```bash
composer install
npm install # o yarn install

copy .env.example .env #windows
cp .env.example .env #linux

php artisan key:generate


```

## Base de datos

```bash
# desplegar un servidor rápido con docker
docker run -p 3306:3306 --name db -e MYSQL_ROOT_PASSWORD=secret -d mysql:5.6

# Crear una base de datos con el mysql-client
#contraseña secret
mysql -u root -P 3306 -h 127.0.0.1 -p 
CREATE DATABASE bibliodb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
use bibliodb
source respaldobibiotec.sql

#
# Usuario administrador
# email: biblio-admin@gmail.com
# contraseña: admin1234
#

php artisan migrate
php artisan db:seed --class=UsersTableSeeder
```

## Ejecutar servidor

`php artisan serve`

Entrar a localhost:8000 o 127.0.0.1:8000, carga la pagina con el mensaje Laravel, todo listo.

Si vas a hacer cambios en los scripts también correr en otra terminal, lo que hace es ver los cambios que se tienen en el código.

`npm run watch`

## Comandos de git


agregar todos los archivos con cambios: `git add .`


subir cambios al repositorio (ejecutar solamente despues del add): `git commit -m "first commit"`

sube los commit al repositorio web en la rama especificada **(CUIDADO)**: `git push -u origin [branch]`

permite crear una nueva rama: `git branch (nombre)`

permite cambiar cambiar entre ramas: `git checkout [branch]`

Una vez acabado el trabajo en la rama, hay que abrir un pull request
