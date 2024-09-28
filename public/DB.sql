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
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(50) NOT NULL,
  `company` VARCHAR(45) NOT NULL,
  `nit` VARCHAR(45) NOT NULL,
  `products` VARCHAR(45) NOT NULL,
  `prize` VARCHAR(45),
  `user_name` VARCHAR(100), 
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

