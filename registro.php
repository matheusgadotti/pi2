<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <title>SIGEFI - Registro</title>
</head>

<body>
<div>
    <div class="box">
    <form action="registro.php" method="POST">
        <fieldset>
            <legend><b>Registro</b></legend>
            <br>
            <div class="inputBox">
                <input type="text" name="email" id="email" class="inputUser" required>
                <label for="email" class="labelInput">E-mail</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="senha" id="senha" class="inputUser" required>
                <label for="senha" class="labelInput">Senha</label>
            </div>
            <br><br>
            <input type="submit" name="submit" id="submit">
        </fieldset>
    </form>
</div>
<div class="lado">
<?php

    if(isset($_POST['submit'])){   

    include_once('config.php');


    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(email,senha) 
    VALUES ('$email','$senha')");
    
}
    

?>
</div>
    </div>
    <header>
        <div class="cabeca">
            <nav>
                <section class="sessao1">
                    <div class="blocoLado_a_Lado">
                        <a href="index.php">VOLTAR PARA A TELA DE LOGIN </a>
                    </div>
                    
                </section>
            </nav>
        </div>
    </header>
</body>
</html>