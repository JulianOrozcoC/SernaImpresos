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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['Usuario']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i id="signOutButton" class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
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
                                if ($_SESSION['Puesto'] == 'Admin') {
                                    echo "<a href='empleados.php'><i class='fa fa-fw fa-users'></i> Empleados</a>";
                                }
                        ?>
                        
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