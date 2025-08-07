<h2>Editar Municipio</h2>

<form action="index.php?route=admin_entities/municipalities/update" method="POST">
    <input type="hidden" name="id" value="<?= $municipality['id'] ?>">

    <div class="form-group">
        <label for="name">Nombre del Municipio</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($municipality['name']) ?>" required>
    </div>

    <div class="form-group">
        <label for="province_id">Provincia</label>
        <select name="province_id" id="province_id" class="form-control" required>
            <?php foreach ($provinces as $province): ?>
                <option value="<?= $province['id'] ?>" <?= $province['id'] == $municipality['province_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($province['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="index.php?route=admin_entities/municipalities/index.php" class="btn btn-secondary">Cancelar</a>
</form>
