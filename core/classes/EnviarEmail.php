<?php 


namespace core\classes; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EnviarEmail{
    

    // ================================================
    public function send_email_new_user($email_cliente, $purl){


        // Envia um email para o novo cliente, para confirmar um email.
        
        // constroi o purl (link para validação do email)
        $link = BASE_URL.'?a=email_confirm&purl='.$purl;

        $mail = new PHPMailer(true);

        try {
            // opções do servidor
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = EMAIL_SMTP;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = EMAIL_FROM;                     //SMTP username
            $mail->Password   = EMAIL_PASS;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = EMAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet    = 'UTF-8';

            //Emisor e recetor
            $mail->setFrom(EMAIL_FROM, APP_NAME);
            $mail->addAddress($email_cliente);     //Add a recipient

            // assunto
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = APP_NAME . ' - ' . 'Confirmação de email.';
            // mensagem
            $html = '<p>Ooohh Come on!!! what the worst that could happen?!</p>';
            $html .= '<p>Confirm your email for activate your account ;).</p>';
            $html .= '<p><a href="'.$link.'">Confirmar seu e-mail</a></p>';
            $mail->Body = $html;

            $mail->send();
        
            return true;
        } catch (Exception $e) {
            return false;
        }
    }    
}

/*
Funcionalidad:

- namespace core\classes;: Define un espacio de nombres para la clase EnviarEmail. Esto ayuda a organizar y evitar conflictos de nombres con otras clases.

- use PHPMailer\PHPMailer\PHPMailer; use PHPMailer\PHPMailer\SMTP; use PHPMailer\PHPMailer\Exception;: Importa las clases necesarias de la biblioteca PHPMailer para enviar correos electrónicos.

- class EnviarEmail { ... }: Define la clase EnviarEmail que encapsula la funcionalidad de envío de correos electrónicos.

- public function send_email_new_user($email_cliente, $purl) { ... }: Este método se encarga de enviar un correo electrónico de confirmación a un nuevo usuario. Recibe dos parámetros: $email_cliente que es la dirección de correo electrónico del cliente y $purl que es una parte del enlace para la validación del correo electrónico.

- Se construye el enlace de confirmación $link concatenando la URL base del sitio con el parámetro $purl.

- Se crea una instancia de la clase PHPMailer para configurar y enviar el correo electrónico.

- Se configuran las opciones del servidor SMTP, incluyendo la dirección del servidor, autenticación, nombre de usuario, contraseña, seguridad y puerto.

- Se establece el emisor y el receptor del correo electrónico.

- Se configura el asunto y el cuerpo del correo electrónico en formato HTML. El cuerpo del correo contiene un mensaje de confirmación y un enlace para activar la cuenta del usuario.

- El correo electrónico se envía utilizando la función send() de PHPMailer.

- Si el correo se envía correctamente, la función devuelve true; de lo contrario, devuelve false.

- Esta clase EnviarEmail proporciona un método send_email_new_user() para enviar correos electrónicos de confirmación a nuevos usuarios. Utiliza la biblioteca PHPMailer para gestionar el envío de correos electrónicos de manera sencilla y segura. El método acepta la dirección de correo electrónico del destinatario y un parámetro para construir un enlace de confirmación.

*/