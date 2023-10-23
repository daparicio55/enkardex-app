//evento de
let cont = 0;
let nombres = [];
//verificar si ya hay alguno con el nombre
function duplicado(nombre){
    const miTabla = document.getElementById("table_body");
    const filas = miTabla.rows; // Obtener la primera fila (el índice es 0)
    if (filas){
        for(let i = 0; i < filas.length; i++){
            const celdas = filas[i].cells;
            for(let j = 0; j < celdas.length; j++ ){
                const celda = celdas[j];
                if(celda.textContent == nombre){
                    return true;
                }
            }

        }
    }
    return false;
}
document.getElementById('btn_add').addEventListener('click',function(){
    //verificar si esta vacio el texto
    cont ++;
    let txt = document.getElementById('texto_detalle');
    let unidad = document.getElementById('unidad');
    if (txt.value.length > 0 ){
        if (duplicado(txt.value) == false){
            let txt_unidad = unidad.options[unidad.selectedIndex].innerHTML;
            let id_unidad = unidad.value;
            //creamos un nuevo TR
            let row = document.createElement('tr');
            row.setAttribute('id','row'+cont);
            //creamos los td
            let td_orden = document.createElement('td');
            let td_nombre = document.createElement('td');
            let txt_nombre = document.createElement('input');
            txt_nombre.name = 'nombres[]';
            txt_nombre.type = 'hidden';
            txt_nombre.value = txt.value;
            let td_unidad = document.createElement('td');
            let txt_id_unidad = document.createElement('input');
            txt_id_unidad.name = 'unidades[]';
            txt_id_unidad.type = 'hidden';
            txt_id_unidad.value = id_unidad;
            let td_button = document.createElement('td');
            //creamos el boton eliminar
            let btn = document.createElement('button');
            td_orden.innerHTML = cont;
            td_nombre.innerHTML = txt.value;
            td_unidad.innerHTML = txt_unidad;
            btn.classList.add("btn");
            btn.classList.add("btn-danger");
            btn.setAttribute('onclick','detalle_eliminar('+ cont +')')
            btn.innerHTML = "X";
            td_button.appendChild(btn);
            //agregamos todo al TR -> row
            row.appendChild(td_orden);
            row.appendChild(td_nombre);
            row.appendChild(td_unidad);
            row.appendChild(td_button);
            row.appendChild(txt_nombre);
            row.appendChild(txt_id_unidad);
            //ahora lo agregamos a la tabla
            document.getElementById("table_body").appendChild(row);
        }else{
            alert('nombre duplicado');
        }
    }else{
        alert('el texto no puede ir vacio');
    }
});
function detalle_eliminar(id){
    let row = document.getElementById('row'+id);
    if(row){
        row.remove();
    }
}