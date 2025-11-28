# Diagrama de Base de Datos - Sistema de Versiones

## Tablas Relacionadas

```
┌─────────────────────────────┐
│        Documentos           │
├─────────────────────────────┤
│ codigo (PK)                 │
│ titulo                      │
│ url                         │
│ archivo (BLOB)              │ ←──────────┐
│ estado                      │            │
│ fechaCreacion               │            │
│ usuarioID (FK)              │            │
│ categoriaID (FK)            │            │
│ seccionID (FK)              │            │
│                             │            │
│ Relaciones:                 │            │
│ - User (usuarioID)          │            │
│ - Category (categoriaID)    │            │
│ - Section (seccionID)       │            │
│ - DocumentVersions (1:N)    │            │
└─────────────────────────────┘            │
                                           │
                                           │
        ┌──────────────────────────────────┘
        │ Una versión guarda el
        │ archivo anterior aquí
        ↓
┌──────────────────────────────────────────┐
│           DocumentVersions               │
├──────────────────────────────────────────┤
│ id (PK)                                  │
│ codigo (FK) → Documentos.codigo          │
│ archivo (LONGBLOB) ← Archivo antiguo     │
│ version_number                           │
│ cambios_descripcion                      │
│ usuarioID (FK) → Usuarios.numero         │
│ created_at                               │
│                                          │
│ Índices:                                 │
│ - codigo (búsqueda)                      │
│ - created_at (ordenamiento)              │
│ - UNIQUE(codigo, version_number)         │
└──────────────────────────────────────────┘
        ↑                    ↑
        │                    │
        └────┬───────────────┘
             │
    Foreign Keys
```

---

## Flujo de Datos

```
1. CREAR DOCUMENTO INICIAL
   Documentos (archivo = documento.pdf, v1)

2. ACTUALIZAR DOCUMENTO (cambiar archivo)
   a) Insertar fila en DocumentVersions
      - codigo = mismo código
      - archivo = documento.pdf (versión anterior)
      - version_number = 1
      - usuarioID = admin
      - cambios_descripcion = "Primera versión"

   b) Actualizar fila en Documentos
      - archivo = nuevo_documento.pdf (versión actual)

3. ACTUALIZAR DOCUMENTO NUEVAMENTE
   a) Insertar fila en DocumentVersions
      - version_number = 2
      - archivo = nuevo_documento.pdf (versión anterior)

   b) Actualizar fila en Documentos
      - archivo = documento_final.pdf (versión actual)

RESULTADO:
   Documentos: tiene la versión actual
   DocumentVersions: tiene historial de todas las anteriores
```

---

## Estructura SQL

```sql
-- Tabla de Documentos (existente)
CREATE TABLE Documentos (
    codigo VARCHAR(50) PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    url VARCHAR(255),
    archivo LONGBLOB,
    estado VARCHAR(50) DEFAULT 'activo',
    fechaCreacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    usuarioID INT NOT NULL,
    categoriaID INT NOT NULL,
    seccionID INT,
    FOREIGN KEY (usuarioID) REFERENCES Usuarios(numero),
    FOREIGN KEY (categoriaID) REFERENCES Categorias(numero),
    FOREIGN KEY (seccionID) REFERENCES Secciones(numero)
);

-- Tabla de Versiones (NUEVA)
CREATE TABLE document_versions (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(50) NOT NULL,
    archivo LONGBLOB,
    version_number INT NOT NULL,
    cambios_descripcion VARCHAR(255),
    usuarioID INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (codigo) REFERENCES Documentos(codigo) ON DELETE CASCADE,
    FOREIGN KEY (usuarioID) REFERENCES Usuarios(numero) ON DELETE RESTRICT,

    INDEX idx_codigo (codigo),
    INDEX idx_created_at (created_at),
    UNIQUE KEY unique_version (codigo, version_number)
);
```

---

## Relaciones Lógicas

```
Usuarios (1) ──────┐
                   │
                   ├── (N) Documentos
                   │
                   └── (N) DocumentVersions

Documentos (1) ────────── (N) DocumentVersions
                          (historial del documento)

Categorias (1) ────────── (N) Documentos
Secciones (1) ─────────── (N) Documentos
```

---

## Ejemplo de Datos

### Tabla Documentos

