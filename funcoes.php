<?php

require 'classes/cartas.php'; 
require 'classes/sessao.php'; 
require 'classes/poker.php'; 

$cartas = new Cartas;
$operate = new Operate;
$poker = new Poker;

// Iniciar Sessão
$operate->startSession();

// Gerar um baralho
$baralho = $cartas->baralho();

// Dar as Cartas
$player_hand = $operate->getHand($baralho);
$enemy_hand1 = $operate->getHand($baralho);
$enemy_hand2 = $operate->getHand($baralho);
// Mostrar imagem das cartas
$player_show_hand = $operate->showHand($player_hand);
$enemy_show_hand1 = $operate->showHand($enemy_hand1);
$enemy_show_hand2 = $operate->showHand($enemy_hand2);
// Combinação vencedora
$pmao = $poker->getMao($player_hand);
$opmao = $poker->getMao($enemy_hand1);
$oponente2 = $poker->getMao($enemy_hand2);
// Fim da sessão

$operate->clearSession();

$presultado = $pmao;
$opresultado = $opmao;

//Exibir o vencedor e o perdedor de acordo com a melhor mão
 $royal = 9;
 $sf = 8;
 $q = 7;
 $fh = 6;
 $f = 5;
 $s = 4;
 $t = 3;
 $d = 2;
 $u = 1;
 $m = 0;
$resultado = " ";
$pr = " ";
$opr = " ";
$pe = " ";
$ope = " ";

if ($pmao == "Maior Carta" ) {
	$pr = $m;

}
if ($pmao == "Um Par" ) {
	$pr = $u;

}
if ( $opmao == "Maior Carta") {

$opr = $m;
}
if ($opmao == "Um Par") {
$opr = $u;
}
if ($pmao == "Dois Pares") {
$pr = $d;
}
if ($opmao == "Dois Pares") {
$opr = $d;
}
if ($pmao == "Trinca") {
$pr = $t;
}
if ($opmao == "Trinca") {
$opr = $t;
}
if ($pmao == "Sequência") {
$pr = $s;
}
if ($opmao == "Sequência") {
$opr = $s;
}
if ($pmao == "Flush") {
$pr = $f;
}
if ($opmao == "Flush") {
$opr = $f;
}
if ($pmao == "Full House") {
$pr = $fh;
}
if ($opmao == "Full House") {
$opr = $fh;
}
if ($pmao == "Quadra") {
$pr = $q;
}
if ($opmao == "Quadra") {
$opr = $q;
}
if ($pmao == "Straight Flush") {
$pr = $sf;
}
if ($opmao == "Straight Flush") {
$opr = $sf;
}
if ($pmao == "Royal Flush") {
$pr = $rf;
}
if ($opmao == "Royal Flush") {
$opr = $rf;
}
if ($pr > $opr) {
	$pe = "venceu";
$ope = "perdeu";
}
if ($pr < $opr) {
	$pe = "perdeu";
    $ope = "venceu";
}
if ($pr == $opr) {
  $pe = "empatou ";
  $ope = "empatou";           

} 

$maior_carta = 0;
$a = 13;   
$king = 12;
$queen = 11;
$j = 10;
$dez = 9;
$nove = 8;
$oito = 7;
$sete = 6;
$seis = 5;
$cinco = 4;
$quatro = 3;
$tres = 2;
$dois = 1;
   


