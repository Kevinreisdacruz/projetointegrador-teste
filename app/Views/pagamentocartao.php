
<div class='box2'>
    <div class='fundo-cartao'>
        <div class='imagem-cartao'>
            <img src='assets/imagelogos/cartoes-paginapagamentocartao.png' alt=''>
        </div>

        <div class='inf'>
            <input name="nometitular" id='titular' type='text'>
            <span>NOME DO TITULAR</span>
        </div>
        <div class='inf'>
            <input name="numerocartao" id='num-card' type='text'>
            <span>NÚMERO DO CARTÃO</span>
        </div>
        <div class='inf'>
            <input name="validade" id='data' type='text'>
            <span>DATA DE VALIDADE</span>
        </div>
        <div class='inf'>
            <input name="codseguranca" id='cod-seguranca' type='text'>
            <span>CVC</span>
        </div>

        <div class='botao-confirmar'>
            <a href="<?=base_url('agradecimento') ?>">
                <button  class='botao'>CONFIRMAR COMPRA</button>
            </a>
        </div>

    </div>
</div>
