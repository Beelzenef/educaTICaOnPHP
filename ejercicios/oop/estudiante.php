<?php

    include_once "persona.php";

    class Estudiante extends Persona
    {
        private $codigo;
        private $matricula;

        public static $numModulos = 4;

        function __construct ($nombre, $apellidos, $edad, $codigo, $matricula)
        {
            parent::__construct($nombre, $apellidos, $edad);

            $this->codigo = $codigo;
            $this->matricula = $matricula;
        }

        public function getCodigo()
        {
            return $this->codigo;
        }

        public function setCodigo($cod)
        {
            $this->codigo = $cod;
        }

        public function getMatricula()
        {
            return $this->matricula;
        }

        public function setMatricula($mat)
        {
            $this->matricula = $mat;
        }
    }

?>