<?php

include('protect.php');

require_once('cabecalho.php');

require_once('config.php');

 $del = "DELETE FROM despesa WHERE iddespesa = '".$_GET['del']."'";
 $apagar = mysqli_query($conexao, $del);

 echo '<script>
 
window.location.href="/PROJETO-PI2/consultaReceita.php";

 </script>';

?>