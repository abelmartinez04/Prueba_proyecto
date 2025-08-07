<!-- views/super/admin_entities/provinces/create.php -->

<h1>Agregar Nueva Provincia</h1>

<form action="index.php?route=admin_entities/provinces/store" method="POST">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre de la Provincia:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="index.php?route=admin_entities/provinces/index" class="btn btn-secondary">Cancelar</a>
</form>
