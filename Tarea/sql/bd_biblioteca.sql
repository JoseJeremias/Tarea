-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS bd_biblioteca
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

-- Usar la base de datos
USE bd_biblioteca;

-- Crear la tabla libros
CREATE TABLE IF NOT EXISTS libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    editorial VARCHAR(100) NOT NULL,
    anio_publicacion YEAR NOT NULL,
    categoria VARCHAR(50) NOT NULL
);

-- Índices para búsqueda más rápida
CREATE INDEX idx_titulo ON libros (titulo);
CREATE INDEX idx_autor ON libros (autor);

-- Insertar datos de ejemplo (opcional)
INSERT INTO libros (titulo, autor, editorial, anio_publicacion, categoria) VALUES
('Cien años de soledad', 'Gabriel García Márquez', 'Sudamericana', 1967, 'Novela'),
('El origen de las especies', 'Charles Darwin', 'John Murray', 1859, 'Ciencia'),
('Don Quijote de la Mancha', 'Miguel de Cervantes', 'Francisco de Robles', 1605, 'Novela'),
('Harry Potter y la piedra filosofal', 'J.K. Rowling', 'Bloomsbury', 1997, 'Infantil'),
('Breve historia del tiempo', 'Stephen Hawking', 'Bantam Books', 1988, 'Ciencia');
-- Crear la tabla usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Crear la tabla prestamos
CREATE TABLE IF NOT EXISTS prestamos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libro_id INT NOT NULL,
    usuario_id INT NOT NULL,
    fecha_prestamo TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_devolucion TIMESTAMP NULL,
    FOREIGN KEY (libro_id) REFERENCES libros(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
-- Insertar datos de ejemplo en usuarios (opcional)
INSERT INTO usuarios (nombre, email) VALUES
('Juan Pérez', 'juan.perez@example.com'),
('María Gómez', 'maria.gomez@example.com'),
('Carlos Ruiz', 'carlos.ruiz@example.com');
-- Insertar datos de ejemplo en prestamos (opcional)
INSERT INTO prestamos (libro_id, usuario_id) VALUES
(1, 1),
(2, 2),
(3, 1),
(4, 3),
(5, 2);
-- Crear la tabla categorias
CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    descripcion TEXT
);
-- Insertar datos de ejemplo en categorias (opcional)
INSERT INTO categorias (nombre, descripcion) VALUES
('Novela', 'Ficción narrativa de cierta extensión'),
('Ciencia', 'Libros que abordan temas científicos'),
('Infantil', 'Literatura dirigida a niños'),
('Educativo', 'Material de estudio y aprendizaje'),
('Historia', 'Libros que relatan eventos históricos');
-- Crear la tabla autores
CREATE TABLE IF NOT EXISTS autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    nacionalidad VARCHAR(50),
    fecha_nacimiento DATE,
    fecha_fallecimiento DATE
);
-- Insertar datos de ejemplo en autores (opcional)
INSERT INTO autores (nombre, nacionalidad, fecha_nacimiento, fecha_fallecimiento) VALUES
('Gabriel García Márquez', 'Colombiano', '1927-03-06', '2014-04-17'),
('Charles Darwin', 'Británico', '1809-02-12', '1882-04-19'),
('Miguel de Cervantes', 'Español', '1547-09-29', '1616-04-22'),
('J.K. Rowling', 'Británica', '1965-07-31', NULL),
('Stephen Hawking', 'Británico', '1942-01-08', '2018-03-14');
-- Crear la tabla editoriales
CREATE TABLE IF NOT EXISTS editoriales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    pais VARCHAR(50),
    anio_fundacion YEAR
);
-- Insertar datos de ejemplo en editoriales (opcional)
INSERT INTO editoriales (nombre, pais, anio_fundacion) VALUES
('Sudamericana', 'Argentina', 1939),
('John Murray', 'Reino Unido', 1768),
('Francisco de Robles', 'España', 1500),
('Bloomsbury', 'Reino Unido', 1986),
('Bantam Books', 'Estados Unidos', 1945);