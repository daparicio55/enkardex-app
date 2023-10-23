function btn_op(id){
    let op = document.getElementById('op-'+id);
    let valor = document.getElementById('value-'+id);
    let btn = document.getElementById('btn-'+id);
    if (op.value == "SI"){
        op.value = "NO";
        btn.innerHTML = "NO";
        btn.classList.replace('btn-primary','btn-danger');
        valor.setAttribute('readonly','readonly');
        
    }else{
        op.value = "SI";
        btn.innerHTML = "SI";
        btn.classList.replace('btn-danger','btn-primary');
        valor.removeAttribute('readonly');
    }
}
