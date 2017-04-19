$(document).ready(function(){
//------------------------------------------------------------------------
//    Funcion Edit Empleado 
//------------------------------------------------------------------------

$('body').on('click', '#editEmp', function(e) {
   
   name=$(this).attr("data-id");
   arr2=name.split('/');
   $('#nombreEdit').val(arr2[0]);
   $('#nominaEdit').val(arr2[1]);
   $('#domicilioEdit').val(arr2[2]);
   $('#coloniaEdit').val(arr2[3]);
   $('#ciudadEdit').val(arr2[4]);
   $('#telefonoEdit').val(arr2[5]);
   $('#celularEdit').val(arr2[6]);
   $('#emailEdit').val(arr2[7]);
   $('#imssEdit').val(arr2[8]);
   $('#rfcEdit').val(arr2[9]);
   $('#curpEdit').val(arr2[10]);
   $('#puestoEdit').val(arr2[11]);
   $('#salhoraEdit').val(arr2[12]);
   $('#salnofEdit').val(arr2[13]);
   $('#isrEdit').val(arr2[14]);
   $('#impimssEdit').val(arr2[15]);
   $('#subsidioEdit').val(arr2[16]);
   $('#infonavitEdit').val(arr2[17]);
   $('#activoEdit').val(arr2[18]);
   $('#usuarioEditEmp').val(arr2[19]);
   $('#editEmpleadoInfo').modal();

});
//------------------------------------------------------------------------
//    Funcion Delete Empleado 
//------------------------------------------------------------------------

$('body').on('click', '#delete_emp', function(e) {
   
   name=$(this).attr("data-id");
   arr2=name.split('/');
   $('#nombreDelete').val(arr2[0]);
   $('#nominaDelete').val(arr2[1]);
   $('#DeleteEmpleadoInfo').modal();

});


//------------------------------------------------------------------------
//    Funcion Edit Proveedor 
//------------------------------------------------------------------------

$('body').on('click', '#editProv', function(e) {
   
   name=$(this).attr("data-id");
   arr2=name.split('/');
   $('#idProvEdit').val(arr2[0]);
   $('#NombreProvEdit').val(arr2[1]);
   $('#RFCProvEdit').val(arr2[2]);
   $('#DomicilioProvEdit').val(arr2[3]);
   $('#TelefonoProvEdit').val(arr2[4]);
   $('#VendedorProvEdit').val(arr2[5]);
   $('#FaxProvEdit').val(arr2[6]);
   $('#EditarProvedor').modal();

});
//------------------------------------------------------------------------
//    Funcion Delete Proveedor 
//------------------------------------------------------------------------

$('body').on('click', '#delete_prov', function(e) {
   
   name=$(this).attr("data-id");
   arr2=name.split('/');
   $('#idProvDelete').val(arr2[0]);
   $('#NombreProvDelete').val(arr2[1]);
   $('#DeleteProveedorInfo').modal();

});

});
