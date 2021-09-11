<?php
//Menu
$txtId = (isset($_POST["txtId"])) ? $_POST["txtId"] : "";
$txtNombre = (isset($_POST["txtNombre"])) ? $_POST["txtNombre"] : "";
$txtPrecio = (isset($_POST["txtPrecio"])) ? $_POST["txtPrecio"] : "";
$txtCantidad = (isset($_POST["txtCantidad"])) ? $_POST["txtCantidad"] : "";
$txtIdProducto = (isset($_POST["txtIdProducto"])) ? $_POST["txtIdProducto"] : "";
$txtNombreProducto = (isset($_POST["txtNombreProducto"])) ? $_POST["txtNombreProducto"] : "";
//Cliente
$txtCedula = (isset($_POST["txtCedula"])) ? $_POST["txtCedula"] : "";
$txtApellido = (isset($_POST["txtApellido"])) ? $_POST["txtApellido"] : "";
$txtDireccion = (isset($_POST["txtDireccion"])) ? $_POST["txtDireccion"] : "";
$txtCorreo = (isset($_POST["txtCorreo"])) ? $_POST["txtCorreo"] : "";
$txtNumero = (isset($_POST["txtNumero"])) ? $_POST["txtNumero"] : "";
//Factura
$txtCodFactura = (isset($_POST["txtCodFactura"])) ? $_POST["txtCodFactura"] : "";
$txtFechaCompra = (isset($_POST["txtFechaCompra"])) ? $_POST["txtFechaCompra"] : "";
$txtPrecioTotal = (isset($_POST["txtPrecioTotal"])) ? $_POST["txtPrecioTotal"] : "";
$txtHoraCompra = (isset($_POST["txtHoraCompra"])) ? $_POST["txtHoraCompra"] : "";
$txtMedioPago = (isset($_POST["txtMedioPago"])) ? $_POST["txtMedioPago"] : "";
$txtPedido = (isset($_POST["txtPedido"])) ? $_POST["txtPedido"] : "";

//Consultar Factura
$txtDeCodFactura = (isset($_POST["txtDeCodFactura"])) ? $_POST["txtDeCodFactura"] : "";

$suma;
$accion = (isset($_POST["accion"])) ? $_POST["accion"] : "";
$accion2 = (isset($_POST["accion2"])) ? $_POST["accion2"] : "";
$error = array();
$accionAdd = "";
$accionMod = $accionDel = $accionCancel = "disabled";
$showModal = false;
$showModal2 = false;
$showModal3 = false;
include("../conexion/conexion.php");

