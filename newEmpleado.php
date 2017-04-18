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
            <div>
                <form>
                <div class="row">
                    <div class="left">
                    <label for="nombre">Nombre <br>
                    <input type="text" id="nombre" placeholder="Nombre" ><br>
                        <span style="color:red"> <span id="errorName"></span> </span>
                    </label>

                    <label for="nomina">Nomina <br>
                    <input type="text" id="nomina" name="nomina" placeholder="Nomina" ><br>
                        <span style="color:red"> <span id="errorLabelNomina"></span> </span>
                    </label>

                    <label for="domicilio">Domicilio <br>
                        <input type="text" id="domicilio" name="domicilio" placeholder="Domicilio" ><br>
                        <span style="color:red"> <span id="errorLabelDomicilio"></span> </span>
                    </label>
                    <label for="colonia">Colonia <br>
                        <input type="text" id="colonia" name="colonia" placeholder="Colonia"><br>
                        <span style="color:red"> <span id="errorLabelColonia"></span> </span>
                    </label>

                    <label for="ciudad">Ciudad <br>
                        <input type="text" id="ciudad" name="ciudad" placeholder="Ciudad" ><br>
                        <span style="color:red"> <span id="errorLabelCiudad"></span> </span>
                    </label>
                    <label for="telefono">Telefono <br>
                        <input type="text" id="telefono" name="telefono" placeholder="Telefono"><br>
                        <span style="color:red"> <span id="errorLabelTelefono"></span> </span>
                    </label>

                    <label for="celular">Celular <br>
                        <input type="text" id="celular" name="celular" placeholder="Celular" ><br>
                        <span style="color:red"> <span id="errorLabelCelular"></span> </span>
                    </label>
                    <label for="email">Email <br>
                        <input type="text" id="email" name="email" placeholder="Email" ><br>
                        <span style="color:red"> <span id="errorLabelEmail"></span> </span>
                    </label>

                    <label for="imss">No. IMSS <br>
                        <input type="text" id="imss" name="imss" placeholder="No. IMSS" ><br>
                        <span style="color:red"> <span id="errorLabelNoImss"></span> </span>
                    </label>
                    <label for="rfc">RFC <br>
                        <input type="text" id="rfc" name="rfc" placeholder="RFC" ><br>
                        <span style="color:red"> <span id="errorLabelRfc"></span> </span>
                    </label>

                    <label for="curp">CURP <br>
                        <input type="text" id="curp" name="curp" placeholder="CURP" ><br>
                        <span style="color:red"> <span id="errorLabelCurp"></span> </span>
                    </label>
                    <label for="puesto">Puesto <br>
                        <select type="text" id="puesto" name="puesto" placeholder="Puesto">
                            <option value="">Seleccionar Una Opcion *</option>
                            <option value="Admin">Admin</option>
                            <option value="Empleado">Empleado</option>
                        </select>
                        <span style="color:red"> <span id="errorLabelPuesto"></span> </span>
                    </label>
                    </div>
                </div>
                <div class="row">
                    <div class="right">
                    <label for="fnacim">Fecha de Nacimiento <br>
                        <input type="date" id="fnacim" name="fnacim" ><br>
                        <span style="color:red"> <span id="errorLabelFechaNacim"></span> </span>
                    </label>
                    <label for="fini">Fecha de Inicio <br>
                        <input type="date" id="fini" name="fini" ><br>
                        <span style="color:red"> <span id="errorLabelFechaIni"></span> </span>
                    </label>

                    <label for="salhora">Salario por Hora<br>
                        <input type="text" id="salhora" name="salhora" placeholder="Salario por Hora"><br>
                        <span style="color:red"> <span id="errorLabelSalarioHora"></span> </span>
                    </label>
                    <label for="salnof">Salario NOF<br>
                        <input type="text" id="salnof" name="salnof" placeholder="Salario NOF" ><br>
                        <span style="color:red"> <span id="errorLabelSalarioNof"></span> </span>
                    </label>

                    <label for="isr">ISR<br>
                        <input type="text" id="isr" name="isr" placeholder="ISR" ><br>
                        <span style="color:red"> <span id="errorLabelIsr"></span> </span>
                    </label>
                    <label for="impimss">IMSS<br>
                        <input type="text" id="impimss" name="impimss" placeholder="IMSS" ><br>
                        <span style="color:red"> <span id="errorLabelImss"></span> </span>
                    </label>

                    <label for="subsidio">Subsidio al Empleado<br>
                        <input type="text" id="subsidio" name="subsidio" placeholder="Subsidio al Empleado" ><br>
                        <span style="color:red"> <span id="errorLabelSubsidio"></span> </span>
                    </label>
                    <label for="infonavit">Infonavit<br>
                        <input type="text" id="infonavit" name="infonavit" placeholder="Infonavit"><br>
                        <span style="color:red"> <span id="errorLabelInfonavit"></span> </span>
                    </label>
                    <label for="activo">Activo<br>
                        <select type="text" id="activo" name="activo" placeholder="Activo" >
                        <option value="">Seleccione una opcion ...</option>
                        <option value="Si">Activo</option>
                        <option value="No">Inactivo</option>
                        </select>
                        <span style="color:red"> <span id="errorLabelActivo"></span> </span>
                    </label>
                    <label for="usuario">Usuario<br>
                        <input type="text" id="usuario" name="usuario" placeholder="Usuario"><br>
                        <span style="color:red"> <span id="errorLabelUsuario"></span> </span>
                    </label>
                    <label for="contrasena">Contraseña<br>
                        <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" ><br>
                        <span style="color:red"> <span id="errorLabelContrasena"></span> </span>
                    </label>
                    </div>
                </div>
                <br>
                <div class="row" style="padding-bottom: 20px;">
                    <button style="width:300px" id="AgregaEmp" type="button" class="btn btn-lg btn-success btn-block pull-left"> Aceptar</button>
                    <a href="empleados.php"><button style="width:300px" type="button" class="btn btn-lg btn-danger btn-block pull-right"> Cancelar</button></a>
                </div>
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

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

</body>

</html>

