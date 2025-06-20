<?php
namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\CategoriaModel;

class AdminController extends BaseController
{
    public function index()
    {
        $productoModel = new ProductoModel();
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
        helper(['form', 'url']);

        if (!$this->validate([
            'nombre'      => 'required|min_length[3]',
            'descripcion' => 'required',
            'precio'      => 'required|decimal',
            'stock'       => 'required|integer',
            'id_faraon'   => 'required|integer',
            'imagen'      => 'uploaded[imagen]|max_size[imagen,2048]|is_image[imagen]|mime_in[imagen,image/jpg,image/jpeg,image/png]'
        ])) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Por favor completá todos los campos correctamente. Verificá la imagen.');
        }

        $imagen = $this->request->getFile('imagen');
        $nombreImagen = $imagen->getRandomName();

        if ($imagen->isValid() && !$imagen->hasMoved()) {
            $imagen->move(FCPATH . 'img', $nombreImagen);
        }

        $productoModel = new ProductoModel();

        $productoModel->save([
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio'      => $this->request->getPost('precio'),
            'stock'       => $this->request->getPost('stock'),
            'id_faraon'   => $this->request->getPost('id_faraon'),
            'imagen'      => $nombreImagen
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
        helper(['form', 'url']);

        if (!$this->validate([
            'nombre'      => 'required|min_length[3]',
            'descripcion' => 'required',
            'precio'      => 'required|decimal',
            'stock'       => 'required|integer',
            'id_faraon'   => 'required|integer',
            'imagen'      => 'permit_empty|is_image[imagen]|mime_in[imagen,image/jpg,image/jpeg,image/png]|max_size[imagen,2048]'
        ])) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Por favor completá todos los campos correctamente. Verificá la imagen si subiste una.');
        }

        $productoModel = new ProductoModel();
        $producto = $productoModel->find($id);

        $imagen = $this->request->getFile('imagen');
        $nombreImagen = $producto['imagen'];

        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $nombreImagen = $imagen->getRandomName();
            $imagen->move(FCPATH . 'img', $nombreImagen);

            if ($producto['imagen'] && file_exists(FCPATH . 'img/' . $producto['imagen'])) {
                unlink(FCPATH . 'img/' . $producto['imagen']);
            }
        }

        $productoModel->update($id, [
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio'      => $this->request->getPost('precio'),
            'stock'       => $this->request->getPost('stock'),
            'id_faraon'   => $this->request->getPost('id_faraon'),
            'imagen'      => $nombreImagen
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
