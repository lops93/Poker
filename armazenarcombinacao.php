<?php
$servername = "localhost";
$database = "poker";
$username = "root";
$password = "";
// conexao
$conn = mysqli_connect($servername, $username, $password, $database);
// verificar conexão com o banco
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
//echo "conectado";


$nome_jogador = $_POST['nome_jogador'];
    $combinacao = $_POST['combinacao'];
    //echo "$nome_jogador - $combinacao";

 
$sql = "INSERT INTO jogadores (nome, combinacao) VALUES ('$nome_jogador', '$combinacao')";
if (mysqli_query($conn, $sql)) { ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/poker/index.php'>
                    <script type="text/javascript">
                        alert("Combinação registrada com sucesso");
                    </script>

       <?php
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
  ?>