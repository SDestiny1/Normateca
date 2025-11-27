# Sistema de Control de Versiones de Documentos - Implementación Completa

## 📋 Descripción General

Se ha implementado un **sistema completo de control de versiones para documentos** que permite:

✅ Guardar automáticamente versiones anteriores cuando se actualiza un documento  
✅ Ver un historial completo de versiones  
✅ Ver versiones anteriores en un modal viewer  
✅ Descargar versiones anteriores  
✅ Registrar cambios con descripción  
✅ Rastrear quién realizó cada cambio y cuándo

---

## 📁 Archivos Creados/Modificados

### 1. **Base de Datos**

#### Archivo: `database/migrations/2025_11_26_create_document_versions_table.php`

**Nuevas tablas:**

- `document_versions` - Almacena todas las versiones anteriores de documentos
  - `id` - ID único
  - `codigo` - Referencia al documento (FK)
  - `archivo` - Contenido del documento anterior (BLOB)
  - `version_number` - Número de versión
  - `cambios_descripcion` - Descripción de cambios realizados
  - `usuarioID` - Usuario que realizó el cambio (FK)
  - `created_at` - Fecha/hora del cambio

**También disponible:** `database/document_versions_table.sql` - Script SQL directo para crear la tabla

---

### 2. **Modelos Eloquent**

#### Archivo: `app/Models/DocumentVersion.php` (NUEVO)

**Propósito:** Modelo para la tabla de versiones
**Métodos principales:**

- `documento()` - Relación con el documento original
- `usuario()` - Relación con el usuario que realizó el cambio
- `getVersionsForDocument($codigo)` - Obtener todas las versiones de un documento
- `getLatestVersion($codigo)` - Obtener la última versión
- `getNextVersionNumber($codigo)` - Obtener el número de la próxima versión

#### Archivo: `app/Models/Docs.php` (MODIFICADO)

**Cambios:**

- Added: Relación `versiones()` que devuelve todas las versiones del documento
- Added: Método `getTotalVersionsCount()` para obtener el total de versiones

---

### 3. **Controlador**

#### Archivo: `app/Http/Controllers/documentController.php` (MODIFICADO)

**Nuevos Métodos:**

1. **`update()` - Mejorado**

   - Ahora detecta cambios en archivos
   - Si el archivo cambió, guarda automáticamente la versión anterior
   - Registra la descripción de cambios

2. **`getVersionHistory($codigo)` - NUEVO**

   - Endpoint AJAX que devuelve el historial completo
   - Retorna: versiones, total, información del usuario, fecha, descripción
   - Respuesta JSON

3. **`downloadVersion($id)` - NUEVO**

   - Permite descargar una versión anterior como archivo
   - Genera el nombre del archivo incluyendo el número de versión

4. **`viewVersion($id)` - NUEVO**
   - Endpoint AJAX para visualizar una versión anterior en el modal
   - Convierte el BLOB a base64 para mostrar en iframe
   - Respuesta JSON con datos:base64

---

### 4. **Rutas**

#### Archivo: `routes/web.php` (MODIFICADO)

**Nuevas Rutas:**

```php
GET    /documentos/{codigo}/version-history      → documentController@getVersionHistory
GET    /documento-versions/{id}                  → documentController@viewVersion
GET    /documento-versions/{id}/download         → documentController@downloadVersion
```

---

### 5. **Interfaz de Usuario**

#### Archivo: `resources/views/admin/EstructuraOrg/index.blade.php` (MODIFICADO)

**Botones añadidos:**

- **Icono de Historial** (bi-clock-history) - Color info
  - Visible en ambas secciones (principal y subsecciones)
  - Data attributes: `data-codigo`, `data-titulo`

**Modales añadidos:**

1. **Modal: `modalVersionHistory`**

   - Muestra lista de todas las versiones
   - Cada versión incluye:
     - Número de versión
     - Fecha y hora de cambio
     - Usuario que realizó el cambio
     - Descripción de cambios
     - Botones: Ver (eye icon) y Descargar (download icon)

2. **Modal: `modalViewVersion`**
   - Viewer de PDF/archivo
   - Muestra la versión anterior seleccionada
   - Autocontrol de limpieza al cerrar

**Campo en Modal de Edición:**

- **Descripción de Cambios** - Textarea
  - Permite describir qué se cambió en el documento
  - Placeholder: "Describe qué cambios se realizaron en este documento..."

---

### 6. **JavaScript**

#### JavaScript Añadido (en `index.blade.php`)

**Funcionalidad:**

```javascript
// 1. Listener en botón .version-history-btn
   - Abre modal de historial
   - Carga versiones vía AJAX

// 2. Fetch a /documentos/{codigo}/version-history
   - Obtiene todas las versiones
   - Renderiza tabla con información

// 3. Event listeners en botones de versión
   - Ver versión: Abre segundo modal con viewer
   - Descargar: Descarga el archivo directamente

// 4. Conversión a base64
   - BLOB → base64 para visualización en iframe
   - Compatible con navegadores modernos
```

