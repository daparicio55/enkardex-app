document.getElementById('showpassword').addEventListener('change',function(){
    let txtpassword = document.getElementById('password');
    let txtrepassword = document.getElementById('repassword');
    if (this.checked){
        //mostrar la contraseña
        txtpassword.type="text";
        txtrepassword.type="text";
    }else{
        //ocultar la contraseña
        txtpassword.type="password";
        txtrepassword.type="password";
    }
});
