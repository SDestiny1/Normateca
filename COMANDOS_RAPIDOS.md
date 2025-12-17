# 🚀 Guía Rápida de Comandos - Implementación de Seguridad

## 📦 Instalación y Actualización

### Ejecutar script de implementación automática (Windows)

```powershell
.\implementar_seguridad.ps1
```

### Ejecutar script de implementación automática (Linux/Mac)

```bash
chmod +x implementar_seguridad.sh
./implementar_seguridad.sh
```

---

## 🗄️ Base de Datos

### Crear usuario seguro de base de datos

```bash
# Desde línea de comandos MySQL como root:
mysql -u root -p < database/setup_secure_database.sql
```

### Verificar usuario creado

```bash
mysql -u root -p -e "SELECT User, Host FROM mysql.user WHERE User='normateca_user';"
```

### Verificar permisos del usuario

```bash
mysql -u root -p -e "SHOW GRANTS FOR 'normateca_user'@'localhost';"
```

### Probar conexión con nuevo usuario

```bash
mysql -u normateca_user -p
# Contraseña: N0rm4t3c@S3cur3P@ss2024!

# Dentro de MySQL:
USE normateca;
SHOW TABLES;
```

---

## 🧹 Limpiar Cachés de Laravel

### Limpiar todas las cachés

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
```

### Limpiar caché específica

```bash
# Solo configuración
php artisan config:clear

# Solo rutas
php artisan route:clear

# Solo vistas
php artisan view:clear

# Solo caché de aplicación
php artisan cache:clear
```

---

## 📦 Gestión de Dependencias

### Actualizar dependencias de Composer

```bash
composer update
```

### Instalar dependencias de producción

```bash
composer install --no-dev --optimize-autoloader
```

### Ver vulnerabilidades de Composer

```bash
composer audit
```

### Actualizar dependencias de NPM

```bash
npm update
```

### Auditar vulnerabilidades de NPM

```bash
npm audit
npm audit fix
npm audit fix --force  # Si hay breaking changes
```

---

## 🔍 Verificación y Testing

### Ver logs en tiempo real

```bash
# Windows PowerShell
Get-Content storage\logs\laravel.log -Wait -Tail 50

# Linux/Mac
tail -f storage/logs/laravel.log
```

### Verificar configuración actual

```bash
php artisan config:show
```

### Verificar rutas registradas

```bash
php artisan route:list
```

### Verificar rutas protegidas con auth

```bash
php artisan route:list --name=documentos
```

### Ver todas las rutas con middleware

```bash
php artisan route:list --columns=uri,name,middleware
```

---

## 🔐 Testing de Autenticación

### Probar rate limiting (desde terminal/Postman)

```bash
# Hacer 6 requests POST consecutivos con credenciales incorrectas
curl -X POST http://localhost/login \
  -d "_id=test@example.com&password=wrong" \
  -c cookies.txt -b cookies.txt
```

### Verificar sesión de usuario

```bash
# Dentro de tinker:
php artisan tinker

# Ver usuario autenticado:
Auth::user()

# Ver sesión actual:
session()->all()
```

---

## 🛠️ Comandos de Desarrollo

### Iniciar servidor de desarrollo

```bash
php artisan serve
```

### Iniciar servidor en puerto específico

```bash
php artisan serve --port=8080
```

### Ejecutar migraciones

```bash
php artisan migrate
```

### Rollback de migraciones

```bash
php artisan migrate:rollback
```

### Ver estado de migraciones

```bash
php artisan migrate:status
```

---

## 🔧 Comandos de Mantenimiento

### Modo de mantenimiento (activar)

```bash
php artisan down --message="Actualización de seguridad en progreso" --retry=60
```

### Modo de mantenimiento (desactivar)

```bash
php artisan up
```

### Generar nueva clave de aplicación

```bash
php artisan key:generate
```

### Optimizar para producción

```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 📊 Monitoreo y Logs

### Ver últimos 50 logs

```bash
tail -n 50 storage/logs/laravel.log
```

### Buscar errores en logs

```bash
# Linux/Mac:
grep -i "error" storage/logs/laravel.log

# Windows PowerShell:
Select-String -Path storage\logs\laravel.log -Pattern "error" -CaseSensitive
```

