<?php
/**
 * Created by PhpStorm.
 * User: edgarserna
 * Date: 4/9/17
 * Time: 11:57 PM
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
    <script type = "text/javascript" src="js/newEmpleado.js"></script>
    <title>Serna Impresos</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

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

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nuevo Empleado</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <style>
                input[type=text], select {
                    width: 100%;
                    padding: 12px 20px;
                    margin: 8px 0;
                    display: inline-block;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                }
            </style
            <div>
                <form>
                    <label for="nombre">Nombre
                    <input type="text" id="nombre" placeholder="Nombre" size="35">
                        <span id="errorLabelName"></span>
                    </label>
                    <span style="display:inline-block; width: 200px;"></span>
                    <label for="nomina">Nomina
                    <input type="text" id="nomina" name="nomina" placeholder="Nomina" size="35">
                        <span id="errorLabelNomina"></span>
                    </label><br>

                    <label for="domicilio">Domicilio
                        <input type="text" id="domicilio" name="domicilio" placeholder="Domicilio" size="34">
                        <span id="errorLabelDomicilio"></span>
                    </label>
                    <span style="display:inline-block; width: 200px;"></span>
                    <label for="colonia">Colonia
                        <input type="text" id="colonia" name="colonia" placeholder="Colonia" size="35">
                        <span id="errorLabelColonia"></span>
                    </label><br>

                    <label for="ciudad">Ciudad
                        <input type="text" id="ciudad" name="ciudad" placeholder="Ciudad" size="36">
                        <span id="errorLabelCiudad"></span>
                    </label>
                    <span style="display:inline-block; width: 200px;"></span>
                    <label for="telefono">Telefono
                        <input type="text" id="telefono" name="telefono" placeholder="Telefono" size="35">
                        <span id="errorLabelTelefono"></span>
                    </label><br>

                    <label for="celular">Celular
                        <input type="text" id="celular" name="celular" placeholder="Celular" size="36">
                        <span id="errorLabelCelular"></span>
                    </label>
                    <span style="display:inline-block; width: 200px;"></span>
                    <label for="email">Email
                        <input type="text" id="email" name="email" placeholder="Email" size="37">
                        <span id="errorLabelEmail"></span>
                    </label><br>

                    <label for="imss">No. IMSS
                        <input type="text" id="imss" name="imss" placeholder="No. IMSS" size="35">
                        <span id="errorLabelNoImss"></span>
                    </label>
                    <span style="display:inline-block; width: 200px;"></span>
                    <label for="rfc">RFC
                        <input type="text" id="rfc" name="rfc" placeholder="RFC" size="38">
                        <span id="errorLabelRfc"></span>
                    </label><br>

                    <label for="curp">CURP
                        <input type="text" id="curp" name="curp" placeholder="CURP" size="38">
                        <span id="errorLabelCurp"></span>
                    </label>
                    <span style="display:inline-block; width: 200px;"></span>
                    <label for="puesto">Puesto
                        <input type="text" id="puesto" name="puesto" placeholder="Puesto" size="36">
                        <span id="errorLabelPuesto"></span>
                    </label><br>
                    <label for="fnacim">Fecha de Nacimiento
                        <input type="text" id="fnacim" name="fnacim" placeholder="Fecha de Nacimiento" size="25">
                        <span id="errorLabelFechaNacim"></span>
                    </label>
                    <span style="display:inline-block; width: 200px;"></span>
                    <label for="fini">Fecha de Inicio
                        <input type="text" id="fini" name="fini" placeholder="Fecha de Inicio" size="29">
                        <span id="errorLabelFechaIni"></span>
                    </label><br>

                    <label for="salhora">Salario por Hora
                        <input type="text" id="salhora" name="salhora" placeholder="Salario por Hora" size="29">
                        <span id="errorLabelSalarioHora"></span>
                    </label>
                    <span style="display:inline-block; width: 200px;"></span>
                    <label for="salnof">Salario NOF
                        <input type="text" id="salnof" name="salnof" placeholder="Salario NOF" size="32">
                        <span id="errorLabelSalarioNof"></span>
                    </label><br>

                    <label for="isr">ISR
                        <input type="text" id="isr" name="isr" placeholder="ISR" size="40">
                        <span id="errorLabelIsr"></span>
                    </label>
                    <span style="display:inline-block; width: 200px;"></span>
                    <label for="impimss">IMSS
                        <input type="text" id="impimss" name="impimss" placeholder="IMSS" size="38">
                        <span id="errorLabelImss"></span>
                    </label><br>

                    <label for="subsidio">Subsidio al Empleado
                        <input type="text" id="subsidio" name="subsidio" placeholder="Subsidio al Empleado" size="25">
                        <span id="errorLabelSubsidio"></span>
                    </label>
                    <span style="display:inline-block; width: 200px;"></span>
                    <label for="infonavit">Infonavit
                        <input type="text" id="infonavit" name="infonavit" placeholder="Infonavit" size="35">
                        <span id="errorLabelInfonavit"></span>
                    </label><br>
                    <label for="activo">Activo
                        <input type="text" id="activo" name="activo" placeholder="Activo" size="38">
                        <span id="errorLabelActivo"></span>
                    </label>
                    <span style="display:inline-block; width: 200px;"></span>
                    <label for="usuario">Usuario
                        <input type="text" id="usuario" name="usuario" placeholder="Usuario" size="36">
                        <span id="errorLabelUsuario"></span>
                    </label><br>
                    <label for="contrasena">Contraseña
                        <input type="text" id="contrasena" name="contrasena" placeholder="Contraseña" size="34">
                        <span id="errorLabelContrasena"></span>
                    </label><br><br><br>

                    <button style="width:300px" id="AgregaEmp" type="submit" class="btn btn-lg btn-success btn-block"> Aceptar</button>
                    <br><br><br><br><br><br><br><br>


                </form>
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

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

</body>

</html>

