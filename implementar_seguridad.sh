#!/bin/bash
# Script de Implementación de Correcciones de Seguridad
# Sistema Normateca - Diciembre 2025

echo "================================================"
echo "🔒 IMPLEMENTACIÓN DE SEGURIDAD - NORMATECA"
echo "================================================"
echo ""

# Colores para output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Función para pausar
pause() {
    read -p "Presione Enter para continuar..."
}

# 1. Verificar que estamos en el directorio correcto
echo -e "${YELLOW}[1/7] Verificando directorio...${NC}"
if [ ! -f "artisan" ]; then
    echo -e "${RED}Error: No se encuentra el archivo artisan. Ejecute este script desde la raíz del proyecto.${NC}"
    exit 1
fi
echo -e "${GREEN}✓ Directorio correcto${NC}"
echo ""

# 2. Backup de archivos importantes
echo -e "${YELLOW}[2/7] Creando backup de archivos críticos...${NC}"
mkdir -p backups/$(date +%Y%m%d_%H%M%S)
cp .env backups/$(date +%Y%m%d_%H%M%S)/.env.backup 2>/dev/null || echo "No se encontró .env"
echo -e "${GREEN}✓ Backup creado en backups/$(date +%Y%m%d_%H%M%S)${NC}"
echo ""

# 3. Limpiar cachés de Laravel
echo -e "${YELLOW}[3/7] Limpiando cachés de Laravel...${NC}"
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear 2>/dev/null || echo "optimize:clear no disponible"
echo -e "${GREEN}✓ Cachés limpiados${NC}"
echo ""

# 4. Actualizar dependencias
echo -e "${YELLOW}[4/7] ¿Desea actualizar dependencias de Composer? (y/n)${NC}"
read -p "" update_composer
if [ "$update_composer" = "y" ]; then
    composer install --no-dev --optimize-autoloader
    echo -e "${GREEN}✓ Dependencias de Composer actualizadas${NC}"
else
    echo -e "${YELLOW}⊘ Actualización de Composer omitida${NC}"
fi
echo ""

# 5. Verificar archivo .env
echo -e "${YELLOW}[5/7] Verificando configuración de .env...${NC}"
if grep -q "DB_USERNAME=root" .env 2>/dev/null; then
    echo -e "${RED}⚠ ADVERTENCIA: Aún se usa el usuario root en DB_USERNAME${NC}"
    echo "Debe actualizar a: DB_USERNAME=normateca_user"
elif grep -q "DB_USERNAME=normateca_user" .env 2>/dev/null; then
    echo -e "${GREEN}✓ Usuario de base de datos configurado correctamente${NC}"
fi

if grep -q "APP_DEBUG=true" .env 2>/dev/null; then
    echo -e "${RED}⚠ ADVERTENCIA: APP_DEBUG=true (debe ser false en producción)${NC}"
elif grep -q "APP_DEBUG=false" .env 2>/dev/null; then
    echo -e "${GREEN}✓ APP_DEBUG configurado correctamente${NC}"
fi
echo ""

# 6. Configurar base de datos
echo -e "${YELLOW}[6/7] ¿Desea ejecutar el script de configuración de base de datos? (y/n)${NC}"
echo "Esto creará el usuario normateca_user con privilegios limitados."
read -p "" setup_db
if [ "$setup_db" = "y" ]; then
    echo "Ingrese la contraseña de root de MySQL:"
    mysql -u root -p < database/setup_secure_database.sql
    if [ $? -eq 0 ]; then
        echo -e "${GREEN}✓ Base de datos configurada correctamente${NC}"
    else
        echo -e "${RED}✗ Error al configurar la base de datos${NC}"
    fi
else
    echo -e "${YELLOW}⊘ Configuración de base de datos omitida${NC}"
    echo -e "${RED}⚠ IMPORTANTE: Debe ejecutar database/setup_secure_database.sql manualmente${NC}"
fi
echo ""

# 7. Verificar permisos de directorios
echo -e "${YELLOW}[7/7] Verificando permisos de directorios...${NC}"
chmod -R 755 storage bootstrap/cache 2>/dev/null
echo -e "${GREEN}✓ Permisos actualizados${NC}"
echo ""

# Resumen final
echo "================================================"
echo -e "${GREEN}✅ IMPLEMENTACIÓN COMPLETADA${NC}"
echo "================================================"
echo ""
echo "📋 PRÓXIMOS PASOS:"
echo ""
echo "1. Revisar el archivo: CHECKLIST_VERIFICACION_SEGURIDAD.md"
echo "2. Probar login con credenciales existentes"
echo "3. Verificar rate limiting (intentos fallidos)"
echo "4. Probar carga de archivos (permitidos y bloqueados)"
echo "5. Verificar acceso a rutas protegidas"
echo ""
echo "📄 DOCUMENTACIÓN:"
echo "- REPORTE_CORRECIONES_SEGURIDAD.md - Informe completo"
echo "- CHECKLIST_VERIFICACION_SEGURIDAD.md - Lista de verificación"
echo ""
echo -e "${YELLOW}⚠ IMPORTANTE:${NC}"
echo "- Probar en ambiente de desarrollo antes de producción"
echo "- Realizar backup completo antes de desplegar"
echo "- Revisar logs durante las pruebas"
echo ""
echo "================================================"
