let analisis = document.getElementById('analisis');
let table = document.getElementById('table_body');
const btn_add = document.getElementById('btn-add-analisis');

function deleterow(id){
    console.log(id);
    const fila = document.getElementById('row'+id);
    fila.parentNode.removeChild(fila);
}

btn_add.addEventListener('click',()=>{
    let option = analisis.options[analisis.selectedIndex];
    let fila = document.getElementById('row'+option.value);
    if (fila == null){
        let row = document.createElement('tr');
        row.id = 'row'+option.value;
        let c_texto = document.createElement('td');
        c_texto.innerHTML= option.textContent;
        let c_button = document.createElement('td');
        c_button.style.width = '130px';
        let txtanalysis = document.createElement('input');
        txtanalysis.name = 'analysis[]';
        txtanalysis.type = 'hidden';
        txtanalysis.value = option.value;
        let btn = document.createElement('button');
        btn.type = "button";
        btn.innerHTML= '<i class="fas fa-minus-circle"></i> Eliminar';
        btn.classList.add('btn','btn-danger');
        btn.setAttribute('onclick','deleterow('+option.value+')');
        c_texto.appendChild(txtanalysis);
        c_button.appendChild(btn);
        row.appendChild(c_texto);
        row.appendChild(c_button);
        table.appendChild(row);
    }else{
        alert('El analisis ya esta en la lista');
    }
});
