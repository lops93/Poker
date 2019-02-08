<?php
if (isset($_GET['id']))
    
{
$servername = "localhost";
  $username = "root";
  $password  = "";
  $database   = "poker";
  $id = $_GET['id'];
  $conexao = mysqli_connect($servername, $username, $password, $database);
 
  
 
  $confere = mysqli_query($conexao, "SELECT id, nome FROM jogadores Where id_user =  $id");
  
    $dados = mysqli_fetch_object($confere); 
    $apaga = mysqli_query($conexao, "DELETE FROM jogadores WHERE id = $id");
    
if($apaga): ?>
         <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/poker/index.php'>
                    <script type="text/javascript">
                        alert("Excluido");
                    </script>     <?php 
    endif;
  
}

?>