<?php

function encrypter($decrypted_string){

    $ciphering = "AES-128-CTR";
    $options = 0;
    $encryption_iv = '1234567891811121';
    
    $Sencryption_key = "yourencryptionkey";
    
    $encryption = openssl_encrypt ($decrypted_string, $ciphering, $Sencryption_key, $options, $encryption_iv);

    return $encryption;
}

function decrypter($encrypted_string){

    $ciphering = "AES-128-CTR";
    $options = 0;
    $encryption_iv = '1234567891811121';
    
    $Sencryption_key = "yourencryptionkey";
    
    $decryption = openssl_decrypt ($encrypted_string, $ciphering, $Sencryption_key, $options, $encryption_iv);

    return $decryption;
}


?>