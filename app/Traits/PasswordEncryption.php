<?php

namespace App\Traits;

/**
 * Trait PasswordEncryptor
 * @package App\Traits
 */
trait PasswordEncryption
{
    /**
     * Encryption: MD5
     *
     * @param string $password
     * @return string
     */
    public function encryptWithMD5(string $password): string
    {
        return md5($password);
    }

    /**
     * Encryption: MD5 + Salt
     * @param string $password
     * @param string $salt
     * @return string
     */
    public function encryptWithSaltedMD5(string $password): string
    {
        return $this->encryptWithMD5(
            $password .
            env("APP_SALT",    // Assign a custom salt
                env("APP_KEY") // Use the App key as a fallback for salt
            )
        );
    }

    /**
     * Encryption: Sha1
     *
     * @param string $password
     * @return string
     */
    public function encryptWithSha1(string $password): string
    {
        return HASH( "sha1", $password );
    }

    /**
     * Encryption: Sha256
     *
     * @param string $password
     * @return string
     */
    public function encryptWithSha256(string $password): string
    {
        return HASH( "sha256", $password );
    }
}

