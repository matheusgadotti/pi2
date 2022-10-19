<?php
include('config.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail"; 
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $conexao->real_escape_string($_POST['senha']);
        
        $sql_code = "SELECT id, email as nome FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: home.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div style="margin-top: 250px; background-color: SkyBlue; width: 400px; height: 250px;">
    <h1>SIGEFI</h1>
    <h1>Acesse sua conta</h1>
    <form action="" method="POST">
        <p>
            <label style="margin-left: 80px;">E-mail</label>
            <input type="text" name="email">
        </p>
        <p>
            <label style="margin-left: 80px;">Senha</label>
            <input type="password" name="senha">
        </p>
        <p>
            <button style="margin-left: 175px;" type="submit">Entrar</button>
        </p>
        <p style="text-align: center;">
            <a href="registro.php">Registrar</a>
        </p>
    </form>
</div>
</body>
</html>