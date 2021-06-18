<?php

	namespace Vigenere;
	
	class Cipher {
		private string $seed;
		private array $cipherKey;
		private string $value;
		
		public function __construct(string $seed = "123456789", string $value = '') {
			$this->seed = $seed;
			$this->cipherKey = str_split($this->seed);
			$this->value = $value;
		}
		
		public function encryptValue(): void {
			$encryptedValue = "";
			$f = 0;
			for ($i = 0; $i < strlen($this->value); $i++) {
				if ($f >= count($this->cipherKey)) $f = 0;
				$newAsciiValue = ord($this->value[$i]) + $this->cipherKey[$f];
				if ($newAsciiValue > 126) $newAsciiValue = 32 + ($newAsciiValue - 126);
				$encryptedValue .= chr($newAsciiValue);
				$f++;
			}
			
			$this->value = $encryptedValue;
		}
		
		public function decryptValue(): void {
			$decryptedValue = "";
			$f = 0;
			for ($i = 0; $i < strlen($this->value); $i++) {
				if ($f >= count($this->cipherKey)) $f = 0;
				$newAsciiValue = ord($this->value[$i]) - $this->cipherKey[$f];
				if ($newAsciiValue < 32) $newAsciiValue = 126 - (32 - $newAsciiValue);
				$decryptedValue .= chr($newAsciiValue);
				$f++;
			}
			
			$this->value =$decryptedValue;
		}
		
		public function getValue(): string {
			return $this->value;
		}
		
		public function getSeed(): string {
			return $this->seed;
		}
		
		public function getCipherKey(): array {
			return $this->cipherKey;
		}
		
		public function setValue(string $value = ''): void {
			$this->value = stripcslashes($value);
		}
		
		public function setSeed(string $seed = '123456789'): void {
			$this->seed = $seed;
			$this->cipherKey = str_split($this->seed);
		}
		
		public static function generateSeed(int $length = 25): string {
			$seed = "";
			for ($i = 0; $i < $length; $i++) {
				$seed .= strval(rand(1, 9));
			}
			
			return $seed;
		}
	}

?>