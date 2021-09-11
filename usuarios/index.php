<?php
require 'usuario.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion menú</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/css.css">
</head>

<body>

    <div class="container">
        <form action="" method="post">
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Crear un nuevo menu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" required name="txtId" value="<?php echo $txtId ?>" placeholder="" id="txt1" require="">
                            <div class="form-row">
                                <div class="form-group col-sm-6 ml-auto ">
                                    <label for="">Nombre:</label>
                                    <input type="text" class="form-control" name="txtNombre" required value="<?php echo $txtNombre ?>" placeholder="" id="txt3" require="">
                                    <br>
                                </div>
                                <div class="form-group col-sm-6 ml-auto">
                                    <label for="">Precio:</label>
                                    <input type="number" class="form-control" name="txtPrecio" required value="<?php echo $txtPrecio ?>" placeholder="" id="txt2" require="">
                                    <br>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Cantidad:</label>
                                    <input type="number" class="form-control" name="txtCantidad" required value="<?php echo $txtCantidad ?>" placeholder="" id="txt7" require="">
                                    <br>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Id de Tipo Producto:</label>
                                    <input type="number" class="form-control" name="txtIdProducto" required value="<?php echo $txtIdProducto ?>" placeholder="" id="txt8" require="">
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button value="btnAgregar" <?php echo $accionAdd; ?> class="btn btn-success" type="submit" name="accion">Agregar</button>
                            <button value="btnEditar" <?php echo $accionMod; ?> type="submit" class="btn btn-warning " name="accion">Editar</button>
                            <button value="btnEliminar" <?php echo $accionDel; ?> type="submit" class="btn btn-danger" onclick="return confirmar('¿Quieres borrar este registro?')" name="accion">Eliminar</button>
                            <button value="btnCancelar" <?php echo $accionCancel; ?> type="submit" class="btn btn-primary" name="accion">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>


            <button type="button" class="btn btn-primary linea" data-toggle="modal" data-target="#exampleModalCenter">
                Agregar Menu
            </button>


            <a href="cliente.php" class="btn btn-primary linea">Ir a creación de cliente</a>
            <a href="producto.php" class="btn btn-primary linea">Ir a creación de producto</a>
            <a href="controllerPedido.php" class="btn btn-primary linea">Ir a creacion de pedido</a>
            <a href="factura.php" class="btn btn-primary linea">Ir a creacion de factura</a>
            <br>
          
        </form>
        <br>

        <div class="row">
            <table CLASS="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Tipo de Producto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php foreach ($listaMenu as $menu) { ?>

                    <tr>
                        <td> <?php echo $menu['id'] ?> </td>
                        <td> <?php echo $menu['nombre'] ?> </td>
                        <td> <?php echo $menu['precio'] ?> </td>
                        <td> <?php echo $menu['cantidad'] ?> </td>
                        <td> <?php echo $menu['categoria_producto'] ?> </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="txtId" value="<?php echo $menu['id'] ?>">
                                <input type="hidden" name="txtNombre" value="<?php echo $menu['nombre'] ?>">
                                <input type="hidden" name="txtPrecio" value="<?php echo $menu['precio'] ?>">
                                <input type="hidden" name="txtCantidad" value="<?php echo $menu['cantidad'] ?>">
                                <input type="hidden" name="txtIdProducto" value="<?php echo $menu['idProducto'] ?>">

                                <input type="submit" value="Seleccionar" class="btn btn-info linea" name="accion">

                                <button value="btnEliminar" type="submit" class="btn btn-danger linea " onclick="return confirmar('¿Quieres borrar este registro?')" name="accion">Eliminar</button>
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