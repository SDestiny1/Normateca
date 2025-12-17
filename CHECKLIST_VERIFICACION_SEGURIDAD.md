# ✅ Checklist de Verificación Post-Implementación

## 🔍 Verificaciones Inmediatas Requeridas

### 1. Base de Datos (CRÍTICO) ⚠️

- [ ] Ejecutar script: `mysql -u root -p < database/setup_secure_database.sql`
- [ ] Verificar que el usuario `normateca_user` fue creado
- [ ] Probar conexión con nuevas credenciales
- [ ] Confirmar que la aplicación se conecta correctamente

```bash
# Verificar usuario creado:
mysql -u root -p -e "SELECT User, Host FROM mysql.user WHERE User='normateca_user';"

# Verificar permisos:
mysql -u root -p -e "SHOW GRANTS FOR 'normateca_user'@'localhost';"

# Probar conexión:
mysql -u normateca_user -p normateca -e "SHOW TABLES;"
```

---

### 2. Cache de Laravel (CRÍTICO) ⚠️

Limpiar todas las cachés antes de probar:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
```

---

### 3. Vistas - Formulario de Login (IMPORTANTE) ⚠️

**Ubicación:** `resources/views/login.blade.php`

Verificar que el formulario incluya:

```blade
<form method="POST" action="{{ route('login.post') }}">
    @csrf

    <input type="email" name="_id" required>
    <input type="password" name="password" required>

    <!-- Opcional: Remember Me -->
    <input type="checkbox" name="remember">

    <button type="submit">Iniciar Sesión</button>
</form>

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
```

**Cambios requeridos:**

- [ ] Formulario usa `POST` a `route('login.post')`
- [ ] Incluye `@csrf` token
- [ ] Campo de email se llama `_id`
- [ ] Campo de password se llama `password`
- [ ] Muestra errores con `session('error')`

---

### 4. Vistas - Botón de Logout (IMPORTANTE) ⚠️

**Ubicaciones:** Todas las vistas que tengan botón de cerrar sesión

El logout **DEBE** usar POST (no GET) para seguridad:

```blade
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Cerrar Sesión</button>
</form>
```

O con JavaScript:

```blade
<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Cerrar Sesión
</a>

<form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
    @csrf
