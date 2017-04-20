<?php 

session_start();
$_SESSION['Usuario'] = NULL;
$_SESSION['Nombre'] = NULL;
$_SESSION['Puesto'] = NULL;
$_SESSION['Activity'] = NULL;


unset($_SESSION['Usuario']);
unset($_SESSION['Nombre']);
unset($_SESSION['Puesto']);
unset($_SESSION['Activity']);

session_destroy();


$logoutGoTo = "login.php";
if ($logoutGoTo) {
	header("Location: $logoutGoTo");
	exit;
}

?>