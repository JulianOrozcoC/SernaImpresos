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
    <script type = "text/javascript" src="js/facturas.js"></script>
    <title>Serna Impresos</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

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
        <?php include 'sideBar.php'; ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Facturas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Facturas </h3>
                    </div>
                    <div id="facBox">
                        <table id="facturas">
                            <tr>
                                <th>Factura</th>
                                <th>Fecha</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="left"><br>
                <label for="factura">Nombre de la Factura <br>
                    <input type="text" id="factura" name="factura" placeholder="Nombre" ><br>
                    <span style="color:red"> <span id="errorFactura"></span> </span>
                </label>

                <label for="fecha">Fecha <br>
                    <input type="date" id="fecha" name="fecha" ><br>
                    <span style="color:red"> <span id="errorFecha"></span> </span>
                </label><br><br>

                <p>
                    <button style="width:300px" id="AgregaFac" type="button" class="btn btn-lg btn-success btn-block"> Aceptar</button>
                </p>

            </div>

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
