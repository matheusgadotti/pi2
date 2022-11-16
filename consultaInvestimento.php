<?php

include('protect.php');

require_once('cabecalho.php');

require_once('config.php');

require_once('voltar.php');

try {
    $conexao = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
  //  echo "Connected to $dbName at $dbHost successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbName :" . $pe->getMessage());
}


/////////////////
$idusuario = 0;




/////////
try{
    $sql = "select * from investimento where idusuario=:idusuario";
    //statement - declaracao do sql
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':idusuario', $idusuario);
    $stmt->execute();
    echo ('<pre>');
    $investimentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo('<br>');
    echo ('<div>');
    echo('<h2 style="font-size: 30px; color: Purple; text-align: center;"><strong>Investimentos</strong></h2><br>');
    echo('<h2><a href="investimento.php" style="color: Black; font-size: 18px;"><strong style="color: Green;"> +</strong> Cadastrar Investimento</a></h2>');
    echo ('<div style="">');
    echo ('<table style="border: 1px solid black;">');
    echo ('<tr style="border: 1px solid black;">            
    <th style="border: 1px solid black;"> Numero ID </th>
    <th style="border: 1px solid black;"> Descricao </th>
    <th style="border: 1px solid black;"> Data Investimento </th>
    <th style="border: 1px solid black;"> Valor </th>
    <th style="border: 1px solid black;"> Ações </th>
    </tr>');
    
//    print(json_encode($despesas));
    foreach($investimentos as $investimento){
        echo ('<tr style="border: 1px solid black;">
        <td style="border: 1px solid black; text-align: center;"><p style="margin: 0 2px 0 2px">'.$investimento['idinvestimento'].' </p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$investimento['nome_investimento'].' </p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$investimento['data_investimento'].' </p></td>
        <td style="border: 1px solid black;"><p style="margin: 0 2px 0 2px">'.$investimento['valor_investimento'].' </p></td>
        <td style="border: 1px solid black;"><a style="color: red;" href="deletar3.php?del='.$investimento['idinvestimento'].'"> Apagar </a></tr>
        ');
    }
    echo ('</table>');
    echo ('</div>');
    echo ('</div>');


}catch(Exception $e){
    echo $e->getMEssage();
}
