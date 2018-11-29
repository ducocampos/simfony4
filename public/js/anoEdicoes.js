function editarAno(ano) {
    var botoesEdit = '<button type="button" class="btn btn-primary mb-2 mr-sm-2">Salvar</button><button type="button" class="btn btn-danger mb-2 mr-sm-2" onclick="resetar();">Cancelar</button>';
    document.getElementById("botoesPrinc").style.display = "none";
    document.getElementById("botoesEdit").innerHTML = botoesEdit;
    document.getElementById("formAnoEdicoes").value = ano;
}

function resetar() {
    var campo = document.getElementById("formAnoEdicoes").value;
    document.getElementById("formAnoEdicoes").value = "";
    document.getElementById("botoesPrinc").style.display = "inline-block";
    document.getElementById("botoesEdit").style.display = "none";
}
