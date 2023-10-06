# Documentación del Proyecto

Esta documentación proporciona una visión general de la estructura y funcionalidad del proyecto, detallando los archivos y clases clave utilizados en la aplicación. El proyecto está destinado a ser una aplicación web que permite a los usuarios registrarse, iniciar sesión y gestionar su perfil.

## Archivos Principales

### `config.php`

- **Funcionalidad:** Este archivo almacena variables globales, como claves y contraseñas privadas utilizadas en el proyecto. Es común en proyectos PHP tener un archivo de configuración centralizado para gestionar estas variables.

### `Estructura`

- **Funcionalidad:** El directorio core/ es una parte esencial de la estructura de directorios de este proyecto. Contiene varios subdirectorios y archivos clave que desempeñan un papel fundamental en el funcionamiento de la aplicación. Aquí está una descripción detallada de cada elemento:

core/classes/: En esta subcarpeta, se encuentran clases PHP que encapsulan la funcionalidad esencial de la aplicación. Estas clases proporcionan métodos y lógica de programación para diferentes aspectos de la aplicación, como la base de datos, el envío de correos electrónicos, funciones generales y la gestión de usuarios.

core/controllers/: Aquí, se almacenan controladores que manejan las diferentes acciones y solicitudes que los usuarios pueden realizar en la aplicación. El controlador principal (Main.php) es responsable de gestionar acciones como mostrar la página de inicio, el panel de usuario, el registro de usuarios y el inicio de sesión.

core/views/: Esta subcarpeta contiene las vistas HTML que definen la interfaz de usuario de la aplicación. Cada archivo de vista corresponde a una página o sección específica de la aplicación y se utiliza para mostrar información y contenido al usuario.

core/rotas.php: El archivo rotas.php desempeña un papel crucial en la gestión de las rutas y la asignación de solicitudes de URL a controladores y métodos específicos. Define las rutas disponibles en la aplicación y especifica cómo se deben manejar las solicitudes entrantes.

DATABASE/: Dentro de esta carpeta, se encuentra una copia de seguridad del banco de datos utilizado por la aplicación. Esta copia de seguridad puede ser esencial para la recuperación de datos en caso de fallos o pérdida de información.

assets/: Aquí se almacenan los archivos estáticos utilizados en la aplicación, como hojas de estilo (CSS) y archivos de JavaScript (JS). Estos archivos son responsables de dar formato y funcionalidad a la interfaz de usuario.

src/: La carpeta src/ contiene todos los archivos multimedia utilizados en la aplicación. Esto incluye imágenes, videos u otros recursos que se utilizan para enriquecer el contenido visual de la aplicación.

vendor/: Esta carpeta es específica de Composer, una herramienta de gestión de dependencias en PHP. Aquí se almacenan las bibliotecas y dependencias de terceros que se utilizan en el proyecto. Composer facilita la incorporación y actualización de bibliotecas externas en el proyecto.

### `index.php`

- **Funcionalidad:** Este archivo inicia una sesión de PHP para mantener información entre diferentes solicitudes del usuario. También requiere el archivo 'config.php' para cargar configuraciones y variables de entorno, y 'vendor/autoload.php' para cargar las dependencias del proyecto (bibliotecas de terceros instaladas a través de Composer). Además, requiere el archivo 'core/rotas.php' para definir las rutas y controladores de la aplicación.

## Rutas y Controladores

### `core/rotas.php`

- **Funcionalidad:** Este archivo define las rutas de la aplicación en un array llamado `$rotas`. Cada clave del array es el nombre de una ruta, y el valor asociado es una cadena que sigue el formato 'controlador@método'. Esto se utiliza para mapear una ruta a un controlador y un método específicos en el código. Además, establece una acción por defecto como 'inicio' y maneja la ejecución de las acciones en función de la URL proporcionada.

### Controladores en `core/controllers/`

- **Funcionalidad:** Los controladores, como `Main.php`, manejan diferentes acciones de la aplicación, como mostrar la página de inicio, el panel de usuario, el registro de usuarios y el inicio de sesión. Cada controlador define métodos para realizar estas acciones y utiliza la función `Layout` para cargar las vistas correspondientes.

## Clases de Utilidad

### `core/classes/Database.php`

- **Funcionalidad:** Esta clase encapsula la funcionalidad de acceso a la base de datos. Proporciona métodos para realizar operaciones CRUD (select, insert, update, delete) en la base de datos, así como un método genérico para ejecutar consultas SQL personalizadas. La clase maneja la conexión y desconexión de la base de datos de manera interna.

### `core/classes/EnviarEmail.php`

- **Funcionalidad:** Esta clase encapsula la funcionalidad de envío de correos electrónicos. Utiliza la biblioteca PHPMailer para enviar correos electrónicos, incluyendo mensajes de confirmación a nuevos usuarios. Proporciona métodos para enviar correos electrónicos con diferentes propósitos.

### `core/classes/Functions.php`

- **Funcionalidad:** Esta clase proporciona varias funciones útiles comunes en una aplicación web, incluyendo la gestión de vistas, verificación de inicio de sesión, redirección de URLs, cifrado y generación de cadenas aleatorias. Estas funciones pueden ser utilizadas en una aplicación PHP para realizar tareas comunes de manera más eficiente.

### `core/classes/Users.php`

- **Funcionalidad:** Esta clase encapsula funcionalidades relacionadas con los usuarios en la aplicación. Proporciona métodos para verificar la existencia de una dirección de correo electrónico en la base de datos, registrar nuevos usuarios, validar direcciones de correo electrónico, verificar credenciales de inicio de sesión y obtener información de usuarios.

## Vistas

### Vistas en `core/views/`

- **Funcionalidad:** Estas vistas representan las páginas HTML que se muestran al usuario. Cada vista está asociada a un controlador y contiene la interfaz de usuario correspondiente. Algunas vistas importantes incluyen `new_user.php` para el registro de usuarios, `sign_in.php` para el inicio de sesión y `user_panel.php` para mostrar la información del usuario.

### Vistas en `core/views/layouts/`

- **Funcionalidad:** Estas vistas representan diseños comunes utilizados en diferentes partes de la aplicación. Por ejemplo, `html_header.php` define la estructura básica de una página web con un encabezado y `html_footer.php` crea un pie de página que muestra información sobre el desarrollador.

## Archivos Estáticos

### Archivos en `public/assets/`

- **Funcionalidad:** Estos archivos contienen estilos (CSS) y scripts (JavaScript) utilizados en la aplicación. Incluyen `app.css` para estilos personalizados y bibliotecas como `bootstrap.min.css` y `bootstrap.min.js`.

## Multimedia

### Archivos en `src/`

- **Funcionalidad:** Estos archivos multimedia se utilizan en la aplicación para elementos como imágenes y videos.

## Conclusiones

Este proyecto PHP se ha estructurado de manera organizada, utilizando controladores, clases de utilidad y vistas para gestionar las diferentes funcionalidades de la aplicación, como el registro de usuarios, el inicio de sesión, la gestión de perfiles y el envío de correos electrónicos. Además, se han utilizado bibliotecas de terceros como PHPMailer y Bootstrap para mejorar la funcionalidad y el diseño de la aplicación. La documentación proporcionada aquí sirve como referencia para comprender la estructura y funcionalidad del proyecto.