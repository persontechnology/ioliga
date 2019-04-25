<p align="center">
	<a href="https://soysoftware.com/">
		<img src="https://soysoftware.com/img/acerca/acerca.png">
	</a>
</p>

## Acerca de IOLIGA

IOLIGA, es un sistema web para las liga deportivas ecuatorianas: este sistema utiliza herramientas de de tecnología robusta para brindar los mejores resultados a nuestros clientes.

IOLIGA, es accesible, potente y proporciona los módulos necesarias para gestión y control en una liga deportiva.

## Acerca de nosotros

IOLIGA, es desarrollado por el equipo de [SOYSOFWARE](https://soysoftware.com/) Empresa desarrolladora de software

## Paquetes utilizados

IOLIGA, hace uso de algunos paquetes robustos y populares más utilizados por los bagabungos de la web laravel.

- **[Laravel Datatable](http://yajrabox.com/docs/laravel-datatables/master)**
- **[laravel-permission](https://github.com/spatie/laravel-permission)**
- **[laravel-breadcrumbs](https://github.com/davejamesmiller/laravel-breadcrumbs)**
- **[ec-laravel-validator](https://github.com/tavo1987/ec-laravel-validator)**
- **[laravel-snappy](https://github.com/barryvdh/laravel-snappy)**
- **[Laravel-Excel](https://github.com/Maatwebsite/Laravel-Excel)**
- **[spanish](https://github.com/Laraveles/spanish)**
- [Limitless - responsive web application kit](http://demo.interface.club/limitless/)
## Instalación
- Instalar xammp última versión (https://www.apachefriends.org/es/index.html)
- Instalar composer última versión (https://getcomposer.org/)
- Instalar git última versión (https://git-scm.com/)
- Clonar proyecto en cualquier ubicación (https://github.com/soy-software/ioliga.git)
- Crear una cuenta en github (https://github.com)
- Crear una cuenta en SOYSOFTWARE (http://soysoftware.com/)

Pasos para clonar y correr proyecto ioliga.

Abra la una consola de terminal y ejecute

1. git clone https://github.com/soy-software/ioliga.git
2. cd ioliga
3. php artisan composer install
4. php artisan composer update
5. php artisan cp env.example env
6. php artisan key:generate
7. php artisan storage:link
8. php artisan migrate:fresh
9. php artisan serve

Abre el siguente link (http://localhost:8000/) y disfruta del sistema IOLIGA.

Email: info@soysoftware.com

Contraseña : 12345678

Antes de ejecutar el paso 8, debes crear un usuario y una base de datos en mysql y completar las credenciales de configuración en el archivo env, en la parte de conexión de base de datos.
Es recomendable que completes otras configuraciones, como las credenciales de email.

## Contribuyendo

¡Gracias por considerar contribuir al IOLIGA! La guía de contribución se puede encontrar en la [Documentación de IOLIGA](#).

## Vulnerabilidades de seguridad

Si descubre una vulnerabilidad de seguridad dentro de IOLIGA, envíe un correo electrónico a SOYSOFTWARE via [info@soysoftware.com](mailto:info@soysoftware.com). Todas las vulnerabilidades de seguridad serán tratadas con prontitud.

## Licensia

IOLIGA es un software de código abierto con licencia de la [LICENCIA MIT](https://opensource.org/licenses/MIT).
