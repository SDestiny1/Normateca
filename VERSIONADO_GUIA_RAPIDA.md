# 🎯 Control de Versiones de Documentos - Guía Rápida

## Lo que se implementó

✅ **Sistema de versionado automático** para documentos  
✅ **Historial completo** de cambios  
✅ **Descargar versiones anteriores**  
✅ **Ver versiones en modal**  
✅ **Rastrear cambios** (usuario, fecha, descripción)

---

## 🚀 Activación Rápida

### 1. Ejecutar migración

```bash
cd d:/Users/honjo/SC1
php artisan migrate
```

### 2. Listo

No hay más pasos. ¡El sistema está activo!

---

## 📖 Uso

### Para ver el historial de un documento:

1. Abre Admin → Estructura Organizacional
2. Haz clic en el botón **🕐 (reloj con historial)** en cualquier documento
3. Se abre un modal mostrando todas las versiones anteriores

### Para guardar una nueva versión:

1. Haz clic en **✎ (editar)** en un documento
2. Cambia el archivo O el título
3. Escribe una descripción (p.ej. "Actualización de políticas")
4. Haz clic en "Guardar cambios"
5. ¡Listo! La versión anterior se guarda automáticamente

### Para ver una versión anterior:

1. En el historial, haz clic en **👁 Ver**
2. Se abre el archivo en un modal

### Para descargar una versión anterior:

1. En el historial, haz clic en **⬇ Descargar**
2. El archivo se descarga a tu computadora

---

## 🔧 Qué cambió en los archivos

### Nuevos

- `app/Models/DocumentVersion.php` - Modelo de versiones
- `database/migrations/2025_11_26_create_document_versions_table.php` - Tabla de BD

### Modificados

- `app/Http/Controllers/documentController.php` - Lógica de versiones
- `app/Models/Docs.php` - Relación con versiones
- `routes/web.php` - Rutas nuevas para AJAX
- `resources/views/admin/EstructuraOrg/index.blade.php` - UI (botones, modales, JS)

---

## 📊 Diagrama simple

```
DOCUMENTO ACTUAL (Documentos table)
    ↓
    Cuando lo editas y cambias archivo
    ↓
VERSIÓN ANTERIOR (document_versions table)
    ↓
    Puedes ver/descargar versiones anteriores
```

---

## 💾 Datos que se guardan

Para cada versión:

- ✅ El archivo anterior completo (BLOB)
- ✅ Número de versión
- ✅ Descripción de cambios
- ✅ Quién lo cambió (usuario)
- ✅ Cuándo se cambió (fecha/hora)

---

## 🎯 Casos de uso

**Ejemplo 1: Auditoría**

- El director quiere saber qué cambios se hicieron a un documento
- Hace clic en historial y ve todo

**Ejemplo 2: Recuperación**

- Se modificó un documento por error
- Descarga la versión anterior

**Ejemplo 3: Comparación**

- Ver qué cambió entre versiones
- Disponible en el visor

---

## ⚠️ Cosas importantes

1. **Las versiones se crean automáticamente** cuando cambias un archivo
2. **La descripción de cambios es recomendada** para saber qué se modificó
3. **Ilimitadas versiones** - No hay límite de cuántas versiones guardar
4. **Ordenadas por reciente** - Las más nuevas aparecen primero

---

## 🆘 Si algo no funciona

### Botón de historial no aparece

- Recarga la página (F5)

### "No hay versiones"

- Normal. Las versiones se crean solo cuando cambias el archivo

### Error al ver versión

- Ejecuta de nuevo: `php artisan migrate`

---

## 📋 Checklist de verificación

- [ ] Ejecuté `php artisan migrate`
- [ ] Recargué la página admin
- [ ] Veo el botón 🕐 en los documentos
- [ ] Puedo editar y guardar cambios
- [ ] Veo el historial cuando hago clic

---

**¡Sistema listo para usar!** ✅
