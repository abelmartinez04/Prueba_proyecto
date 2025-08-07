<!-- views/super/admin_entities/provinces/edit.php -->

<h1>Editar Provincia</h1>

<form action="index.php?route=admin_entities/provinces/update" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($province['id']) ?>">

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre de la Provincia:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="<?= htmlspecialchars($province['nombre']) ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="index.php?route=admin_entities/provinces/index" class="btn btn-secondary">Cancelar</a>
</form>