```
┌───────────────┬─────────────────────┬─────────────────┬──────────────────────┐
│ codigo        │ titulo              │ estado          │ archivo              │
├───────────────┼─────────────────────┼─────────────────┼──────────────────────┤
│ DOC_001       │ Política de RRHH    │ activo          │ [BLOB: v3 actual]    │
│ DOC_002       │ Estatuto Institucio │ activo          │ [BLOB: v1 actual]    │
└───────────────┴─────────────────────┴─────────────────┴──────────────────────┘
```

### Tabla DocumentVersions

```
┌─────┬───────────┬──────────────────────┬────────────┬──────────────────────────┬──────────┐
│ id  │ codigo    │ archivo              │ version_#  │ cambios_descripcion      │ created  │
├─────┼───────────┼──────────────────────┼────────────┼──────────────────────────┼──────────┤
│ 1   │ DOC_001   │ [BLOB: v1 anterior]  │ 1          │ Versión inicial          │ 26/11    │
│ 2   │ DOC_001   │ [BLOB: v2 anterior]  │ 2          │ Actualización de fechas  │ 27/11    │
│ 3   │ DOC_002   │ [BLOB: v0 anterior]  │ 1          │ Corrección de datos      │ 28/11    │
└─────┴───────────┴──────────────────────┴────────────┴──────────────────────────┴──────────┘
```

---

## Kardex de Versiones (Vista Conceptual)

```
DOCUMENTO: DOC_001 - Política de RRHH

Versión 1 (26/11/2025 10:00)
├── Usuario: admin@cesun.edu.mx
├── Cambios: "Versión inicial del documento"
├── Archivo: politica_rrhh_v1.pdf
└── Estado: Guardado en DocumentVersions

Versión 2 (27/11/2025 14:30)
├── Usuario: admin@cesun.edu.mx
├── Cambios: "Actualización de fechas y beneficios"
├── Archivo: politica_rrhh_v2.pdf
└── Estado: Guardado en DocumentVersions

Versión 3 (ACTUAL - 28/11/2025 09:15)
├── Usuario: admin@cesun.edu.mx
├── Cambios: (última actualización sin registrar aún)
├── Archivo: politica_rrhh_v3_FINAL.pdf
└── Estado: En tabla Documentos (actual)
```

---

## Consultando Versiones (SQL)

```sql
-- Ver todas las versiones de un documento
SELECT
    v.version_number,
    v.cambios_descripcion,
    u.email as usuario,
    v.created_at
FROM document_versions v
JOIN Usuarios u ON v.usuarioID = u.numero
WHERE v.codigo = 'DOC_001'
ORDER BY v.version_number DESC;

-- Obtener el archivo de una versión específica
SELECT archivo
FROM document_versions
WHERE codigo = 'DOC_001' AND version_number = 2;

-- Contar versiones de un documento
SELECT COUNT(*) as total_versiones
FROM document_versions
WHERE codigo = 'DOC_001';
```

---

## Tabla de Conversión - Migraciones

```
Antes (sin versionado):
- Documentos.archivo = v1 → v2 → v3 (sobrescrito cada vez)
- No hay histórico
- No se sabe quién cambió qué

Después (con versionado):
- Documentos.archivo = v3 (solo versión actual)
- DocumentVersions.archivo = [v1, v2] (histórico completo)
- Se sabe usuario, fecha y descripción de cada cambio
```

---

## Cálculo de Espacio en BD

```
Por cada versión guardada:
- id: 8 bytes
- codigo: 50 bytes
- archivo: depende del PDF (típicamente 100KB a 5MB)
- version_number: 4 bytes
- cambios_descripcion: 255 bytes
- usuarioID: 4 bytes
- created_at: 4 bytes

Ejemplo: 100 documentos × 3 versiones × 500KB promedio
= 150 MB en DocumentVersions

Recomendación: Revisar BD cada 6 meses
```

---

## Integridad Referencial

```
✅ ON DELETE CASCADE
   Si borras un Documento → Se borran automáticamente
   todas sus versiones en DocumentVersions

✅ ON DELETE RESTRICT
   Si intentas borrar un Usuario con cambios registrados
   → La BD lo impide (protección de datos)

✅ UNIQUE(codigo, version_number)
   Evita duplicados de versiones del mismo documento
```

---

**Diagrama creado:** 26/11/2025  
**Compatible con:** MySQL 5.7+, MySQL 8.0
