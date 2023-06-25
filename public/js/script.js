function getValueById(id){
    return document.getElementById(id).value;
}

function getById(id){
    return document.getElementById(id);
}

function appendHTMLById(id, html){
    document.getElementById(id).innerHTML += html;
}

function pesquisar(){

    if(getValueById("txtPesquisa").length <= 2){
        Swal.fire(
            'Erro',
            'A pesquisa precisa ter mais de 2 caracteres!',
            'error'
          )
        return false;
    }

    var form = getById("frmPesquisa");
    var url = form.action + "p/" + getValueById("txtPesquisa");

    document.location.href = url;
    return false;
}
