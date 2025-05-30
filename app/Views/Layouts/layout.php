<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->include('templates/head') ?>
</head>
<body>
    <?= $this->include('templates/header') ?>
    
    <?= $this->renderSection('content') ?>
    
    <?= $this->include('templates/footer') ?>
</body>
</html>