switch ($accion) {


    case "btnAgregarP":
        if (empty($txtNombreProducto) == true) {
            $error['nombre'] = "¡Debes escribir un nombre!";
        }
        $cadenaSQL = "INSERT INTO producto(tipoCategoria)
        VALUES (:nombre)";
        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':nombre', $txtNombreProducto, PDO::PARAM_STR, 25);
        $sentencia->execute();
        header('Location: producto.php');
        break;

    case "btnAgregarC":
        $cadenaSQL = "INSERT INTO cliente (cedula,nombre,apellido,numero,correo,direccion) 
        VALUES (:cedula,:nombre,:apellido,:numero,:correo,:direccion ) ";
        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':cedula', $txtCedula, PDO::PARAM_INT);
        $sentencia->bindParam(':nombre', $txtNombre, PDO::PARAM_STR, 25);
        $sentencia->bindParam(':apellido', $txtApellido, PDO::PARAM_STR, 25);
        $sentencia->bindParam(':numero', $txtNumero, PDO::PARAM_INT);
        $sentencia->bindParam(':correo', $txtCorreo, PDO::PARAM_STR, 70);
        $sentencia->bindParam(':direccion', $txtDireccion, PDO::PARAM_STR, 70);
        $sentencia->execute();
        header('Location: cliente.php');
        break;

    case "btnAgregar":

        $cadenaSQL = "INSERT INTO menu( nombre, precio, cantidad, idProducto)
        VALUES (:nombre,:precio,:cantidad,:idProducto)";
        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':nombre', $txtNombre, PDO::PARAM_STR, 25);
        $sentencia->bindParam(':precio', $txtPrecio, PDO::PARAM_INT);
        $sentencia->bindParam(':cantidad', $txtCantidad, PDO::PARAM_INT);
        $sentencia->bindParam(':idProducto', $txtIdProducto, PDO::PARAM_INT);
        $sentencia->execute();
        header('Location: index.php');
        break;

    case "btnEditar":
        $cadenaSQL = "UPDATE menu SET  
        menu.`nombre`= :nombre,
        menu.`precio`= :precio,
        menu.`cantidad`= :cantidad,
        menu.`idProducto`= :idProducto
        WHERE menu.`id`= :id";
        $sentencia2 = $conexion->prepare($cadenaSQL);
        $sentencia2->bindParam(':nombre', $txtNombre, PDO::PARAM_STR, 25);
        $sentencia2->bindParam(':precio', $txtPrecio);
        $sentencia2->bindParam(':cantidad', $txtCantidad, PDO::PARAM_INT);
        $sentencia2->bindParam(':idProducto', $txtIdProducto, PDO::PARAM_INT);
        $sentencia2->bindParam(':id', $txtId, PDO::PARAM_INT);
        $sentencia2->execute();
        header('Location: index.php');
        break;

    case "btnEditarP":
        $cadenaSQL = "UPDATE producto SET  
        producto.`tipoCategoria`= :nombre
        WHERE producto.`id`= :id";
        $sentencia2 = $conexion->prepare($cadenaSQL);
        $sentencia2->bindParam(':nombre', $txtNombreProducto, PDO::PARAM_STR, 25);
        $sentencia2->bindParam(':id', $txtId, PDO::PARAM_INT);
        $sentencia2->execute();
        header('Location: producto.php');
        break;

    case "btnEditarC":
        $cadenaSQL = "UPDATE cliente SET  
        cliente.`cedula`= :cedula,
        cliente.`nombre`= :nombre,
        cliente.`apellido`= :apellido,
        cliente.`numero`= :numero,
        cliente.`correo`= :correo,
        cliente.`direccion`= :direccion,

        WHERE cliente.`id`= :id";

        $sentencia2 = $conexion->prepare($cadenaSQL);

        $sentencia2->bindParam(':cedula', $txtCedula, PDO::PARAM_INT);
        $sentencia2->bindParam(':nombre', $txtNombre, PDO::PARAM_STR, 25);
        $sentencia2->bindParam(':apellido', $txtApellido, PDO::PARAM_STR, 25);
        $sentencia2->bindParam(':numero', $txtNumero, PDO::PARAM_INT);
        $sentencia2->bindParam(':correo', $txtCorreo, PDO::PARAM_STR, 25);
        $sentencia2->bindParam(':direccion', $txtDireccion,  PDO::PARAM_STR, 25);
        $sentencia2->bindParam(':id', $txtId, PDO::PARAM_INT);
        $sentencia2->execute();


        header('Location: cliente.php');

        break;

    case "btnEliminar":

        $cadenaSQL = "DELETE FROM menu 
        WHERE menu.`id`= :id";

        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':id', $txtId, PDO::PARAM_INT);
        $sentencia->execute();
        header('Location: index.php');
        break;


    case "btnEliminarP":

        $cadenaSQL = "DELETE FROM producto
        WHERE producto.`id`= :id";

        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':id', $txtId, PDO::PARAM_INT);
        $sentencia->execute();
        header('Location: producto.php');
        break;

    case "btnEliminarC":

        $cadenaSQL = "DELETE FROM cliente
        WHERE cliente.`id`= :id";

        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':id', $txtId, PDO::PARAM_INT);
        $sentencia->execute();
        header('Location: cliente.php');
        break;

    case "btnCancelar":
        header('Location: index.php');
        break;

    case "btnCancelarP":
        header('Location: producto.php');
        break;

    case "btnCancelarC":
        header('Location: cliente.php');
        break;

    case "Seleccionar":
        $accionAdd = "disabled";
        $accionMod = $accionDel = $accionCancel = "";
        $showModal = true;

    case "SeleccionarCliente":
        $accionAdd = "disabled";
        $accionMod = $accionDel = $accionCancel = "";
        $showModal3 = true;

    case "SeleccionarProducto":
        $accionAdd = "disabled";
        $accionMod = $accionDel = $accionCancel = "";
        $showModal2 = true;
}




