CREATE DATABASE hypergarage;
USE hypergarage;

-- Tabla de administradores
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL -- Aquí guardarás el hash, no el texto plano
);

-- Tabla de Marcas (Ej: Ferrari, Lamborghini, Bugatti)
CREATE TABLE marcas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    pais VARCHAR(50)
);

-- Tabla de Coches
CREATE TABLE coches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100) NOT NULL,
    id_marca INT,
    caballos INT, -- Para poner "700 CV"
    anio INT,
    precio DECIMAL(10,2),
    descripcion TEXT,
    FOREIGN KEY (id_marca) REFERENCES marcas(id) ON DELETE CASCADE
);

-- Insertar usuario admin (password: admin123 hash ficticio para ejemplo)
INSERT INTO usuarios (usuario, password) VALUES ('admin', '$2y$10$C.W/EXAMPLEHASH...');