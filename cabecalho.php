<?php

include('protect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>SIGEFI</title>
</head>
<body>
    <!--
<header>
        <div class="cabeca">
            <nav>
                <section class="sessao1">
                    <div class="blocoLado_a_Lado">
                        <a href="home.php">Home </a>
                    </div>

                    <div class="blocoLado_a_Lado">
                        <a href="consultaReceita.php">Consulta Receita </a>
                    </div>

                    <div class="blocoLado_a_Lado">
                        <a href="consultaDespesa.php">Consulta Despesa </a>
                    </div>

                    <div class="blocoLado_a_Lado">
                        <a href="consultaInvestimento.php">Investimento </a>
                    </div>

                    <div class="blocoLado_a_Lado">
                        <a href="relatorio3.php">Relatorio </a>
                    </div>

                    <div class="blocoLado_a_Lado">
                        <a href="logout.php">Sair</a>
                    </div>
                </section>
            </nav>
        </div>
-->
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark">
  <a class="navbar-brand">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="consultaReceita.php">Consulta Receita</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="consultaDespesa.php">Consulta Despesa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="consultaInvestimento.php">Investimento</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="relatorio3.php">Relatorios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Sair</a>
      </li>

    </ul>
  </div>
</nav>
    </header>