<?php echo form_open_multipart('pagamento/validacaoCartao');?>
<div class='box2'>
    <div class='fundo-cartao'>
        <div class='imagem-cartao'>
            <img src='assets/imagelogos/cartoes-paginapagamentocartao.png' alt=''>
        </div>

        <div class='inf'>
            <input name="nometitular" id='titular' type='text' >
            <span>NOME DO TITULAR</span>
            <span style="color: red;"><?php echo session()->getFlashdata('error')['nometitular'] ?? '' ?></span>
        </div>
        <div class='inf'>
            <input name="numerocartao" id='num-card' type='text' >
            <span>NÚMERO DO CARTÃO</span>
            <span style="color: red;"><?php echo session()->getFlashdata('error')['numerocartao'] ?? '' ?></span>
        </div>
        <div class='inf'>
            <input name="validade" id='data' type='text' >
            <span>DATA DE VALIDADE</span>
            <span style="color: red;"><?php echo session()->getFlashdata('error')['validade'] ?? '' ?></span>
        </div>
        <div class='inf'>
            <input name="codseguranca" id='cod-seguranca' type='text' >
            <span>CVC</span>
            <span style="color: red;"><?php echo session()->getFlashdata('error')['codseguranca'] ?? '' ?></span>
        </div>

        <div class='botao-confirmar'>
                <button type="submit" class='botao'>CONFIRMAR COMPRA</button>
        </div>

    </div>
</div>
<?php form_close(); ?> 