switch ($accion2) {

    case "btnAgregar":
        $cadenaSQL = "INSERT INTO `factura`( 
        cod_factura,
        fecha_compra,
        hora_compra,
        medio_pago,
        id_pedido)
        VALUES (
        :codfactura,
        :fechacompra,
        :horacompra,
        :mediopago,
        :pedido

        )";
        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':codfactura', $txtCodFactura);
        $sentencia->bindParam(':fechacompra', $txtFechaCompra);
        $sentencia->bindParam(':horacompra', $txtHoraCompra);
        $sentencia->bindParam(':mediopago', $txtMedioPago);
        $sentencia->bindParam(':pedido', $txtPedido);

        $sentencia->execute();
        header('Location: factura.php');
        break;

    case "btnEditar":

        $cadenaSQL = "UPDATE `factura` 
        SET  `cod_factura`=:codfactura,
        `fecha_compra`=:fechacompra,
        `hora_compra`=:horacompra,
        `medio_pago`=:mediopago,
        `id_pedido`=:pedido
        WHERE id=:id";

        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':codfactura', $txtCodFactura);
        $sentencia->bindParam(':fechacompra', $txtFechaCompra);
        $sentencia->bindParam(':horacompra', $txtHoraCompra);
        $sentencia->bindParam(':mediopago', $txtMedioPago);
        $sentencia->bindParam(':pedido', $txtPedido);
        $sentencia->bindParam(':id', $txtId);
        $sentencia->execute();
        header('Location: factura.php');
        break;

    case "btnEliminar":
        $cadenaSQL = "DELETE FROM `factura` WHERE id=:id";
        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':id', $txtId, PDO::PARAM_INT);
        $sentencia->execute();
        header('Location: factura.php');
        break;

    case "btnCancelar":
        header('Location: factura.php');
        break;

    case "Seleccionar":
        $accionAdd = "disabled";
        $accionMod = $accionDel = $accionCancel = "";
        $showModal = true;

    case "btnConsultar":
        $consulta = "SELECT factura.cod_factura, sum(menu.precio) as precio_total,cliente.nombre as nombre_cliente, cliente.apellido as apellido_cliente FROM `menu` inner join pedido on pedido.menu_idMenu = menu.id inner join factura on factura.id_pedido = pedido.id INNER JOIN CLIENTE on cliente.id = pedido.cliente_idCliente
        where factura.cod_factura = ':codfactura';";
        $datosDetallesFactura = $conexion->prepare($consulta);
        $datosDetallesFactura->bindParam(':codfactura', $txtDeCodFactura);
        $datosDetallesFactura->execute();
        $listaDetallesFactura = $datosDetallesFactura->fetchAll(PDO::FETCH_ASSOC);
        header('Location: factura.php');
        break;
}

// $cadenaSQL_Factura= "SELECT factura.`id`,
// `cod_factura`,
// `fecha_compra`,
// `precio_total`,
// `hora_compra`,
// `medio_pago`,
// cliente.nombre as cliente_nombre,
// cliente.apellido as cliente_apellido,
// menu.nombre as menu_nombre
// FROM `factura` 
// inner join  `cliente` on factura.Pedido_cliente_idCliente = cliente.id 
// inner join menu on factura.Pedido_menu_idMenu = menu.id ";

$consulta = "SELECT factura.cod_factura, sum(menu.precio) as precio_total,cliente.nombre as nombre_cliente, cliente.apellido as apellido_cliente FROM `menu` inner join pedido on pedido.menu_idMenu = menu.id inner join factura on factura.id_pedido = pedido.id INNER JOIN CLIENTE on cliente.id = pedido.cliente_idCliente
where factura.cod_factura = ':codfactura';";
$datosDetallesFactura = $conexion->prepare($consulta);
$datosDetallesFactura->bindParam(':codfactura', $txtDeCodFactura);
$datosDetallesFactura->execute();
$listaDetallesFactura = $datosDetallesFactura->fetchAll(PDO::FETCH_ASSOC);



$cadenaSQL_Factura = "SELECT factura.`id`,
`cod_factura`,
`fecha_compra`,
`hora_compra`,
`medio_pago`,
`id_pedido`, 
menu.nombre as menu_nombre FROM `factura` 
inner join pedido on pedido.id = factura.id_pedido 
inner join menu on  (menu.id = pedido.menu_idMenu)";


$datosFactura = $conexion->prepare($cadenaSQL_Factura);
$datosFactura->execute();
$listaFactura = $datosFactura->fetchAll(PDO::FETCH_ASSOC);

$datosCliente = $conexion->prepare("SELECT * FROM `cliente` WHERE 1");
$datosCliente->execute();
$listaC = $datosCliente->fetchAll(PDO::FETCH_ASSOC);

$datosProducto = $conexion->prepare("SELECT * FROM `producto` WHERE 1");
$datosProducto->execute();
$listaP = $datosProducto->fetchAll(PDO::FETCH_ASSOC);

$datosMenu = $conexion->prepare("SELECT  menu.id,
menu.nombre,
menu.precio,
menu.cantidad,
menu.idProducto, producto.tipoCategoria 
as categoria_producto 
FROM menu inner join producto on (menu.idProducto = producto.id)");
$datosMenu->execute();
$listaMenu = $datosMenu->fetchAll(PDO::FETCH_ASSOC);
// print_r($listaMenu);