<?php
require 'usuario.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de facturas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>


<body>
    <div class="container">
        <form action="" method="post">
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Crear una nueva factura</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" required name="txtId" value="<?php echo $txtId ?>" placeholder="" id="txt1" require="">
                            <div class="form-row">


                                <div class="form-group col-md-6 ">
                                    <label for="">Codigo de Factura:</label>
                                    <input type="number" class="form-control" name="txtCodFactura" required value="<?php echo $txtCodFactura ?>" placeholder="" id="txt2" require="">
                                    <br>
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label for="">Fecha de Compra:</label>
                                    <input type="date" class="form-control" name="txtFechaCompra" required value="<?php echo $txtFechaCompra ?>" placeholder="" id="txt2" require="">
                                    <br>
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label for="">Hora de Compra:</label>
                                    <input type="time" class="form-control" name="txtHoraCompra" required value="<?php echo $txtHoraCompra ?>" placeholder="" id="txt3" require="">
                                    <br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Medio de Pago:</label>
                                    <input type="text" class="form-control" name="txtMedioPago" required value="<?php echo $txtMedioPago ?>" placeholder="" id="txt4" require="">
                                    <br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Id del pedido: </label>
                                    <input type="number" class="form-control" name="txtPedido" required value="<?php echo $txtPedido ?>" placeholder="" id="txt6" require="">
                                    <br>
                                </div>


                            </div>
                        </div>

                        <div class="modal-footer">
                            <button value="btnAgregar" <?php echo $accionAdd; ?> class="btn btn-success" type="submit" name="accion2">Agregar</button>
                            <button value="btnEditar" <?php echo $accionMod; ?> type="submit" class="btn btn-warning " name="accion2">Editar</button>
                            <button value="btnEliminar" <?php echo $accionDel; ?> type="submit" class="btn btn-danger" onclick="return confirmar('¿Quieres borrar este registro?')" name="accion2">Eliminar</button>
                            <button value="btnCancelar" <?php echo $accionCancel; ?> type="submit" class="btn btn-primary" name="accion2">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>


            <button type="button" class="btn btn-primary linea" data-toggle="modal" data-target="#exampleModalCenter">
                Agregar Factura
            </button>
            <a href="index.php" class="btn btn-primary linea">Ir a creación de menú</a>
            <a href="producto.php" class="btn btn-primary linea">Ir a creación de producto</a>
            <a href="controllerPedido.php" class="btn btn-primary linea">Ir a creacion de pedido</a>
            <br>
            <br>



        </form>
        <br>

        <div class="row">
            <table CLASS="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Codigo de Factura</th>
                        <th>Fecha de Compra</th>
                        <th>Hora de Compra</th>
                        <th>Medio de Pago</th>
                        <th>Id del Pedido</th>
                        <th>Menú Seleccionado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php foreach ($listaFactura as $factura) { ?>
                    <tr>
                        <td> <?php echo $factura['cod_factura'] ?> </td>
                        <td> <?php echo $factura['fecha_compra'] ?> </td>
                        <td> <?php echo $factura['hora_compra'] ?> </td>
                        <td> <?php echo $factura['medio_pago'] ?> </td>
                        <td> <?php echo $factura['id_pedido'] ?> </td>
                        <td> <?php echo $factura['menu_nombre'] ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="txtId" value="<?php echo $factura['id'] ?>">
                                <input type="hidden" name="txtCodFactura" value="<?php echo $factura['cod_factura'] ?>">
                                <input type="hidden" name="txtFechaCompra" value="<?php echo $factura['fecha_compra'] ?>">
                                <input type="hidden" name="txtHoraCompra" value="<?php echo $factura['hora_compra'] ?> ">
                                <input type="hidden" name="txtMedioPago" value="<?php echo $factura['medio_pago'] ?>">
                                <input type="hidden" name="txtPedido" value="<?php echo $factura['id_pedido'] ?>">
                                <input type="submit" value="Seleccionar" class="btn btn-info linea " name="accion2">
                                <button value="btnEliminar" type="submit" class="btn btn-danger linea" onclick="return confirmar('¿Quieres borrar este registro?')" name="accion2">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div class="form-group col-md-4">
            <label for="">Ingrese Codigo Factura: </label>
            <input type="number" class="form-control" name="txtDeCodFactura" required value="<?php echo $txtDeCodFactura ?>" placeholder="" id="txt6" require="">
            <button value="btnConsultar" class="btn btn-success" type="submit" name="accion2">Consultar precio total</button>
        </div>
        <br>
        <div class="row">
            <table CLASS="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Codigo de Factura</th>
                        <th>Precio Total</th>
                        <th>Cliente</th>
                    </tr>
                </thead>

                <?php foreach ($listaDetallesFactura as $dfactura) { ?>
                    <tr>
                        <td> <?php echo $dfactura['cod_factura'] ?> </td>
                        <td> <?php echo $dfactura['precio_total'] ?> </td>
                        <td> <?php echo $dfactura['nombre_cliente'] ?> <?php echo $dfactura['apellido_cliente'] ?> </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="txtDeCodFactura" value="<?php echo $dfactura['cod_factura'] ?>">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <?php if ($showModal) { ?>
            <script>
                $('#exampleModalCenter').modal('show');
            </script>
        <?php } ?>



        <script>
            function confirmar(msg) {
                return (confirm(msg)) ? true : false;
            }
        </script>
    </div>

</body>



</html>