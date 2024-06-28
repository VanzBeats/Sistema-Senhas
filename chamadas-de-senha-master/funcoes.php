<?php 
include("conexao.php"); 

function generatePassword($qtyCaraceters = 8)
{
    //Letras minúsculas embaralhadas
   // $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');
 
    //Letras maiúsculas embaralhadas
    //$capitalLetters = str_shuffle('ABC');
 
    //Números aleatórios
    $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
    $numbers = 123456789;
 
    //Caracteres Especiais
    //$specialCharacters = str_shuffle('!@#$%*-');
 
    //Junta tudo
    $characters = /*$capitalLetters.$smallLetters.*/$numbers/*.$specialCharacters*/;
 
    //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
    $senha = substr(str_shuffle($characters), 0, $qtyCaraceters);
 
    //Retorna a senha
    return $senha;
}

function generatePreferentialPassword()
{
    // Gera 3 números aleatórios
    $numbers = mt_rand(100, 999);

    // Adiciona 'P' ao final
    $senhaPreferencial = $numbers . 'P';

    // Retorna a senha preferencial
    return $senhaPreferencial;
}
?>