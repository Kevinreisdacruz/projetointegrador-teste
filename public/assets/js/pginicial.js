AOS.init()

let caixaexcluir = document.getElementById('container-excluir');
let exclusao = document.getElementById('exclusao');
exclusao.addEventListener("click", excluir)


function excluir() {
  caixaexcluir.style.display = "flex";


};

let caixaalterar = document.getElementById('container-alterar');
let alteracao = document.getElementById('alteracao');
alteracao.addEventListener("click", alterar)

function alterar() {
  caixaalterar.style.display = "flex";

};

$('#fone').mask('(00) 00000-0000');
$('#fone-cadastro').mask('(00) 00000-0000');
$('#data').mask('00/00');
$('#cod-seguranca').mask('000');
$('#num-card').mask('0000 0000 0000 0000');
