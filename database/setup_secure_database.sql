-- Script para crear usuario de base de datos seguro para Normateca
-- IMPORTANTE: Ejecutar este script como root antes de usar la aplicación

-- Crear el usuario dedicado con contraseña segura
CREATE USER IF NOT EXISTS 'normateca_user'@'localhost' IDENTIFIED BY 'N0rm4t3c@S3cur3P@ss2024!';

-- Otorgar solo los privilegios necesarios en la base de datos normateca
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, INDEX, ALTER ON normateca.* TO 'normateca_user'@'localhost';

-- Aplicar los cambios
FLUSH PRIVILEGES;

-- Verificar permisos
SHOW GRANTS FOR 'normateca_user'@'localhost';
