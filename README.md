# Projects_App

- Pagina web con CRUD para poder crear, ver, actualizar o eliminar distintos proyectos.
- Proyecto realizado en Laravel 9.

# Instalacion

**Requisitos previos**
 Es necesario tener en el sistema operativo composer de manera global.
 Tener instalado GIT.
 Contar con un entorno de desarrollo como Xamp, Wamp o Laragon.

------------

#### 1. Clonar el repositorio del proyecto en Laravel
*git clone https://github.com/pablogutierrez-dev/Projects_App_Laravel.git*


#### 2. Instalar dependencias del proyecto
Ingresa desde la terminal a la carpeta de tu proyecto y escribe:

*composer install*

Este comando instalará todas las librerías que están declaradas para tu proyecto.


#### 3. Generar archivo .env
 Escribe en la terminal:

*cp .env.example .env*


#### 4. Generar Key
 Escribe en la terminal:

*php artisan key:generate*

Esta key nueva se agregará a tu archivo .env


#### 5. Crear base de datos

Desde la terminal:

*mysql -u root -p*

*CREATE DATABASE nombreDeTuDBAqui CHARACTER SET utf8 COLLATE utf8_spanish_ci;*

Para salir de la consola de MySQL escribe 'exit'

#### 6. Agregar información de variables globales
En el archivo .env se guardan todas la variables globales de distintos servicios. que necesita tu proyecto para funcionar sin errores. Agrega los datos de la base de datos que creaste en el punto anterior como es el nombre y contraseña.


#### 7. Crear vínculo simbólico
Sí tu proyecto guarda algún tipo de archivo como imágenes, pdf’s etc., necesitas desde la consola de comandos crear un vínculo o enlace simbólico de la carpeta public a la carpeta storage para que tu sistema pueda tener acceso a los archivos, desde tu terminal teclea:

*php artisan storage:link*

#### 8. Composer dump-autoload

*composer dump-autoload*

#### 9. Correr migraciones

*php artisan migrate*


#### 10. Gestion de usuarios

Al registrarte con un usario por defecto tendra el rol de "user". Habra que cambiarlo a "admin" para que pueda crear proyectos, editarlos o borrarlos. Una vez que haya proyectos creados, cualquier nuevo usuario registrado podra acceder a ellos, pero solo para verlos.

# Autor

- https://www.linkedin.com/in/pablo-guti%C3%A9rrez-mu%C3%B1oz-97b558247/
- www.pablogutierrezdev.com

# Web

- www.projectsapp.pablogutierrezdev.com

# Contacto

- info@pablogutierrezdev.com
