<?php

session_start();

require_once('config.php');
require_once('vendor/autoload.php');
require_once('core/rotas.php');


/*
Funcionalidad:

- Inicia una sesión de PHP para mantener información entre diferentes solicitudes del usuario.

- Requiere el archivo 'config.php' para cargar configuraciones y variables de entorno.

- Requiere el archivo 'vendor/autoload.php' para cargar las dependencias del proyecto (por ejemplo, bibliotecas de terceros instaladas a través de Composer).

- Requiere el archivo 'core/rotas.php' para definir las rutas y controladores de la aplicación.
*/