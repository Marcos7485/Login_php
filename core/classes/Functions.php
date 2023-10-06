<?php

namespace core\classes;

use Exception;

class Functions
{

    public static function Layout($estruturas, $dados = null)
    {

        if (!is_array($estruturas)) {
            throw new Exception("Invalid structure information");
        }
        // variáveis
        if (!empty($dados) && is_array($dados)) {
            extract($dados);
        }
        foreach ($estruturas as $estrutura) {
            include("core/views/$estrutura.php");
        }
    }

    public static function Userloged()
    {
        //verifica se existe um cliente com sessao
        return isset($_SESSION['cliente']);
    }

    //======================================
    public static function redirect($rota = '', $admin = false)
    {

        // faz o redirecionamento para a URL desejada (rota)
        if (!$admin) {
            header("Location: " . BASE_URL . "?a=$rota");
        } else {
            header("Location: " . BASE_URL . "/admin?a=$rota");
        }
    }

    //======================================
    public static function aesEncriptar($valor)
    {
        return bin2hex(openssl_encrypt($valor, 'aes-256-cbc', AES_KEY, OPENSSL_RAW_DATA, AES_IV));
    }

    //======================================
    public static function aesDesencriptar($valor)
    {
        return openssl_decrypt(hex2bin($valor), 'aes-256-cbc', AES_KEY, OPENSSL_RAW_DATA, AES_IV);
    }


    public static function criarHash($num_caracteres = 12)
    {

        //criar bases
        $chars = '01234567890123456789abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($chars), 0,  $num_caracteres);
    }
}


/*
Funcionalidad:

- public static function Layout($estruturas, $dados = null) { ... }: Este método se utiliza para cargar estructuras de vista en una aplicación web. Recibe un array de nombres de estructuras (archivos de vista) y un conjunto de datos opcionales. Las estructuras se incluyen utilizando include(). Si se proporcionan datos, se extraen para hacer que estén disponibles como variables en las vistas.

- public static function Userloged() { ... }: Este método verifica si un cliente ha iniciado sesión. Comprueba si existe una variable de sesión llamada 'cliente' y devuelve true si existe, lo que indica que el usuario está logeado.

- public static function redirect($rota = '', $admin = false) { ... }: Este método redirige al usuario a una URL específica. Puede redirigir al usuario a la URL base o a la URL de administrador, dependiendo del valor del parámetro $admin. Utiliza la función header() de PHP para realizar el redireccionamiento.

- public static function aesEncriptar($valor) { ... }: Este método utiliza cifrado AES para encriptar un valor y luego lo convierte en una cadena hexadecimal. Se utiliza para cifrar datos sensibles.

- public static function aesDesencriptar($valor) { ... }: Este método desencripta un valor previamente cifrado utilizando el cifrado AES y devuelve el valor original.

- public static function criarHash($num_caracteres = 12) { ... }: Este método genera una cadena de caracteres aleatoria de la longitud especificada. Se utiliza para crear hashes o identificadores únicos.

- La clase Functions proporciona varias funciones útiles comunes en una aplicación web, incluyendo la gestión de vistas, verificación de inicio de sesión, redirección de URLs, cifrado y generación de cadenas aleatorias. Estas funciones pueden ser utilizadas en una aplicación PHP para realizar tareas comunes de manera más eficiente.

*/