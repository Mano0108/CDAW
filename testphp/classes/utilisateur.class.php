<?php

    class Utilisateur{

        private $userName;
        private $userPwd;
        public function __construct(string $n, string $p){
            $this->userName = $n;
            $this->userPwd = $p;
        }
    }

?>