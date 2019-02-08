<?php

class Operate
{
    /**
     * Começar Sessão
     * @see getHand 
     */
    public function startSession()
    {
        session_start();
    }

    /**
     * Finalizar Sessão
     */
    public function clearSession()
    {
        $_SESSION = '';
        session_destroy();
    }

    /**
     * Dar as cartas
     * @param Array $baralho 
     * @return Array $hand 
     */
    public function getHand($baralho)
    {
        if (!empty($_SESSION['rest'])) {
            $baralho = $_SESSION['rest'];
        }

        
        $hand = array();
        for ($i = 0; $i < 5; $i++) {
            $hand[] = array_shift($baralho);
        }

        // guardar o resto do baralho
        $_SESSION['rest'] = $baralho;

        return $hand;
    }

    /**
     * Imagem das cartas
     * @param Array $hand 
     * @return string 
     */
    public function showHand($hand)
    {
        $show_hand = array();
        foreach ($hand as $carta) {
            $show_hand[] = $carta['naipe'] .'_'. $carta['valor'];
        }

        return $show_hand;
    }

}

