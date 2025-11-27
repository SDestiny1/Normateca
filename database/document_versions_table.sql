-- Crear tabla para el control de versiones de documentos
CREATE TABLE IF NOT EXISTS document_versions (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(50) NOT NULL,
    archivo LONGBLOB,
    version_number INT NOT NULL,
    cambios_descripcion VARCHAR(255),
    usuarioID INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    -- Relaciones
    FOREIGN KEY (codigo) REFERENCES Documentos(codigo) ON DELETE CASCADE,
    FOREIGN KEY (usuarioID) REFERENCES Usuarios(numero) ON DELETE RESTRICT,
    
    -- Índices
    INDEX idx_codigo (codigo),
    INDEX idx_created_at (created_at),
    UNIQUE KEY unique_version (codigo, version_number)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
set foreign_key_checks = 0;