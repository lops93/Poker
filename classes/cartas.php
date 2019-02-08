<?php
//Classe que define o valor das cartas e das naipes
class Cartas{
    
    private $naipes = array('E', 'C', 'O', 'P');

    /**
     * Gerar um baralho aleatório
     * @return Array
     */
    public function baralho()
    {
        $naipes = $this->naipes;
        $valores = range(1, 13);
      

        
        $baralho = array();
        $carta = array();
        for ($i = 0; $i < count($naipes); $i++) {
            foreach ($valores as $valor) {
                $carta['naipe'] = $naipes[$i];
                $carta['valor'] = $valor;
                array_push($baralho, $carta);
            }
        }
       //embaralhar
        shuffle($baralho);


        return $baralho;
    }

}
