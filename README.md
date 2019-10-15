# BiblioApp

**Link curso laravel:**
https://styde.net/laravel-5/


**Instalar**
-Composer: https://getcomposer.org/

-Laravel: https://laravel.com/docs/6.x

-Git: https://git-scm.com/

-Php o un servidor con php (XAMP, ejemplo)

-Editor de texto


**Usar Proyecto**

En la consola y en la adireccion en la que se valla a guardar el proyecto

`>git clone https://github.com/alexo111z/BiblioApp.git`

Dentro del acarpeta del proyecto
```
>composer install 

>copy env.example .env

>php artisan key:generte
```

Ejecutar: 
`>php artisan serve`

Entrar a localhost:8000 o 127.0.0.1:8000, carga la pagina con el mensaje Laravel, todo listo

**Comandos de git:**

`>git add .` ->
agregar todos los archivos con cambios

`>git commit -m "first commit"` ->
subir cambios al repositorio (despues del add)

`>git push -u [repositorio(origin)] [branch]` ->
sube los commit al repositorio web en el branch especificado

`>git branch (nombre)` ->  
permite crear un nuevo branch(rama)

`>git checkout [branch]` -> 
permite cambiar entre branchs
