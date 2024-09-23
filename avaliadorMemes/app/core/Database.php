<?php

    class Database {
        
        private static $conn;

        public static function getConnection() {

            if(!self::$conn) {
                self::$conn = new PDO('mysql:host=localhost;dbname=memes_em_geral','root', '');

                !self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             
            }
            echo "banco_funcionando"; //só vai aparecer quando a view mostar, mas na teoria está tudo certo
            return self::$conn;
        }
    }