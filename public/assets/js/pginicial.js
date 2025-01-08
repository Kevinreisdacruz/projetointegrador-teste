AOS.init()


var caixalogin = document.getElementById('container-login');
var login = document.getElementById('login');
var caixaentrar = document.getElementById('caixalogin')
login.addEventListener("click", abrir);


function abrir() {
  caixalogin.style.display = "flex";
}



var caixaexcluir = document.getElementById('container-excluir');
var exclusao = document.getElementById('exclusao');
exclusao.addEventListener("click", excluir)
$('#fone').mask('(00) 00000-0000');

function excluir() {
  caixaexcluir.style.display = "flex";


};

var caixaalterar = document.getElementById('container-alterar');
var alteracao = document.getElementById('alteracao');
alteracao.addEventListener("click", alterar)

function alterar() {
  caixaalterar.style.display = "flex";

};

var caixaconfirmaracao = document.getElementById('container-confirmar-exclusao-admin');
var confirmaracao = document.getElementById('confirmaracao');
confirmaracao.addEventListener("click", acao)

function acao() {
  caixaconfirmaracao.style.display = "flex";
};








$('#data').mask('00/00');
$('#cod-seguranca').mask('000');
$('#num-card').mask('0000 0000 0000 0000');







