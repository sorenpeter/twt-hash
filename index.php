<?php

/* 
    twt hash render 
    by: sp@darch.dk (2023)
*/

include 'base32.php'; // from: https://github.com/pedroalbanese/base32/

// Getting the data -- Hard coded for now
$url = "http://algorave.dk/bbs.txt"; // TODO: get first '# url = ' from twtxt.txt
$timestamp = "2023-05-29T11:55:42Z"; // TODO: Automatic clean up if not ending with Z
$text = '<__darch__> testing out generating twt-hash using php';
$payload = $url."\n".$timestamp."\n".$text; // assemble  payload
$sum = sodium_crypto_generichash($payload); // Blake2b hashing 
$base32 = Base32::encode($sum); // Conver to base32

// Output the last 7 digits as lower case:
echo substr(strtolower($base32), -7);

?>