<?php
class Database {
    private static $host = "localhost";         // Cambia si usas un host diferente
    private static $dbName = "bd_biblioteca";   // Nombre de la base de datos
    private static $username = "root";          // Usuario por defecto en XAMPP/Laragon
    private static $password = "";              // Deja vacío si no usas contraseña

    public static function connect() {
        try {
            $pdo = new PDO(
                "mysql:host=" . self::$host . ";dbname=" . self::$dbName . ";charset=utf8",
                self::$username,
                self::$password
            );

            // Configura errores como excepciones
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        } catch (PDOException $e) {
            die("❌ Error de conexión a la base de datos: " . $e->getMessage());
        }
    }
}
?>