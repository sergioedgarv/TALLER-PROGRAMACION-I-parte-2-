<?php
namespace App\Models;
use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = ['nombre', 'descripcion', 'precio', 'imagen', 'stock', 'id_faraon'];

    public function obtenerProductosStock()
    {
        return $this->where('stock >', 0)->findAll();
    }

    public function obtenerPorCategoria($id_faraon)
    {
        return $this->where('stock >', 0)
                    ->where('id_faraon', $id_faraon)
                    ->findAll();
    }
}
