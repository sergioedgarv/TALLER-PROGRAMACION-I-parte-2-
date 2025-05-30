<?php
namespace App\Models;
use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = ['nombre', 'descripcion', 'precio', 'imagen', 'activo'];

    public function obtenerProductosActivos()
    {
        return $this->where('activo', 1)->findAll();
    }
}
