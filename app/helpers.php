<?php

function mask($str, $mask)
{

    $str = str_replace(" ","",$str);

    for($i=0;$i<strlen($str);$i++){
        $mask[strpos($mask,"#")] = $str[$i];
    }

    return $mask;
}

function phoneMask($phone)
{
    if(strlen($phone) == 10){
        return mask($phone, "(##) ####-####");
    }
    if(strlen($phone) == 11){
        return mask($phone, "(##) #####-####");
    }

    return $phone;
}
function formatPhone($phone)
{
    if(strlen($phone) == 10){
        return mask($phone, "(##) ####-####");
    }
    if(strlen($phone) == 11){
        return mask($phone, "(##) #####-####");
    }

    return $phone;
}

function formatMoney($value, $symbol = 'R$')
{
    return $symbol.' '.number_format($value, 2, ',','.');
}

function retiraAcentos($string)
{
    $acentos  =  'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $sem_acentos  =  'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $string = strtr($string, utf8_decode($acentos), $sem_acentos);
    $string = str_replace(" ","-",$string);
    return utf8_decode($string);
}

function getPayload($payload)
{
    return (unserialize(base64_decode($payload)));
}
