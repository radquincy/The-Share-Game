
<form method="POST">
    <input type="text" name="input" placeholder="Text to input" required>
    <input type="text" name="key" placeholder="your key here">
    <input type="submit" name="submit">
</form>
<?php

$text = $_POST["input"];
echo "<strong>Original String:</strong><br>" . $text. "<br>";
$encryption_key = $_POST["key"];
//the encryption
$encryption = openssl_encrypt($text, "AES-128-CTR", $encryption_key, 0, "ffs93kdosmc2m349");
//output encyiption
echo "<strong>Encrypted String:</strong><br>" . $encryption . "<br>";
  

$decryption_key = $_POST["key"];
//decrypt
$decryption=openssl_decrypt ($text, "AES-128-CTR", $decryption_key, 0, "ffs93kdosmc2m349");
echo '<strong>Decryption:</strong><br>'.$decryption.'<br>';

$decryption=openssl_decrypt ($encryption, "AES-128-CTR", $decryption_key, 0, "ffs93kdosmc2m349");

if ($decryption== $text){
    echo "yes";
}else{
    echo "no";
}
?>