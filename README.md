## PDF-CRUD-LARAVEL

PDF-CRUD-LARAVEL es una plicación web desarrollada en framework Laravel que consiste en un CRUD de documentos PDF.

## Demostración

[![Alt text](https://img.youtube.com/vi/qFU8T_A_EKk/0.jpg)](https://www.youtube.com/watch?v=qFU8T_A_EKk)

## Requerimientos

Paquete | Versión
--- | ---
[Node](https://nodejs.org/) | V16.17.0+
[Npm](https://nodejs.org/)  | V8.15.0+ 
[Composer](https://getcomposer.org/)  | V2.2.6+
[Php](https://www.php.net/)  | V8.0.17+
[Mysql](https://www.mysql.com/)  |V 8.0.27+

## Instalación

A continuación se explica como ejecutar el proyecto localmente:

1. Clonar este repositorio
    ```sh
    git clone https://github.com/LuisGerdez/pdf-crud-laravel.git
    ```

1. Ir a la carpeta raíz del proyecto
    ```sh
    cd pdf-crud-laravel
    ```

1. Copiar la información del archivo '.env.example' dentro del archivo '.env'
    ```sh
    cp .env.example .env
    ```
1. Crear base de datos 'pdf-crud' (puede cambiar el nombre de la base de datos)

1. Modificar el archivo '.env' 
    - Establecer los credenciales de la base de datos (`DB_DATABASE=pdf-crud`, `DB_USERNAME=root`, `DB_PASSWORD=`)
    > Asegúrese de colocar el nombre de usuario y contraseña de la base de datos correctamente

1. Instalar las dependencias PHP
    ```sh
    composer install
    ```

1. Generar key
    ```sh
    php artisan key:generate
    ```

1. Instalar las depedencias front-end
    ```sh
    npm install && npm run dev
    ```

1. Ejecutar migraciones
    ```
    php artisan migrate:fresh --seed
    ```
    Este comando creará un usuario por defecto con las siguientes credenciales:
     > email: usertest@gmail.com , password: password

1. Ejecutar el servidor
    ```sh
    php artisan serve
    ```  

1. Dirigirse a 'localhost:8000' desde el navegador web.     
    > Asegúrese de seguir su entorno de desarrollo local de Laravel.
