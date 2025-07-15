<?php
require_once 'models/Libro.php';

class LibroController {
    private $model;

    public function __construct() {
        $this->model = new Libro();
    }

    // ✅ Mostrar todos los libros
    public function index() {
        $libros = $this->model->getAll();
        require_once 'views/libros/index.php';
    }

    // ✅ Mostrar formulario para registrar nuevo libro
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'editorial' => $_POST['editorial'],
                'anio_publicacion' => $_POST['anio_publicacion'],
                'categoria' => $_POST['categoria']
            ];

            $this->model->create($data);

            echo "<script>
                Swal.fire('Éxito', 'Libro registrado correctamente', 'success')
                    .then(() => {
                        window.location.href = 'index.php?controller=libro&action=index';
                    });
            </script>";
        } else {
            require_once 'views/libros/create.php';
        }
    }

    // ✅ Editar libro
    public function edit() {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'editorial' => $_POST['editorial'],
                'anio_publicacion' => $_POST['anio_publicacion'],
                'categoria' => $_POST['categoria']
            ];

            $this->model->update($id, $data);

            echo "<script>
                Swal.fire('Actualizado', 'Libro actualizado correctamente', 'success')
                    .then(() => {
                        window.location.href = 'index.php?controller=libro&action=index';
                    });
            </script>";
        } else {
            $libro = $this->model->getById($id);
            require_once 'views/libros/edit.php';
        }
    }

    // ✅ Eliminar libro
    public function delete() {
        $id = $_GET['id'];
        $this->model->delete($id);

        echo "<script>
            Swal.fire('Eliminado', 'Libro eliminado correctamente', 'success')
                .then(() => {
                    window.location.href = 'index.php?controller=libro&action=index';
                });
        </script>";
    }
}
?>