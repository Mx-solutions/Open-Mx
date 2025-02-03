<?php

/**
 * File: Password.php
 *
 * Description: This file contain the PHP Password class
 *
 * PHP version Dev v8.4.3
 *
 * @category  Password
 * @package   Security\Tools
 * @author    Xavier M. <dev.mit-section@mx-solutions.net>
 * @copyright 2017 (c) Mx Solutions
 * @license   MIT https://opensource.org/license/mit
 * @link      https://mx-solutions.net/security-tools
 */

declare(strict_types=1);

namespace MxSolutions\SecurityTools;

use InvalidArgumentException;
use MxSolutions\SecurityTools\Abstracts\Generator;
use MxSolutions\SecurityTools\Interfaces\Generate;

/**
 * Class: Password
 *
 * Description: Regroup the different password utilities
 *
 * @category  Password
 * @package   Security\Tools
 * @author    Xavier M. <dev.mit-section@mx-solutions.net>
 * @copyright 2017 (c) Mx Solutions
 * @license   MIT https://opensource.org/license/mit
 * @link      https://mx-solutions.net/security-tools
 */
class Password extends Generator implements Generate
{
    /**
     * Constant: MIN_LENGTH
     *
     * Description: defines the minimum password length
     */
    final protected const int PWD_MIN_LENGTH = 16;

    /**
     * Constant: MAX_LENGTH
     *
     * Description: defines the maximum password length
     */
    final protected const int PWD_MAX_LENGTH = 512;

    /**
     * Method: generate
     *
     * Description: generate a strong password in the blink of an eye
     *
     * @param int  $length     define the password length (default: 16 characters)
     * @param bool $useLower   include lowercase letters in password (default: true)
     * @param bool $useUpper   include uppercase letters in password (default: true)
     * @param bool $useDigits  include digits in password (default: true)
     * @param bool $useSymbols include symbols in password (default: true)
     *
     * @return string with the generated password
     */
    final public static function generate(
        int $length = self::PWD_MIN_LENGTH,
        bool $useLower = true,
        bool $useUpper = true,
        bool $useDigits = true,
        bool $useSymbols = true
    ): string {
        $minLength = self::getMinLength();
        if ($length < $minLength) {
            $length = $minLength;
        }

        $range = false;
        try {
            $range = self::checkRange(
                $length,
                min: $minLength,
                max: self::getMaxLength()
            );
        } catch (InvalidArgumentException $e) {
            // Manage exception
            echo "ERROR: " . $e->getMessage() . "\n";
        }

        // Checking included password characters
        $chars = self::prepChars(
            $useLower,
            $useUpper,
            $useDigits,
            $useSymbols
        );

        $password = '';
        $indexMax = count($chars) - 1;
        if ($range && $indexMax > 0) {
            for ($i = 0; $i < $length; $i++) {
                $password .= $chars[random_int(0, $indexMax)];
            }
        } else {
            $password = 'Please follow the documentation before use this package';
        }

        return $password;
    }

    /**
     * Method: getMinLength
     *
     * Description: check the min length setting
     *
     * @return int with the password min length
     */
    final protected static function getMinLength(): int
    {
        $length = self::PWD_MIN_LENGTH;

        if (getenv('PWD_MIN_LENGTH') !== false) {
            $value = intval(getenv('PWD_MIN_LENGTH'));
            if ($value > self::PWD_MIN_LENGTH) {
                $length = $value;
            }
        }
 
        return $length;
    }

    /**
     * Method: getMaxLength
     *
     * Description: check the max length setting
     *
     * @return int with the password max length
     */
    final protected static function getMaxLength(): int
    {
        $length = self::PWD_MAX_LENGTH;

        if (getenv('PWD_MAX_LENGTH') !== false) {
            $value = intval(getenv('PWD_MAX_LENGTH'));
            if ($value < self::PWD_MAX_LENGTH) {
                $length = $value;
            }
        }
 
        return $length;
    }
}
