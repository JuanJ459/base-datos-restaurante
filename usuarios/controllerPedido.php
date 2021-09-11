<?php
require 'pedido.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido xd</title>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Crear un nuevo pedido</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" required name="txtId" value="<?php echo $txtId ?>" placeholder="" id="txt1" require="">
                            <div class="form-row">
                                <div class="form-group col-sm-12 ml-auto ">
                                    <label for="">Id Menu:</label>
                                    <input type="number" class="form-control" name="txtIdMenu" required value="<?php echo $txtIdMenu ?>" placeholder="" id="txt9" require="">
                                    <br>
                                </div>

                                <div class="form-group col-sm-12 ml-auto ">
                                    <label for="">Id Cliente:</label>
                                    <input type="number" class="form-control" name="txtIdCliente" required value="<?php echo $txtIdCliente ?>" placeholder="" id="txt9" require="">
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
                Agregar Pedido
            </button>

            <a href="index.php" class="btn btn-primary linea">Ir a creación de menú</a>
            <a href="cliente.php" class="btn btn-primary linea">Ir a creación de cliente</a>
            <a href="producto.php" class="btn btn-primary linea">Ir a creación de producto</a>
            <a href="factura.php" class="btn btn-primary linea">Ir a creación de factura</a>
            <br>
            <br>
        </form>
        <div class="row">
            <table CLASS="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre Menú</th>
                        <th>Nombre del Cliente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php foreach ($listaPedido as $pedido) { ?>

                    <tr>
                        <td> <?php echo $pedido['id'] ?> </td>
                        <td> <?php echo $pedido['menu_nombre'] ?> </td>
                        <td> <?php echo $pedido['cliente_nombre'] ?> <?php echo $pedido['cliente_apellido'] ?> </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="txtId" value="<?php echo $pedido['id'] ?>">
                                <input type="hidden" name="txtIdMenu" value="<?php echo $pedido['menu_idMenu'] ?>">
                                <input type="hidden" name="txtIdCliente" value="<?php echo $pedido['cliente_idCliente'] ?>">
                                <input type="submit" value="Seleccionar" class="btn btn-info linea " name="accion">
                                <button value="btnEliminar" type="submit" class="btn btn-danger linea" onclick="return confirmar('¿Quieres borrar este registro?')" name="accion">Eliminar</button>
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