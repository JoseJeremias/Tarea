<?php include 'views/layout.php'; ?>

<!-- Contenido principal -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Registrar Nuevo Libro</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-body">
                    <form action="index.php?controller=libro&action=create" method="POST">
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="autor">Autor</label>
                            <input type="text" name="autor" id="autor" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="editorial">Editorial</label>
                            <input type="text" name="editorial" id="editorial" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="anio_publicacion">Año de Publicación</label>
                            <input type="number" name="anio_publicacion" id="anio_publicacion" class="form-control" min="1000" max="<?= date('Y') ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="categoria">Categoría</label>
                            <select name="categoria" id="categoria" class="form-control" required>
                                <option value="">-- Selecciona una categoría --</option>
                                <option value="Novela">Novela</option>
                                <option value="Ciencia">Ciencia</option>
                                <option value="Infantil">Infantil</option>
                                <option value="Educativo">Educativo</option>
                                <option value="Historia">Historia</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                            <a href="index.php?controller=libro&action=index" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>