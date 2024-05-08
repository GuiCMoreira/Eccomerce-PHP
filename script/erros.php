<?php
function erros($e)
{
if (str_contains($e, "PRIMARY")) {
return "O código de ID já está cadastrado";
}

return $e;
}
function erro_cpf_cnpj($e)
{
if (str_contains($e, "PRIMARY")) {
return "O CPF/CNPJ já está cadastrado";
}

return $e;
}

?>