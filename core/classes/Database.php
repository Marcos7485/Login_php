<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database{

    private $ligacao;

    // ============================================================
    private function ligar(){
        // ligar à base de dados
        $this->ligacao = new PDO(
            'mysql:'.
            'host='.MYSQL_SERVER.';'.
            'dbname='.MYSQL_DATABASE.';'.
            'charset='.MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );
        // debug
        $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // ============================================================
    private function desligar(){
        // desliga-se da base de dados
        $this->ligacao = null;
    }
    // ============================================================
    // CRUD
    // ============================================================
    public function select($sql, $parametros = null){
        
        $sql = trim($sql);
        
        // verifica se é uma instrução SELECT
        if(!preg_match("/^SELECT/i", $sql)){
            throw new Exception('Base de dados - Não é uma instrução SELECT.');

        }

        // executa função de pesquisa de SQL
        $this->ligar();

        $resultados = null;

        try{
            // comunica
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);     
            }
        } catch(PDOException $e){
            // caso exista erro
            return false;
        }

        // desliga
        $this->desligar();

        // devolve
        return $resultados;
        
    }
    
     // ============================================================
    public function insert($sql, $parametros = null){
        
        $sql = trim($sql);
        
        // verifica se é uma instrução insert
        if(!preg_match("/^INSERT/i", $sql)){
            throw new Exception('Base de dados - Não é uma instrução INSERT.');    
        }
    
        // liga
        $this->ligar();
    
        try{
            // comunica
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();    
            }
        } catch(PDOException $e){
            // caso exista erro
            return false;
        }
    
        // desliga
        $this->desligar();         
    }
    // ============================================================
    public function update($sql, $parametros = null){
        
        $sql = trim($sql);

        // verifica se é uma instrução update
        if(!preg_match("/^UPDATE/i", $sql)){
            throw new Exception('Base de dados - Não é uma instrução UPDATE.');    
        }
    
        // liga
        $this->ligar();
    
        try{
            // comunica
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();    
            }
        } catch(PDOException $e){
            // caso exista erro
            return false;
        }
    
        // desliga
        $this->desligar();         
    }
    // ============================================================
    public function delete($sql, $parametros = null){

        $sql = trim($sql);

        // verifica se é uma instrução DELETE
        if(!preg_match("/^DELETE/i", $sql)){
            throw new Exception('Base de dados - Não é uma instrução DELETE.');    
        }
    
        // liga
        $this->ligar();
    
        try{
            // comunica
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();    
            }
        } catch(PDOException $e){
            // caso exista erro
            return false;
        }
    
        // desliga
        $this->desligar();         
    }
    // GENÉRICA
    public function statement($sql, $parametros = null){

        $sql = trim($sql);

        // verifica se é uma instrução diferente das anteriores
        if(preg_match("/^(SELECT|INSERT|UPDATE|DELETE)/i", $sql)){
            throw new Exception('Base de dados - Instrução inválida.');    
        }
    
        // liga
        $this->ligar();
    
        try{
            // comunica
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();    
            }
        } catch(PDOException $e){
            // caso exista erro
            return false;
        }
    
        // desliga
        $this->desligar();         
    }
}


/* 
Funcionalidad:

- namespace core\classes;: Define un espacio de nombres para la clase Database. Esto ayuda a organizar y evitar conflictos de nombres con otras clases.

- use Exception; use PDO; use PDOException;: Importa las clases Exception, PDO y PDOException que serán utilizadas en la clase.

- class Database { ... }: Define la clase Database que encapsula la funcionalidad de acceso a la base de datos.

- private $ligacao;: Declara una propiedad privada llamada $ligacao que se utilizará para mantener la conexión a la base de datos.

- private function ligar() { ... }: Define un método privado llamado ligar() que se encarga de establecer una conexión a la base de datos MySQL. Utiliza la configuración definida en las constantes MYSQL_SERVER, MYSQL_DATABASE, MYSQL_CHARSET, MYSQL_USER y MYSQL_PASS.

- private function desligar() { ... }: Define un método privado llamado desligar() que se encarga de cerrar la conexión a la base de datos.

- Métodos CRUD (select, insert, update, delete): Estos métodos permiten realizar operaciones de consulta (SELECT), inserción (INSERT), actualización (UPDATE) y eliminación (DELETE) en la base de datos. Reciben una consulta SQL como parámetro y, opcionalmente, un conjunto de parámetros para la consulta preparada. Estos métodos se encargan de ejecutar la consulta y manejar posibles excepciones de base de datos.

- public function statement($sql, $parametros = null) { ... }: Este método es genérico y puede ejecutar consultas SQL diferentes de las operaciones CRUD anteriores. Verifica si la consulta no es una operación CRUD y luego ejecuta la consulta de manera similar a los otros métodos.

- Esta clase proporciona una interfaz para interactuar con una base de datos MySQL, incluyendo la ejecución de consultas SQL y operaciones CRUD. Los métodos select, insert, update y delete se utilizan para operaciones específicas, mientras que statement se utiliza para consultas SQL personalizadas. La clase maneja la conexión y desconexión de la base de datos de manera interna.
*/