### Limpiar logs antiguos

```bash
# Linux/Mac:
> storage/logs/laravel.log

# Windows:
Clear-Content storage\logs\laravel.log
```

---

## 🗃️ Backup y Restore

### Backup de base de datos

```bash
mysqldump -u normateca_user -p normateca > backup_$(date +%Y%m%d_%H%M%S).sql
```

### Restore de base de datos

```bash
mysql -u normateca_user -p normateca < backup_20251216_120000.sql
```

### Backup de archivos importantes

```bash
# Linux/Mac:
tar -czf backup_files_$(date +%Y%m%d).tar.gz .env storage/ database/

# Windows PowerShell:
Compress-Archive -Path .env,storage,database -DestinationPath "backup_files_$(Get-Date -Format 'yyyyMMdd').zip"
```

---

## 🐛 Debugging

### Habilitar modo debug temporalmente

```bash
# Editar .env:
APP_DEBUG=true

# Limpiar caché:
php artisan config:clear
```

### Ejecutar en modo verbose

```bash
php artisan serve --verbose
```

### Ver información de errores

```bash
php artisan tinker

# Ejecutar código problemático:
App\Models\User::all()
```

---

## 🧪 Testing

### Ejecutar todos los tests

```bash
php artisan test
```

### Ejecutar test específico

```bash
php artisan test --filter=LoginTest
```

### Ejecutar tests con coverage

```bash
php artisan test --coverage
```

---

## 🔒 Seguridad

### Ver intentos de login fallidos (si está logging)

```bash
grep "login" storage/logs/laravel.log | grep "failed"
```

### Verificar permisos de archivos

```bash
# Linux/Mac:
ls -la storage/
ls -la bootstrap/cache/

# Windows PowerShell:
Get-Acl storage
Get-Acl bootstrap\cache
```

### Verificar configuración de seguridad

```bash
php artisan tinker

# Verificar configuración:
config('app.debug')  # Debe ser false en producción
config('database.connections.mysql.username')  # Debe ser normateca_user
```

---

## 📝 Git (Control de Versiones)

### Verificar cambios realizados

```bash
git status
git diff
```

### Ver archivos modificados

```bash
git diff --name-only
```

### Crear commit de cambios de seguridad

```bash
git add .
git commit -m "Implementar correcciones de seguridad críticas"
```

### Crear rama para cambios

```bash
git checkout -b security-fixes
git add .
git commit -m "Implementar correcciones de seguridad"
git push origin security-fixes
```

### Revertir cambios si hay problemas

```bash
# Ver commits recientes:
git log --oneline

# Revertir último commit:
git revert HEAD

# Revertir commit específico:
git revert <commit-hash>

# Deshacer cambios no commiteados:
git checkout -- .
```

---

## 🚨 Comandos de Emergencia

### Si el sitio no funciona después de cambios:

```bash
# 1. Restaurar .env desde backup
cp backups/20251216_120000/.env.backup .env

# 2. Limpiar todas las cachés
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# 3. Verificar permisos
chmod -R 755 storage bootstrap/cache  # Linux/Mac

# 4. Reiniciar servidor
php artisan serve --host=0.0.0.0 --port=8000

# 5. Ver logs en tiempo real
tail -f storage/logs/laravel.log
```

### Si hay problema con base de datos:

```bash
# Revertir a usuario root temporalmente
# Editar .env:
DB_USERNAME=root
DB_PASSWORD=

# Limpiar caché:
php artisan config:clear

# Probar conexión:
php artisan tinker
DB::connection()->getPdo()
```

---

## 📞 Soporte y Referencias

### Documentación generada:

- `REPORTE_CORRECIONES_SEGURIDAD.md` - Informe completo
- `CHECKLIST_VERIFICACION_SEGURIDAD.md` - Lista de verificación
- `database/setup_secure_database.sql` - Script de DB

### Laravel Docs:

- Autenticación: https://laravel.com/docs/9.x/authentication
- Autorización: https://laravel.com/docs/9.x/authorization
- Rate Limiting: https://laravel.com/docs/9.x/routing#rate-limiting

---

**Última actualización:** 16 de diciembre de 2025  
**Versión del sistema:** Laravel 9.x  
**Responsable:** GitHub Copilot
