<?php
require 'usuario.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de Clientes</title>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Crear un nuevo cliente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" required name="txtId" value="<?php echo $txtId ?>" placeholder="" id="txt1" require="">
                            <div class="form-row">
                                <div class="form-group col-md-4 ">
                                    <label for="">Cedula:</label>
                                    <input type="number" class="form-control" name="txtCedula" required value="<?php echo $txtCedula ?>" placeholder="" id="txt2" require="">
                                    <br>
                                </div>

                                <div class="form-group col-md-4 ">
                                    <label for="">Nombre(s):</label>
                                    <input type="text" class="form-control" name="txtNombre" required value="<?php echo $txtNombre ?>" placeholder="" id="txt3" require="">
                                    <br>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Apellido:</label>
                                    <input type="text" class="form-control" name="txtApellido" required value="<?php echo $txtApellido ?>" placeholder="" id="txt4" require="">
                                    <br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Numero: </label>
                                    <input type="number" class="form-control" name="txtNumero" required value="<?php echo $txtNumero ?>" placeholder="" id="txt6" require="">
                                    <br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Correo:</label>
                                    <input type="email" class="form-control" name="txtCorreo" required value="<?php echo $txtCorreo ?>" placeholder="" id="txt5" require="">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Direccion:</label>
                                    <input type="text" class="form-control" name="txtDireccion" value="<?php echo $txtDireccion ?>" placeholder="" id="txt7" require="">
                                    <br>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button value="btnAgregarC" <?php echo $accionAdd; ?> class="btn btn-success" type="submit" name="accion">Agregar</button>
                            <button value="btnEditarC" <?php echo $accionMod; ?> type="submit" class="btn btn-warning " name="accion">Editar</button>
                            <button value="btnEliminarC" <?php echo $accionDel; ?> type="submit" class="btn btn-danger" onclick="return confirmar('¿Quieres borrar este registro?')" name="accion">Eliminar</button>
                            <button value="btnCancelarC" <?php echo $accionCancel; ?> type="submit" class="btn btn-primary" name="accion">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>


            <button type="button" class="btn btn-primary linea" data-toggle="modal" data-target="#exampleModalCenter">
                Agregar Cliente
            </button>
            <a href="index.php" class="btn btn-primary linea">Ir a creación de menú</a>
            <a href="producto.php" class="btn btn-primary linea">Ir a creación de producto</a>
            <a href="controllerPedido.php" class="btn btn-primary linea">Ir a creacion de pedido</a>
            <a href="factura.php" class="btn btn-primary linea">Ir a creación de factura</a>

            <br>
            <br>



        </form>
        <br>

        <div class="row">
            <table CLASS="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre Completo</th>
                        <th>Cedula</th>
                        <th>Numero</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php foreach ($listaC as $cliente) { ?>
                    <tr>
                        <td> <?php echo $cliente['id'] ?> </td>
                        <td> <?php echo $cliente['nombre'] ?> <?php echo $cliente['apellido'] ?> </td>
                        <td> <?php echo $cliente['cedula'] ?> </td>
                        <td> <?php echo $cliente['numero'] ?> </td>
                        <td> <?php echo $cliente['correo'] ?> </td>
                        <td> <?php echo $cliente['direccion'] ?> </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="txtId" value="<?php echo $cliente['id'] ?>">
                                <input type="hidden" name="txtCedula" value="<?php echo $cliente['cedula'] ?>">
                                <input type="hidden" name="txtNombre" value="<?php echo $cliente['nombre'] ?>">
                                <input type="hidden" name="txtApellido" value="<?php echo $cliente['apellido'] ?>">
                                <input type="hidden" name="txtNumero" value="<?php echo $cliente['numero'] ?> ">
                                <input type="hidden" name="txtCorreo" value="<?php echo $cliente['correo'] ?>">
                                <input type="hidden" name="txtDireccion" value="<?php echo $cliente['direccion'] ?>">
                                <input type="submit" value="SeleccionarCliente" class="btn btn-info linea " name="accion">
                                <button value="btnEliminarC" type="submit" class="btn btn-danger linea" onclick="return confirmar('¿Quieres borrar este registro?')" name="accion">Eliminar</button>
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