<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type = "text/javascript" src="js/nomina.js"></script>
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
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a> </li>
                        <li class="divider"></li>
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
                            <a href="empleados.php"><i class="fa fa-fw fa-users"></i> Empleados</a>
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
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <form>
                            <div class="row">
                                <div class="left">

                                    <label for="nombre">Nombre<br>
                                        <select type="text" id="nombre" name="nombre" >
                                            <option value="">Seleccione una opcion ...</option>
                                            <option value=""> </option>
                                            <option value=""> </option>
                                        </select>
                                        <span style="color:red"> <span id="errorNombre"></span> </span>
                                    </label><br>

                                    <label for="fecha">Fecha <br>
                                        <input type="date" id="fecha" name="fecha" ><br>
                                        <span style="color:red"> <span id="errorFecha"></span> </span>
                                    </label><br>

                                    <label for="asistencia">Asistencia <br>
                                        <input type="text" id="asistencia" name="asistencia" placeholder="Si/No" ><br>
                                        <span style="color:red"> <span id="errorAsistencia"></span> </span>
                                    </label><br>

                                </div>
                                <div>
                                    <label for="nomina">Nomina <br>
                                        <input type="text" id="nomina" name="nomina" placeholder="Nomina" ><br>
                                        <span style="color:red"> <span id="errorLabelNomina"></span> </span>
                                    </label><br>

                                    <label for="hini">Hora de entrada <br>
                                        <input type="time" id="hini" name="hini" ><br>
                                        <span style="color:red"> <span id="errorHoraIni"></span> </span>
                                    </label>

                                    <label for="hsal">Hora de salida <br>
                                        <input type="time" id="hsal" name="hsal" ><br>
                                        <span style="color:red"> <span id="errorHoraSal"></span> </span>
                                    </label><br>

                                    <label for="retraso">Retraso <br>
                                        <input type="text" id="retraso" name="retraso" placeholder="Si/No" ><br>
                                        <span style="color:red"> <span id="errorRetraso"></span> </span>
                                    </label><br><br>
                                </div>
                            </div>

                            <br>

                            <p>
                                <button style="width:300px" id="AgregaHora" type="button" class="btn btn-lg btn-success btn-block"> Aceptar</button>
                                <button style="width:300px" id="ImpNomina" type="button" class="btn btn-lg btn-success btn-block"> Imprimir Nomina</button>

                                <br>
                            </p>

                        </form>
                    </div>

                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
