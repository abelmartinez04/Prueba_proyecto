<h2>Municipios</h2>

<a href="index.php?route=admin_entities/municipalities/create" class="btn btn-primary">Crear nuevo municipio</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Provincia</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($municipalities as $municipality): ?>
            <tr>
                <td><?= htmlspecialchars($municipality['id']) ?></td>
                <td><?= htmlspecialchars($municipality['name']) ?></td>
                <td>
                    <?php
                        foreach ($provinces as $province) {
                            if ($province['id'] == $municipality['province_id']) {
                                echo htmlspecialchars($province['name']);
                                break;
                            }
                        }
                    ?>
                </td>
                <td>
                    <a href="index.php?route=admin_entities/municipalities/edit&id=<?= $municipality['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="index.php?route=admin_entities/municipalities/delete&id=<?= $municipality['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este municipio?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
