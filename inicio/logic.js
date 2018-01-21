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

function noVolver() {
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="";}
}