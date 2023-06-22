function validar(validateId){

    getById("dvAlert").innerHTML = "";
    
    var valid = true;

    if(getValueById("txtNome").length < 3){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Nome inválido. Mínimo 3 caracteres!</div>");
        valid = false;
    }

    if(getValueById("nmCEP") <= 0){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>CEP inválido.</div>");
        valid = false;
    }

    if(getValueById("nmNum") <= 0){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Número inválido.</div>");
        valid = false;
    }

    if(getValueById("nmQtdenmQtde") < 0){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Quantidade inválida.</div>");
        valid = false;
    }

    // if(getValueById("txtCidade").lenght < 3){
    //     appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Cidade inválida. Mínimo 3 caracteres!</div>");
    //     valid = false;
    // }

    if(getValueById("txtEnd").lenght < 3){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Endereço inválido. Mínimo 3 caracteres!</div>");
        valid = false;
    }

    if(validateId && getValueById("txtId") <= 0){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>ID não encontrado</div>");
        valid = false;
    }

    return valid;
}