function mostrarsenha(){
  var inputpass = document.getElementById('senha')
  var btnshowpass = document.getElementById('btn-senha')

  if(inputpass.type === 'password'){
      inputpass.setAttribute('type','text')
      btnshowpass.classList.replace('bi-eye-fill','bi-eye-slash-fill')
  }else{
      inputpass.setAttribute('type','password')

      btnshowpass.classList.replace('bi-eye-slash-fill','bi-eye-fill')
  }

}

var caixalogin = document.getElementById('container-login');
var login = document.getElementById('login');
var  caixaentrar = document.getElementById('caixalogin')
login.addEventListener("click",abrir);


function abrir(){
  caixalogin.style.display = "flex";
}

$('.criar').click(function conta(){
    $('.caixa-login').hide();
    $('.caixa-login').before(`<div id='container-cadastro'>
      <div class='caixa-cadastro'>
        <h1 style="font-weight: bold;">Cadastro</h1>
        <input name="email_cadastrar" type='email' placeholder='E-mail'>
        <br><br>

        <input name="senha_cadastrar" type='password' id='senha' placeholder='Senha'>
        <i class='bi bi-eye-fill' id='btn-senha' onclick='mostrarsenha()'></i>
        <br><br>

        <input  id="fone" name= "telefone_cadastrar" type="" placeholder='telefone'>
        <br><br>

        <a href='index.php'>
          <button name="cadastrar">CRIAR</button>
        </a>
        <br><br>

        <a href ="index.php" style="color: black"><h6 style="font-weight: bold;">Não desejo criar agora </h6></a>
      </div>
    </div>`)

    $('#fone').mask('(00) 00000-0000');
});

var caixaexcluir = document.getElementById('container-excluir');
var exclusao = document.getElementById('exclusao');
exclusao.addEventListener("click",excluir)
$('#fone').mask('(00) 00000-0000');

function excluir(){
  caixaexcluir.style.display = "flex";
 
  
};

var caixaalterar = document.getElementById('container-alterar');
var alteracao = document.getElementById('alteracao');
alteracao.addEventListener("click",alterar)

function alterar(){
  caixaalterar.style.display = "flex";

};

$('#data').mask('00/00');
$('#cod-seguranca').mask('000');
$('#num-card').mask('0000 0000 0000 0000');

AOS.init()





