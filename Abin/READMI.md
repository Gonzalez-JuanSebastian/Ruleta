### README.md

# Proyecto Web Interactivo

Este proyecto es una plataforma interactiva que permite a los empleados registrarse, iniciar sesión y acceder a diferentes funcionalidades como jugar a la ruleta, registrar datos personales, y gestionar tokens de autenticación.

## Requisitos

- PHP 7.4 o superior
- MySQL 5.7 o superior
- Servidor web (Apache, Nginx, etc.)

## Instalación

   
1. Configura la base de datos:
   - Crea una base de datos llamada `prueba`.
   - Importa las tablas ejecutando el siguiente script SQL:
     ```sql
     -- Crear la base de datos
     CREATE DATABASE prueba;

     -- Seleccionar la base de datos
     USE prueba;

     -- Crear la tabla users
     CREATE TABLE users (
         id INT AUTO_INCREMENT PRIMARY KEY,
         username VARCHAR(255) NOT NULL UNIQUE,
         password VARCHAR(255) NOT NULL
     );

     -- Crear la tabla tokens
     CREATE TABLE tokens (
         id INT AUTO_INCREMENT PRIMARY KEY,
         user_id INT NOT NULL,
         token VARCHAR(255) NOT NULL UNIQUE,
         expires_at DATETIME NOT NULL,
         FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
     );

     -- Crear la tabla datos
     CREATE TABLE datos (
         id INT NOT NULL AUTO_INCREMENT,
         name VARCHAR(45) NOT NULL,
         email VARCHAR(45) NOT NULL,
         city VARCHAR(45) NOT NULL,
         phone VARCHAR(50) NOT NULL,
         company VARCHAR(45) NOT NULL,
         nit VARCHAR(45) NOT NULL,
         products VARCHAR(45) NOT NULL,
         prize VARCHAR(45) NOT NULL,
         user_name VARCHAR(45) NOT NULL,
         PRIMARY KEY (id)
     );
     ```

3. Configura la conexión a la base de datos en el archivo `config/database.php`:
   ```php
   <?php
   // Configuración de las 2 conexión a la base de datos
   // 1
   $host = 'localhost';
   $user = 'root';
   $pass = '';
   $db = 'prueba';

   // Crear una nueva conexión a MySQL
   $mysqli = new mysqli($host, $user, $pass, $db);

   // Verificar si hay errores de conexión
   if ($mysqli->connect_error) {
       die("Error de conexión: " . $mysqli->connect_error);
   }

   // Retornar la conexión
   return $mysqli;
   ?>
   ```

   // 2
   ``` php
   <?php
    // Configuración de la conexión a la base de datos
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'prueba';

    // Conexión a la base de datos
    $conn = new mysqli($host, $user, $pass, $db);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $conn->set_charset("utf8");
    ?> 
   ```

## Estructura del Proyecto

- **config/**: Archivos de configuración de la base de datos.
- **public/**: Archivos accesibles públicamente (HTML, CSS, JS).
- **src/**: Lógica del servidor en PHP (clases, manejo de formularios).
- **templates/**: Plantillas reutilizables para HTML.

## Funcionalidades

### 1. Registro e Inicio de Sesión

Formulario de registro e inicio de sesión para los empleados.

- **Archivo**: `public/index.php`

### 2. Inicio de Sesión

Formulario de inicio de sesión que redirige al usuario al menú principal.

- **Archivo**: `public/login.php`

### 3. Registro de Usuario

Formulario de registro que permite a los nuevos usuarios crear una cuenta.

- **Archivo**: `public/register.php`

### 4. Menu Principal

Página de bienvenida con opciones para iniciar un nuevo juego o cerrar sesión.

- **Archivo**: `public/menu.php`

### 5. Ruleta

Juego de ruleta interactiva para los empleados.

- **Archivo**: `public/ruleta.php`

### 6. Ingreso de Datos

Formulario para ingresar datos personales.

- **Archivo**: `public/nuevo_juego.php`

### 7. Gestión de Tokens

Generación y verificación de tokens para acciones seguras.

- **Archivo**: `src/Token.php`

### 8. Manejo de Sesiones

Inicio y cierre de sesión, manejo de datos de sesión.

- **Archivo**: `src/logout.php`

## Ejecución

1. Abre tu navegador y navega a la URL donde está alojado tu proyecto.
2. Regístrate o inicia sesión para acceder a las funcionalidades interactivas.

