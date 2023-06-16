function validar(validateId){

    getById("dvAlert").innerHTML = "";
    
    var valid = true;

    if(getValueById("txtAut").length < 3){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Editora inválida. Mínimo 3 caracteres!</div>");
        valid = false;
    }

    if(validateId && getValueById("txtId") <= 0){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>ID não encontrado</div>");
        valid = false;
    }

    return valid;
}