function validar(validateId) {
  getById("dvAlert").innerHTML = "";

  var valid = true;

  if (getValueById("txtAut").length < 3) {
    appendHTMLById(
      "dvAlert",
      "<div class='alert alert-warning col-md-6'>Autor inválido. Mínimo 3 caracteres!</div>"
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

$("#submitEditarAutor").on("click", function (e) {
  e.preventDefault();

  Swal.fire({
    title: "Você quer salvar as alterações?",
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: "Salvar",
    denyButtonText: `Descartar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      $("#frmEditarAutor").submit();
    } else if (result.isDenied) {
      Swal.fire("Alterações descartadas!", "", "info");
    }
  });
});
