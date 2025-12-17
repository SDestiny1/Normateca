# Script de Implementación de Correcciones de Seguridad
# Sistema Normateca - Diciembre 2025
# PowerShell Script

Write-Host "================================================" -ForegroundColor Cyan
Write-Host "🔒 IMPLEMENTACIÓN DE SEGURIDAD - NORMATECA" -ForegroundColor Cyan
Write-Host "================================================" -ForegroundColor Cyan
Write-Host ""

# 1. Verificar que estamos en el directorio correcto
Write-Host "[1/7] Verificando directorio..." -ForegroundColor Yellow
if (-not (Test-Path "artisan")) {
    Write-Host "Error: No se encuentra el archivo artisan. Ejecute este script desde la raíz del proyecto." -ForegroundColor Red
    exit 1
}
Write-Host "✓ Directorio correcto" -ForegroundColor Green
Write-Host ""

# 2. Backup de archivos importantes
Write-Host "[2/7] Creando backup de archivos críticos..." -ForegroundColor Yellow
$backupDir = "backups\$(Get-Date -Format 'yyyyMMdd_HHmmss')"
New-Item -ItemType Directory -Path $backupDir -Force | Out-Null
if (Test-Path ".env") {
    Copy-Item ".env" "$backupDir\.env.backup"
    Write-Host "✓ Backup creado en $backupDir" -ForegroundColor Green
} else {
    Write-Host "No se encontró .env" -ForegroundColor Yellow
}
Write-Host ""

# 3. Limpiar cachés de Laravel
Write-Host "[3/7] Limpiando cachés de Laravel..." -ForegroundColor Yellow
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
try {
    php artisan optimize:clear
} catch {
    Write-Host "optimize:clear no disponible" -ForegroundColor Yellow
}
Write-Host "✓ Cachés limpiados" -ForegroundColor Green
Write-Host ""

# 4. Actualizar dependencias
Write-Host "[4/7] ¿Desea actualizar dependencias de Composer? (y/n)" -ForegroundColor Yellow
$updateComposer = Read-Host
if ($updateComposer -eq "y") {
    composer install --no-dev --optimize-autoloader
    Write-Host "✓ Dependencias de Composer actualizadas" -ForegroundColor Green
} else {
    Write-Host "⊘ Actualización de Composer omitida" -ForegroundColor Yellow
}
Write-Host ""

# 5. Verificar archivo .env
Write-Host "[5/7] Verificando configuración de .env..." -ForegroundColor Yellow
if (Test-Path ".env") {
    $envContent = Get-Content ".env" -Raw
    
    if ($envContent -match "DB_USERNAME=root") {
        Write-Host "⚠ ADVERTENCIA: Aún se usa el usuario root en DB_USERNAME" -ForegroundColor Red
        Write-Host "Debe actualizar a: DB_USERNAME=normateca_user" -ForegroundColor Yellow
    } elseif ($envContent -match "DB_USERNAME=normateca_user") {
        Write-Host "✓ Usuario de base de datos configurado correctamente" -ForegroundColor Green
    }
    
    if ($envContent -match "APP_DEBUG=true") {
        Write-Host "⚠ ADVERTENCIA: APP_DEBUG=true (debe ser false en producción)" -ForegroundColor Red
    } elseif ($envContent -match "APP_DEBUG=false") {
        Write-Host "✓ APP_DEBUG configurado correctamente" -ForegroundColor Green
    }
}
Write-Host ""

# 6. Configurar base de datos
Write-Host "[6/7] ¿Desea ejecutar el script de configuración de base de datos? (y/n)" -ForegroundColor Yellow
Write-Host "Esto creará el usuario normateca_user con privilegios limitados." -ForegroundColor Cyan
$setupDb = Read-Host
if ($setupDb -eq "y") {
    Write-Host "Ejecutando script de base de datos..." -ForegroundColor Yellow
    Write-Host "Ingrese la contraseña de root de MySQL cuando se solicite." -ForegroundColor Cyan
    
    $mysqlPath = "mysql"
    # Intentar encontrar mysql en rutas comunes
    if (Test-Path "C:\Program Files\MySQL\MySQL Server 8.0\bin\mysql.exe") {
        $mysqlPath = "C:\Program Files\MySQL\MySQL Server 8.0\bin\mysql.exe"
    } elseif (Test-Path "C:\Program Files\MySQL\MySQL Server 5.7\bin\mysql.exe") {
        $mysqlPath = "C:\Program Files\MySQL\MySQL Server 5.7\bin\mysql.exe"
    }
    
    $username = Read-Host "Usuario de MySQL (default: root)"
    if ([string]::IsNullOrWhiteSpace($username)) {
        $username = "root"
    }
    
    & $mysqlPath -u $username -p < "database\setup_secure_database.sql"
    
    if ($LASTEXITCODE -eq 0) {
        Write-Host "✓ Base de datos configurada correctamente" -ForegroundColor Green
    } else {
        Write-Host "✗ Error al configurar la base de datos" -ForegroundColor Red
        Write-Host "Puede ejecutar manualmente: mysql -u root -p < database\setup_secure_database.sql" -ForegroundColor Yellow
    }
} else {
    Write-Host "⊘ Configuración de base de datos omitida" -ForegroundColor Yellow
    Write-Host "⚠ IMPORTANTE: Debe ejecutar database\setup_secure_database.sql manualmente" -ForegroundColor Red
}
Write-Host ""

# 7. Verificar permisos de directorios
Write-Host "[7/7] Verificando permisos de directorios..." -ForegroundColor Yellow
# En Windows, los permisos se manejan diferente, verificar que existan
if (Test-Path "storage") {
    Write-Host "✓ Directorio storage existe" -ForegroundColor Green
}
if (Test-Path "bootstrap\cache") {
    Write-Host "✓ Directorio bootstrap\cache existe" -ForegroundColor Green
}
Write-Host ""

# Resumen final
Write-Host "================================================" -ForegroundColor Cyan
Write-Host "✅ IMPLEMENTACIÓN COMPLETADA" -ForegroundColor Green
Write-Host "================================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "📋 PRÓXIMOS PASOS:" -ForegroundColor Cyan
Write-Host ""
Write-Host "1. Revisar el archivo: CHECKLIST_VERIFICACION_SEGURIDAD.md"
Write-Host "2. Probar login con credenciales existentes"
Write-Host "3. Verificar rate limiting (intentos fallidos)"
Write-Host "4. Probar carga de archivos (permitidos y bloqueados)"
Write-Host "5. Verificar acceso a rutas protegidas"
Write-Host ""
Write-Host "📄 DOCUMENTACIÓN:" -ForegroundColor Cyan
Write-Host "- REPORTE_CORRECIONES_SEGURIDAD.md - Informe completo"
Write-Host "- CHECKLIST_VERIFICACION_SEGURIDAD.md - Lista de verificación"
Write-Host ""
Write-Host "⚠ IMPORTANTE:" -ForegroundColor Yellow
Write-Host "- Probar en ambiente de desarrollo antes de producción"
Write-Host "- Realizar backup completo antes de desplegar"
Write-Host "- Revisar logs durante las pruebas"
Write-Host ""
Write-Host "================================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "Presione cualquier tecla para salir..."
$null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")
