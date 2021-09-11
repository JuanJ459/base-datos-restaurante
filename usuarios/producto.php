<?php
require 'usuario.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/css.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Crear un nuevo tipo de Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" required name="txtId" value="<?php echo $txtId ?>" placeholder="" id="txt1" require="">
                            <div class="form-row">
                                <div class="form-group col-sm-12 ml-auto ">
                                    <label for="">Nombre del tipo de producto:</label>
                                    <input type="text" class="form-control" name="txtNombreProducto" required value="<?php echo $txtNombreProducto ?>" placeholder="" id="txt9" require="">
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button value="btnAgregarP" <?php echo $accionAdd; ?> class="btn btn-success" type="submit" name="accion">Agregar</button>
                            <button value="btnEditarP" <?php echo $accionMod; ?> type="submit" class="btn btn-warning " name="accion">Editar</button>
                            <button value="btnEliminarP" <?php echo $accionDel; ?> type="submit" class="btn btn-danger" onclick="return confirmar('¿Quieres borrar este registro?')" name="accion">Eliminar</button>
                            <button value="btnCancelarP" <?php echo $accionCancel; ?> type="submit" class="btn btn-primary" name="accion">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <button type="button" class="btn btn-primary linea" data-toggle="modal" data-target="#exampleModalCenter2">
                Agregar Producto
            </button>

            <a href="index.php" class="btn btn-primary linea">Ir a creación de menú</a>
            <a href="cliente.php" class="btn btn-primary linea">Ir a creación de cliente</a>
            <a href="controllerPedido.php" class="btn btn-primary linea">Ir a creacion de pedido</a>
            <a href="factura.php" class="btn btn-primary linea">Ir a creación de factura</a>

            <br>
            <br>
        </form>
        <div class="row">
            <table CLASS="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Tipo de Producto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php foreach ($listaP as $producto) { ?>

                    <tr>
                        <td> <?php echo $producto['id'] ?> </td>
                        <td> <?php echo $producto['tipoCategoria'] ?> </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="txtId" value="<?php echo $producto['id'] ?>">
                                <input type="hidden" name="txtNombreProducto" value="<?php echo $producto['tipoCategoria'] ?>">
                                <input type="submit" value="SeleccionarProducto" class="btn btn-info linea " name="accion">

                                <button value="btnEliminarP" type="submit" class="btn btn-danger linea" onclick="return confirmar('¿Quieres borrar este registro?')" name="accion">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>


        <?php if ($showModal2) { ?>
            <script>
                $('#exampleModalCenter2').modal('show');
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