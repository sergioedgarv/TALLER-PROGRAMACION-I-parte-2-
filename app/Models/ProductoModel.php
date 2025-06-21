<?php
namespace App\Models;
use CodeIgniter\Model;

class ProductoModel extends Model
{
    // Define la tabla asociada al modelo
    protected $table = 'producto';
    // Define la clave primaria de la tabla
    protected $primaryKey = 'id_producto';
    // Campos permitidos para inserción y actualización masiva
    protected $allowedFields = ['nombre', 'descripcion', 'precio', 'imagen', 'stock', 'id_faraon'];

    // Obtiene todos los productos con stock mayor a 0
    public function obtenerProductosStock()
    {
        return $this->where('stock >', 0)->findAll();
    }

    // Obtiene productos con stock mayor a 0 filtrados por categoría (id_faraon)
    public function obtenerPorCategoria($id_faraon)
    {
        return $this->where('stock >', 0)
                    ->where('id_faraon', $id_faraon)
                    ->findAll();
    }
}
