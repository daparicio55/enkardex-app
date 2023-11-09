document.getElementById('nacimiento').addEventListener('blur', function () {
    let e = document.getElementById('edad');
    e.value = edad(this.value);
});
