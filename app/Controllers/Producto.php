<?php namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\ValoracionModel;
use CodeIgniter\Controller;

class Producto extends BaseController{

    private $model;
    private $vmodel;

    public function __construct()
    {
        $this->model = new ProductoModel();
        $this->vmodel = new ValoracionModel();
    }

    public function index(){

        $data = [
            'producto' => $this->model->getAllProductos(),
            'valoracion'=>$this->vmodel
        ];

        echo view('templates/header', $data);
        echo view('products/productos', $data);
        echo view('templates/footer', $data);
    }

    public function view($productoId = NULL){
        $data= [
            'producto' => $this->model->getProducto($productoId),
            'valoracion' => $this->vmodel
        ];

        if(empty($data['producto'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No podemos encontrar el producto: '. $productoId);
        }

        echo view('templates/header', $data);
        echo view('productos/product_view', $data);
        echo view('templates/footer', $data);
    }

    public function productoBySeccion($seccion){

        $data = [
            'producto' => $this->model->getProductosBySeccion($seccion),
            'valoracion'=>$this->vmodel
        ];

        return $data;
            
    }
}

