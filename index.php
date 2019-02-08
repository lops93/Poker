<?php
require 'funcoes.php'; 
$filter = filter_input(INPUT_POST, 'flg');

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Poker Game</title>
        <link rel="stylesheet" href="css/style.css">

        <!--Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


        
    </head>
    <body>
        <section id="mesa">
         

<div class="cartas">
                <?php if ($filter) : ?>     
                <?php foreach ($player_show_hand as $carta) : // Sua mão?>

                    <img src="./imagens/<?php echo $carta ?>.png" > 
                <?php endforeach;?>
                <p>Sua Combinação foi: <span><?php echo $pmao;?></span> Você <?php echo $pe; 
?></p>
          <?php    
          if ($pe == "venceu") {  ?>
            
              <!-- Button trigger modal -->
<button type="button" class="btn btn-primary arm" data-toggle="modal" data-target="#exampleModal">
  Salvar Resultado
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Armazenar Resultado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="armazenarcombinacao.php">
           Nome: <input type="text" name="nome_jogador" required><br>
           Sua Classificaçao foi: Vencedor com <input type="text" name="combinacao" readonly value="<?php echo $pmao; ?>">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <input type="submit" name="salvar" type="button" class="btn btn-primary" value="Salvar">
       </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
         <?php }  ?>


                
            <?php endif; ?>
        </div>
        

        <div class="baralho">
            <form method="post" action="index.php">
                <h2>

                <input type="submit" name="flg" id="stockImage">
                <h4>Virar Cartas</h4>
            </form>
        </div>
<div class="cartas">
     
            <?php if ($filter) : ?>
                <?php foreach ($enemy_show_hand1 as $carta) : // Mão do oponente?>

                    <img src="./imagens/<?php echo $carta ?>.png">
                <?php endforeach; ?>
              <div id="txt_op"><p>A Combinação do seu oponente foi: <span><?php echo $opmao; ?></span> Ele <?php echo $ope; ?></p></div>
               <?php endif; ?>
        </div> 
<p>*Você poderá armazenar seu resultado no ranking somente quando ganhar uma partida</p>
<button type="button" class="btn btn-primary ranking" data-toggle="modal" data-target="#rankingModal">
  Ranking
</button>

<!-- Modal -->
<div class="modal fade" id="rankingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ranking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
           
      <?php
$conexao = mysqli_connect('localhost','root','');
$banco = mysqli_select_db($conexao,'poker');
mysqli_set_charset($conexao,'utf8');
 
$sql = mysqli_query($conexao,"select * from jogadores ") or die("Erro");
while($dados=mysqli_fetch_assoc($sql))
    { 
      // $id = $dados['id']; ?>
        <form action='excluir.php?id=<?php echo $dados['id'];?>' method='post'>
<input type='submit' name='id' class="close" aria-label="Close" value='x' />
</form>
        <p style="color: black">Nome: <?php echo $dados['nome']; ?>- combinação: <?php echo $dados['combinacao']; ?></p>
         
       <?php


    }
?>
            
        
      
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

    </section>


        <br><br><br>
<div style="text-align: center;">
        <h4>Crédito pelas imagens</h4>
      <a href="http://acbl.mybigcommerce.com/52-playing-cards/" target="_blanc">  <button type="button" class="btn btn-primary" > Cartas</button></a>
<a href="https://www.shareicon.net/game-poker-cards-play-gamble-106765" target="_blanc">  <button type="button" class="btn btn-primary" > Icone</button></a>
</div>
    </body>

</html>
