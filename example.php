<?php

	// Example
	// Vigenere Cipher
	
	require_once("vigenerecipher.php");
	define("VIGENERECIPHER_SEED", "5215295199971613878824149"); // created using \Vigenere\Cipher::generateSeed(25);
	
	$cipher = new \Vigenere\Cipher(VIGENERECIPHER_SEED, 'A random string to encrypt/decrypt!');
	$cipher->encryptValue();
	echo $cipher->getValue();
	
	echo "<br>";
	
	$otherCipher = new \Vigenere\Cipher($cipher->getSeed(), $cipher->getValue());
	$otherCipher->decryptValue();
	echo $otherCipher->getValue();

?>