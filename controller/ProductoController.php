<?php 

require_once '../config/conexion.php';
require_once '../models/Producto.php';

$producto = new Producto();

switch ($_GET['op']) {

    //TODOS LOS PROUDCTOS
    case 'listar':
        $productos = $producto->getProductos();
        $data = Array();

        foreach ($productos as $oneProducto) {
            $sub_array = Array();
            $sub_array[] = $oneProducto['producto'];
            $sub_array[] = '<button type="button" onClick="editar('.$oneProducto['idProducto'].');" id="'.$oneProducto['idProducto'].'">Editar</button>';
            $sub_array[] = '<button type="button" onClick="eliminar('.$oneProducto['idProducto'].');" id="'.$oneProducto['idProducto'].'">Eliminae</button>';
        }

        //DATA TABLES JS
        $results = Array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "asData" => $data
        );

        echo json_encode($results);
        break;

    case '':
        # code...
        break;
    
    default:
        # code...
        break;
}

?>
