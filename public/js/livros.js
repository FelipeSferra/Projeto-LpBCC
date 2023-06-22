function validar(validateId){

    getById("dvAlert").innerHTML = "";
    
    var valid = true;

    if(getValueById("txtTitulo").length < 3){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Título inválido. Mínimo 3 caracteres!</div>");
        valid = false;
    }

    if(getValueById("slStatus").length < 3){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Status inválido. Escolha uma opção válida!</div>");
        valid = false;
    }

    if(getValueById("nmQtde") < 0){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Quantidade inválida. Escolha uma quantidade válida!</div>");
        valid = false;
    }

    if(getValueById("slEditora") <= 0){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Editora inválida.</div>");
        valid = false;
    }

    if(getValueById("slGenero") <= 0){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Gênero inválido.</div>");
        valid = false;
    }

    if(getValueById("slAutor") <= 0){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Autor inválido.</div>");
        valid = false;
    }

    if(getValueById("txtThumb").length < 3){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Thumbnail inválida.</div>");
        valid = false;
    }

    if(getValueById("txtSinopse").length < 10){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Sinopse inválida. Mínimo 10 caracteres!</div>");
        valid = false;
    }

    if(validateId && getValueById("txtId") <= 0){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>ID não encontrado</div>");
        valid = false;
    }

    return valid;
}