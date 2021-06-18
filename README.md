# Vigenère cipher
The Vigenère cipher is a method of encrypting alphabetic text by using a series of interwoven Caesar ciphers, based on the letters of a keyword. It employs a form of polyalphabetic substitution

However this interpretation of the cipher uses a seed (a long string of numbers) in order to encrypt and decrypt data. Therefore users should not be allowed to easily access encrypted data.

## Installation
To install using git: `git clone https://github.com/Paughton/vigenere-cipher.git`

## Releases
All releases will be pushed to the live version of the website. To view all releases and changes please see our [Changelog](https://github.com/Paughton/vigenere-cipher/blob/main/CHANGELOG.md). The changelog file will change upon releases and will highlight the general changes. Once a release is made a new branch will be made for that release for archive purposes.

## Usage
Please view the [example.php](https://github.com/Paughton/vigenere-cipher/blob/main/example.php) file for more info.
```PHP
require_once("vigenerecipher.php");
define("VIGENERECIPHER_SEED", "5215295199971613878824149"); // created using \Vigenere\Cipher::generateSeed(25);

$cipher = new \Vigenere\Cipher(VIGENERECIPHER_SEED, 'A random string to encrypt/decrypt!');
$cipher->encryptValue();
echo $cipher->getValue();

echo "<br>";

$otherCipher = new \Vigenere\Cipher($cipher->getSeed(), $cipher->getValue());
$otherCipher->decryptValue();
echo $otherCipher->getValue();
```

#### All available functions
```PHP
__construct(string $seed = "123456789", string $value = '');
encryptValue(): void
decryptValue(): void
getValue(): string
getSeed(): string
getCipherKey(): array
setValue(string $value = ''): void
setSeed(string $seed = '123456789'): void
static generateSeed(int $length = 25): string
```

When using the cipher do not use the default seed of `123456789` use the `generateSeed(int $length): string` function once to get a seed and store the seed. Do not change the seed or the decryption will no longer work (unless you have the old seed)

When setting the value of the `Cipher` object: make sure to only use values that are single quoted. I.e. `$value = 'Some value'` and not `$value = "Some value"`. For more information on why see [PHP: Strings - Manual](https://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.single).

## Reporting an issue or bug
Please open up an issue and be descriptive as possible.

## Contributing
If you would like to contribute please fork the repository and issue a pull request for future changes.

### Copyright
Copyright (c) 2021 Paughton. [MIT License](https://github.com/Paughton/vigenere-cipher/blob/main/LICENSE.md).