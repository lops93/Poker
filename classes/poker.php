<?php
//Classe que define a pontuação
class Poker
{
    private $poker;
    private $state = 0;
    private $name = array(
        0 => "Royal Flush",
        1 => "Straight Flush",
        2 => "Quadra",
        3 => "Full House",
        4 => "Flush",
        5 => "Sequência",
        6 => "Trinca",
        7 => "Dois Pares",
        8 => "Um Par",
        9 => "Maior Carta",
    );

    /**
    * 
    * @param Array $hand
    * @return string
    */
    public function getMao($hand)
    {
        $result = $this->judge($hand);
        $mao= $this->getName($result);
        return $mao;
    }

    /**
    * 
    * @param int
    * @return string
    */
    private function getName($state)
    {
        return $this->name[$state];
    }

    /**
     * Classificação de melhor mão
     * @param Array $carta
     * @return int
     */
    private function judge($hand)
    {
        if ($this->isRoyal($hand)) {
            return 0;
        }
        if ($this->isStraightFlash($hand)) {
            return 1;
        }
        if ($this->isFour($hand)) {
            return 2;
        }
        if ($this->isFullHouse($hand)) {
            return 3;
        }
        if ($this->isSameMark($hand)) {
            return 4;
        }
        if ($this->isStraight($hand)) {
            return 5;
        }
        if ($this->isThree($hand)) {
            return 6;
        }
        if ($this->isPair($hand)) {
            return 7;
        }
        if ($this->onePair($hand)) {
            return 8;
        }
        return 9;
    }

    /**
    * Royal Flush
    */
    private function isRoyal($hand)
    {
        $state = false;
        $royal = array(1, 10, 11, 12 ,13);
        if($this->isStraightFlash($hand)) {
            foreach($hand as $carta) {
                if(in_array($carta["valor"], $royal)) {
                    $state = true;
                } else {
                    $state = false;
                    break;
                }
            }
        }
        return $state;
    }

    /**
    * Straight Flush
    */
    private function isStraightFlash($hand)
    {
        return ($this->isStraight($hand) && $this->isSameMark($hand));
    }

    /**
    * Quadra
    */
    private function isFour($hand)
    {
        $state = $this->searchPair($hand);
        rsort($state);
        if (array_shift($state) == 4) {
            return true;
        }
        return false;
    }

    /**
    * Full House
    */
    private function isFullhouse($hand)
    {
        $state = $this->searchPair($hand);
        rsort($state);
        if (array_shift($state) == 3 && array_shift($state) == 2) {
            return true;
        }
        return false;
    }

    /**
    * Trinca
    */
    private function isThree($hand)
    {
        $state = $this->searchPair($hand);
        rsort($state);
        if (array_shift($state) == 3) {
            return true;
        }
        return false;
    }

    /**
    * Dois Pares
    */
    private function isPair($hand)
    {
        $state = $this->searchPair($hand);
        rsort($state);
        if (array_shift($state) == 2) {
            if (array_shift($state) == 2) {
            return true;
            }
        }
        return false;
    }

    /**
    * Um par
    */
    private function onePair($hand)
    {
        $state = $this->searchPair($hand);
        rsort($state);
        if (array_shift($state) == 2) {
            return true;
        }
        return false;
    }

    /**
    * Verificar se existe a mesma naipe
    */
    private function isSameMark($hand)
    {
        $state = true;
        $naipe = "";
        foreach ($hand as $carta) {
            if ($naipe !== "" && $naipe !== $carta["naipe"]) {
                $state = false;
                break;
            }
            $naipe = $carta["naipe"];
        }
        return $state;
    }

    /**
    * Straight 
    */
    private function isStraight($hand)
    {
        $valores = array();
        foreach ($hand as $carta) {
            $valores[] = $carta["valor"];
        }
        $last = 0;
        sort($valores);
        $state = true;
        foreach ($valores as $valor) {
            if ($last == 1 && $valor == 10) {
                $last = $valores;
                continue;
            }
            if ($last !== 0 && $valor-$last != 1) {
                $state = false;
                break;
            }
            $last = $valor;
        }
        return $state;
    }

    /**
     * Procurar pares
     */
    private function searchPair($hand)
    {
        $state = array();
        foreach ($hand as $carta) {
            if (!isset($state[$carta["valor"]])) {
                $state[$carta["valor"]] = 0;
            }
            $state[$carta["valor"]]++;
        }
        return $state;
    }

 
}




?>