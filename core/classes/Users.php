<?php

namespace core\classes;

use Exception;

class Users
{
  public function verifyExist_Email($email)
  {


    // verifica se ja existe outra conta com o mesmo email
    // verifica na base de dados se existe cliente com mesmo email
    $bd = new Database();
    $parametros = [
      ':email' => strtolower(trim($email))
    ];
    $resultados = $bd->select("SELECT email FROM users WHERE email = :email", $parametros);


    // se o cliente já existe...
    if (count($resultados) != 0) {
      return true;
    } else {
      return false;
    }
  }

  public function register_user()
  {


    // registra o novo cliente na base de dados
    $bd = new Database();

    // cria um hash para o registro do cliente
    $purl = Functions::criarHash();

    // parametros
    $parametros = [
      ':name' => (trim($_POST['text_nome_completo'])),
      ':email' => strtolower(trim($_POST['text_email'])),
      ':password' => password_hash(trim($_POST['text_senha_1']), PASSWORD_DEFAULT),
      ':purl' => $purl,
      ':active' => 0
    ];
    $bd->insert("
        INSERT INTO users VALUES(
            0,
            :name,
            :email,
            :password,
            :purl,
            :active,
            NOW(),
            NULL,
            NULL
        )
    ", $parametros);
    // retorna o purl criado
    return $purl;
  }

  public function validar_email($purl)
  {

    // validar o email do cliente

    $bd = new Database();
    $parametros = [
      ':purl' => $purl
    ];
    $resultados = $bd->select("
        SELECT * FROM users 
        WHERE purl = :purl
      ", $parametros);

    // verifica se foi encontrado o clientes
    if (count($resultados) != 1) {
      return false;
    }
    // foi encontrado este cliente com o purl indicado
    $id_user = $resultados[0]->id;

    // atualizar os dados do cliente
    $parametros = [
      ':id' => $id_user,
    ];
    $bd->update("
        UPDATE users SET
        purl = NULL,
        active = 1,
        updated_at = NOW() 
        WHERE id = :id
      ", $parametros);

    return true;
  }

  public function verify_login($user, $password)
  {

    // verificar se o login é valido
    $parametros = [
      ':user' => $user,

    ];
    $bd = new Database();
    $resultados = $bd->select("
        SELECT * FROM users 
        WHERE email = :user 
        AND deleted_at IS NULL
      ", $parametros);


    if (count($resultados) != 1) {
      //não existe usuario
      return false;
    } elseif ($resultados[0]->active == 1) {

      // temos usuario. vamos ver a sua password
      $user = $resultados[0];

      // verificar a password
      if (!password_verify($password, $user->password)) {
        // password inválida
        return false;
      } else {
        //login valido
        return $user;
      }
    } else {
      // temos usuario. vamos ver a sua password
      $user = $resultados[0];

      if (!password_verify($password, $user->password)) {
        // password inválida

        return false;
      } else {
        return 'validar';
      }
    }
  }
  public function created_at($id){

    $bd = new Database();

    return $bd->select("SELECT created_at FROM users WHERE id = $id");
  }
}

/*
Funcionalidad:

- namespace core\classes;: Define un espacio de nombres para la clase Users. Esto ayuda a organizar y evitar conflictos de nombres con otras clases.

- use Exception;: Importa la clase Exception para manejar excepciones en la clase.

- class Users { ... }: Define la clase Users que encapsula las funcionalidades relacionadas con los usuarios en la aplicación.

- public function verifyExist_Email($email) { ... }: Este método verifica si ya existe una cuenta con la misma dirección de correo electrónico en la base de datos. Utiliza una instancia de la clase Database para ejecutar una consulta SQL que busca un correo electrónico específico en la tabla de usuarios. Si se encuentra un correo electrónico coincidente, se devuelve true, lo que indica que ya existe una cuenta con ese correo electrónico; de lo contrario, se devuelve false.

- public function register_user() { ... }: Este método se utiliza para registrar un nuevo usuario en la base de datos. Crea un hash único para el registro del usuario, luego prepara los parámetros necesarios para la inserción en la base de datos, como el nombre, correo electrónico, contraseña con hash, el hash único (purl), y establece el estado active en 0 (no activado). Luego, utiliza una instancia de la clase Database para ejecutar una consulta de inserción en la tabla de usuarios. Finalmente, devuelve el hash único (purl) creado.

- public function validar_email($purl) { ... }: Este método se utiliza para validar la dirección de correo electrónico de un usuario. Comprueba si existe un registro en la base de datos con un purl coincidente. Si se encuentra un registro, se actualiza el registro para establecer el purl como NULL y el estado active en 1 (activado).

- public function verify_login($user, $password) { ... }: Este método verifica las credenciales de inicio de sesión de un usuario. Comprueba si existe un usuario con la dirección de correo electrónico proporcionada y si la contraseña proporcionada coincide con la contraseña almacenada en la base de datos (mediante el uso de password_verify). Devuelve diferentes valores dependiendo de la situación: Si no se encuentra un usuario, devuelve false, si se encuentra un usuario y está activo, devuelve el objeto del usuario, si se encuentra un usuario pero no está activo (estado active en 0), devuelve 'validar', lo que indica que el usuario necesita validar su correo electrónico.

- public function created_at($id) { ... }: Este método obtiene la fecha de creación de un usuario a partir de su ID en la base de datos. Utiliza una instancia de la clase Database para ejecutar una consulta SQL que selecciona la fecha de creación del usuario específico.

- Esta clase Users proporciona métodos para verificar la existencia de un correo electrónico, registrar usuarios, validar direcciones de correo electrónico, verificar credenciales de inicio de sesión y obtener la fecha de creación de un usuario en una aplicación web. Estos métodos son utilizados para gestionar la autenticación y el registro de usuarios en la aplicación.

*/