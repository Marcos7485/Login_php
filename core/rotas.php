<?php

// coleção de rotas
$rotas=[
    'inicio' => 'main@index',
    'system_start' => 'main@system_start',
    'new_user' => 'main@new_user',
    'add_user' => 'main@add_user',
    'email_confirm' => 'main@email_confirm',
    'login' => 'main@login',
    'login_submit' => 'main@login_submit',
    'user_panel' => 'main@user_panel',
    'logout' => 'main@logout'
];

// define ação por defeito

$acao = 'inicio';

// verifica se existe a ação na query string
if(isset($_GET['a'])){

    // verifica se a ação existe nas rotas
    if(!key_exists($_GET['a'], $rotas)){
        $acao = 'inicio';
    } else{
        $acao = $_GET['a'];
    }
}

// trata a definição da rota
$partes = explode('@',$rotas[$acao]);

$controlador = 'core\\controllers\\'.ucfirst($partes[0]);
$metodo = $partes[1];
$ctr = new $controlador();
$ctr->$metodo();

/*
Funcionalidad:

- Se define un array llamado $rotas que contiene las rutas de la aplicación. Cada clave del array es el nombre de una ruta, y el valor asociado es una cadena que sigue el formato 'controlador@método'. Esto se utiliza para mapear una ruta a un controlador y un método específicos en el código.

- Se define la acción por defecto como 'inicio'. Esto significa que si no se proporciona una acción específica en la query string de la URL, la aplicación ejecutará la acción asociada a 'inicio'.

- Se verifica si se ha proporcionado una acción en la query string ($_GET['a']) utilizando isset(). Si se proporciona una acción en la query string, se verifica si esa acción existe en el array $rotas. Si la acción no existe en las rutas definidas, se usa la acción por defecto 'inicio'.

- Se divide la definición de la ruta en dos partes utilizando explode('@', $rotas[$acao]). La primera parte es el nombre del controlador y la segunda parte es el nombre del método que se ejecutará en ese controlador.

- Se construye el nombre completo del controlador prefiéndolo con el espacio de nombres ('core\\controllers\\') y convirtiéndolo en mayúsculas (ucfirst($partes[0])). Esto crea el nombre completo de la clase controladora.

- Se crea una instancia del controlador utilizando new $controlador(). Esto crea un objeto controlador que se utilizará para ejecutar el método correspondiente.

- Finalmente, se llama al método correspondiente en el controlador utilizando $ctr->$metodo(). Esto ejecutará la acción especificada en la ruta y procesará la solicitud.

- Este código PHP se utiliza para enrutar las solicitudes web a controladores y métodos específicos en una aplicación web. Las rutas y acciones se definen en el array $rotas, y el código maneja la ejecución de la acción correcta en función de la URL proporcionada.

*/