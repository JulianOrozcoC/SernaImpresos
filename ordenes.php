<?php
if (!isset($_SESSION)) {
    session_start();
}

if (($_SESSION['Usuario'] == NULL)) {
    header("Location: logout.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type = "text/javascript" src="js/ordenes.js"></script>
    <script type = "text/javascript" src="js/cargaNomina.js"></script>
    <script type = "text/javascript" src="js/cargarProv.js"></script>
    <script type = "text/javascript" src="js/modalData.js"></script>
    <title>Serna Impresos</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dashboard.php">Serna Impresos</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                    <?php  
                                /*if ($_SESSION['Puesto'] == 'Admin') {
                                    echo "<a href='empleados.php'><i class='fa fa-fw fa-users'></i> Empleados</a>";
                                }*/
                        ?>
                        <a href="empleados.php"><i class="fa fa-fw fa-users"></i> Empleados</a>
                    </li>
                    <li>
                        <a href="proveedores.php"><i class="fa fa-fw fa-users"></i> Proveedores</a>
                    </li>
                    <li>
                        <a href="nomina.php"><i class="fa fa-fw fa-table"></i> Nomina</a>
                    </li>
                    <li>
                        <a href="ordenes.php"><i class="fa fa-fw fa-edit"></i> Ordenes</a>
                    </li>
                    <li>
                        <a href="facturas.php"><i class="fa fa-fw fa-file"></i> Facturas</a>
                    </li>
                    <li>
                        <a href="mantenimiento.php"><i class="fa fa-fw fa-wrench"></i> Mantenimiento</a>
                    </li>
                    <li>
                        <a href="soporte.php"><i class="fa fa-fw fa-info-circle"></i> Soporte</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

         <!-- Modal -->
        <div class="modal fade" id="agregarOrdenCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Agregar Orden de Compra</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-xs-6">
                                <label for="nominaOC">Nomina <br>
                                    <select class="form-control type="text" id="NominaOC" name="NominaOC" >
                                    <option value="">Selecciona una opcion</option>
                                    </select><br>
                                </label>

                                <label for="ProveedorOC">Proveedor <br>
                                    <select class="form-control type="text" id="ProveedorOC" name="ProveedorOC">
                                    <option value="">Selecciona una opcion</option>
                                    </select><br>
                                </label>
                                <label for="CantidadOC">Cantidad <br>
                                    <input class="form-control type="text" id="CantidadOC" name="CantidadOC" ><br>
                                </label>

                                <label for="Unidad-MedidaOC">Unidad-Medida <br>
                                    <input class="form-control type="text" id="Unidad-MedidaOC" name="Unidad-MedidaOC"><br>
                                </label>

                                <label for="FechaOC">Fecha <br>
                                    <input class="form-control" type="date" id="FechaOC" name="FechaOC"  ><br> 
                                    </label>

                            </div>
                            <div class="col-xs-6">
                                <label for="DescripcionOC">Descripcion <br>
                                    <input class="form-control type="text" id="DescripcionOC" name="DescripcionOC" ><br>
                                </label>

                                <label for="PrecioUnitarioOC">Precio Unitario <br>
                                    <input class="form-control type="text" id="PrecioUnitarioOC" name="PrecioUnitarioOC"><br>
                                </label>

                                <label for="TotalOC">Total <br>
                                    <input class="form-control type="text" id="TotalOC" name="TotalOC"  ><br>                                </label>
                                <label for="AprobadaOC">Aprobada
                                    <select class="form-control type="text" id="AprobadaOC" name="AprobadaOC" >
                                    <option value="">Selecciona una opcion</option>
                                    <option value="Aprobada">Aprobada</option>
                                    <option value="No Aprobada">No Aprobada</option>
                                    </select><br>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="agregarOrdenComprabtn" type="button" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i><span style="margin-left: 5px;">Guardar</span></button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- Modal -->
        <div class="modal fade" id="EliminarOrdenCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Eliminar Orden de Compra</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <label for="IdOrdenCompra">Id Orden de Compra <br>
                                    <input class="form-control type="text" id="IdOrdenCompra" name="IdOrdenCompra" disabled><br>
                                </label>

                                 <label for="DescripcionOrdenCompra">Descripcion <br>
                                    <input class="form-control type="text" id="DescripcionOrdenCompra" name="DescripcionOrdenCompra" disabled><br>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="eliminarOrdenComprabtn" type="button" class="btn btn-danger"><span style="margin-left: 5px;">Eliminar</span></button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- Modal -->
        <div class="modal fade" id="AprobarOrdenCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Aprobar Orden de Compra</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <label for="IdOrdenCompraAP">Id Orden de Compra <br>
                                    <input class="form-control type="text" id="IdOrdenCompraAP" name="IdOrdenCompraAP" disabled><br>
                                </label>

                                 <label for="DescripcionOrdenCompraAP">Descripcion <br>
                                    <input class="form-control type="text" id="DescripcionOrdenCompraAP" name="DescripcionOrdenCompraAP" disabled><br>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="AprobarOrdenComprabtn" type="button" class="btn btn-success"><span style="margin-left: 5px;">Aprobar</span></button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- Modal -->
        <div class="modal fade" id="DesAprobarOrdenCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">DesAprobar Orden de Compra</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <label for="IdOrdenCompraDP">Id Orden de Compra <br>
                                    <input class="form-control type="text" id="IdOrdenCompraDP" name="IdOrdenCompraDP" disabled><br>
                                </label>

                                 <label for="DescripcionOrdenCompraDP">Descripcion <br>
                                    <input class="form-control type="text" id="DescripcionOrdenCompraDP" name="DescripcionOrdenCompraDP" disabled><br>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="DesAprobarOrdenComprabtn" type="button" class="btn btn-primary"><span style="margin-left: 5px;">DesAprobar</span></button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
            <div class="row">
                <div class="container" style="width: 100%;">

                    <div id="exTab2" class="container"> 
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a  href="#Compra" data-toggle="tab">Orden de Compra</a>
                        </li>
                        <li><a href="#Trabajo" data-toggle="tab">Orden de Trabajo</a>
                        </li>
                    </ul>

                    <div class="tab-content ">
                        <div class="tab-pane active" id="Compra">
                        <button data-target ="#agregarOrdenCompra" data-toggle='modal' type="button" class="btn btn-md btn-success pull-right" style="margin-bottom: 10px;"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Orden de Compra</button>
                            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ordenes de  Compra
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="OrdenesComp">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nomina</th>
                                    <th>Proveedor</th>
                                    <th>Fecha</th>
                                    <th>Aprobada</th>
                                    <th>Acciones</th>
                                </tr>
                               
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                        </div>
                        <div class="tab-pane" id="Trabajo">
                            <h3>Notice the gap between the content and tab after applying a background color</h3>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>
<script type = "text/javascript" charset="utf8" src="js/scriptLoadTableOrdenes.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

 <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

</body>

</html>

