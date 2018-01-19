function mostrarContraseña() {
    var check, psw;

    check = document.getElementById("mostrar");
    psw = document.getElementById("pass");

    if(check.checked==true){
        psw.type = "text";
    }else {
        psw.type="password";
    }

}