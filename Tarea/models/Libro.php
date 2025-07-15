<?php
require_once 'config/database.php';

class Libro {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // ✅ Obtener todos los libros
    public function getAll() {
        $sql = "SELECT * FROM libros ORDER BY id DESC";
        return $this->db->query($sql);
    }

    // ✅ Obtener un libro por su ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM libros WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ✅ Registrar un nuevo libro
    public function create($data) {
        $sql = "INSERT INTO libros (titulo, autor, editorial, anio_publicacion, categoria)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['titulo'],
            $data['autor'],
            $data['editorial'],
            $data['anio_publicacion'],
            $data['categoria']
        ]);
    }

    // ✅ Actualizar un libro existente
    public function update($id, $data) {
        $sql = "UPDATE libros SET titulo = ?, autor = ?, editorial = ?, anio_publicacion = ?, categoria = ?
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['titulo'],
            $data['autor'],
            $data['editorial'],
            $data['anio_publicacion'],
            $data['categoria'],
            $id
        ]);
    }

    // ✅ Eliminar un libro
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM libros WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>