<h2>Crear Etiqueta</h2>

<form action="index.php?route=admin_entities/labels/store" method="POST">
    <div class="form-group">
        <label for="name">Nombre de la Etiqueta</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="index.php?route=admin_entities/labels/index.php" class="btn btn-secondary">Cancelar</a>
</form>
