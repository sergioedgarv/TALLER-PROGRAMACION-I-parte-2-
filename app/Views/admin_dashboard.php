<?php // app/Views/admin_dashboard.php ?>

<?= view('templates/header') ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<style>
  .admin-container {
    padding: 30px;
    max-width: 900px;
    margin: auto;
  }

  .admin-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }

  .admin-header h1 {
    font-size: 28px;
    color: #333;
  }

  .btn-create {
    background-color: #28a745;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 8px;
    text-decoration: none;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
  }

  th, td {
    padding: 12px;
    border-bottom: 1px solid #ccc;
    text-align: center;
  }

  th {
    background-color: #f2f2f2;
  }

  .action-icons a {
    margin: 0 5px;
    text-decoration: none;
    font-size: 18px;
  }

  .fa-edit { color: #ffc107; }
  .fa-trash { color: #dc3545; }
  .fa-eye { color: #17a2b8; }
</style>

<div class="admin-container">
  <div class="admin-header">
    <h1>Panel de Administración</h1>
    <a href="<?= base_url('admin/create') ?>" class="btn-create">
      <i class="fas fa-plus-circle"></i> Crear nuevo
    </a>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Rol</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuarios as $u): ?>
      <tr>
        <td><?= $u['id'] ?></td>
        <td><?= esc($u['nombre']) ?> <?= esc($u['apellido']) ?></td>
        <td><?= esc($u['email']) ?></td>
        <td><?= esc($u['rol']) ?></td>
        <td class="action-icons">
          <a href="<?= base_url('admin/view/'.$u['id']) ?>"><i class="fas fa-eye"></i></a>
          <a href="<?= base_url('admin/edit/'.$u['id']) ?>"><i class="fas fa-edit"></i></a>
          <a href="<?= base_url('admin/delete/'.$u['id']) ?>" onclick="return confirm('¿Estás seguro de eliminar este usuario?')"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?= view('templates/footer') ?>
