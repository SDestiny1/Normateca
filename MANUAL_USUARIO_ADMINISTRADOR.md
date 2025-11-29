# 📘 Manual de Usuario - Panel de Administrador

## Normateca Institucional CESUN Universidad

---

## 🎯 Introducción

Bienvenido al Panel de Administrador de la Normateca Institucional. Este manual te guiará a través de todas las funcionalidades disponibles para gestionar documentos, usuarios y el contenido de la plataforma.

---

## 📋 Tabla de Contenidos

1. [Acceso al Sistema](#acceso-al-sistema)
2. [Navegación Principal](#navegación-principal)
3. [Gestión de Documentos](#gestión-de-documentos)
4. [Gestión de Usuarios](#gestión-de-usuarios)
5. [Control de Versiones](#control-de-versiones)
6. [Funciones Especiales](#funciones-especiales)

---

## 🔐 Acceso al Sistema

### Identificación del Panel

- **Identificador visual**: La barra de navegación muestra "Normateca Institucional **Admin**"
- **URL**: `tudominio.com/admin/landing`

### Credenciales

- Requiere rol de **Administrador** en el sistema
- Acceso mediante email y contraseña institucional

---

## 🧭 Navegación Principal

### Estructura del Menú

```
📁 Inicio
├── 🏢 Estructura Organizacional
├── 📜 Normatividad
├── 📊 Indicadores
├── ⚙️ Procesos
└── 📋 Formatos
```

### Elementos de Cada Sección

#### **Hero Section**

- Banner principal institucional
- Imagen corporativa de CESUN Universidad

#### **Enlaces Rápidos**

- Tarjetas visuales para acceso directo a secciones
- Diseño responsivo (1, 2, 3 o más secciones se organizan automáticamente)
- Efecto hover con animación

#### **Listado de Documentos**

- Organización por secciones y subsecciones
- Botón de colapsar/expandir en cada sección
- Vista previa flotante al pasar el mouse sobre documentos

---

## 📄 Gestión de Documentos

### 🟢 Agregar Nuevo Documento

#### Paso 1: Acceder al Modal

1. Ubica el botón flotante en la esquina inferior derecha
2. Clic en el icono **📄+** (Agregar Documento)

```
┌─────────────────────────────────────┐
│  Agregar Documento o URL            │
├─────────────────────────────────────┤
│  Código: [________________]         │
│  Título: [________________]         │
│  URL: [_____________________]       │
│  Categoría: [▼ Seleccionar]        │
│  Sección: [▼ Seleccionar]          │
│  Subsección: [▼ Opcional]          │
│  Archivo: [Seleccionar archivo]     │
│                                      │
│  [Cancelar]  [Guardar Documento]    │
└─────────────────────────────────────┘
```

#### Paso 2: Completar Información

| Campo          | Requerido | Descripción                                      |
| -------------- | --------- | ------------------------------------------------ |
| **Código**     | ✅ Sí     | Identificador único del documento                |
| **Título**     | ✅ Sí     | Nombre descriptivo del documento                 |
| **URL**        | ✅ Sí     | Enlace a Google Drive, Docs, o URL externa       |
| **Categoría**  | ✅ Sí     | Clasificación principal (se carga dinámicamente) |
| **Sección**    | ✅ Sí     | Subsección dentro de la categoría                |
| **Subsección** | ❌ No     | Subdivisión adicional (opcional)                 |
| **Archivo**    | ❌ No     | Archivo PDF local (opcional, complementa URL)    |

#### Paso 3: Guardar

- Clic en **"Guardar Documento"**
- El sistema valida la información
- Redirige automáticamente a la vista actualizada

---

### ✏️ Editar Documento Existente

#### Localizar el Documento

1. Navega a la sección correspondiente
2. Busca el documento en el listado
3. Identifica los botones de acción a la derecha

#### Botón de Edición

- **Icono**: ✏️ (lápiz)
- **Color**: Gris (outline-secondary)
- **Ubicación**: Junto al documento

```
┌──────────────────────────────────────────────────┐
│ 📄 Nombre del Documento                          │
│    Área · Tipo de documento                      │
│                                        [🔗][✏️][🕒][👁][🗑] │
└──────────────────────────────────────────────────┘
```

#### Modal de Edición

```
┌─────────────────────────────────────┐
│  Editar Documento                   │
├─────────────────────────────────────┤
│  Título: [Título actual____]        │
│  URL: [URL actual__________]        │
│  Archivo: [Actualizar archivo]      │
│                                     │
│  Descripción de cambios:            │
│  ┌─────────────────────────────┐    │
│  │ Describe los cambios aquí   │    │
│  └─────────────────────────────┘    │
│                                     │
│  [Cancelar]  [Guardar cambios]      │
└─────────────────────────────────────┘
```

#### ⚠️ Importante - Versionado

- Al editar un documento, se crea una **nueva versión** automáticamente
- Describe los cambios en el campo "Descripción de cambios"
- La versión anterior se guarda en el historial

---

### 👁️ Activar/Desactivar Documentos

#### Función del Estado

- **Activo**: Visible para todos los usuarios
- **Desactivo**: Solo visible para administradores (aparece en gris)

#### Botón de Toggle

- **Icono**: 👁️ (ojo abierto) = Activo | 👁️‍🗨️ (ojo tachado) = Desactivado
- **Color**: Naranja (outline-warning)

#### Proceso de Cambio

1. **Clic en el botón de ojo**
2. **Modal de confirmación**:
   ```
   ┌─────────────────────────────────────┐
   │  DESACTIVAR documento               │
   ├─────────────────────────────────────┤
   │  ¿Está seguro de que desea          │
   │  desactivar el documento            │
   │  "Nombre del documento"?            │
   │                                     │
   │  [Cancelar]  [Desactivar]           │
   └─────────────────────────────────────┘
   ```
3. **Cambio instantáneo**: El documento se actualiza sin recargar la página

#### Efectos Visuales

**Documento Desactivado:**

- Texto en gris
- Íconos deshabilitados
- No se muestra vista previa al pasar el mouse
- Usuarios estándar no lo ven

---

### 🗑️ Eliminar Documentos

#### ⚠️ ADVERTENCIA

Esta acción es **permanente** y **no se puede deshacer**

#### Proceso de Eliminación

1. **Botón de eliminación**

   - Icono: 🗑️ (papelera)
   - Color: Rojo (outline-danger)

2. **Modal de confirmación**

   ```
   ┌─────────────────────────────────────┐
   │  ⚠️ Eliminar documento             │
   ├─────────────────────────────────────┤
   │  ¿Está seguro de que desea          │
   │  ELIMINAR PERMANENTEMENTE           │
   │  el documento "Nombre"?             │
   │                                     │
   │  Esta acción NO se puede deshacer.  │
   │                                     │
   │  [Cancelar]  [Eliminar]             │
   └─────────────────────────────────────┘
   ```

3. **Confirmación final**: Doble verificación antes de eliminar

---

## 👥 Gestión de Usuarios

### 🆕 Registrar Nuevo Usuario

#### Acceso

- Botón flotante inferior derecho
- Icono: 👤+ (persona con plus)

#### Formulario de Registro

```
┌─────────────────────────────────────┐
│  Registrar Usuario                  │
├─────────────────────────────────────┤
│  Email: [_________________]         │
│  Contraseña: [_______________]      │
│  Confirmar contraseña: [______]     │
│  Rol: [▼ Seleccionar]               │
│       • Usuario                     │
│       • Administrador               │
│                                     │
│  [Cerrar]  [Registrar]              │
└─────────────────────────────────────┘
```

#### Validaciones

| Campo          | Requisitos                           |
| -------------- | ------------------------------------ |
| **Email**      | Formato válido (usuario@dominio.com) |
| **Contraseña** | Mínimo 8 caracteres                  |
| **Confirmar**  | Debe coincidir con la contraseña     |
| **Rol**        | Usuario o Administrador              |

#### Tipos de Roles

| Rol               | Permisos                                                                       |
| ----------------- | ------------------------------------------------------------------------------ |
| **Usuario**       | Solo lectura y consulta de documentos activos                                  |
| **Administrador** | Acceso completo: CRUD de documentos, gestión de usuarios, control de versiones |

---

## 🕒 Control de Versiones

### Visualizar Historial de Versiones

#### Acceso al Historial

1. Localiza el documento
2. Clic en el botón **🕒** (reloj)
3. Se abre el modal de historial

#### Modal de Historial

```
┌──────────────────────────────────────────────┐
│  Historial de Versiones - Nombre Documento   │
├──────────────────────────────────────────────┤
│  📊 Total de versiones: 5                   │
│                                              │
│  ┌─────────────────────────────────────┐     │
│  │ Versión 5              [👁️] [⬇️]    │    │
│  │ 2024-11-28 14:30                    │     │
│  │ Usuario: admin@cesun.edu.mx         │     │
│  │ Cambios: Actualización de contenido │     │
│  └─────────────────────────────────────┘     │
│                                              │
│  ┌─────────────────────────────────────┐     │
│  │ Versión 4              [👁️] [⬇️]    │    │
│  │ 2024-11-20 10:15                    │     │
│  │ Usuario: admin@cesun.edu.mx         │     │
│  │ Cambios: Corrección de errores      │     │
│  └─────────────────────────────────────┘     │
│                                              │
│  [Cerrar]                                    │
└──────────────────────────────────────────────┘
```

#### Acciones Disponibles

| Botón  | Función                                           |
| ------ | ------------------------------------------------- |
| **👁️** | Ver la versión del documento en pantalla completa |
| **⬇️** | Descargar la versión específica del archivo       |

### Recuperar Versión Anterior

#### Visualización de Versión

1. Clic en **👁️** (ojo) en la versión deseada
2. Se abre modal de visualización en pantalla completa
3. Incluye visor PDF integrado

```
┌──────────────────────────────────────────────┐
│  Ver Versión Anterior - Documento v3         │
├──────────────────────────────────────────────┤
│  [Vista previa del PDF]                      │
│  ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓           │
│  ▓                                    ▓      │
│  ▓    Contenido del documento        ▓       │
│  ▓                                    ▓      │
│  ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓           │
│                                              │
│  [Cerrar]                                    │
└──────────────────────────────────────────────┘
```

#### Descargar Versión

- Clic en **⬇️** descarga el archivo directamente
- Nombre del archivo incluye número de versión

---

## ⚡ Funciones Especiales

### 🔍 Vista Previa Flotante

#### Activación

- Al pasar el mouse sobre el **nombre del documento**
- Aparece automáticamente después de 0.5 segundos

#### Contenido del Preview

```
┌────────────────────────────┐
│ 📄 Nombre del Documento    │
├────────────────────────────┤
│  ┌──────────────────────┐  │
│  │                      │  │
│  │  Vista previa del    │  │
│  │  documento (iframe)  │  │
│  │                      │  │
│  └──────────────────────┘  │
├────────────────────────────┤
│ Área · Tipo de documento   │
└────────────────────────────┘
```

#### Características

- **Posición inteligente**: Se adapta al espacio disponible
- **Compatible con Google Docs**: Conversión automática a vista previa
- **Persistente**: Se mantiene al mover el mouse sobre él
- **Cierre automático**: Desaparece al alejar el mouse

---

### 📂 Archivos Locales vs URLs

#### Icono de Archivo Local

- **Símbolo**: 📄 (documento)
- **Color**: Azul primario
- **Función**: Abre el archivo almacenado en el servidor

#### Icono de URL Externa

- **Símbolo**: 🔗 (cadena)
- **Color**: Gris secundario
- **Función**: Abre el enlace en nueva pestaña

#### Compatibilidad

Los documentos pueden tener **ambos**:

- URL para acceso en línea (Google Drive)
- Archivo local como respaldo

---

### 🔄 Colapsar/Expandir Secciones

#### Botón de Toggle

```
┌──────────────────────────────────────┐
│ Estructura Organizacional  [Ocultar ▼] │
└──────────────────────────────────────┘
```

#### Estados

**Expandido:**

- Texto: "Ocultar"
- Icono: ▼ (flecha abajo)
- Muestra todos los documentos

**Colapsado:**

- Texto: "Mostrar"
- Icono: ▲ (flecha arriba)
- Oculta los documentos

#### Ventajas

- Mejora la navegación en páginas largas
- Reduce el scroll necesario
- Mantiene el enfoque en secciones específicas

---

### 📱 Diseño Responsivo

#### Adaptación Automática

**Desktop (>992px)**

- 3-4 columnas de tarjetas
- Listado completo de documentos
- Todos los botones visibles

**Tablet (768px - 992px)**

- 2 columnas de tarjetas
- Botones completos
- Preview flotante activo

**Mobile (<768px)**

- 1 columna
- Botones compactos
- Menú hamburguesa
- Preview deshabilitado

---

## 🎨 Guía Visual de Iconos

### Iconos de Acción

| Icono | Nombre        | Función             | Color         |
| ----- | ------------- | ------------------- | ------------- |
| 🔗    | Link          | Abrir URL externa   | Gris          |
| ✏️    | Editar        | Modificar documento | Gris          |
| 🕒    | Historial     | Ver versiones       | Azul info     |
| 👁️    | Toggle activo | Activar/Desactivar  | Naranja       |
| 🗑️    | Eliminar      | Borrar documento    | Rojo          |
| 📄    | Archivo       | Ver PDF local       | Azul primario |

### Iconos de Navegación

| Icono | Nombre       | Función                   |
| ----- | ------------ | ------------------------- |
| 🏠    | Inicio       | Página principal          |
| 🏢    | Estructura   | Estructura Organizacional |
| 📜    | Normatividad | Documentos normativos     |
| 📊    | Indicadores  | Indicadores de gestión    |
| ⚙️    | Procesos     | Procesos institucionales  |
| 📋    | Formatos     | Formatos y plantillas     |

---

## 🚀 Flujo de Trabajo Recomendado

### Para Agregar Documentos

```
1. Preparar el documento
   ↓
2. Subirlo a Google Drive (opcional)
   ↓
3. Obtener enlace de compartir
   ↓
4. Clic en botón "Agregar Documento"
   ↓
5. Completar formulario
   ↓
6. Subir archivo local (opcional)
   ↓
7. Guardar
```

### Para Actualizar Documentos

```
1. Localizar documento
   ↓
2. Clic en ✏️ (Editar)
   ↓
3. Actualizar información necesaria
   ↓
4. ¡IMPORTANTE! Describir cambios
   ↓
5. Subir nueva versión de archivo (si aplica)
   ↓
6. Guardar cambios
```

### Para Gestionar Visibilidad

```
1. Revisar documento
   ↓
2. Decidir si debe estar visible
   ↓
3. Clic en 👁️ (Toggle)
   ↓
4. Confirmar acción
   ↓
5. Verificar cambio visual
```

---

## ⚠️ Advertencias y Mejores Prácticas

### ❌ NO Hacer

- ❌ No eliminar documentos sin verificar dependencias
- ❌ No omitir la descripción de cambios al editar
- ❌ No usar códigos duplicados
- ❌ No desactivar documentos críticos sin comunicar

### ✅ SÍ Hacer

- ✅ Usar códigos descriptivos y únicos
- ✅ Incluir títulos claros y concisos
- ✅ Proporcionar URLs válidas y accesibles
- ✅ Describir cambios en cada edición
- ✅ Verificar la categorización correcta
- ✅ Mantener archivos locales actualizados
- ✅ Comunicar cambios importantes al equipo

---

## 🆘 Solución de Problemas Comunes

### Problema 1: No se carga la vista previa

**Posibles causas:**

- URL de Google Docs sin permisos adecuados
- Documento protegido con contraseña

**Solución:**

1. Verificar permisos del documento en Google Drive
2. Configurar como "Cualquier persona con el enlace puede ver"
3. Actualizar URL en el sistema

---

### Problema 2: El archivo local no se visualiza

**Posibles causas:**

- Archivo no es PDF
- Archivo corrupto
- Tamaño excesivo

**Solución:**

1. Verificar que el archivo sea PDF válido
2. Comprobar tamaño (máximo recomendado: 10MB)
3. Resubir el archivo si es necesario

---

### Problema 3: No aparecen secciones dinámicas

**Posibles causas:**

- Categoría sin secciones configuradas
- Error de carga de datos

**Solución:**

1. Seleccionar otra categoría y regresar
2. Refrescar la página
3. Verificar en base de datos las relaciones

---

## 📞 Soporte y Contacto

### Equipo Técnico

**Coordinador de Desarrollo Organizacional**

- Nombre: Beltrán Ángel Orlando
- Extensión: 180
- Email: coord.do@cesun.edu.mx

**Jefe de Planeación y Evaluación Institucional**

- Nombre: Figueroa Mascareño Mario
- Extensión: 179
- Email: planeacionyevaluacion@cesun.edu.mx

---

## 📝 Notas Finales

### Actualizaciones del Manual

Este manual se actualiza periódicamente. Versión actual: **1.0** (Noviembre 2024)

### Capacitación

Para capacitación adicional, contactar al Departamento de Planeación y Gestión de Calidad.

### Retroalimentación

Tus comentarios son importantes. Reporta errores o sugerencias a los contactos mencionados.

---

**Departamento de Planeación y Gestión de Calidad**  
CESUN Universidad  
© 2024 Todos los derechos reservados
