function validar(validateId){

    getById("dvAlert").innerHTML = "";
    
    var valid = true;

    if(getValueById("txtGen").length < 2){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Gênero inválido. Mínimo 3 caracteres!</div>");
        valid = false;
    }

    if(validateId && getValueById("txtId") <= 0){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>ID não encontrado</div>");
        valid = false;
    }

    return valid;
}