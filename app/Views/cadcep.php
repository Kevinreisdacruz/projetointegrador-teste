<?php echo form_open_multipart('cadcep/validacaoCep');?>
<div class="box">
    <div class="fundo-cep">

        <div class="titulo-cep">
            <h3 style="margin: 0;">ENDEREÇO</h3>
        </div>

        <div class="inf-cep">
            <input name="cidade" type="text" placeholder="CIDADE"><br>
            <span style="color: red;"><?php echo session()->getFlashdata('error')['cidade'] ?? '' ?></span>

            <input name="cep" type="text" placeholder="CEP"><br>
            <span style="color: red;"><?php echo session()->getFlashdata('error')['cep'] ?? '' ?></span>

            <input name="bairro" type="text" placeholder="BAIRRO"><br>
            <span style="color: red;"><?php echo session()->getFlashdata('error')['bairro'] ?? '' ?></span>

            <input name="rua" type="text" placeholder="RUA"><br>
            <span style="color: red;"><?php echo session()->getFlashdata('error')['rua'] ?? '' ?></span>

            <input name="numerocasa" type="text" placeholder="NUMERO DA CASA"><br>
            <span style="color: red;"><?php echo session()->getFlashdata('error')['numerocasa'] ?? '' ?></span>

            <input name="complemento" type="text" placeholder="COMPLEMENTO EX: CASA, CONDOMINIO  "><br>
            <span style="color: red;"><?php echo session()->getFlashdata('error')['complemento'] ?? '' ?></span>
        </div>

        <div class="confirmar-cep">
            <a href="<?=base_url('pagamento');?>">
                <button class="botao-cep" style="font-weight: bold;">CONFIRMAR ENDEREÇO</button>
            </a>
        </div>
    </div>
</div>
<?php form_close(); ?> 