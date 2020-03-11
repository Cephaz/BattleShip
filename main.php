<?php

    
    require_once('init.php');
    require_once('print.php');

    class Player{

        private $gridofships;
        
        public function __construct()
        {
            $this->gridofships = setup();
        }

        public function getGridogships()
        {
            return $this->gridofships;
        }
        public function setGridogships($gridofships)
        {
            $this->gridofships = $gridofships;
        }
    }

    $p1 = new Player();
    shoot($p1);
    shoot($p1);
?>