<h2>Barrios</h2>

<a href="index.php?route=admin_entities/neighborhoods/create" class="btn btn-primary">Crear nuevo barrio</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Municipio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($neighborhoods as $neighborhood): ?>
            <tr>
                <td><?= htmlspecialchars($neighborhood['id']) ?></td>
                <td><?= htmlspecialchars($neighborhood['name']) ?></td>
                <td>
                    <?php
                        foreach ($municipalities as $municipality) {
                            if ($municipality['id'] == $neighborhood['municipality_id']) {
                                echo htmlspecialchars($municipality['name']);
                                break;
                            }
                        }
                    ?>
                </td>
                <td>
                    <a href="index.php?route=admin_entities/neighborhoods/edit&id=<?= $neighborhood['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="index.php?route=admin_entities/neighborhoods/delete&id=<?= $neighborhood['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este barrio?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
