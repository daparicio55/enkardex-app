document.addEventListener('submit',function(event){
    //event.preventDefault();
    event.submitter.setAttribute('disabled',true)
    //console.log(event.submitter.setAttribute('disabled',true));
});


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
            console.log(data);
            let apellidos = document.getElementById('apellidos');
            let nombres = document.getElementById('nombres');
            let telefono = document.getElementById('telefono');
            let correo = document.getElementById('correo');
            let direccion = document.getElementById('direccion');
            let cliente = document.getElementById('cliente');
            let sexo = document.getElementById('sexo');
            let nacimiento = document.getElementById('nacimiento');
            if(data.message == 'dni no valido'){
                //nose encontro nada.
                nombres.value = 'ENTRADA MANUAL'
                apellidos.value = 'ENTRADA MANUAL'
                telefono.value = "999999999";
                correo.value = "sincorreo@gmail.com";
                direccion.value = "sin dirección";
            }else{
                //completamos con los datos.
                nombres.value = data.nombres;
                apellidos.value = data.apellidoPaterno+' '+data.apellidoMaterno;
                telefono.value = data.telefono;
                correo.value = data.correo;
                direccion.value = data.direccion;
                if('cliente' in data ){
                    cliente.value = data.cliente;
                }else{
                    cliente.value = "0"
                }
                //sexo.value = data.sexo;
                nacimiento.value = data.nacimiento;
            }
        })
        .catch(error=>{
            console.log(error);
        })
        .finally(()=>{
            console.log("se termino");
            ocultarPantallaDeCarga();
        });
        //console.log(dni);
    }
}
