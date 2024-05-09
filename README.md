<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre esta modificacion de readme

- Esta actualizacion de readme fue realizada mediante un branch llamado `feature/modificacion_de_readme`, tratado como feature para mostrar el manejo de [GitFlow]

## Installation

1. Crear una base de datos llamada `gux`.
2. Ejecutar `composer install` para instalar las dependencias de PHP.
3. Ejecutar `npm install` o `yarn install` según corresponda para instalar las dependencias de Node.js.
4. Ejecutar las migraciones para crear las tablas de la base de datos con el comando `php artisan migrate`.
5. Ejecutar los seeders para poblar la base de datos con datos de prueba utilizando el comando `php artisan db:seed`.
6. En caso de que no se ejecute el seeder por algun tipo de configuracion, prueba utilizando el comando `php artisan db:seed --class=CountriesTableSeeder`.

## Endpoints de Prueba

### En la rama main:

- Crear usuario:
  - Método: POST
  - Endpoint: `https://gux:8890/api/register`
  - Parámetros del formulario: `name`, `email`, `password`, `password_confirmation`

- Iniciar sesión y obtener token JWT:
  - Método: POST
  - Endpoint: `https://gux:8890/api/login`
  - Parámetros del formulario: `email`, `password`

- Obtener los amiibo:
  - Método: GET
  - Endpoint: `https://gux:8890/api/amiibo/list`
  - Encabezado de Autorización: `Bearer [TOKEN_JWT_OBTENIDO_EN_LOGIN]`

- Obtener los usuarios:
  - Método: GET
  - Endpoint: `https://gux:8890/api/users/list`
  - Encabezado de Autorización: `Bearer [TOKEN_JWT_OBTENIDO_EN_LOGIN]`

### En la rama feature/optimizacion_de_consultas:
- En esta rama contamos con algunos endpoints y configuraciones adicionales

- Crear usuario:
  - Método: POST
  - Endpoint: `https://gux:8890/api/register`
  - Parámetros del formulario: `name`, `email`, `password`, `password_confirmation`, `country` 
  - en el parametro country, colocar un numero, de lo contrario, la validacion fallara 

- Iniciar sesión y obtener token JWT:
  - Método: POST
  - Endpoint: `https://gux:8890/api/login`
  - Parámetros del formulario: `email`, `password`

- Obtener los amiibo:
  - Método: GET
  - Endpoint: `https://gux:8890/api/amiibo/list`
  - Encabezado de Autorización: `Bearer [TOKEN_JWT_OBTENIDO_EN_LOGIN]`

- Obtener los usuarios:
  - Método: GET
  - Endpoint: `https://gux:8890/api/users/list`
  - Encabezado de Autorización: `Bearer [TOKEN_JWT_OBTENIDO_EN_LOGIN]`
  
- Obtener los paises:
  - Método: GET
  - Endpoint: `https://gux:8890/api/countries/list`
  - Encabezado de Autorización: `Bearer [TOKEN_JWT_OBTENIDO_EN_LOGIN]`
