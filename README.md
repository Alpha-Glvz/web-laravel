# Sistema de Inventario de TI

Sistema desarrollado en **Laravel** para el control y administración del inventario tecnológico de la empresa, cubriendo tanto **hardware** como **software**, con seguimiento detallado y automatizado de todo el ciclo de vida de los activos.

## 📋 Descripción

Este sistema centraliza el control del inventario de TI, permitiendo llevar un registro exhaustivo de equipos y licencias, así como automatizar los procesos de entrega, devolución y activación asociados a cada usuario y máquina.

## 🎯 Objetivo

Contar con una herramienta que permita:

- Mantener un inventario completo y actualizado de **hardware** (equipos de cómputo, periféricos, accesorios, etc.).
- Mantener un inventario completo de **software** (licencias, versiones, claves de activación).
- Automatizar el registro de **entrada y salida de equipos** (préstamos, asignaciones, devoluciones).
- Automatizar el control de **activaciones de licencias** por máquina y por usuario, evitando duplicidad o uso no autorizado.
- Tener trazabilidad histórica de cada activo: quién lo tiene, desde cuándo, y su estado actual.

## ✨ Funcionalidades principales *(planeadas)*

### Inventario de Hardware
- [ ] Registro de equipos (marca, modelo, número de serie, especificaciones)
- [ ] Estado del equipo (disponible, asignado, en reparación, de baja)
- [ ] Historial de asignaciones por equipo
- [ ] Generación de vale de préstamo / resguardo al asignar un equipo
- [ ] Alertas de mantenimiento o garantía próxima a vencer

### Inventario de Software
- [ ] Catálogo de software y licencias disponibles
- [ ] Registro de activaciones por máquina y por usuario
- [ ] Control de vigencia de licencias (perpetuas, suscripción, por renovar)
- [ ] Alertas de licencias próximas a vencer o sin uso
- [ ] Relación software–equipo–usuario para trazabilidad completa

### Automatización
- [ ] Flujo de entrega/recepción de equipo con firma o confirmación digital
- [ ] Notificaciones automáticas ante cambios de estado (asignación, devolución, vencimiento)
- [ ] Reportes automáticos de inventario (por usuario, por área, por tipo de activo)

### Usuarios y permisos
- [ ] Roles diferenciados (administrador TI, consulta, etc.)
- [ ] Historial de acciones por usuario del sistema

## 🛠️ Stack tecnológico

- **Backend:** Laravel
- **Base de datos:** *por definir*
- **Frontend:** *por definir*

> Este README se actualizará conforme se defina el resto del stack y avance el desarrollo.

## 🚀 Instalación

```bash
# Clonar el repositorio
git clone git@github.com:usuario/web-laravel.git
cd web-laravel

# Instalar dependencias
composer install

# Configurar entorno
cp .env.example .env
php artisan key:generate

# Configurar la base de datos en el archivo .env

# Ejecutar migraciones
php artisan migrate

# Levantar servidor de desarrollo
php artisan serve
```

## 📁 Estructura del proyecto

Proyecto basado en la estructura estándar de Laravel.

## 📌 Estado del proyecto

🚧 **En planeación inicial** — este documento describe el alcance funcional del sistema; el desarrollo se encuentra en etapas tempranas.

## 📄 Licencia

*Por definir.*