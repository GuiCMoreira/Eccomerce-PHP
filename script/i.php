<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="finalizarCompra.php" method="POST">
    <label for="cpf_cnpj_cli">CPF/CNPJ</label>
    <input type="text" name="cpf_cnpj_cli" id="cpf_cnpj_cli">
    <label for="nome_cli">Nome</label>
    <input type="text" name="nome_cli" id="nome_cli">
    <label for="numero_cli">Número</label>
    <input type="text" name="numero_cli" id="numero_cli">
    <label for="bairro_cli">Bairro</label>
    <input type="text" name="bairro_cli" id="bairro_cli">
    <label for="cidade_cli">Cidade</label>
    <input type="text" name="cidade_cli" id="cidade_cli">
    <label for="cep_cli">CEP</label>
    <input type="text" name="cep_cli" id="cep_cli">
    <label for="estado_cli">Estado</label>
    <input type="text" name="estado_cli" id="estado_cli">
    <label for="endereco_cli">Endereço</label>
    <input type="text" name="endereco_cli" id="endereco_cli">

    <label for="cpf_cnpj_trans">cpf_cnpj_trans</label>
    <input type="text" name="cpf_cnpj_trans" id="cpf_cnpj_trans">

    <label for="cpf_cnpj_vend">cpf_cnpj_vend</label>
    <input type="text" name="cpf_cnpj_vend" id="cpf_cnpj_vend">

  <input type="submit" value="Adicionar">
  </form>
</body>
</html>