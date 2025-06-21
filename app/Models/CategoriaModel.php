<?php
namespace App\Models;
use CodeIgniter\Model;

class CategoriaModel extends Model
{
    // Define la tabla asociada al modelo
    protected $table = 'categoria';
    // Define la clave primaria de la tabla
    protected $primaryKey = 'id_categoria';
    // Campos permitidos para inserción y actualización masiva
    protected $allowedFields = ['nombre'];
}
