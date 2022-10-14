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
    echo ('<table border="1.0">');
    echo ('<tr><th>Descricao</th><th>Data</th><th>Valor</th></tr>');
    
//    print(json_encode($despesas));
    foreach($despesas as $despesa){
        echo ('<tr>
        <td>'.$despesa['nome_despesa'].'</td>
        <td>'.$despesa['data_vencimento_despesa'].'</td>
        <td>'.$despesa['valor_despesa'].'</td>
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
    
    echo('<h2>Receitas</h2>');
    echo ('<table border="1.0">');
    echo ('<tr><th>Descricao</th><th>Data</th><th>Valor</th></tr>');
    
//    print(json_encode($despesas));
    foreach($receitas as $receita){
        echo ('<tr>
        <td>'.$receita['nome_receita'].'</td>
        <td>'.$receita['data_vencimento_receita'].'</td>
        <td>'.$receita['valor_receita'].'</td>
        ');
    }
    echo ('</table>');


}catch(Exception $e){
    echo $e->getMEssage();
}
