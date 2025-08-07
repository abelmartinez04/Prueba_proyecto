<!-- views/super/admin_entities/provinces/index.php -->

<h1>Listado de Provincias</h1>

<a href="index.php?route=admin_entities/provinces/create" class="btn btn-primary">Agregar Nueva Provincia</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($provinces as $province): ?>
            <tr>
                <td><?= htmlspecialchars($province['id']) ?></td>
                <td><?= htmlspecialchars($province['nombre']) ?></td>
                <td>
                    <a href="index.php?route=admin_entities/provinces/edit&id=<?= $province['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="index.php?route=admin_entities/provinces/delete&id=<?= $province['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta provincia?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
