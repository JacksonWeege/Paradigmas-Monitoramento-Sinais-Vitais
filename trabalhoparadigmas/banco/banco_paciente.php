<?php

require_once 'conexao.php';

function cadastrar(string $nome, float $idade, string $sexo, string $cidade) {
    //PREPARED STATEMENTS
    $sSql = 'INSERT INTO PACIENTE (NOME, IDADE, SEXO, CIDADE)
                                    VALUES (?, ?, ?, ?);';
    
    $oConexao   = getConexao();
    $oTransacao = $oConexao->prepare($sSql);
    
    $oTransacao->execute([$nome, $idade, $sexo, $cidade]);
    
}

function deletar (int $iChave) {
    $sSql = 'DELETE
               FROM PACIENTE
              WHERE id = ?;';
    
    $oConexao = getConexao();
    $oTransacao = $oConexao->prepare($sSql);
    
    $oTransacao->execute([$iChave]);
}

function selecionarTodosDados() : array {
    //criei o SQL
    $sSql = 'SELECT *
               FROM PACIENTE;';
    
    //conectei com o banco
    $oConexao = getConexao();
    
    //executei o SQL no banco
    $oTransacao = $oConexao->query($sSql);
    
    //retornar um array associativo com todas as cidades
    return $oTransacao->fetchALL(PDO::FETCH_ASSOC);
    
    
    
}