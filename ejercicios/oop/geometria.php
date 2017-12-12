<?php

    class Triangulo {

        private $cateto1;
        private $cateto2;

        public function getCateto1()
        {
            return $this->cateto1;
        }

        public function getCateto2()
        {
            return $this->cateto2;
        }

        public function __construct($cateto1, $cateto2)
        {
            $this->cateto1 = $cateto1;
            $this->cateto2 = $cateto2;
        }

        public function calcularHipotenusa()
        {
            return sqrt(pow($this->cateto1, 2) + pow($this->cateto2, 2));
        }
    }

?>