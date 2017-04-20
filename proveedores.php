<?php
/**
 * Created by PhpStorm.
 * User: edgarserna
 * Date: 4/19/17
 * Time: 10:44 AM
 */
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
    <script type = "text/javascript" src="js/newProveedor.js"></script>
    <script type = "text/javascript" src="js/modalData.js"></script>
    <title>Serna Impresos</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

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
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a> </li>
                    <li class="divider"></li>
                    <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
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

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Proveedores </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <button data-target ="#agregarProvedor" data-toggle='modal' type="button" class="btn btn-md btn-success pull-right" style="margin-bottom: 10px;"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Proovedor</button>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Empleados
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="Proveedores">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>RFC</th>
                                <th>Domicilio</th>
                                <th>Telefono</th>
                                <th>Vendedor</th>
                                <th>Fax</th>
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
        <!-- Modal -->
        <div class="modal fade" id="agregarProvedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Agregar Proveedor</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <label for="nombreProv">Nombre <br>
                                    <input class="form-control type="text" id="NombreProv" name="NombreProv" ><br>
                                </label>

                                <label for="RFCProv">RFC <br>
                                    <input class="form-control type="text" id="RFCProv" name="RRFCProv"><br>
                                </label>

                                <label for="DomicilioProv">Domicilio <br>
                                    <input class="form-control type="text" id="DomicilioProv" name="DomicilioProv"  ><br>                                </label>
                                <label for="TelefonoProv">Telefono <br>
                                    <input class="form-control type="text" id="TelefonoProv" name="TelefonoProv" ><br>
                                </label>

                                <label for="VendedorProv">Vendedor <br>
                                    <input class="form-control type="text" id="VendedorProv" name="VendedorProv"><br>
                                </label>
                                <label for="FaxProv">Fax <br>
                                    <input class="form-control type="text" id="FaxProv" name="FaxProv" ><br>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="agregarProvedorbtn" type="button" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i><span style="margin-left: 5px;">Guardar</span></button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- Modal -->
        <div class="modal fade" id="EditarProvedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Editar Proveedor</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <label for="nombreProvEdit">Nombre <br>
                                    <input class="form-control" type="hidden" id="idProvEdit" name="idProvEdit" >
                                    <input class="form-control type="text" id="NombreProvEdit" name="NombreProvEdit" ><br>
                                </label>

                                <label for="RFCProvEdit">RFC <br>
                                    <input class="form-control type="text" id="RFCProvEdit" name="RRFCProvEdit"><br>
                                </label>

                                <label for="DomicilioProvEdit">Domicilio <br>
                                    <input class="form-control type="text" id="DomicilioProvEdit" name="DomicilioProvEdit"><br>                                </label>
                                <label for="TelefonoProvEdit">Telefono <br>
                                    <input class="form-control type="text" id="TelefonoProvEdit" name="TelefonoProvEdit"><br>
                                </label>

                                <label for="VendedorProvEdit">Vendedor <br>
                                    <input class="form-control type="text" id="VendedorProvEdit" name="VendedorProvEdit"><br>
                                </label>
                                <label for="FaxProvEdit">Fax <br>
                                    <input class="form-control type="text" id="FaxProvEdit" name="FaxProvEdit" ><br>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="EditarProvedorbtn" type="button" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i><span style="margin-left: 5px;">Guardar</span></button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- Modal -->
        <div class="modal fade" id="DeleteProveedorInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Eliminar Proveedor</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <label for="nombreProvDelete">Nombre <br>
                                    <input class="form-control" type="hidden" id="idProvDelete" name="idProvDelete" disabled>
                                    <input class="form-control type="text" id="NombreProvDelete" name="NombreProvDelete" disabled><br>
                                </label>                        
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="DeleteProvedor" type="button" class="btn btn-danger">Eliminar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- /termina tabla -->

    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

</body>
<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>
<script type = "text/javascript" src="js/scriptLoadTableProveedores.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->

</html>

