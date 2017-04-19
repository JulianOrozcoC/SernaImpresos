<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type = "text/javascript" src="js/EditEmpleado.js"></script>
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
                            <a href="empleados.php"><i class="fa fa-fw fa-users"></i> Empleados</a>
                        </li>
                        <li>
                            <a href="nomina.php"><i class="fa fa-fw fa-table"></i> Nomina</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-edit"></i> Ordenes <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Orden de Compra</a>
                                </li>
                                <li>
                                    <a href="#">Orden de Trabajo</a>
                                </li>
                            </ul>
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
                    <h1 class="page-header">Empleados </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <button id="AgregaBtn" type="submit" class="btn btn-md btn-success pull-right" style="margin-bottom: 10px;"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Empleado</button>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Empleados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="Empleados">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Nomina</th>
                                    <th>Salario Diario</th>
                                    <th>Salario NOF</th>
                                    <th>Puesto</th>
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
                <div class="modal fade" id="editEmpleadoInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Editar Empleado</h4>
                    </div>
                    <div class="modal-body">
                    <div class="row form-group">
                    <div class="col-xs-4">
                    <label for="nombre">Nombre <br>
                    <input class="form-control type="text" id="nombreEdit" name="nombreEdit" ><br>
                        <span style="color:red"> <span id="errorNameEdit"></span> </span>
                    </label>

                    <label for="nomina">Nomina <br>
                    <input class="form-control type="text" id="nominaEdit" name="nominaEdit"  ><br>
                        <span style="color:red"> <span id="errorLabelNominaEdit"></span> </span>
                    </label>

                    <label for="domicilio">Domicilio <br>
                        <input class="form-control type="text" id="domicilioEdit" name="domicilioEdit"  ><br>
                        <span style="color:red"> <span id="errorLabelDomicilio"></span> </span>
                    </label>
                    <label for="colonia">Colonia <br>
                        <input class="form-control type="text" id="coloniaEdit" name="coloniaEdit" ><br>
                        <span style="color:red"> <span id="errorLabelColonia"></span> </span>
                    </label>

                    <label for="ciudad">Ciudad <br>
                        <input class="form-control type="text" id="ciudadEdit" name="ciudadEdit"  ><br>
                        <span style="color:red"> <span id="errorLabelCiudad"></span> </span>
                    </label>
                    <label for="telefono">Telefono <br>
                        <input class="form-control type="text" id="telefonoEdit" name="telefonoEdit" ><br>
                        <span style="color:red"> <span id="errorLabelTelefono"></span> </span>
                    </label>

                    <label for="celular">Celular <br>
                        <input class="form-control type="text" id="celularEdit" name="celularEdit" ><br>
                        <span style="color:red"> <span id="errorLabelCelular"></span> </span>
                    </label>
                    </div>
                    <div class="col-xs-4">
                    <label for="email">Email <br>
                        <input class="form-control type="text" id="emailEdit" name="emailEdit"  ><br>
                        <span style="color:red"> <span id="errorLabelEmail"></span> </span>
                    </label>
                    <label for="imss">No. IMSS <br>
                        <input class="form-control type="text" id="imssEdit" name="imssEdit" ><br>
                        <span style="color:red"> <span id="errorLabelNoImss"></span> </span>
                    </label>
                    <label for="rfc">RFC <br>
                        <input class="form-control type="text" id="rfcEdit" name="rfcEdit" ><br>
                        <span style="color:red"> <span id="errorLabelRfc"></span> </span>
                    </label>

                    <label for="curp">CURP <br>
                        <input class="form-control type="text" id="curpEdit" name="curpEdit" ><br>
                        <span style="color:red"> <span id="errorLabelCurp"></span> </span>
                    </label>
                    <label style="margin-bottom: 25px;" for="puesto">Puesto<br>
                        <select class="form-control type="text" id="puestoEdit" name="puestoEdit">
                        <option value="">Seleccionar Una Opcion *</option>
                        <option value="Admin">Admin</option>
                        <option value="Empleado">Empleado</option>
                        </select>
                        <span style="color:red"> <span id="errorLabelPuestoEdit"></span> </span>
                    </label>
                    <label for="salhora">Salario por Hora<br>
                        <input class="form-control type="text" id="salhoraEdit" name="salhoraEdit" ><br>
                        <span style="color:red"> <span id="errorLabelSalarioHora"></span> </span>
                    </label>
                    <label for="salnof">Salario NOF<br>
                        <input class="form-control type="text" id="salnofEdit" name="salnofEdit"  ><br>
                        <span style="color:red"> <span id="errorLabelSalarioNof"></span> </span>
                    </label>

                    </div>
                    <div class="col-xs-4">
                    <label for="isr">ISR<br>
                        <input class="form-control type="text" id="isrEdit" name="isrEdit"  ><br>
                        <span style="color:red"> <span id="errorLabelIsr"></span> </span>
                    </label>
                    <label for="impimss">IMSS<br>
                        <input class="form-control type="text" id="impimssEdit" name="impimssEdit"  ><br>
                        <span style="color:red"> <span id="errorLabelImss"></span> </span>
                    </label>

                    <label for="subsidio">Subsidio al Empleado<br>
                        <input class="form-control type="text" id="subsidioEdit" name="subsidioEdit"  ><br>
                        <span style="color:red"> <span id="errorLabelSubsidio"></span> </span>
                    </label>
                    <label for="infonavit">Infonavit<br>
                        <input class="form-control type="text" id="infonavitEdit" name="infonavitEdit" ><br>
                        <span style="color:red"> <span id="errorLabelInfonavit"></span> </span>
                    </label>
                    <label for="activo">Activo<br>
                        <select class="form-control type="text" id="activoEdit" name="activoEdit">
                        <option value="">Seleccionar Una Opcion *</option>
                        <option value="Si">Activo</option>
                        <option value="No">Inactivo</option>
                        </select>
                        <span style="color:red"> <span id="errorLabelActivoEdit"></span> </span>
                    </label>
                    <label style="margin-top: 20px;" for="usuarioEdit">Usuario<br>
                        <input class="form-control type="text" id="usuarioEditEmp" name="usuarioEditEmp" placeholder="Usuario"><br>
                        <span style="color:red"> <span id="errorLabelUsuarioEdit"></span> </span>
                    </label>
                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                     <button id="EditEmpleadoBtn" type="button" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i><span style="margin-left: 5px;">Guardar</span></button>
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
    <script type = "text/javascript" src="js/scriptLoadTable.js"></script>

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
