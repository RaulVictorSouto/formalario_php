<!DOCTYPE html>
<html>
<head>
    <title>Resultado da Solicitação de Bolsa Auxílio-Tecnologia</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
</head>
<body>
    <h1>SBAT - SISTEMA DE SOLICITAÇÃO DE BOLSA AUXÍLIO-TECNOLOGIA</h1>

<?php

date_default_timezone_set('America/Sao_Paulo'); 

//aqui os dados são recebidos
$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$ano_nascimento = $_POST['ano_nascimento'];
$possui_computador = $_POST['possui_computador'];
$possui_celular = $_POST['possui_celular'];
$possui_notebook = $_POST['possui_notebook'];
$renda = $_POST['renda'];
$data_hora_preenchimento = date("d/m/Y H:i:s");

//iniciaizar a var mensagem
$mensagem = "Nenhum item disponível";

//condições
if($ano_nascimento <date("Y") - 65 && $renda < 3000){
    $mensagem = "Você tem direito a 1 Smartphone";
} elseif ($renda < 1000){
    $mensagem = "Você tem direito a 1 notebook e 1 smartphone";
} elseif ($possui_computador == "Não" && $possui_celular == "Não" && $possui_notebook == "Não") {
    $mensagem = "Você tem direito a 1 notebook.";
} elseif ($ano_nascimento > date("Y") - 18 || $renda > 3000) {
    $mensagem = "Você não tem direito a nenhum dos itens.";
}

echo "<p><strong>Cabeçalho:</strong> SBAT - SISTEMA DE SOLICITAÇÃO DE BOLSA AUXÍLIO-TECNOLOGIA</p>";
echo "<p><strong>CPF:</strong> $cpf</p>";
echo "<p><strong>Nome Completo:</strong> $nome</p>";
echo "<p><strong>Data e Hora do Preenchimento:</strong> $data_hora_preenchimento</p>";
echo "<p><strong>Status da Solicitação:</strong> $mensagem</p>";
if ($mensagem != "Você não tem direito a nenhum dos itens.") {
    // Botão para imprimir
    echo '<p><strong>Leve este comprovante, um documento com foto, e procure o almoxarifado para retirada.</strong></p>';
    echo '<button onclick="window.print()" class = "botao-imprimir">IMPRIMIR</button>';
} else{
    echo '<button onclick="window.print()" class = "botao-imprimir">IMPRIMIR</button>';
}

?>

</body>
</html>