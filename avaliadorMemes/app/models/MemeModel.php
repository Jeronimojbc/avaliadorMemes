<?php
    Class MemeModel //nome no controller ta errado
    {
        private $db;

        public function __construct() {

            $this->db = Database::getConnection();
            
        }

        function index() {
            echo"função index";
        }

        
    }