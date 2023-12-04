/* document.addEventListener('submit',function(event){
    //event.preventDefault();
    event.submitter.setAttribute('disabled',true)
    //console.log(event.submitter.setAttribute('disabled',true));
}); */
function edad(edad) {
    if (edad != "") {   
        console.log("lleno");
        var fechaNacimiento = edad;
        // Parsea la fecha de nacimiento a un objeto Date
        var fechaNacimientoDate = new Date(fechaNacimiento);
        // Obtiene la fecha actual
        var fechaActual = new Date();
        // Calcula la diferencia en milisegundos entre la fecha actual y la fecha de nacimiento
        var diferencia = fechaActual - fechaNacimientoDate;
        // Convierte la diferencia de milisegundos a años
        var edad = Math.floor(diferencia / (1000 * 60 * 60 * 24 * 365.25));
        return edad;
    }
}

function mostrarPantallaDeCarga() {
    const loader = document.getElementById('loader-wrapper');
    loader.style.display = "flex";
    loader.style.opacity = '1'; // Establece la opacidad al 100%
}
// Ocultar la pantalla de carga con un efecto fade
function ocultarPantallaDeCarga() {
    const loader = document.getElementById('loader-wrapper');
    loader.style.display = "none";
    loader.style.opacity = '0'; // Establece la opacidad al 0%
}
function alergias(id,ruta){
    if (id == 0){
        console.log('sin alergias');
    }else{
        mostrarPantallaDeCarga();
        fetch(ruta+'apis/alergias/'+id)
        .then(response => {
            if(!response.ok){
                throw new Error('Error en la solicitud');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
        })
        .catch(error =>{
            console.log(error);
        })
        .finally(()=>{
            ocultarPantallaDeCarga();
        });
    }
}
function buscardni(dni,ruta){
    //console.log(dni);
    if(dni == ""){
        alert('El campo no puede estar vacio');
    }else{
        mostrarPantallaDeCarga();
        fetch(ruta+'apis/getdni/'+dni)
        .then(response => {
            if(!response.ok){
                throw new Error('Error en la solicitud');
            }
            return response.json();
        })
        .then(data =>{
            console.log(data.alergias);
            let nombres = document.getElementById('nombres');
            let apellidoMaterno = document.getElementById('apellidoMaterno');
            let apellidoPaterno = document.getElementById('apellidoPaterno');
            let sexo = document.getElementById('sexo');
            let nacimiento = document.getElementById('nacimiento');
            let edad = document.getElementById('edad');
            let historia = document.getElementById('historia');
            let cliente = document.getElementById('cliente');
            if(data.message == true){
                nombres.value = data.nombres;
                apellidoMaterno.value = data.apellidoMaterno;
                apellidoPaterno.value = data.apellidoPaterno;
                sexo.value = data.sexo;
                nacimiento.value = data.nacimiento;
                edad.value = data.edad;
                historia.value = data.historia;
                cliente.value = data.cliente;
            }else{
                console.log("no");
            }
            //ahora debemos regresar sus alergias..

            $('#alergias').val(data.alergias);
            $('#alergias').trigger('change'); // Notify any JS components that the value changed
        })
        .catch(error=>{
            console.log(error);
        })
        .finally(()=>{
            ocultarPantallaDeCarga();
        });
        //console.log(dni);
    }
}
