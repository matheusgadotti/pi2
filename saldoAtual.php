<?php

include('protect.php');

require_once('cabecalho.php');

require_once('config2.php');

require_once('voltar.php');

$query_valor_receita = "SELECT SUM(valor_receita) AS valor_das_receitas FROM receita";
$result_valor_receita = $conexao->prepare($query_valor_receita);
$result_valor_receita->execute();

$row_valor_receita = $result_valor_receita->fetch(PDO::FETCH_ASSOC);
echo "<br> Valor total das receitas: R$ " . number_format($row_valor_receita['valor_das_receitas'], 2, "," , ".") . "<br>";

$query_valor_despesa = "SELECT SUM(valor_despesa) AS valor_das_despesas FROM despesa";
$result_valor_despesa = $conexao->prepare($query_valor_despesa);
$result_valor_despesa->execute();

$row_valor_despesa = $result_valor_despesa->fetch(PDO::FETCH_ASSOC);
echo "<br> Valor total das despesas: R$ " . number_format($row_valor_despesa['valor_das_despesas'], 2, "," , ".") . "<br>";



$saldo_atual = $row_valor_receita['valor_das_receitas'] - $row_valor_despesa['valor_das_despesas'];

echo "<br> Saldo Atual: R$ " . number_format($saldo_atual, 2, ",", ".") . " <br> ";