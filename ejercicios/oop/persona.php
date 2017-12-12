<?php

    class Persona {

        private $nombre;
        private $apellidos;
        private $edad;

        public function saludo() {
            echo "Hola, soy ". $this->nombre ." ". $this->apellidos ." y tengo ". $this->edad ." años de edad";
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getApellidos()
        {
            return $this->apellidos;
        }

        public function getEdad()
        {
            return $this->edad;
        }

        public function __construct ($nombre, $apellidos, $edad)
        {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->edad = $edad;
        }

        public function __destruct()
        {
            echo "<p> Destruyendo a ". $this->nombre ."</p>";
        }

    }

?>