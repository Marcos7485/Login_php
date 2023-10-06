<?php


namespace core\controllers;

use core\classes\Database;
use core\classes\Functions;
use core\classes\EnviarEmail;
use core\classes\Users;

class Main
{
    // ===========================================
    public function index()
    {

        Functions::Layout([
            'layouts/html_header',
            'inicio',
            'layouts/html_footer',
        ]);
    }

    public function system_start()
    {
        Functions::Layout([
            'layouts/html_header',
            'system_start',
            'layouts/html_footer',
        ]);
    }

    public function new_user()
    {
        Functions::Layout([
            'layouts/html_header',
            'new_user',
            'layouts/html_footer',
        ]);
    }

    public function add_user()
    {
        // verifica se já existe sessao
        if (Functions::Userloged()) {
            $this->index();
            return;
        }

        // verifica se houve submissão de um formulario
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->index();
            return;
        }

        // verifica se senha 1 = senha 2
        if ($_POST['text_senha_1'] !== $_POST['text_senha_2']) {

            // as passwords são diferentes
            $_SESSION['erro'] = 'the passwords are not the same.';
            $this->new_user();
            return;
        }

        // verifica na base de dados se existe cliente com mesmo email
        $user = new Users();
        if ($user->verifyExist_Email($_POST['text_email'])) {
            $_SESSION['erro'] = 'The email is already used.';
            $this->new_user();
            return;
        }

        // inserir novo cliente na base de dados e devolver o purl.
        $email_cliente = strtolower(trim($_POST['text_email']));
        $purl = $user->register_user();

        // Envio do email para o cliente
        $email = new EnviarEmail();
        $resultado = $email->send_email_new_user($email_cliente, $purl);

        if ($resultado) {

            // apresenta o layout para informar o envio do email.
            Functions::Layout([
                'layouts/html_header',
                'register_successfully',
                'layouts/html_footer',
            ]);
            return;
        } else {
            echo 'Aconteceu um erro';
        }
    }

    public function email_confirm()
    {

        // verifica se já existe sessao
        if (Functions::Userloged()) {
            $this->index();
            return;
        }

        // verificar se existe na query string um purl
        if (!isset($_GET['purl'])) {
            $this->index();
            return;
        }

        $purl = $_GET['purl'];
        // verifica se o purl é válido
        if (strlen($purl) != 12) {
            $this->index();
            return;
        }

        $user = new Users();
        $resultado = $user->validar_email($purl);

        if ($resultado) {

            // apresenta o layout para informar que a conta foi validada com sucesso.
            Functions::Layout([
                'layouts/html_header',
                'account_activated',
                'layouts/html_footer',
            ]);
            return;
        } else {
            //redirecionar para a pagina inicial
            Functions::redirect();
        }
    }

    public function login()
    {


        //Verificar se ja existe um utilizador logado
        if (Functions::Userloged()) {
            Functions::redirect();
            return;
        }

        // apresentação do formulario login
        Functions::Layout([
            'layouts/html_header',
            'sign_in',
            'layouts/html_footer',
        ]);
    }
    //===========================================
    public function login_submit()
    {


        //Verificar se ja existe um utilizador logado
        if (Functions::Userloged()) {
            Functions::redirect();
            return;
        }

        // verifica se foi efetuado o post do formulario login
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            Functions::redirect('login');
            return;
        }

        // validar se os campos vieram corretamente
        if (
            !isset($_POST['text_usuario']) ||
            !isset($_POST['text_senha'])  ||
            !filter_var(trim($_POST['text_usuario']), FILTER_VALIDATE_EMAIL)
        ) {

            // erro de preenchimento do formulario
            $_SESSION['erro'] = 'Invalid Login';
            Functions::redirect('login');
            return;
        }

        // prepara os dados para o model
        $usuario = trim(strtolower($_POST['text_usuario']));
        $senha = trim($_POST['text_senha']);

        // carrega o model e verifica se login é
        $user = new Users();
        $resultado = $user->verify_login($usuario, $senha);

        // analisa o resultado
        if (is_bool($resultado)) {

            //login invalido
            $_SESSION['erro'] = 'Invalid login';

            Functions::redirect('login');
            return;
        } elseif ($resultado == 'validar') {
            $_SESSION['erro'] = 'Check your inbox E-mail for validate your account';

            Functions::redirect('login');
            return;
        } else {


            // login valido. Coloca os dados na sessao
            $_SESSION['client'] = $resultado->id;
            $_SESSION['user'] = $resultado->email;
            $_SESSION['user name'] = $resultado->name;

            Functions::redirect('user_panel');
        }
    }

    public function user_panel()
    {
        //Verificar se ja existe um utilizador logado
        if (!isset($_SESSION['client'])) {
            Functions::redirect('login');
            return;
        }

        $user = new Users();

        $created_at = $user->created_at($_SESSION['client']);

        $data = [
            'name' => $_SESSION['user name'],
            'email' => $_SESSION['user'],
            'date' => $created_at[0]->created_at
        ];

        // apresentação do formulario login
        Functions::Layout([
            'layouts/html_header',
            'user_panel',
            'layouts/html_footer',
        ], $data);
    }

    public function logout()
    {
        unset($_SESSION['client']);
        unset($_SESSION['user']);
        unset($_SESSION['user name']);

        Functions::redirect('system_start');
    }
}


/*
Funcionalidad:

- public function index() { ... }: Este método muestra la página de inicio de la aplicación. Utiliza la función Layout para cargar las vistas HTML correspondientes, incluyendo un encabezado y un pie de página.

- public function system_start() { ... }: Este método muestra una página relacionada con el inicio del sistema. Similar al método index, utiliza la función Layout para cargar las vistas HTML correspondientes.

- public function new_user() { ... }: Este método muestra una página para registrar un nuevo usuario en la aplicación. Utiliza la función Layout para cargar las vistas HTML correspondientes.

- public function add_user() { ... }: Este método maneja el proceso de registro de un nuevo usuario. Verifica las credenciales proporcionadas por el usuario, como el correo electrónico y la contraseña, y luego verifica si el correo electrónico ya está en uso en la base de datos. Si todo es válido, registra al nuevo usuario, envía un correo de confirmación y muestra un mensaje de registro exitoso.

- public function email_confirm() { ... }: Este método maneja la confirmación de correo electrónico por parte de un usuario. Verifica si el parámetro purl está presente en la URL y si es un purl válido. Luego, llama al método validar_email para activar la cuenta del usuario y muestra un mensaje de confirmación.

- public function login() { ... }: Este método muestra la página de inicio de sesión de usuario. Si el usuario ya está autenticado, lo redirige a la página principal.

- public function login_submit() { ... }: Este método maneja el proceso de inicio de sesión del usuario. Verifica las credenciales proporcionadas por el usuario y, si son válidas, inicia sesión en la aplicación y redirige al usuario al panel de usuario.

- public function user_panel() { ... }: Este método muestra el panel de usuario una vez que el usuario ha iniciado sesión correctamente. Muestra información sobre el usuario, como su nombre, correo electrónico y fecha de registro.

- public function logout() { ... }: Este método permite que el usuario cierre sesión en la aplicación, eliminando las variables de sesión y redirigiendo al usuario al inicio del sistema.

- Esta clase Main controla las acciones relacionadas con el registro de usuarios, la confirmación de correo electrónico, el inicio de sesión y el cierre de sesión en una aplicación web. Utiliza métodos y vistas para manejar estas funcionalidades y proporciona una estructura organizada para gestionar la lógica de la aplicación.


*/