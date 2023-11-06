<?php
    function getConexao() : PDO {
        return new PDO('pgsql:host=localhost;dbname=postosaude', 'postgres', '123');
    }

