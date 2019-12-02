<?php

// Rosa Mª Domínguez Barrientos
// Desarrollo Web en Entorno Servidor
// curso 2019/20

require_once "Database.php";
require_once "clases/Usuario.php";

class Sesion
{
    private $usuario;
    private $time_expire = 3000; // segundos
    private static $instancia = null;

    private function __construct()
    {}

    private function __clone()
    {}

  
    public function getUsuario()
    {
        return $this->usuario;
    }


    //función para que refresque el usuario al hacer un cambio en el 

    public function updateUsuario(Usuario $usu)
    {
        $this->usuario->setFoto($usu);
    }

    //creamos la instancia de la sesión

    public static function getInstance()
    {
        session_start();

        // comprobamos
        if (isset($_SESSION["_sesion"])):
            //aki deserializamos el objeto que previamente ha sido serializado
            self::$instancia = unserialize($_SESSION["_sesion"]);
        else:
            if (self::$instancia === null) {
                self::$instancia = new Sesion();
            }

        endif;

        // devolvemos la instancia
        return self::$instancia;
    }

    //funcion login a la que pasamos el mail y la contraseña, si esto son correctos la sesión sera iniciada

    public function login(string $ema, string $pas): bool
    {
        // instanciar la clase Database
        $db = Database::getInstance("root", "root", "box");
        //echo ("conecta con base de datos");

        //PDO
        // buscamos el usuario por su mail y contraseña

        $sql = "SELECT * FROM usuario WHERE email=? AND contrasena=MD5(?) ; "; //pdo
        $params = [$ema, $pas];

        if ($db->query($sql, $params)):

            echo ("buenooooooo");
            // nos quedamos con la información del usuario
            $this->usuario = $db->getObject("Usuario");

            // si el usuario es correcto, iniciamos la sesión y guardamos el momento (segs.) en que se inicia
            // la sesión
            $_SESSION["time"] = time();
            $_SESSION["_sesion"] = serialize(self::$instancia);

            // la sesión se ha iniciado
            return true;

        endif;

        // la sesión no se ha iniciado
        return false;
    }

    //función que controla el tiempo en el que expira la sesión

    public function isExpired(): bool
    {
        return (time() - $_SESSION["time"] > $this->time_expire);
    }

    
    public function isLogged(): bool
    {
        return !empty($_SESSION);
    }

    //compruebas si estas logueado y si hay sesión activa
    public function checkActiveSession(): bool
    {
        if ($this->isLogged()) {
            if (!$this->isExpired()) {
                return true;
            }
        }

        return false;
    }

    //función que redirecciona a una página concreta que le indiques
    public function redirect(string $url)
    {
        header("Location: $url");
        die();
    }


    public function __sleep()
    {
        return ["usuario", "instancia"];
    }

    //cerramos la sesión

    public function close()
    {
        // vaciamos las variables de sesión
        $_SESSION = [];

        // destruir la sesión
        session_destroy();
    }

}
