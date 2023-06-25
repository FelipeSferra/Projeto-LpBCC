function validar(validateId) {
    getById("dvAlert").innerHTML = "";
  
    var valid = true;
  

    if (getValueById("txtUser").length < 6) {
      appendHTMLById(
        "dvAlert",
        "<div class='alert alert-warning col-md-6'>Usuário inválido. Mínimo 6 caracteres!</div>"
      );
      valid = false;
    }

    if (getValueById("txtSen").length < 8) {
      appendHTMLById(
        "dvAlert",
        "<div class='alert alert-warning col-md-6'>Senha inválida. Mínimo 8 caracteres!</div>"
      );
      valid = false;
    }
  
    if (validateId && getValueById("txtId") <= 0) {
      appendHTMLById(
        "dvAlert",
        "<div class='alert alert-warning col-md-6'>ID não encontrado</div>"
      );
      valid = false;
    }
  
    return valid;
  }

  function showPassword(){
    let Pass = getById("txtSen");

    if(Pass.type === "password"){
      Pass.type = "text";
    }else{
      Pass.type = "password";
    }
  }

