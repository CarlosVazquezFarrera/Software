function validarBusqueda(){
    var busqueda = document.getElementById("buscar").value;
    if (busqueda === ""){
        alert("Escriba el una clave para buscar un cliente");
        return false;
    }
}

const esLetra = (caracter) =>{
    var ascci = caracter.toUpperCase().charCodeAt(0);
    return ascci > 64 && ascci < 91;
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
function mensajeError(titulo, mensaje){
    Swal.fire({
        type: 'error',
        title: titulo,
        text: mensaje
      })
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
    var nombre = document.getElementById("nombreCliente").value.split('');
    if (nombre === ""){
        mensajeError("Campo obligatorio", "El nombre no debe estar vacío");
        return false;
    }
    if (nombre.length < 5){
        mensajeError("Longitud de nombre", "El nombre debe estar constituido por al menos 5 caracteres");
        return false;
    }
    else if(!isString(nombre)){
        mensajeError("Longitud de nombre", "El nombre sólo debe contener letras");
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
        alert("El nombre de la mascota no debe estar vacío");
        return false;
    }
    else if (nombreMascota.length < 3){
        alert("El nombre de la mascota debe estar constituido por al menos 3 caracteres");
        return false;
    }
    /*2019-10-03 */
    else if(fechaActual < fechaNacimiento){
        alert("La fecha nacimiento no puede ser superior al día de hoy");
        return false;
    }
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
            alert("error al cargar las razas");
          });
  }
  
});


