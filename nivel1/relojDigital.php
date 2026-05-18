<?php 

    class Reloj {

        //Atributos privados
        private int $hora = 0; 
        private int $minuto = 0; 
        private int $segundo = 0;

        //constructor que recibe los valores de hora, minuto y segundo
        public function __construct(int $hora, int $minuto, int $segundo) {
            $this->hora = $hora;
            $this->minuto = $minuto;
            $this->segundo = $segundo;
        }

        //metodos publicos para obtener los valores de hora, minuto y segundo
        public function ticTac( int $segundos,) {
            for ($i = 0; $i < $segundos; $i++) {
                $this->segundo++;
                if ($this->segundo == 60) {
                    $this->segundo = 0;
                    $this->minuto++;
                }
            }
            if ($this->minuto == 60) {
                $this->minuto = 0;
                $this->hora++;
            }
            if ($this->hora == 24) {
                $this->hora = 0;
            }
        }

        public function mostrarHora() {
            return sprintf("%02d:%02d:%02d", $this->hora, $this->minuto, $this->segundo);
        }
    }
    

?>