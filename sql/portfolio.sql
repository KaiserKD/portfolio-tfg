CREATE DATABASE IF NOT EXISTS portfolio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE portfolio;

CREATE TABLE IF NOT EXISTS proyectos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    descripcion TEXT NOT NULL,
    tecnologias VARCHAR(200),
    imagen VARCHAR(255) DEFAULT NULL,
    fechaCreacion DATE DEFAULT (CURRENT_DATE),
    enlace VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS mensajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mensaje TEXT NOT NULL,
    fechaEnvio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO proyectos (titulo, descripcion, tecnologias, enlace) VALUES
('Landing Psicología Bilbao', 'Landing page corporativa para centro de psicología con diseño calming y responsive.', 'HTML5, CSS3, JavaScript', 'https://github.com'),
('Gestor de Tareas', 'Aplicación web completa con sistema de login, CRUD de tareas y panel de administración.', 'PHP, MySQL, Bootstrap', '#'),
('Portfolio Personal', 'Este mismo portfolio con backend PHP y base de datos.', 'HTML, CSS, PHP, MySQL', '#');