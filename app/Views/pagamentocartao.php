<div class='box2'>
    <div class='fundo-cartao'>
        <div class='imagem-cartao'>
            <img src='assets/imagelogos/cartoes-paginapagamentocartao.png' alt=''>
        </div>

        <div class='inf'>
            <input id='titular' type='text' required='required'>
            <span>NOME DO TITULAR</span>
        </div>
        <div class='inf'>
            <input id='num-card' type='text' required='required'>
            <span>NÚMERO DO CARTÃO</span>
        </div>
        <div class='inf'>
            <input id='data' type='text' required='required'>
            <span>DATA DE VALIDADE</span>
        </div>
        <div class='inf'>
            <input id='cod-seguranca' type='text' required='required'>
            <span>CVC</span>
        </div>

        <div class='botao-confirmar'>
            <a href="<?=base_url('agradecimento');?>">
                <button class='botao'>CONFIRMAR COMPRA</button>
            </a>
        </div>

    </div>
</div>