<?php
namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\CategoriaModel;

class AdminController extends BaseController
{
    public function index()
    {
        $productoModel = new ProductoModel();
        // Idealmente usar método que traiga nombre de categoría con join si quieres
        $productos = $productoModel->findAll();

        return view('admin/dashboard', ['productos' => $productos]);
    }

    public function crear()
    {
        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->findAll();

        return view('admin/crear', ['categorias' => $categorias]);
    }

    public function guardar()
    {
        // Validación básica (podés ampliar reglas)
        if (!$this->validate([
            'nombre'    => 'required|min_length[3]',
            'descripcion' => 'required',
            'precio'    => 'required|decimal',
            'stock'     => 'required|integer',
            'id_faraon' => 'required|integer'
        ])) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Por favor completá todos los campos correctamente.');
        }

        $productoModel = new ProductoModel();

        $productoModel->save([
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio'      => $this->request->getPost('precio'),
            'stock'       => $this->request->getPost('stock'),
            'id_faraon'   => $this->request->getPost('id_faraon')
        ]);

        return redirect()->to('/admin')->with('mensaje', 'Producto agregado con éxito');
    }

    public function editar($id)
    {
        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaModel();

        $producto = $productoModel->find($id);
        if (!$producto) {
            return redirect()->to('/admin')->with('mensaje', 'Producto no encontrado.');
        }

        $categorias = $categoriaModel->findAll();

        return view('admin/editar', [
            'producto'   => $producto,
            'categorias' => $categorias
        ]);
    }

    public function actualizar($id)
    {
        // Validación básica (podés ampliar reglas)
        if (!$this->validate([
            'nombre'    => 'required|min_length[3]',
            'descripcion' => 'required',
            'precio'    => 'required|decimal',
            'stock'     => 'required|integer',
            'id_faraon' => 'required|integer'
        ])) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Por favor completá todos los campos correctamente.');
        }

        $productoModel = new ProductoModel();

        $productoModel->update($id, [
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio'      => $this->request->getPost('precio'),
            'stock'       => $this->request->getPost('stock'),
            'id_faraon'   => $this->request->getPost('id_faraon')
        ]);

        return redirect()->to('/admin')->with('mensaje', 'Producto actualizado con éxito');
    }

    public function eliminar($id)
    {
        $productoModel = new ProductoModel();
        $productoModel->delete($id);

        return redirect()->to('/admin')->with('mensaje', 'Producto eliminado con éxito');
    }
}
