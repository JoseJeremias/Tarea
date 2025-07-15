<?php include 'views/layout.php'; ?>

<!-- Contenido principal -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Listado de Libros</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <a href="index.php?controller=libro&action=create" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Registrar Nuevo Libro
            </a>

            <div class="card">
                <div class="card-body">
                    <table id="tablaLibros" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Editorial</th>
                                <th>Año</th>
                                <th>Categoría</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $libros->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['titulo']) ?></td>
                                    <td><?= htmlspecialchars($row['autor']) ?></td>
                                    <td><?= htmlspecialchars($row['editorial']) ?></td>
                                    <td><?= $row['anio_publicacion'] ?></td>
                                    <td><?= htmlspecialchars($row['categoria']) ?></td>
                                    <td>
                                        <a href="index.php?controller=libro&action=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <button onclick="confirmDelete(<?= $row['id'] ?>)" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Scripts para DataTables y SweetAlert2 -->
<script>
    $(document).ready(function () {
        $('#tablaLibros').DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json'
            }
        });
    });

    function confirmDelete(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción eliminará el libro permanentemente.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php?controller=libro&action=delete&id=' + id;
            }
        });
    }
</script>