---

## 🔄 Flujo de Funcionamiento

### Crear Documento

1. Usuario crea documento (sin versiones inicialmente)

### Actualizar Documento

1. Usuario abre modal de edición
2. Cambia el título, URL o **carga un nuevo archivo**
3. Escribe descripción de cambios (opcional)
4. Guarda cambios
5. **Sistema automáticamente:**
   - Detecta si el archivo cambió
   - Guarda archivo anterior en `document_versions`
   - Incrementa número de versión
   - Registra usuario, fecha y descripción

### Ver Historial

1. Usuario hace clic en icono de historial (clock-history)
2. Se abre modal con lista de versiones
3. Para cada versión se muestra:
   - Número de versión
   - Fecha/hora de creación
   - Usuario que lo cambió
   - Descripción de cambios
4. Usuario puede:
   - **Ver**: Abre el archivo en un modal viewer
   - **Descargar**: Descarga el archivo con nombre `documento_v2.pdf`

---

## 🗄️ Tabla de Versiones

```
document_versions
├── id (BIGINT PK)
├── codigo (VARCHAR FK) → Documentos.codigo
├── archivo (LONGBLOB)
├── version_number (INT)
├── cambios_descripcion (VARCHAR)
├── usuarioID (INT FK) → Usuarios.numero
├── created_at (TIMESTAMP)
└── Índices:
    ├── codigo (búsqueda rápida)
    ├── created_at (ordenamiento)
    └── UNIQUE(codigo, version_number)
```

---

## 📊 Diagrama de Relaciones

```
Documentos (original)
    ↓
    └─← document_versions (histórico)
         ├─ versiones antiguas
         ├─ usuario que cambió
         ├─ fecha del cambio
         └─ descripción del cambio
```

---

## 🎨 Interfaz Visual

### Botones en Lista de Documentos

```
[✎ Edit] [🕐 History] [👁 Toggle] [🗑 Delete]
```

### Modal de Historial

```
┌─────────────────────────────────────┐
│ Historial de Versiones - Doc Title  │
├─────────────────────────────────────┤
│ Total de versiones: 3               │
│                                     │
│ ┌─────────────────────────────────┐ │
│ │ Versión 3                       │ │
│ │ 26/11/2025 14:30               │ │
│ │ Usuario: admin@cesun.edu.mx    │ │
│ │ Cambios: Actualización final   │ │
│ │            [👁 Ver] [⬇ Descargar]│ │
│ ├─────────────────────────────────┤ │
│ │ Versión 2                       │ │
│ │ ...                             │ │
│ └─────────────────────────────────┘ │
└─────────────────────────────────────┘
```

---

## 🚀 Instalación/Setup

### 1. Ejecutar Migración

```bash
php artisan migrate
```

O ejecutar SQL directo:

```sql
-- Ejecutar content de database/document_versions_table.sql
```

### 2. Verificar Archivos

- ✅ `app/Models/DocumentVersion.php` - Creado
- ✅ `app/Models/Docs.php` - Modificado
- ✅ `app/Http/Controllers/documentController.php` - Modificado
- ✅ `routes/web.php` - Modificado
- ✅ `resources/views/admin/EstructuraOrg/index.blade.php` - Modificado

### 3. Testing

1. Ir a Admin → Estructura Organizacional
2. Editar un documento (cambiar archivo + agregar descripción)
3. Hacer clic en icono de historial
4. Ver versiones anteriores
5. Descargar una versión

---

## 📝 Notas Técnicas

### Comparación de Archivos

```php
if ($doc->archivo && $nuevoArchivo !== $doc->archivo) {
    // El archivo cambió → guardar versión anterior
}
```

### Conversión a Base64

```php
$base64 = base64_encode($content);
// → data:application/pdf;base64,JVBERi0xLjQK...
// → usable en iframe src directamente
```

### Seguridad

- ✅ CSRF token en formularios
- ✅ FK constraints en BD
- ✅ Validación de arquivo
- ✅ Auth user tracking

---

## 🎯 Beneficios

1. **Auditoría Completa** - Rastrear todos los cambios
2. **Recuperación** - Volver a versiones anteriores fácilmente
3. **Trazabilidad** - Saber quién hizo qué y cuándo
4. **Documentación** - Describir cambios en cada actualización
5. **Comparación** - Visualizar diferentes versiones lado a lado (futuro)

---

## 🔮 Mejoras Futuras Sugeridas

- [ ] Comparador visual entre versiones
- [ ] Restore automático a versión anterior
- [ ] Diff de cambios en archivo de texto
- [ ] Limpieza automática de versiones antiguas
- [ ] Export de historial completo
- [ ] Timeline visual de cambios

---

**Fecha de Implementación:** 26 de Noviembre, 2025  
**Estado:** ✅ Completado y Funcional
