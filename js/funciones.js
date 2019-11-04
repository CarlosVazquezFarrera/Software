function mensajeError(titulo, mensaje){
    Swal.fire({
        type: 'error',
        title: titulo,
        text: mensaje
      })
}

function validarBusqueda(){
    var busqueda = document.getElementById("buscar").value;
    if (busqueda === ""){
        mensajeError("Llene el campo", "Debe escribir una clave para buscar un cliente");
        return false;
    }
}

function validarBusquedaCliente(){
    var busqueda = document.getElementById("cliente").value;
    if (busqueda === ""){
        mensajeError("Llene el campo", "Debe escribir una clave para buscar un cliente");
        return false;
    }
}

const esLetra = (caracter) =>{
    var ascci = caracter.toUpperCase().charCodeAt(0);
    return (ascci > 64 && ascci < 91) || ascci == 130 || ascci == 32 || ascci == 193 || ascci == 201 || ascci == 205 || ascci == 211 || ascci == 218;
}

function isString(cadena){
    var cantidad = 0;
    cadena.forEach(caracter => {
        if(!esLetra(caracter)){
            cantidad ++;
        }
    });
    if (cantidad != 0){
        return false;
    }
    else {
        return true;
    }
}

function validarFormulario(){
    var apellido = document.getElementById("clienteApellido").value.split('');
    var cuenta = document.getElementById("clienteNumero").value;
    var direccion = document.getElementById("clienteDireccion").value;
    var telefono = document.getElementById("clienteTelefono").value;

    if (cuenta === "" || apellido === "" || direccion === "" || telefono === ""){ 
        mensajeError("Campos incompletos", "Debe llenar todos los campos");
        return false;
    }
    else if(!isString(apellido)){
        mensajeError("Caracteres no permitidos", "El apellido sólo debe contener letras");
        return false;
    }
    else if (cuenta.length != 16){
        mensajeError("Longitud de número de tarjeta", "El número de tarjeta debe tener 16 dígitos");
        return false;
    }
    else if (direccion.length < 15){
        mensajeError("Longitud de dirección", "La dirección es muy corta");
        return false;
    }
    else if (telefono.length != 10){
        mensajeError("Longitud de teléfono", "El teléfono debe tener 10 dígitos");
        return false;
    }
}

function validarPersona(){
    var nombre = document.getElementById("nombrePersona").value.split('');
    var apellido = document.getElementById("apellidoPersona").value.split('');
    var telefono = document.getElementById("telefonoPersona").value.split('');
    
    if (nombre === ""){
        mensajeError("Campo obligatorio", "El nombre no debe estar vacío");
        return false;
    }
    else if (nombre.length < 3){
        mensajeError("Longitud de nombre", "El nombre debe estar constituido por al menos 3 caracteres");
        return false;
    }
    else if(!isString(nombre)){
        mensajeError("Caracteres no permitidos", "El nombre sólo debe contener letras");
        return false;
    }
    else if(apellido ===  ""){
        mensajeError("Campo obligatorio", "El apellido no debe estar vacío");
        return false;
    }
    else if(apellido.length < 3){
        mensajeError("Longitud de apellido", "El apellido debe estar constituido por al menos 3 caracteres");
        return false;
    }
    else if(!isString(apellido)){
        mensajeError("Caracteres no permitidos", "El apellido sólo debe contener letras");
        return false;
    }
    else if(telefono.length != 10){
        mensajeError("Longitud del teléfono", "El teléfono debe estar constituido por 10 números");
        return false;
    }

}

function validarMascota(){
    var nombreMascota = document.getElementById("nombreMascota").value.split('');
    var nacimiento = document.getElementById("nacimiento").value.split('-');
    var anioNacimiento = nacimiento[0];
    var mesNacimiento = nacimiento[1];
    var diaNacimiento = nacimiento[2];  
    
    var fecha = new Date();
    var diaHoy = fecha.getDate();
    var mesHoy = fecha.getMonth() + 1;
    var anioHoy = fecha.getFullYear();
    
    var fechaActual = new Date(anioHoy, mesHoy, diaHoy);
    var fechaNacimiento = new Date(anioNacimiento, mesNacimiento, diaNacimiento); 
    
    
    if (nombreMascota === ""){
        mensajeError("Campo obligatorio", "El nombre de la mascota no debe estar vacío");
        return false;
    }
    else if (nombreMascota.length < 3){
        mensajeError("Longitud del nombre de la mascota", "El nombre de la mascota debe estar constituido por al menos 3 caracteres");
        return false;
    }
    /*2019-10-03 */
    else if(fechaActual < fechaNacimiento){
        mensajeError("Inconsistencia de datos", "La fecha nacimiento no puede ser superior al día de hoy");
        return false;
    }
}

function validarVacuna(){
    var vacuna = document.getElementById("nombreVacuna").value.split('');
    if (!isString(vacuna)){
        mensajeError("Caracteres no permitidos", "El  nombre de la vacuna sólo debe contener letras");
        return false;
    }
}
function validarEnfermedad(){
    var enfermedad = document.getElementById("nombreEnfermedad").value.split('');
    if (!isString(enfermedad)){
        mensajeError("Caracteres no permitidos", "El  nombre de la enfermedad sólo debe contener letras");
        return false;
    }
}
function validarVisita(){
    var busqueda = document.getElementById("cliente").value;
    if (busqueda === ""){
        mensajeError("Llene el campo", "Debe escribir una clave para buscar un cliente");
        return false;
    }
}
function eliminar(idPersona, idCliente){
    Swal.fire({
        title: '¿Seguro que desea eliminar?',
        text: "Los cambios serán permanentes",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'No, cancelar'
      }).then((result) => {
        if (result.value) {
          Swal.fire({
            title:'¡Eliminado!',
            text:'Se ha eliminado correctamente a la persona',
            type:'success',
            showCancelButton: false,
            showConfirmButton: false,
            timer: 1500
          })
          //window.location.href ="/software/cliente/clientePerfil.php?idCliente="+idCliente+"&idPersona="+idPersona
        }
      })
}

$("#especie").change(function() {
  var idEspecie = document.getElementById("especie").value;
  if (idEspecie != 0){
    $.ajax(
        {
          url : '/software/datos/datosRaza.php',
          type: "POST",
          data : {idEspecie: idEspecie}
        })
          .done(function(data) {
            $('#raza').html(data);
          })
          .fail(function() {
            mensajeError("Error", "Error al cargar las razas");
          });
  }
});



