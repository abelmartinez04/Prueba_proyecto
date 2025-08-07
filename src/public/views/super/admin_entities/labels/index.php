<h2>Etiquetas</h2>

<a href="index.php?route=admin_entities/labels/create" class="btn btn-primary">Crear nueva etiqueta</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($labels as $tag): ?>
            <tr>
                <td><?= htmlspecialchars($tag['id']) ?></td>
                <td><?= htmlspecialchars($tag['name']) ?></td>
                <td>
                    <a href="index.php?route=admin_entities/labels/edit&id=<?= $tag['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="index.php?route=admin_entities/labels/delete&id=<?= $tag['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta etiqueta?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
