<?php

    class Tarefa{
        private $id;
        private $nome;
        private $email;
        private $cpf;
        private $cadastro;

        public function __get($atributo)
        {
            return $this->$atributo;
        }

        public function __set ($atributo, $valor)
        {
            $this->$atributo = $valor;
        }

    }