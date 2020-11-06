<?php namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\ValoracionModel;

class Home extends BaseController
{
	public function index()
	{
		$model = new ProductoModel();
        $vmodel = new ValoracionModel();
        $data = [
            'producto' => $model->getAllProductos(),
            'valoracion'=>$vmodel
        ];

        echo view('templates/header', $data);
        echo view('productos/productos', $data);
        echo view('templates/footer', $data);
		
		
		
    }
    
    
    /*¡¡¡¡¡¡¡   ELIMINAR CUANDO ACABE EL PROYECTO    !!!!!!!!!!!*/

    public function pruebas(){
        $model = new ProductoModel();
        $productos_seccion = $model->getProductosBySeccion(2);
        var_dump($productos_seccion);
        
    }

}