</form>
```

**Vistas a revisar:**

- [ ] `resources/views/admin/landing.blade.php`
- [ ] `resources/views/usuario/landing.blade.php`
- [ ] Cualquier vista con menú de navegación
- [ ] Layout principal si existe

---

### 5. Formularios de Carga de Documentos (IMPORTANTE) ⚠️

**Ubicación:** `resources/views/documentos/create.blade.php` y similares

Verificar que los mensajes de error se muestren:

```blade
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif
```

**Cambios requeridos:**

- [ ] Muestra errores de validación de archivos
- [ ] Informa al usuario sobre tipos de archivo permitidos
- [ ] Formulario tiene `enctype="multipart/form-data"`

---

### 6. Testing de Autenticación (CRÍTICO) ⚠️

#### Prueba 1: Login Exitoso

- [ ] Ingresar con credenciales válidas de admin
- [ ] Verificar redirección a `/admin`
- [ ] Verificar acceso a funciones de admin

#### Prueba 2: Login Fallido

- [ ] Ingresar credenciales incorrectas 3 veces
- [ ] Verificar mensaje de error
- [ ] Continuar hasta 6to intento
- [ ] Verificar bloqueo temporal (rate limiting)
- [ ] Esperar mensaje "Demasiados intentos..."

#### Prueba 3: Rate Limiting

```
1er intento fallido: ✓ Mensaje de error
2do intento fallido: ✓ Mensaje de error
3er intento fallido: ✓ Mensaje de error
4to intento fallido: ✓ Mensaje de error
5to intento fallido: ✓ Mensaje de error
6to intento: ✗ BLOQUEADO - "Demasiados intentos..."
```

#### Prueba 4: Roles y Permisos

- [ ] Login como usuario estándar
- [ ] Intentar acceder a `/admin` directamente
- [ ] Verificar redirección a login con error
- [ ] Verificar que puede ver documentos
- [ ] Verificar que NO puede crear/editar/eliminar

#### Prueba 5: Logout

- [ ] Hacer login exitoso
- [ ] Click en botón de logout
- [ ] Verificar redirección a login
- [ ] Intentar volver atrás con navegador
- [ ] Verificar que pide login nuevamente

---

### 7. Testing de Carga de Archivos (CRÍTICO) ⚠️

#### Archivos Permitidos (deben funcionar):

- [ ] PDF (.pdf)
- [ ] Word (.doc, .docx)
- [ ] Excel (.xls, .xlsx)
- [ ] PowerPoint (.ppt, .pptx)
- [ ] Texto (.txt)
- [ ] Imágenes JPG (.jpg, .jpeg)
- [ ] Imágenes PNG (.png)

#### Archivos Bloqueados (deben ser rechazados):

- [ ] Ejecutables (.exe) - debe mostrar error
- [ ] Scripts (.bat, .cmd, .sh) - debe mostrar error
- [ ] PHP (.php) - debe mostrar error
- [ ] HTML (.html, .htm) - debe mostrar error
- [ ] JavaScript (.js) - debe mostrar error
- [ ] Java (.jar) - debe mostrar error

**Mensaje esperado:** "⚠️ Tipo de archivo no permitido..." o "⚠️ Extensión de archivo no permitida..."

---

### 8. Testing de Rutas Protegidas (CRÍTICO) ⚠️

#### Sin autenticación (navegador incógnito):

- [ ] `/admin` → Debe redirigir a `/login`
- [ ] `/usuario` → Debe redirigir a `/login`
- [ ] `/documentos/crear` → Debe redirigir a `/login`
- [ ] `/estructura` → Debe redirigir a `/login`
- [ ] `/formato` → Debe redirigir a `/login`

#### Como usuario estándar:

- [ ] `/usuario` → ✅ Permitido
- [ ] `/estructura` → ✅ Permitido
- [ ] `/formato` → ✅ Permitido
- [ ] `/documentos/archivo/{codigo}` → ✅ Permitido (ver)
- [ ] `/admin` → ❌ Bloqueado
- [ ] `/documentos/crear` → ❌ Bloqueado
- [ ] POST `/documentos` → ❌ Bloqueado
- [ ] PUT `/documentos/{codigo}` → ❌ Bloqueado
- [ ] DELETE `/documentos/{codigo}` → ❌ Bloqueado

#### Como administrador:

- [ ] Todas las rutas → ✅ Permitido

---

### 9. Verificación de Configuración (IMPORTANTE)

#### Archivo .env

```bash
# Verificar valores:
grep "APP_DEBUG" .env    # Debe ser false
grep "APP_ENV" .env      # Debe ser production
grep "DB_USERNAME" .env  # Debe ser normateca_user
grep "DB_PASSWORD" .env  # Debe tener contraseña
```

- [ ] APP_DEBUG=false
- [ ] APP_ENV=production (o local para desarrollo)
- [ ] DB_USERNAME=normateca_user
- [ ] DB_PASSWORD tiene valor (no vacío)

---

### 10. Logs y Monitoreo

#### Revisar logs de Laravel:

```bash
tail -f storage/logs/laravel.log
```

Durante pruebas, verificar:

- [ ] No hay errores críticos
- [ ] Autenticación funciona correctamente
- [ ] Rate limiting registra intentos
- [ ] Validaciones de archivo se registran

---

## 📝 Problemas Comunes y Soluciones

### Problema: "SQLSTATE[HY000] [1045] Access denied"

**Solución:**

1. Verificar que ejecutó el script de base de datos
2. Limpiar cache: `php artisan config:clear`
3. Verificar credenciales en .env

### Problema: "419 Page Expired" en formularios

**Solución:**

1. Verificar que todos los formularios tienen `@csrf`
2. Limpiar sesiones: `php artisan cache:clear`
3. Verificar configuración de sesión en config/session.php

### Problema: Rate limiting no funciona

**Solución:**

1. Verificar que cache está configurado
2. Probar con cache driver 'file' o 'redis'
3. Limpiar cache: `php artisan cache:clear`

### Problema: Redirect loop en login

**Solución:**

1. Verificar middleware en routes/web.php
2. Verificar que Authenticate.php redirecciona a 'login'
3. Limpiar rutas: `php artisan route:clear`

---

## 🎯 Checklist Final antes de Producción

- [ ] Todas las pruebas de autenticación pasan
- [ ] Todas las pruebas de autorización pasan
- [ ] Todas las pruebas de carga de archivos pasan
- [ ] Rate limiting funciona correctamente
- [ ] Base de datos usa usuario dedicado
- [ ] APP_DEBUG=false en producción
- [ ] Todas las dependencias actualizadas
- [ ] Sin vulnerabilidades críticas en npm audit
- [ ] Sin vulnerabilidades críticas en composer audit (excepto Laravel 9)
- [ ] Backup de base de datos realizado
- [ ] Documentación actualizada
- [ ] Equipo informado de cambios

---

## ⚠️ IMPORTANTE

**NO DESPLEGAR A PRODUCCIÓN** hasta que todos los items estén marcados como completados.

**REALIZAR BACKUP** de base de datos y archivos antes de implementar cambios.

**PROBAR EN AMBIENTE DE DESARROLLO** primero antes de producción.

---

Fecha de creación: 16 de diciembre de 2025
Actualizado por: GitHub Copilot
