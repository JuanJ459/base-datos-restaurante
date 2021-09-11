<?php
$txtId = (isset($_POST["txtId"])) ? $_POST["txtId"] : "";
$txtIdMenu = (isset($_POST["txtIdMenu"])) ? $_POST["txtIdMenu"] : "";
$txtIdCliente = (isset($_POST["txtIdCliente"])) ? $_POST["txtIdCliente"] : "";

$accion = (isset($_POST["accion"])) ? $_POST["accion"] : "";
$error = array();
$accionAdd = "";
$accionMod = $accionDel = $accionCancel = "disabled";
$showModal = false;
include("../conexion/conexion.php");

switch ($accion) {


    case "btnAgregar":

        $cadenaSQL = "INSERT INTO `pedido`(`menu_idMenu`, `cliente_idCliente`) 
        VALUES (:menu_id,:cliente_id)";
        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':menu_id', $txtIdMenu, PDO::PARAM_INT);
        $sentencia->bindParam(':cliente_id', $txtIdCliente, PDO::PARAM_INT);
        $sentencia->execute();
        header('Location: controllerPedido.php');
        break;

    case "btnEditar":
        $cadenaSQL = "UPDATE pedido SET  
        pedido.`menu_idMenu`= :idmenu,
        pedido.`cliente_idCliente`= :idcliente
        WHERE pedido.`id`= :id";
        $sentencia2 = $conexion->prepare($cadenaSQL);
        $sentencia2->bindParam(':idmenu', $txtIdMenu);
        $sentencia2->bindParam(':idcliente', $txtIdCliente);
        $sentencia2->bindParam(':id', $txtId, PDO::PARAM_INT);
        $sentencia2->execute();
        header('Location: controllerPedido.php');
        break;


    case "btnEliminar":

        $cadenaSQL = "DELETE FROM pedido 
        WHERE pedido.`id`= :id";

        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':id', $txtId, PDO::PARAM_INT);
        $sentencia->execute();
        header('Location: controllerPedido.php');
        break;


    case "btnCancelar":
        header('Location: controllerPedido.php');
        break;


    case "Seleccionar":
        $accionAdd = "disabled";
        $accionMod = $accionDel = $accionCancel = "";
        $showModal = true;
}

$datosPedido = $conexion->prepare("SELECT pedido.`id`, `menu_idMenu`, `cliente_idCliente`, cliente.nombre as cliente_nombre, cliente.apellido as cliente_apellido, menu.nombre as menu_nombre  FROM `pedido` inner join cliente on pedido.cliente_idCliente=cliente.id inner join menu on pedido.menu_idMenu = menu.id;");
$datosPedido->execute();
$listaPedido = $datosPedido->fetchAll(PDO::FETCH_ASSOC);
// print_r($listaMenu);