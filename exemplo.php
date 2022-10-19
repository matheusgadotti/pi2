<?php
require_once('cabecalho.php');

require_once('config.php');

try {
    $conexao = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
  //  echo "Connected to $dbName at $dbHost successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbName :" . $pe->getMessage());
}


/////////////////
$id_usuario = 7;

try{
    $sql = "select * from despesa where id_usuario=:id_usuario";
    //statement - declaracao do sql
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->execute();
    echo ('<pre>');
    $despesas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo('<h2>Despesas</h2>');
    echo ('<table style="border: 1px solid black;">');
    echo ('<tr style="border: 1px solid black;"><th style="border: 1px solid black;">Descricao</th><th style="border: 1px solid black;">Data</th><th style="border: 1px solid black;">Valor</th></tr>');
    
//    print(json_encode($despesas));
    foreach($despesas as $despesa){
        echo ('<tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">'.$despesa['nome_despesa'].'</td>
        <td style="border: 1px solid black;">'.$despesa['data_vencimento_despesa'].'</td>
        <td style="border: 1px solid black;">'.$despesa['valor_despesa'].'</td>
        ');
    }
    echo ('</table>');


}catch(Exception $e){
    echo $e->getMEssage();
}


/////////
try{
    $sql = "select * from receita where id_usuario=:id_usuario";
    //statement - declaracao do sql
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->execute();
    echo ('<pre>');
    $receitas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo('<br>');
    echo('<h2>Receitas</h2>');
    echo ('<table style="border: 1px solid black;">');
    echo ('<tr style="border: 1px solid black;"><th style="border: 1px solid black;">Descricao</th><th style="border: 1px solid black;">Data</th><th style="border: 1px solid black;">Valor</th></tr>');
    
//    print(json_encode($despesas));
    foreach($receitas as $receita){
        echo ('<tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">'.$receita['nome_receita'].'</td>
        <td style="border: 1px solid black;">'.$receita['data_vencimento_receita'].'</td>
        <td style="border: 1px solid black;">'.$receita['valor_receita'].'</td>
        ');
    }
    echo ('</table>');


}catch(Exception $e){
    echo $e->getMEssage();
}
