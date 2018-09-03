[![Build Status](https://travis-ci.org/Unicen-Tupar/bomberos.svg?branch=master)](https://travis-ci.org/Unicen-Tupar/bomberos)
[![codecov](https://codecov.io/gh/Unicen-Tupar/bomberos/branch/master/graph/badge.svg)](https://codecov.io/gh/Unicen-Tupar/bomberos)

Bomberos
================

Bomberos es un sistema open-source para la administración del cuartel de Bomberos Voluntarios de Trenque Lauquen desarrollado por alumnos de la Universidad Nacional del Centro de la Provincia de Buenos Aires para las cátedras Programación en Web I y II de la carrera Tecnicatura Universitaria en Programación y Administración de Redes.

## Objetivo

A través del sistema se provee control de acceso, y posibilidad de registrar los diferentes servicios que realizan los bomberos, asistencias, emergencias, puntuaciones, etc. De este modo, se generan informes internos de forma automática dentro de la plataforma.

## Despliegue

La aplicación se encuentra desplegada en la plataforma Cloud Heroku en la dirección http://bomberosvoluntarios.herokuapp.com.

## Instalación y uso

El sistema está desarrollado sobre el framework Laravel 5.5 usando Docker.

La arquitectura en Docker está separada en contenedores con las distintas partes del sistema:

* Aplicación (Intérprete PHP)
* Web Server (Nginx)
* Base de Datos (PostgreSQL)
* Gestor DB (Adminer)
* Test tool (Selenium)

Para correr la aplicación se necesita descargar Docker y completar los siguientes pasos:

Descarga del repositorio y setup inicial

```
git clone https://github.com/Unicen-Tupar/bomberos.git
cd bomberos
cp .env.docker .env
```

Inicialización de contenedores Docker

```
docker-compose up -d
```

Instalación de dependencias con Composer vía Docker

```
docker-compose exec app composer install
```

Migraciones

```
docker-compose exec app php artisan migrate --seed
```

## Desarrollo y Testing

Los cambios en el código se deben solicitar a través pull request y deberán ser revisados previo a su aceptación.

Todas las modificaciones deben pasar los test de unidad e integración. Se proveen dos herramientas para test: PHPUnit y Dusk, las cuales se ejecutan con los comandos:

Crear la base de datos
```
docker-compose run app php artisan db:create --env=testing
```

PHP Unit

```
docker-compose run --rm app php vendor/bin/phpunit
```

Dusk
```
docker-compose run --rm app php artisan dusk
```

## Contacto

Responsable del proyecto: Javier Dottori (jdottori (at) exa.unicen.edu.ar)
