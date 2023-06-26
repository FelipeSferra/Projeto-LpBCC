function validar(validateId) {
    getById("dvAlert").innerHTML = "";
  
    var valid = true;
  
    if(validateId && getValueById("slCliente") <= 0){
        appendHTMLById("dvAlert","<div class='alert alert-warning col-md-6'>Cliente inválido.</div>");
        valid = false;
    }
  
    return valid;
  }

  