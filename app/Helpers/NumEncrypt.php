<?php

namespace App\Helpers;

class NumEncrypt
{
    /**
     * Encrypt a string using the Caesar cipher.
     *
     * @param string $text
     * @param int $shift
     * @return string
     */
    public static function encrypt($text)
    {
        return base64_encode($text);
    }

    /**
     * Decrypt a string using the Caesar cipher.
     *
     * @param string $text
     * @param int $shift
     * @return string
     */
    public static function decrypt($text)
    {
        return base64_decode($text);
    }
}
