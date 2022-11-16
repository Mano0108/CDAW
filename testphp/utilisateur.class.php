<?php

    class Utilisateur{

        public $userName;
        private $userPwd;
        public function __construct(string $n, string $p){
            $this->userName = $n;
            $this->userPwd = $p;
        }

        public function getUserName() {
            return $this->userName;
        }

    }

