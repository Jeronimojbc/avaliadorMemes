<?php

// /core/Database.php

class Database
{
    private static $instance = null;
    private $pdo;

    // Constructor privado para evitar la creación de instancias externas
    private function __construct()
    {
        $host = 'localhost'; // Cambia esto si tu base de datos está en otro host
        $dbname = 'meme_app'; // Nombre de la base de datos
        $user = 'root'; // Usuario de la base de datos
        $password = ''; // Contraseña de la base de datos

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        try {
            // Crear una instancia de PDO
            $this->pdo = new PDO($dsn, $user, $password);
            // Configurar el modo de errores para que lance excepciones
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Manejo de errores de conexión
            echo 'Conexión fallida: ' . $e->getMessage();
            exit; // Terminar el script si no se puede conectar a la base de datos
        }
    }

    // Método para obtener la instancia de PDO
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }

    // Evitar la clonación de la instancia
    private function __clone() {}
}

